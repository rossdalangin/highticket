<?php
/**
 * Template Name: Authority Bridge / Thank You
 */
get_header(); ?>

<div class="thank-you-page animate-in">
    <div class="container narrow-container text-center">
        <div class="funnel-status mb-lg">
            <div class="progress-bar-bg mb-xs">
                <div class="progress-bar-fill"></div>
            </div>
            <p class="progress-text">Step 1 of 2 Complete: Application Received</p>
        </div>

        <h1 class="mb-sm">Your Private Briefing is Ready Below.</h1>
        <p class="subheadline mb-xl opacity-80">But first, watch this 60-second message on why 90% of coaches fail at the C-Suite level...</p>

        <div class="bridge-video-wrapper mb-xl">
            <?php
            $bridge_url = get_theme_mod( 'ea_bridge_video_url' );
            if ( $bridge_url ) : ?>
                <iframe src="<?php echo esc_url( $bridge_url ); ?>" fetchpriority="high" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            <?php else : ?>
                <div class="video-placeholder">
                    <div class="placeholder-inner">
                        <p>Authority Bridge Video (60 Seconds)</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="next-step-trigger">
            <a href="<?php echo esc_url( get_theme_mod( 'ea_briefing_page_url', home_url('/briefing/') ) ); ?>" class="btn">Proceed to Strategic Briefing →</a>
            <p class="mt-sm opacity-60">Redirecting automatically in 60 seconds...</p>
        </div>
    </div>
</div>

<script>
    // Optional Auto-redirect after 60s
    setTimeout(function() {
        window.location.href = "<?php echo esc_url( get_theme_mod( 'ea_briefing_page_url', home_url('/briefing/') ) ); ?>";
    }, 60000);
</script>

<?php get_footer(); ?>
