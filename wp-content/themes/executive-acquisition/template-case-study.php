<?php
/**
 * Template Name: Institutional Case Study (ROI Proof)
 */
get_header(); ?>

<section class="case-study-hero" style="background: var(--primary-color); color: var(--white); padding: 120px 0;">
    <div class="container" style="max-width: 900px;">
        <span style="color: var(--accent-color); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.9rem;">ROI & Result Case Study</span>
        <h1 style="font-size: 3.5rem; color: var(--white); line-height: 1.1; margin-top: 20px;"><?php the_title(); ?></h1>
        <p style="font-size: 1.4rem; margin-top: 30px; opacity: 0.9; font-style: italic;"><?php echo get_the_excerpt(); ?></p>
    </div>
</section>

<section class="case-study-content" style="padding: 80px 0;">
    <div class="container" style="display: grid; grid-template-columns: 2fr 1fr; gap: 60px;">
        <div class="main-content" style="font-size: 1.15rem; line-height: 1.8;">
            <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
        </div>
        <aside class="sidebar">
            <div class="results-box" style="background: var(--light-bg); padding: 40px; border-radius: 8px; border-top: 5px solid var(--accent-color);">
                <h3 style="font-size: 1.2rem; margin-bottom: 25px;">Institutional Impact:</h3>
                <div class="result-item" style="margin-bottom: 25px;">
                    <div style="font-size: 2.5rem; font-weight: 900; color: var(--primary-color); line-height: 1;">+140%</div>
                    <div style="font-size: 0.9rem; font-weight: 700; color: var(--accent-color); text-transform: uppercase;">Leadership Efficiency</div>
                </div>
                <div class="result-item" style="margin-bottom: 25px;">
                    <div style="font-size: 2.5rem; font-weight: 900; color: var(--primary-color); line-height: 1;">$2.4M</div>
                    <div style="font-size: 0.9rem; font-weight: 700; color: var(--accent-color); text-transform: uppercase;">Retention Revenue</div>
                </div>
                <div class="result-item">
                    <div style="font-size: 2.5rem; font-weight: 900; color: var(--primary-color); line-height: 1;">90 Days</div>
                    <div style="font-size: 0.9rem; font-weight: 700; color: var(--accent-color); text-transform: uppercase;">Implementation Time</div>
                </div>
            </div>

            <div class="cta-sidebar" style="margin-top: 40px; text-align: center;">
                <p style="font-size: 0.95rem; margin-bottom: 20px;">Want to achieve similar results for your leadership team?</p>
                <a href="<?php echo home_url('/#cta'); ?>" class="btn" style="width: 100%;">View Briefing</a>
            </div>
        </aside>
    </div>
</section>

<?php get_footer(); ?>
