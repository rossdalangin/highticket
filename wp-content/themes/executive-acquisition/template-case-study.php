<?php
/**
 * Template Name: Institutional Case Study (ROI Proof)
 */
get_header(); ?>

<section class="case-study-hero" style="background: var(--primary-color); color: var(--white); padding: 120px 0;">
    <div class="container" style="max-width: 900px;">
        <span style="color: var(--accent-color); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem;">ROI & Result Case Study</span>
        <h1 style="font-size: clamp(2.5rem, 2rem + 2vw, 4rem); color: var(--white); line-height: 1.1; margin-top: 20px;"><?php the_title(); ?></h1>
        <p style="font-size: 1.4rem; margin-top: 30px; opacity: 0.9; font-style: italic; color: #fff;"><?php echo get_the_excerpt(); ?></p>
    </div>
</section>

<section class="case-study-content" style="padding: 80px 0;">
    <div class="container" style="display: grid; grid-template-columns: 2fr 1.2fr; gap: 60px;">
        <div class="main-content" style="font-size: 1.15rem; line-height: 1.8;">
            <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>

            <!-- Board-Ready ROI Calculator UI (Interactive-ready) -->
            <div class="roi-calculator-ui card" style="margin-top: 60px; padding: 50px; background: #fff; border: 1px solid rgba(0,0,0,0.05); box-shadow: 0 40px 100px -20px rgba(0,0,0,0.1);">
                <span style="color: var(--accent-color); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.75rem; display: block; margin-bottom: 10px;">Board-Ready Visual</span>
                <h3 style="margin-bottom: 30px;">Leadership ROI Mapping</h3>
                <div style="background: #f8fafc; padding: 30px; border-radius: 4px; margin-bottom: 30px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                        <span>Current Manual Outreach Hours / Month</span>
                        <strong style="color: var(--primary-color);">120 hrs</strong>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                        <span>Cost per Executive Hour</span>
                        <strong style="color: var(--primary-color);">$250</strong>
                    </div>
                    <div style="border-top: 1px solid #e2e8f0; padding-top: 20px; display: flex; justify-content: space-between; font-weight: 900;">
                        <span>Annual ' Hamster Wheel' Tax</span>
                        <span style="color: #e53e3e;">$360,000</span>
                    </div>
                </div>
                <div style="text-align: center;">
                    <p style="font-size: 0.95rem; margin-bottom: 25px;">Eliminate the tax. Predict your pipeline. Anchor your authority.</p>
                    <a href="<?php echo home_url('/#cta'); ?>" class="btn" style="width: 100%;">Map Your ROI →</a>
                </div>
            </div>

            <!-- Engagement Tiers -->
            <?php if ( get_theme_mod('ea_tier_1_name') ) : ?>
            <div class="engagement-tiers" style="margin-top: 80px; padding: 60px; background: var(--light-bg); border-radius: 4px;">
                <h3 style="margin-bottom: 40px; text-align: center;">Institutional Engagement Options</h3>
                <div class="grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                    <div class="tier-card card" style="text-align: center;">
                        <span style="font-size: 0.8rem; font-weight: 700; color: var(--accent-color); text-transform: uppercase;"><?php echo esc_html(get_theme_mod('ea_tier_1_name')); ?></span>
                        <div style="font-size: 2.5rem; font-weight: 900; margin: 15px 0;"><?php echo esc_html(get_theme_mod('ea_tier_1_price')); ?></div>
                        <p style="font-size: 0.9rem;"><?php echo esc_html(get_theme_mod('ea_tier_1_desc')); ?></p>
                    </div>
                    <div class="tier-card card" style="text-align: center; border-top: 5px solid var(--accent-color);">
                        <span style="font-size: 0.8rem; font-weight: 700; color: var(--accent-color); text-transform: uppercase;"><?php echo esc_html(get_theme_mod('ea_tier_2_name')); ?></span>
                        <div style="font-size: 2.5rem; font-weight: 900; margin: 15px 0;"><?php echo esc_html(get_theme_mod('ea_tier_2_price')); ?></div>
                        <p style="font-size: 0.9rem;"><?php echo esc_html(get_theme_mod('ea_tier_2_desc')); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <aside class="sidebar">
            <div class="results-box" style="background: var(--light-bg); padding: 40px; border-radius: 4px; border-top: 5px solid var(--accent-color); position: sticky; top: 120px;">
                <h3 style="font-size: 1.2rem; margin-bottom: 25px;">Institutional Impact:</h3>
                <div class="result-item" style="margin-bottom: 25px;">
                    <div style="font-size: 2.5rem; font-weight: 900; color: var(--primary-color); line-height: 1;">+140%</div>
                    <div style="font-size: 0.8rem; font-weight: 700; color: var(--accent-color); text-transform: uppercase; letter-spacing: 1px;">Leadership Efficiency</div>
                </div>
                <div class="result-item" style="margin-bottom: 25px;">
                    <div style="font-size: 2.5rem; font-weight: 900; color: var(--primary-color); line-height: 1;">$2.4M</div>
                    <div style="font-size: 0.8rem; font-weight: 700; color: var(--accent-color); text-transform: uppercase; letter-spacing: 1px;">Retention Revenue</div>
                </div>
                <div class="result-item">
                    <div style="font-size: 2.5rem; font-weight: 900; color: var(--primary-color); line-height: 1;">90 Days</div>
                    <div style="font-size: 0.8rem; font-weight: 700; color: var(--accent-color); text-transform: uppercase; letter-spacing: 1px;">Implementation</div>
                </div>

                <div class="cta-sidebar" style="margin-top: 40px; text-align: center;">
                    <a href="<?php echo home_url('/#cta'); ?>" class="btn" style="width: 100%; padding: 1rem; font-size: 0.8rem;">Book Diagnostic →</a>
                </div>
            </div>
        </aside>
    </div>
</section>

<?php get_footer(); ?>
