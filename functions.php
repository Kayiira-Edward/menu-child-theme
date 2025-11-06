<?php
function enqueue_style_files(){
    //loading the parent style
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css' );
    //loading the child style
    wp_enqueue_style('child-style', get_stylesheet_directory_uri().'/assets/css/style.css', array(''), '1.0.0');
    //versioning the child style file
    // filemtime(get_stylesheet_directory() . '/assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_style_files');

// register a custom post type called 'menu'
function register_menu_cpt(){//task 2.1
    $label = array(
        'name' => 'Menus',
        'singular_name' => 'Menu',
        'add_new' => 'Add New Menu Item',
        'add_new_item' => 'Add New Menu Item',
        'edit_item' => 'Edit Menu Item',
        'new_item' => 'New Menu Item',
        'view_item' => 'View Menu Item',
        'search_items' => 'Search Menu Items',
        'not_found' => 'No   Menu Items Found',
        'not_found_in_trash' => 'No Menu Items Found in Trash',
        'all_items' => 'All Menu Items',
        'menu_name' => '  Menus',
        'name_admin_bar' => '  Menu'
    );
    $args = array(
        'labels' => $label,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-food',
        'show_in_rest' => true,
    
    );
    register_post_type('menu', $args);
}
add_action('init', 'register_menu_cpt');

//register a custom taxonomy called 'menu_category' for the 'menu' post type above

function register_menu_category_taxonomy(){//task 2.2
    $labels = array(
        'name' => 'Menu Categories',
        'singular_name' => 'Menu Category',
        'search_items' => 'Search Menu Categories',
        'all_items' => 'All Menu Categories',
        'parent_item' => 'Parent Menu Category',
        'parent_item_colon' => 'Parent Menu Category:',
        'edit_item' => 'Edit Menu Category',
        'update_item' => 'Update Menu Category',
        'add_new_item' => 'Add New Menu Category',
        'new_item_name' => 'New Menu Category Name',
        'menu_name' => 'Menu Categories',
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'menu-category'),
        'show_in_rest' => true,
    );
    register_taxonomy('menu_category', 'menu', $args);
}
add_action('init', 'register_menu_category_taxonomy');

//A shortcode added 'header'
add_shortcode('header', 'display_header');
function display_header($att = [], $content = null){
    $atts = shortcode_atts(
        array(
            'title' => 'Welcome to this Website',
            'paragraph'=> 'Its a greate day to see you here, expolore the website to know more about me.',
            'image' => 'https://kayiira-edward.vercel.app/photos/eddy.webp',
        ), $att, 'header'

        
        );
        $title = $atts['title'];
        $paragraph = $atts['paragraph'];
        $image = $atts['image'];
        $print = '<div class="header-box">';
        $print .= '<h2>' . esc_html($title) . '</h2>';
        $print .= '<img src="' . esc_url($image) . '" alt="Ooh! check ur connection it was my pic loading...">';
        $print .= '<p>' . esc_html($paragraph) . '</p>';
        $print .= '</div>';
        return $print;
}
