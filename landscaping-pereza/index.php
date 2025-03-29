<?php get_header(); ?>

<div class="container">
    <main id="primary" class="site-main">
        <?php
        if (have_posts()) :
            if (is_home() && !is_front_page()) :
                ?>
                <header>
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
                <?php
            endif;

            /* Start the Loop */
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php
                        if (is_singular()) :
                            the_title('<h1 class="entry-title">', '</h1>');
                        else :
                            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                        endif;

                        if ('post' === get_post_type()) :
                            ?>
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <i class="fas fa-calendar"></i>
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span class="posted-by">
                                    <i class="fas fa-user"></i>
                                    <?php the_author(); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </header>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        if (is_singular()) :
                            the_content();
                        else :
                            the_excerpt();
                            ?>
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        <?php
                        endif;
                        ?>
                    </div>

                    <?php if (is_singular()) : ?>
                        <footer class="entry-footer">
                            <?php
                            $categories_list = get_the_category_list(esc_html__(', ', 'landscaping-pereza'));
                            if ($categories_list) {
                                printf('<span class="cat-links"><i class="fas fa-folder"></i> %s</span>', $categories_list);
                            }

                            $tags_list = get_the_tag_list('', esc_html__(', ', 'landscaping-pereza'));
                            if ($tags_list) {
                                printf('<span class="tags-links"><i class="fas fa-tags"></i> %s</span>', $tags_list);
                            }
                            ?>
                        </footer>
                    <?php endif; ?>
                </article>
                <?php
            endwhile;

            the_posts_navigation(array(
                'prev_text' => '<i class="fas fa-arrow-left"></i> Older posts',
                'next_text' => 'Newer posts <i class="fas fa-arrow-right"></i>',
            ));

        else :
            ?>
            <div class="no-results">
                <h1 class="page-title"><?php esc_html_e('Nothing Found', 'landscaping-pereza'); ?></h1>
                <div class="page-content">
                    <?php
                    if (is_search()) :
                        ?>
                        <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'landscaping-pereza'); ?></p>
                        <?php
                        get_search_form();
                    else :
                        ?>
                        <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'landscaping-pereza'); ?></p>
                        <?php
                        get_search_form();
                    endif;
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>