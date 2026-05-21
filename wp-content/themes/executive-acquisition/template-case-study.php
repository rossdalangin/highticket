<?php
/**
 * Template Name: Institutional Case Study (V1)
 */
get_header(); ?>

<div class="case-study-template animate-in">
    <header class="case-study-hero final-cta">
        <div class="container narrow-container">
            <span class="section-tag mb-xs text-white">ROI & Result Case Study</span>
            <h1 class="text-white mb-md"><?php the_title(); ?></h1>
            <p class="testimonial-content text-white opacity-90"><?php echo get_the_excerpt(); ?></p>
        </div>
    </header>

    <section class="case-study-content">
        <div class="container post-layout-grid">
            <div class="case-study-main">
                <div class="post-content">
                    <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
                </div>

                <div class="roi-calculator-ui card mt-xl">
                    <span class="section-tag mb-xs">Board-Ready Visual</span>
                    <h3 class="mb-lg">Leadership ROI Mapping</h3>
                    <div class="roi-stats-box mb-lg card bg-light">
                        <div class="roi-stat-row mb-md">
                            <span>Institutional Hours Saved</span>
                            <strong class="text-primary">120 hrs</strong>
                        </div>
                        <div class="roi-stat-row mb-md">
                            <span>Avg. Executive Hourly Rate</span>
                            <strong class="text-primary">$250</strong>
                        </div>
                        <div class="roi-total-row pt-md">
                            <span>Projected Efficiency Gain</span>
                            <span class="roi-total-value">$360,000</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="mb-lg">Eliminate the tax. Predict your pipeline. Anchor your authority.</p>
                        <a href="<?php echo home_url('/#cta'); ?>" class="btn w-100">Map Your ROI →</a>
                    </div>
                </div>

                <div class="engagement-tiers-section mt-xxl card bg-light">
                    <h3 class="mb-xl text-center">Institutional Engagement Options</h3>
                    <div class="archive-posts-grid">
                        <div class="tier-card card text-center">
                            <span class="card-tag mb-xs"><?php echo esc_html(get_theme_mod('ea_tier_1_name')); ?></span>
                            <div class="tier-price mb-sm"><?php echo esc_html(get_theme_mod('ea_tier_1_price')); ?></div>
                            <p class="font-sm"><?php echo esc_html(get_theme_mod('ea_tier_1_desc')); ?></p>
                        </div>
                        <div class="tier-card card text-center border-accent-top">
                            <span class="card-tag mb-xs"><?php echo esc_html(get_theme_mod('ea_tier_2_name')); ?></span>
                            <div class="tier-price mb-sm"><?php echo esc_html(get_theme_mod('ea_tier_2_price')); ?></div>
                            <p class="font-sm"><?php echo esc_html(get_theme_mod('ea_tier_2_desc')); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="case-study-sidebar">
                <div class="results-box card border-accent-top sticky-sidebar">
                    <h3 class="mb-lg">Institutional Impact:</h3>
                    <div class="impact-item mb-lg">
                        <div class="impact-value">+140%</div>
                        <div class="impact-label">Leadership Efficiency</div>
                    </div>
                    <div class="impact-item mb-lg">
                        <div class="impact-value">$2.4M</div>
                        <div class="impact-label">Retention Revenue</div>
                    </div>
                    <div class="impact-item mb-lg">
                        <div class="impact-value">90 Days</div>
                        <div class="impact-label">Implementation</div>
                    </div>
                    <div class="mt-xl">
                        <a href="<?php echo home_url('/#cta'); ?>" class="btn btn-small w-100">Book Diagnostic →</a>
                    </div>
                </div>
            </aside>
        </div>
    </section>
</div>

<?php get_footer(); ?>
