<?php
/**
 * Template Name: Thank You / Authority Bridge
 */
get_header(); ?>

<section class="thank-you-page" style="padding: 80px 0; background-color: var(--light-bg); min-height: 80vh; display: flex; align-items: center;">
    <div class="container" style="max-width: 800px; text-align: center;">
        <div class="status-bar" style="margin-bottom: 30px;">
            <div style="background: #e2e8f0; height: 8px; border-radius: 4px; overflow: hidden;">
                <div style="background: var(--accent-color); width: 50%; height: 100%;"></div>
            </div>
            <p style="font-size: 0.8rem; margin-top: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Step 1 of 2 Complete: Application Received</p>
        </div>

        <h1 style="font-size: 2.5rem; margin-bottom: 20px;">Your Private Briefing is Ready Below.</h1>
        <p style="font-size: 1.2rem; margin-bottom: 40px; color: var(--charcoal);">But first, watch this 60-second message on why 90% of coaches fail at the C-Suite level...</p>

        <div class="bridge-video" style="background: #000; aspect-ratio: 16/9; border-radius: 8px; margin-bottom: 40px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); overflow: hidden;">
            <?php
            $bridge_video = get_theme_mod( 'ea_bridge_video_url' );
            if ( $bridge_video ) : ?>
                <iframe src="<?php echo esc_url( $bridge_video ); ?>" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            <?php else : ?>
                <div style="display: flex; justify-content: center; align-items: center; height: 100%; color: #fff;">
                    <p>Authority Bridge Video (60 Seconds)</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="cta-container">
            <a href="<?php echo esc_url( get_theme_mod( 'ea_briefing_page_url', '#' ) ); ?>" class="btn">Proceed to the Executive Briefing →</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
