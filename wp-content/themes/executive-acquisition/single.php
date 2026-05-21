<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <article class="single-post-article" id="primary">
        <div class="container post-layout-grid">
            <div class="post-main">
                <header class="post-header">
                    <div class="post-categories mb-xs">
                        <?php the_category(', '); ?>
                    </div>
                    <h1 class="mb-sm"><?php the_title(); ?></h1>
                    <div class="post-meta opacity-70"><?php echo get_the_date(); ?> • Written by <?php the_author(); ?></div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail mb-lg">
                        <?php the_post_thumbnail( 'executive-hero', array( 'class' => 'responsive-img' ) ); ?>
                    </div>
                <?php endif; ?>

                <div class="post-content animate-in">
                    <?php the_content(); ?>
                </div>

                <div class="post-cta-box card bg-light text-center">
                    <h3 class="mb-sm">Ready to scale your corporate engagements?</h3>
                    <p class="mb-lg">Discover the Institutional Intent Method™ today.</p>
                    <a href="<?php echo home_url('/#cta'); ?>" class="btn">Access the Executive Briefing</a>
                </div>
            </div>

            <!-- Sidebar -->
            <?php get_sidebar(); ?>
        </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>
