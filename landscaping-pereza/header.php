<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container">
        <div class="site-branding">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                echo '<a href="' . esc_url(home_url('/')) . '" class="site-title">Landscaping Pereza</a>';
            }
            ?>
        </div>

        <nav class="main-navigation">
            <button class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <i class="fas fa-bars"></i>
                <span class="screen-reader-text"><?php esc_html_e('Menu', 'landscaping-pereza'); ?></span>
            </button>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav-menu',
                'menu_id'        => 'primary-menu',
                'fallback_cb'    => false,
                'container'      => false,
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ));
            ?>
        </nav>

        <div class="header-contact">
            <a href="tel:6304618267" class="phone-link">
                <i class="fas fa-phone"></i>
                <span>(630) 461-8267</span>
            </a>
        </div>
    </div>
</header>

<?php if (!is_front_page()): ?>
<div class="page-header">
    <div class="container">
        <?php
        if (is_archive()) {
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
        } elseif (is_search()) {
            echo '<h1 class="page-title">';
            printf(esc_html__('Search Results for: %s', 'landscaping-pereza'), '<span>' . get_search_query() . '</span>');
            echo '</h1>';
        } elseif (is_404()) {
            echo '<h1 class="page-title">' . esc_html__('Oops! That page can&rsquo;t be found.', 'landscaping-pereza') . '</h1>';
        } else {
            while (have_posts()) {
                the_post();
                the_title('<h1 class="page-title">', '</h1>');
            }
            rewind_posts();
        }
        ?>
    </div>
</div>
<?php endif; ?>

<div id="content" class="site-content">