<?php
/**
 * Template Name: Institutional Case Study (V1)
 */
get_header(); ?>

<div class="case-study-template animate-in">
    <header class="case-study-hero">
        <div class="container narrow-container">
            <span class="section-tag"><?php esc_html_e('ROI & Result Case Study', 'executive-acquisition'); ?></span>
            <h1 class="mb-md"><?php the_title(); ?></h1>
            <div class="case-study-meta font-sm">
                <?php esc_html_e('Published with Permission | Institutional Confidentiality Maintained', 'executive-acquisition'); ?>
            </div>
        </div>
    </header>

    <section class="case-study-content">
        <div class="container">
            <div class="post-layout-grid">
                <div class="case-study-main">
                    <div class="post-content card mb-xl">
                        <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
                    </div>

                    <div class="roi-calculator-ui card bg-light border-accent-top">
                        <span class="section-tag mb-xs">Efficiency Projection</span>
                        <h3 class="mb-lg">Leadership ROI Architecture</h3>
                        <div class="roi-stats-box mb-lg">
                            <div class="roi-stat-row">
                                <span>Institutional Hours Protected</span>
                                <strong class="text-accent">120 hrs / mo</strong>
                            </div>
                            <div class="roi-stat-row">
                                <span>Projected Revenue Recovery</span>
                                <strong class="text-accent">$360,000</strong>
                            </div>
                        </div>
                        <div class="text-center mt-xl">
                            <a href="<?php echo home_url('/#cta'); ?>" class="btn w-100">Map Your Custom ROI →</a>
                        </div>
                    </div>
                </div>

                <aside class="case-study-sidebar">
                    <div class="results-box card border-accent-top sticky-sidebar">
                        <h4 class="widget-title mb-lg">Measurable Impact</h4>
                        <div class="impact-item mb-xl">
                            <div class="impact-value text-accent" style="font-size: 3rem; font-weight: 900; line-height: 1;">+140%</div>
                            <div class="impact-label font-sm opacity-70">Leadership Efficiency</div>
                        </div>
                        <div class="impact-item mb-xl">
                            <div class="impact-value text-accent" style="font-size: 3rem; font-weight: 900; line-height: 1;">$2.4M</div>
                            <div class="impact-label font-sm opacity-70">Revenue Protected</div>
                        </div>
                        <div class="mt-xl">
                            <a href="<?php echo home_url('/#cta'); ?>" class="btn btn-small w-100">Apply for Diagnostic →</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</div>

<style>
    .roi-stat-row { display: flex; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid var(--border-soft); }
    .border-accent-top { border-top: 5px solid var(--accent-color); }
    .font-sm { font-size: 0.85rem; }
</style>

<?php get_footer(); ?>
