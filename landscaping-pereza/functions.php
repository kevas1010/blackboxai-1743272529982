<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function landscaping_pereza_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'landscaping-pereza'),
        'footer'  => esc_html__('Footer Menu', 'landscaping-pereza'),
    ));
}
add_action('after_setup_theme', 'landscaping_pereza_setup');

// Enqueue scripts and styles
function landscaping_pereza_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('landscaping-pereza-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.0.0');

    // Enqueue custom JavaScript
    wp_enqueue_script('landscaping-pereza-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'landscaping_pereza_scripts');

// Custom function to handle mobile menu
function landscaping_pereza_mobile_menu() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
            const navMenu = document.querySelector('.nav-menu');

            if (mobileMenuToggle && navMenu) {
                mobileMenuToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('active');
                });
            }
        });
    </script>
    <?php
}
add_action('wp_footer', 'landscaping_pereza_mobile_menu');

// Add custom image sizes if needed
add_image_size('service-thumbnail', 400, 300, true);
add_image_size('hero-image', 1920, 1080, true);

// Register widget areas
function landscaping_pereza_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 1', 'landscaping-pereza'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here for footer column 1.', 'landscaping-pereza'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 2', 'landscaping-pereza'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here for footer column 2.', 'landscaping-pereza'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'landscaping_pereza_widgets_init');