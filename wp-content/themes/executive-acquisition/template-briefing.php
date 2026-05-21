<?php
/**
 * Template Name: Executive Briefing (VSL)
 */
get_header(); ?>

<div class="briefing-page animate-in">
    <div class="container">
        <header class="briefing-header text-center mb-xl">
            <span class="section-tag mb-xs">Executive Strategic Briefing</span>
            <h1 class="mb-sm"><?php the_title(); ?></h1>
            <p class="subheadline opacity-80">Reserved for C-Suite, VP-level leaders, and Scaling Founders.</p>
        </header>

        <div class="briefing-grid post-layout-grid">
            <div class="briefing-main">
                <div class="briefing-video-wrapper mb-lg">
                    <?php
                    $vsl_url = get_theme_mod( 'ea_briefing_video_url' );
                    if ( $vsl_url ) : ?>
                        <iframe src="<?php echo esc_url( $vsl_url ); ?>" fetchpriority="high" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    <?php else : ?>
                        <div class="video-placeholder">
                            <p>Strategic Briefing Video Placeholder (12 Minutes)</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="briefing-content post-content">
                    <?php the_content(); ?>

                    <div class="learning-points mt-lg">
                        <h3 class="mb-md">Key Strategic Deliverables:</h3>
                        <ul class="check-list">
                            <li><span>✓</span> <span>The exact 3-step architecture for inbound institutional trust.</span></li>
                            <li><span>✓</span> <span>How to identify "Searching" decision-makers before your competition.</span></li>
                            <li><span>✓</span> <span>The 'Frictionless Gate' protocol for qualifying $25k engagements.</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <aside class="briefing-sidebar">
                <div id="delayed-cta" class="sidebar-booking-card card" style="display: none;">
                    <h3 class="mb-sm">Ready to Engineer Your System?</h3>
                    <p class="mb-md opacity-80">Book your 1:1 Institutional Diagnostic session to map your custom acquisition roadmap.</p>
                    <a href="<?php echo esc_url( get_theme_mod( 'ea_booking_url', '#' ) ); ?>" class="btn w-100">Schedule Diagnostic →</a>
                </div>

                <div class="briefing-authority-box card mt-lg">
                    <h4 class="mb-sm">Strategic Architect</h4>
                    <div class="author-info">
                        <div class="author-avatar mb-sm">
                            <?php
                            $f_img = get_theme_mod('ea_founder_image');
                            if ($f_img) echo '<img src="'.esc_url($f_img).'" class="avatar-img">';
                            ?>
                        </div>
                        <p class="author-name mb-xs"><strong><?php echo esc_html(get_theme_mod('ea_founder_name')); ?></strong></p>
                        <p class="author-bio-small"><?php echo esc_html(get_theme_mod('ea_founder_bio')); ?></p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

<script>
    // Delayed CTA Logic
    (function() {
        const delay = <?php echo (int) get_theme_mod( 'ea_briefing_cta_delay', 480 ); ?> * 1000;
        setTimeout(function() {
            const cta = document.getElementById('delayed-cta');
            if (cta) {
                cta.style.display = 'block';
                cta.classList.add('animate-in');
            }
        }, delay);
    })();
</script>

<?php get_footer(); ?>
