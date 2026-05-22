<?php
/**
 * Template Name: Executive Briefing (VSL)
 */
get_header(); ?>

<div class="briefing-page animate-in">
    <div class="container">
        <header class="briefing-header text-center mb-xl">
            <?php if ($b_tag = get_theme_mod('ea_briefing_tag')) : ?>
                <span class="section-tag mb-xs"><?php echo esc_html($b_tag); ?></span>
            <?php endif; ?>
            <h1 class="mb-sm"><?php the_title(); ?></h1>
            <?php if ($b_sub = get_theme_mod('ea_briefing_subheadline')) : ?>
                <p class="subheadline opacity-80"><?php echo esc_html($b_sub); ?></p>
            <?php endif; ?>
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
                            <p>Strategic Briefing: The Institutional Intent Method™</p>
                            <span class="opacity-60">[Duration: 12 Minutes]</span>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="briefing-content post-content card">
                    <?php the_content(); ?>

                    <div class="learning-points mt-lg">
                        <h3 class="mb-md">Strategic Deliverables:</h3>
                        <div class="grid-2">
                            <div class="point-item">
                                <strong class="text-accent d-block mb-xxs">01. Intent Architecture</strong>
                                <p class="font-sm">Identifying VPs and Founders during their search cycle.</p>
                            </div>
                            <div class="point-item">
                                <strong class="text-accent d-block mb-xxs">02. Authority Infrastructure</strong>
                                <p class="font-sm">Building instant trust without manual outreach.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="briefing-sidebar">
                <?php if ( get_theme_mod('ea_briefing_booking_title') ) : ?>
                <div id="delayed-cta" class="sidebar-booking-card card border-accent-top" style="display: none;">
                    <h3 class="mb-sm"><?php echo esc_html( get_theme_mod('ea_briefing_booking_title') ); ?></h3>
                    <?php if ($b_book = get_theme_mod('ea_briefing_booking_text')) : ?>
                        <p class="mb-md opacity-80 font-sm"><?php echo esc_html($b_book); ?></p>
                    <?php endif; ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'ea_booking_url', '#' ) ); ?>" class="btn w-100 btn-small"><?php echo esc_html( get_theme_mod('ea_briefing_booking_btn', 'Schedule Diagnostic →') ); ?></a>
                </div>
                <?php endif; ?>

                <div class="briefing-authority-box card mt-lg">
                    <h4 class="mb-sm">Strategic Lead</h4>
                    <div class="author-info">
                        <div class="author-avatar mb-sm">
                            <?php
                            $f_img = get_theme_mod('ea_founder_image');
                            if ($f_img) echo '<img src="'.esc_url($f_img).'" class="avatar-img">';
                            ?>
                        </div>
                        <p class="author-name mb-xs"><strong><?php echo esc_html(get_theme_mod('ea_founder_name', 'Executive Strategist')); ?></strong></p>
                        <p class="author-bio-small font-sm"><?php echo esc_html(get_theme_mod('ea_founder_bio', 'Specializing in leadership architecture for $5M+ organizations. Bridging the gap between vision and institutional scale.')); ?></p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

<style>
    .briefing-video-wrapper { box-shadow: var(--shadow-bold); border: 1px solid var(--border-soft); }
    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .border-accent-top { border-top: 5px solid var(--accent-color); }
    .font-sm { font-size: 0.9rem; }
    .d-block { display: block; }
    @media (max-width: 600px) { .grid-2 { grid-template-columns: 1fr; } }
</style>

<script>
    (function() {
        const delay = <?php echo (int) get_theme_mod( 'ea_briefing_cta_delay', 480 ); ?> * 1000;
        setTimeout(function() {
            const cta = document.getElementById('delayed-cta');
            if (cta) {
                cta.style.display = 'block';
                cta.classList.add('animate-in');
                cta.classList.add('visible');
            }
        }, delay);
    })();
</script>

<?php get_footer(); ?>
