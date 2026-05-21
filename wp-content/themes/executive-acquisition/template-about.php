<?php
/**
 * Template Name: About Us
 */
get_header(); ?>

<section class="about-hero animate-in" style="padding: 120px 0; background: var(--primary-color); color: #fff;">
    <div class="container" style="max-width: 900px; text-align: center;">
        <span style="color: var(--accent-color); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem; display: block; margin-bottom: 20px;">The Authority Foundation</span>
        <h1 style="color: #fff; font-size: clamp(2.5rem, 2rem + 3vw, 4.5rem); line-height: 1.1;"><?php the_title(); ?></h1>
    </div>
</section>

<section class="about-content" style="padding: 100px 0;">
    <div class="container" style="display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: start;">
        <div class="about-main" style="font-size: 1.15rem; line-height: 1.8;">
            <h2 style="margin-bottom: 30px;">Our Mission</h2>
            <p style="margin-bottom: 40px; font-size: 1.4rem; font-family: var(--font-heading); font-style: italic; color: var(--primary-color);"><?php echo esc_html( get_theme_mod('ea_about_mission') ); ?></p>

            <h2 style="margin-bottom: 30px;">The Track Record</h2>
            <div style="color: #4A5568;">
                <?php echo wp_kses_post( get_theme_mod('ea_about_experience') ); ?>
            </div>

            <div style="margin-top: 60px;">
                <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
            </div>
        </div>

        <aside class="about-sidebar">
            <?php
            $image = get_theme_mod( 'ea_founder_image' );
            if ( $image ) : ?>
                <img src="<?php echo esc_url( $image ); ?>" style="width: 100%; border-radius: 4px; box-shadow: 0 40px 100px -20px rgba(0,0,0,0.15); margin-bottom: 40px;">
            <?php endif; ?>

            <div class="card" style="padding: 40px; border-top: 5px solid var(--accent-color);">
                <h3 style="font-size: 1.2rem; margin-bottom: 20px;">Institutional Standards</h3>
                <ul style="list-style: none; padding: 0; font-size: 0.95rem; color: #4A5568;">
                    <li style="margin-bottom: 15px;">✓ Strategic Discretion</li>
                    <li style="margin-bottom: 15px;">✓ Measurable ROI Mapping</li>
                    <li style="margin-bottom: 15px;">✓ C-Suite Optimization</li>
                </ul>
                <a href="<?php echo home_url('/#cta'); ?>" class="btn" style="width: 100%; margin-top: 20px;">View Briefing</a>
            </div>
        </aside>
    </div>
</section>

<?php get_footer(); ?>
