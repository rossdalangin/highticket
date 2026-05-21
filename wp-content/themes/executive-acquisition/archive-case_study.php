<?php get_header(); ?>

<section class="archive-header animate-in" style="background-color: var(--primary-color); padding: 120px 0; color: #fff; text-align: center;">
    <div class="container" style="max-width: 900px;">
        <span style="color: var(--accent-color); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem; display: block; margin-bottom: 20px;">Institutional Results</span>
        <h1 style="color: #fff; font-size: clamp(2.5rem, 2rem + 3vw, 4.5rem); line-height: 1.1;">ROI Case Studies & Proof</h1>
        <p style="margin-top: 30px; font-size: 1.25rem; opacity: 0.8;">Evidence-based leadership transformations for mid-market and enterprise organizations.</p>
    </div>
</section>

<section class="case-study-archive" style="padding: 100px 0;">
    <div class="container">
        <div class="grid-3">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="card">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div style="margin-bottom: 25px;">
                            <?php the_post_thumbnail('medium', array('style' => 'width:100%; border-radius:2px;')); ?>
                        </div>
                    <?php endif; ?>
                    <h2 style="font-size: 1.4rem; margin-bottom: 15px;"><a href="<?php the_permalink(); ?>" style="text-decoration: none; color: var(--primary-color);"><?php the_title(); ?></a></h2>
                    <div style="font-size: 0.95rem; margin-bottom: 25px; color: #4A5568;"><?php the_excerpt(); ?></div>
                    <a href="<?php the_permalink(); ?>" style="font-weight: 700; color: var(--accent-color); text-decoration: none; text-transform: uppercase; letter-spacing: 1px; font-size: 0.85rem;">View ROI Proof →</a>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
