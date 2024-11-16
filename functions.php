<?php

/* Add logo and title */ 
if( !function_exists( 'batoweb_setup' )) {
    function batoweb_setup()
    {
        add_theme_support( 'custom-logo',
            array(
                'height' => 92,
                'width' => 70,
                'flex-width' => true,
                'flex-height' => true,
            )
        );

        add_theme_support( 'title-tag' );

        register_nav_menus(
            array(
                'header-menu' => __( 'Header menu', 'batoweb' )
            )
        );
    }

    add_action( 'after_setup_theme', 'batoweb_setup' );
}

/* Enqueue scripts, styles and fonts */
function batoweb_scripts() {
    wp_enqueue_style( 'main', get_stylesheet_uri () );
    wp_enqueue_style( 'batoweb-style', get_template_directory_uri() . '/assets/css/main.css', array() );
    wp_enqueue_style('swiper-style', "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css", array('batoweb-style'));
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'batoweb-scripts', get_template_directory_uri() . '/assets/js/front-page.js', array(), false, true );
    wp_enqueue_script('swiper-scripts', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), false, true);
    wp_enqueue_script( 'header-scripts', get_template_directory_uri() . '/assets/js/header.js', array(), false, true );
    wp_localize_script('batoweb-scripts', 'myAjax', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('batoweb_nonce'),
    ));
    wp_enqueue_style(  'google_web_fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', [], null );
    wp_enqueue_style(  'google_web_fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Readex+Pro:wght@160..700&display=swap', [], null );

    // if (is_page_template('templates/nos_activites.php')) {
    //     wp_enqueue_style('activites-style', get_template_directory_uri() . '/assets/css/template-styles/activites.css', array('batoweb-style'));
    // }

    // if (is_page_template('templates/nos_actualites.php')) {
    //     wp_enqueue_style('actualites-style', get_template_directory_uri() . '/assets/css/template-styles/actualites.css', array('batoweb-style'));
    // }

    // if (is_page_template('templates/nos_adresses.php')) {
    //     wp_enqueue_style('adresses-style', get_template_directory_uri() . '/assets/css/template-styles/adresses.css', array('batoweb-style'));
    // }

    // if (is_page_template('templates/nos_postuler.php')) {
    //     wp_enqueue_style('postuler-style', get_template_directory_uri() . '/assets/css/template-styles/postuler.css', array('batoweb-style'));
    // }

}

add_action( 'wp_enqueue_scripts', 'batoweb_scripts' );

/** ACF add options page */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}

require_once get_template_directory() . '/incs/class-batoweb-header-menu.php';
