<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <article style="padding: 100px 0;">
        <div class="container" style="max-width: 800px;">
            <header style="margin-bottom: 40px; border: none; text-align: center;">
                <h1 style="font-size: 3rem; margin-bottom: 20px;"><?php the_title(); ?></h1>
                <div style="font-size: 1rem; opacity: 0.7;"><?php echo get_the_date(); ?> • Written by <?php the_author(); ?></div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div style="margin-bottom: 40px;">
                    <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%; border-radius:8px;' ) ); ?>
                </div>
            <?php endif; ?>

            <div class="post-content" style="font-size: 1.15rem; line-height: 1.8;">
                <?php the_content(); ?>
            </div>

            <div style="margin-top: 60px; padding: 40px; background: var(--light-bg); border-radius: 8px; text-align: center;">
                <h3>Ready to scale your corporate engagements?</h3>
                <p>Discover the Institutional Intent Method™ today.</p>
                <a href="<?php echo home_url('/#cta'); ?>" class="btn">Access the Executive Briefing</a>
            </div>
        </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>
