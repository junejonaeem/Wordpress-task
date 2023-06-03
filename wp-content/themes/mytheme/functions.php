<?php
// function add_lazyload_attribute($html, $attachment_id, $attachment) {
//     $image_src = wp_get_attachment_image_src($attachment_id, 'full');
//     $lazyload_image = '<img class="lazyload" src="' . esc_url(get_template_directory_uri()) . '/path-to-your-placeholder-image.jpg" data-src="' . esc_url($image_src[0]) . '" alt="' . esc_attr($attachment['alt']) . '" />';
//     return $lazyload_image;
// }
// add_filter('wp_get_attachment_image', 'add_lazyload_attribute', 10, 4);

function custom_theme_customize_register($wp_customize) {
    // Add Hero section settings
    $wp_customize->add_section('hero_section', array(
        'title' => 'Hero Section',
        'priority' => 30,
    ));

    // Add Hero background image setting
    $wp_customize->add_setting('hero_background_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label' => 'Background Image',
        'section' => 'hero_section',
        'settings' => 'hero_background_image',
    )));

    // Add Hero title setting
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Welcome to our website',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('hero_title', array(
        'label' => 'Title',
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // Add Hero text setting
    $wp_customize->add_setting('hero_text', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('hero_text', array(
        'label' => 'Text',
        'section' => 'hero_section',
        'type' => 'textarea',
    ));

     // Add About Us section settings
     $wp_customize->add_section('about_us_section', array(
        'title' => 'About Us Section',
        'priority' => 30,
    ));

    // Add About Us title setting
    $wp_customize->add_setting('about_title', array(
        'default' => 'About Us',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_title', array(
        'label' => 'Title',
        'section' => 'about_us_section',
        'type' => 'text',
    ));

    // Add About Us text setting
    $wp_customize->add_setting('about_text', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_text', array(
        'label' => 'Text',
        'section' => 'about_us_section',
        'type' => 'textarea',
    ));

    // Add Table Section settings
    $wp_customize->add_section('table_section', array(
        'title' => 'Table Section',
        'priority' => 30,
    ));

    // Add Table Section title setting
    $wp_customize->add_setting('table_section_title', array(
        'default' => 'Table Section',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('table_section_title', array(
        'label' => 'Title',
        'section' => 'table_section',
        'type' => 'text',
    ));

    // Add section below the table
$wp_customize->add_section('section_below_table', array(
    'title' => 'Section below the table',
    'priority' => 30,
));

// Add image field
$wp_customize->add_setting('section_below_table_image', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'section_below_table_image', array(
    'label' => 'Image',
    'section' => 'section_below_table',
    'settings' => 'section_below_table_image',
)));

// Add content textarea
$wp_customize->add_setting('section_below_table_content', array(
    'default' => '',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control('section_below_table_content', array(
    'type' => 'textarea',
    'label' => 'Content',
    'section' => 'section_below_table',
    'settings' => 'section_below_table_content',
));
$wp_customize->add_section('footer_section', array(
    'title' => 'Footer',
    'priority' => 50,
));

// Get available menus
$menus = get_terms('nav_menu');

// Create an array of menu options
$menu_options = array();
foreach ($menus as $menu) {
    $menu_options[$menu->term_id] = $menu->name;
}
// Add footer menu setting
$wp_customize->add_setting('footer_menu_setting', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_key',
));

$wp_customize->add_control('footer_menu_setting', array(
    'type' => 'select',
    'label' => 'Footer Menu',
    'section' => 'footer_section',
    'choices' => $menu_options,
));

}
add_action('customize_register', 'custom_theme_customize_register');



function custom_theme_setup() {
    // Register Casino Hotels custom post type
    $labels = array(
        'name' => 'Casino Hotels',
        'singular_name' => 'Casino Hotel',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-building',
        'supports' => array('title', 'editor', 'thumbnail'),
    );
    register_post_type('casino_hotels', $args);
}
add_action('init', 'custom_theme_setup');
function add_thumbnail_support() {
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('footer_menu', 'Footer Menu');
}
add_action('after_setup_theme', 'add_thumbnail_support');


?>
