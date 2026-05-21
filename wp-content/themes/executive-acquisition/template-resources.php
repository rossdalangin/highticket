<?php
/**
 * Template Name: Strategic Asset Library
 */
get_header(); ?>

<div class="resources-page animate-in">
    <section class="archive-header bg-light">
        <div class="container narrow-container text-center">
            <span class="section-tag mb-xs">Executive Asset Library</span>
            <h1 class="mb-sm">Institutional Whitepapers & Strategic Frameworks</h1>
            <p class="subheadline opacity-80">Complimentary resources for scaling Founders and C-Suite leaders navigating institutional complexity.</p>
        </div>
    </section>

    <section class="asset-grid-section">
        <div class="container">
            <div class="grid-3">
                <!-- Hardcoded high-authority assets as requested/default -->
                <article class="card asset-card">
                    <div class="asset-icon mb-md">.PDF</div>
                    <h3 class="mb-sm">The 2024 Leadership Retention Audit</h3>
                    <p class="mb-lg flex-grow">A technical breakdown of the 4 primary revenue leaks in mid-market leadership teams.</p>
                    <a href="<?php echo esc_url( get_theme_mod( 'ea_lead_magnet_url', '#' ) ); ?>" class="btn btn-small">Download Framework →</a>
                </article>

                <article class="card asset-card">
                    <div class="asset-icon mb-md">.MAP</div>
                    <h3 class="mb-sm">The Institutional Intent Roadmap</h3>
                    <p class="mb-lg flex-grow">Map your acquisition sequence from anonymous visitor to $25k engagement.</p>
                    <a href="<?php echo esc_url( get_theme_mod( 'ea_lead_magnet_url', '#' ) ); ?>" class="btn btn-small">Download Roadmap →</a>
                </article>

                <article class="card asset-card">
                    <div class="asset-icon mb-md">.DOC</div>
                    <h3 class="mb-sm">C-Suite Communication Protocol</h3>
                    <p class="mb-lg flex-grow">Strategic scripts for internal stakeholder buy-in during high-ticket leadership pivots.</p>
                    <a href="<?php echo esc_url( get_theme_mod( 'ea_lead_magnet_url', '#' ) ); ?>" class="btn btn-small">Download Protocol →</a>
                </article>
            </div>

            <div class="dynamic-resources-grid mt-xxl">
                <?php echo do_shortcode('[resource_grid]'); ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
