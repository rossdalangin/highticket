<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <article style="padding: 100px 0;">
        <div class="container" style="display: grid; grid-template-columns: 2.5fr 1fr; gap: 80px;">
            <div class="post-main">
                <header style="margin-bottom: 40px; border: none;">
                    <div style="margin-bottom: 15px;">
                        <?php the_category(', '); ?>
                    </div>
                    <h1 style="font-size: clamp(2rem, 1.5rem + 2vw, 3.5rem); margin-bottom: 20px; line-height: 1.1;"><?php the_title(); ?></h1>
                    <div style="font-size: 1rem; opacity: 0.7;"><?php echo get_the_date(); ?> • Written by <?php the_author(); ?></div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div style="margin-bottom: 40px;">
                        <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%; border-radius:4px;' ) ); ?>
                    </div>
                <?php endif; ?>

                <div class="post-content animate-in" style="font-size: 1.15rem; line-height: 1.8;">
                    <?php the_content(); ?>
                </div>

                <div style="margin-top: 60px; padding: 40px; background: var(--light-bg); border-radius: 4px; text-align: center; border-left: 5px solid var(--accent-color);">
                    <h3>Ready to scale your corporate engagements?</h3>
                    <p>Discover the Institutional Intent Method™ today.</p>
                    <a href="<?php echo home_url('/#cta'); ?>" class="btn">Access the Executive Briefing</a>
                </div>
            </div>

            <!-- Sidebar -->
            <?php get_sidebar(); ?>
        </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>
