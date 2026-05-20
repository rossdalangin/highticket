<?php get_header(); ?>

<section class="archive-header" style="background-color: var(--light-bg); padding: 60px 0;">
    <div class="container">
        <h1>Executive Insights & Strategy</h1>
        <p>Advanced acquisition and leadership strategies for the modern executive coach.</p>
    </div>
</section>

<section class="blog-archive">
    <div class="container">
        <div class="grid-3">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="card">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail" style="margin-bottom: 20px;">
                            <?php the_post_thumbnail( 'medium', array( 'style' => 'width:100%; border-radius:4px;' ) ); ?>
                        </div>
                    <?php endif; ?>
                    <h2 style="font-size: 1.4rem; margin-bottom: 15px;"><a href="<?php the_permalink(); ?>" style="text-decoration: none; color: var(--primary-color);"><?php the_title(); ?></a></h2>
                    <div style="font-size: 0.9rem; margin-bottom: 15px; opacity: 0.7;"><?php echo get_the_date(); ?></div>
                    <div style="font-size: 0.95rem; margin-bottom: 20px;"><?php the_excerpt(); ?></div>
                    <a href="<?php the_permalink(); ?>" style="font-weight: 700; color: var(--accent-color); text-decoration: none;">Read Strategy →</a>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
