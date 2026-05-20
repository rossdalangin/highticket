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
                <h2 style="font-size: 1.5rem; margin-bottom: 25px; border-bottom: 2px solid var(--light-bg); padding-bottom: 10px;">Executive Content Outline:</h2>
                <ul style="list-style: none; font-size: 1.1rem;">
                    <li style="margin-bottom: 25px; display: flex; gap: 15px;">
                        <span style="color: var(--accent-color); font-weight: 900; min-width: 60px;">[00:00]</span>
                        <div>
                            <strong style="display: block; color: var(--primary-color);">The High-Ticket Paradigm Shift</strong>
                            <span style="font-size: 0.9rem; opacity: 0.8;">Why standard B2C funnels fail in the C-Suite and how institutional trust is engineered.</span>
                        </div>
                    </li>
                    <li style="margin-bottom: 25px; display: flex; gap: 15px;">
                        <span style="color: var(--accent-color); font-weight: 900; min-width: 60px;">[02:45]</span>
                        <div>
                            <strong style="display: block; color: var(--primary-color);">Step 1: The Decision-Maker Beacon</strong>
                            <span style="font-size: 0.9rem; opacity: 0.8;">Using intent-data to identify anonymous VPs and Founders searching for your specific expertise.</span>
                        </div>
                    </li>
                    <li style="margin-bottom: 25px; display: flex; gap: 15px;">
                        <span style="color: var(--accent-color); font-weight: 900; min-width: 60px;">[05:20]</span>
                        <div>
                            <strong style="display: block; color: var(--primary-color);">Step 2: Authority Infrastructure</strong>
                            <span style="font-size: 0.9rem; opacity: 0.8;">How to replace manual outreach with an automated 'Executive Asset' that pre-sells your $25k engagements.</span>
                        </div>
                    </li>
                    <li style="margin-bottom: 25px; display: flex; gap: 15px;">
                        <span style="color: var(--accent-color); font-weight: 900; min-width: 60px;">[08:15]</span>
                        <div>
                            <strong style="display: block; color: var(--primary-color);">Step 3: The Frictionless conversion Gate</strong>
                            <span style="font-size: 0.9rem; opacity: 0.8;">Filtering out the 'pick your brain' calls and booking only qualified, high-budget diagnostic sessions.</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="booking-sidebar" style="background: var(--light-bg); padding: 40px; border-radius: 4px; text-align: center; border-top: 5px solid var(--accent-color);">
                <h3 style="font-size: 1.3rem; margin-bottom: 15px;">Apply for Your Diagnostic Session</h3>
                <p style="font-size: 0.9rem; margin-bottom: 25px; color: var(--charcoal);">If you're ready to implement the Institutional Intent Method™ in your practice, schedule a session below.</p>
                <div id="delayed-cta" style="display: none;">
                    <a href="<?php echo esc_url( get_theme_mod( 'ea_booking_url', '#' ) ); ?>" class="btn" style="width: 100%;">Book Session →</a>
                </div>
                <p id="cta-timer" style="font-size: 0.8rem; font-style: italic; opacity: 0.7; margin-top: 15px;">The application window will open once the core mechanism is revealed in the video...</p>
            </div>
        </div>
    </div>
</section>

<script>
    /**
     * Executive Briefing Logic
     * Ensures value consumption before allowing the next step.
     */
    const ctaDelay = <?php echo (int) get_theme_mod( 'ea_briefing_cta_delay', 480 ); ?> * 1000;
    setTimeout(function() {
        const cta = document.getElementById('delayed-cta');
        const timer = document.getElementById('cta-timer');
        if (cta) cta.style.display = 'block';
        if (timer) timer.style.display = 'none';
    }, ctaDelay);
</script>

<?php get_footer(); ?>
