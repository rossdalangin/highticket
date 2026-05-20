<?php
/**
 * Template Name: Executive Briefing
 */
get_header(); ?>

<section class="briefing-page" style="padding: 60px 0; background-color: var(--white);">
    <div class="container" style="max-width: 1000px;">
        <div class="briefing-header" style="text-align: center; margin-bottom: 50px;">
            <span style="text-transform: uppercase; letter-spacing: 2px; font-size: 0.9rem; color: var(--accent-color); font-weight: 700; display: block; margin-bottom: 15px;">Now Playing: Private Executive Briefing</span>
            <h1 style="font-size: 3rem; line-height: 1.1;"><?php the_title(); ?></h1>
        </div>

        <div class="main-briefing-video" style="background: #000; aspect-ratio: 16/9; border-radius: 8px; margin-bottom: 40px; box-shadow: 0 30px 60px rgba(0,0,0,0.15); overflow: hidden; position: relative;">
            <?php
            $briefing_video = get_theme_mod( 'ea_briefing_video_url' );
            if ( $briefing_video ) : ?>
                <iframe src="<?php echo esc_url( $briefing_video ); ?>" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            <?php else : ?>
                <div style="display: flex; justify-content: center; align-items: center; height: 100%; color: #fff;">
                    <p>Core 12-Minute Executive Briefing</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="briefing-meta-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px; align-items: start;">
            <div class="learning-points">
                <h2 style="font-size: 1.5rem; margin-bottom: 25px; border-bottom: 2px solid var(--light-bg); padding-bottom: 10px;">Inside this Briefing:</h2>
                <ul style="list-style: none; font-size: 1.1rem;">
                    <li style="margin-bottom: 20px; display: flex; gap: 15px;">
                        <span style="color: var(--accent-color); font-weight: 900;">[02:45]</span>
                        <span>The "Decision-Maker Beacon" strategy for identifying C-Suite intent before your competitors do.</span>
                    </li>
                    <li style="margin-bottom: 20px; display: flex; gap: 15px;">
                        <span style="color: var(--accent-color); font-weight: 900;">[05:20]</span>
                        <span>Why your current "Funnel" is actually repelling $20k+ corporate engagements.</span>
                    </li>
                    <li style="margin-bottom: 20px; display: flex; gap: 15px;">
                        <span style="color: var(--accent-color); font-weight: 900;">[08:15]</span>
                        <span>The 3-part Authority Infrastructure that automates trust without manual outreach.</span>
                    </li>
                </ul>
            </div>
            <div class="booking-sidebar" style="background: var(--light-bg); padding: 30px; border-radius: 8px; text-align: center;">
                <h3 style="font-size: 1.3rem; margin-bottom: 15px;">Ready to Implement?</h3>
                <p style="font-size: 0.9rem; margin-bottom: 25px;">Schedule your 1:1 Diagnostic Session to apply this architecture to your specific practice.</p>
                <div id="delayed-cta" style="display: none;">
                    <a href="<?php echo esc_url( get_theme_mod( 'ea_booking_url', '#' ) ); ?>" class="btn" style="width: 100%;">Book Diagnostic Session →</a>
                </div>
                <p id="cta-timer" style="font-size: 0.8rem; font-style: italic; opacity: 0.7; margin-top: 15px;">The booking option will appear shortly...</p>
            </div>
        </div>
    </div>
</section>

<script>
    // Psychological logic: Only show booking CTA after they have consumed enough value (e.g., 5 seconds for demo, usually 8 mins)
    setTimeout(function() {
        document.getElementById('delayed-cta').style.display = 'block';
        document.getElementById('cta-timer').style.display = 'none';
    }, 5000); // 5 seconds for demo purposes
</script>

<?php get_footer(); ?>
