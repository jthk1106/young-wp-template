<?php 

// adding the CSS and JS files 

function jkSetup() {
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Mono&display=swap');
    wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.1.0/css/all.css');
    // this function connects the css
    // 1st parameter is whatever you want to name the css file
    // 2nd is the destination of the file
    // 3rd is dependencies of the css file
    // 4th is your version number of the file as a string; you can manually update every new version you put out; "microtime()" returns the current time in microseconds as an alternative
    // 5th is what devices will be supported
    wp_enqueue_style('style', get_stylesheet_uri());
    
    // 'get_theme_file_uri()' is a php function that returns the root folder of the theme and the string passed will target inside of there
    // the above method can be used to also get the css file if it's named differently than style.css 
    // the parameters are similar here with style but the last parameter is a boolean for adding to the footer or not
    wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), NULL, '1.0.0', true);
}

// execute function
// first parameter is when function should execute
// second is the name of the function
add_action('wp_enqueue_scripts', 'jkSetup');

// Adding Theme Support
function jkInit() {
    add_theme_support('post-thumbnails'); // featured image for blog posts
    add_theme_support('title-tag'); // title tag
    add_theme_support('html5', 
        array('comment-list', 'comment-form', 'search-form') // html5 support for comment list & sform, and search form
    );
}

add_action('after_setup_theme', 'jkInit');

// Adding a "Projects" Post Type along with Blog
function jkCustomPostType() {
    register_post_type('project',
        array(
            'rewrite' => array('slug' => 'projects'),
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'add_new_item' => 'Add New Project',
                'edit_item' => 'Edit Project'
            ),
            'menu-icon' => 'dashicons-clipboard', // developer.wordpress.org -> dashicons for more
            'public' => true, // public or private posts feature
            'has_archive' => true, // yay or nay archive
            'supports' => array(
                'title', 'thumbnail', 'editor', 'excerpt', 'comments' // features to be supported
            )
        )
    );
}

add_action('init', 'jkCustomPostType');

// SIDEBAR
function jkWidgets() {
    register_sidebar(
        array(
            'name' => 'Main Sidebar',
            'id' => 'main_sidebar',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
    );
}

add_action('widgets_init', 'jkWidgets');

// FILTERS
// if the query is a search, set the query post types to 'post' and 'project'
function searchFilter($query) {
    if($query->is_search()) {
        $query->set('post_type', array('post', 'project'));
    }
}

add_filter('pre_get_posts', 'searchFilter');