<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php'); 




// CPT UI - Add all Post Types to Archive
function my_cptui_add_post_types_to_archives( $query ) {
    // We do not want unintended consequences.
    if ( is_admin() || ! $query->is_main_query() ) {
        return;    
    }

    if ( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
        $cptui_post_types = cptui_get_post_type_slugs();

        $query->set(
            'post_type',
            array_merge(
                array( 'post' ),
                $cptui_post_types
            )
        );
    }
}
add_filter( 'pre_get_posts', 'my_cptui_add_post_types_to_archives' );

// CPT UI - Add all Post Types to Search
function my_cptui_add_post_type_to_search( $query ) {
    if ( is_admin() ) {
        return;
    }

    if ( $query->is_search() ) {
        $cptui_post_types = cptui_get_post_type_slugs();
        $query->set(
            'post_type',
            array_merge(
                array( 'post' ), // May also want to add the "page" post type.
                $cptui_post_types
            )
        );
    }
}
add_filter( 'pre_get_posts', 'my_cptui_add_post_type_to_search' );

















if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site General Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Site Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'site-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Site Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'site-general-settings',
	));
	
}

function the_breadcrumb()
{
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&gt;'; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 0; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) {
            echo '<div id="breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
        }
    } else {
        echo '<div id="breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
            }
            echo $before . /*'Archive by category "' .*/ single_cat_title('', false) /*. '"'*/ . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } /*elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        }*/ elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post'/* && get_post_type() != 'recruiter'*/) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a id="one" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo $cats;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
            echo '<a id="two" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a id="three" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) {
                    echo ' ' . $delimiter . ' ';
                }
            }
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } /*elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }*/
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</div>';
    }
} // end the_breadcrumb()
