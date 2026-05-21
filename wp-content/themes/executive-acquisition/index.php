<?php get_header(); ?>

<section class="archive-header">
    <div class="container">
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
    </div>
</section>

<section class="blog-archive">
    <div class="container post-layout-grid">
        <div class="archive-main">
            <div class="archive-posts-grid">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="card archive-card">
                        <h2 class="archive-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="archive-post-excerpt"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="archive-read-more">Read More →</a>
                    </article>
                <?php endwhile; else : ?>
                    <div class="no-results-box">
                        <p><?php esc_html_e( 'Sorry, no content matched your criteria.', 'executive-acquisition' ); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </div>
</section>

<?php get_footer(); ?>
