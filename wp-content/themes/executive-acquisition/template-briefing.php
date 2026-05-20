<?php
/**
 * Template Name: Executive Briefing
 */
get_header(); ?>

<section class="briefing-page" style="padding: 60px 0; background-color: var(--white);">
    <div class="container" style="max-width: 1100px;">
        <div class="briefing-header" style="text-align: center; margin-bottom: 50px;">
            <span style="text-transform: uppercase; letter-spacing: 2px; font-size: 0.9rem; color: var(--accent-color); font-weight: 700; display: block; margin-bottom: 15px;">Now Playing: Private Executive Briefing</span>
            <h1 style="font-size: 3rem; line-height: 1.1;"><?php the_title(); ?></h1>
        </div>

        <div class="main-briefing-video" style="background: #000; aspect-ratio: 16/9; border-radius: 8px; margin-bottom: 50px; box-shadow: 0 30px 60px rgba(0,0,0,0.15); overflow: hidden; position: relative;">
            <?php
            $briefing_video = get_theme_mod( 'ea_briefing_video_url' );
            if ( $briefing_video ) : ?>
                <iframe src="<?php echo esc_url( $briefing_video ); ?>" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            <?php else : ?>
                <div style="display: flex; justify-content: center; align-items: center; height: 100%; color: #fff; background: #1a202c;">
                    <p>Core 12-Minute Executive Briefing</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="briefing-layout" style="display: grid; grid-template-columns: 2fr 1.2fr; gap: 60px; align-items: start;">
            <div class="learning-points">
                <h2 style="font-size: 1.8rem; margin-bottom: 30px;">Strategic Content Outline:</h2>
                <ul style="list-style: none; font-size: 1.1rem; padding: 0;">
                    <li style="margin-bottom: 25px; display: flex; gap: 20px;">
                        <span style="color: var(--accent-color); font-weight: 900; min-width: 60px; font-size: 1.2rem;">[00:00]</span>
                        <div>
                            <strong style="display: block; color: var(--primary-color); font-size: 1.2rem; margin-bottom: 5px;">The High-Ticket Paradigm Shift</strong>
                            <span style="opacity: 0.8;">Why standard B2C funnels repel corporate decision-makers and how to engineer institutional trust.</span>
                        </div>
                    </li>
                    <li style="margin-bottom: 25px; display: flex; gap: 20px;">
                        <span style="color: var(--accent-color); font-weight: 900; min-width: 60px; font-size: 1.2rem;">[02:45]</span>
                        <div>
                            <strong style="display: block; color: var(--primary-color); font-size: 1.2rem; margin-bottom: 5px;">Phase 1: The Intent Beacon</strong>
                            <span style="opacity: 0.8;">Using predictive data to identify VPs and Founders searching for your specific leadership solutions.</span>
                        </div>
                    </li>
                    <li style="margin-bottom: 25px; display: flex; gap: 20px;">
                        <span style="color: var(--accent-color); font-weight: 900; min-width: 60px; font-size: 1.2rem;">[05:20]</span>
                        <div>
                            <strong style="display: block; color: var(--primary-color); font-size: 1.2rem; margin-bottom: 5px;">Phase 2: Authority Infrastructure</strong>
                            <span style="opacity: 0.8;">Replacing manual outreach with a high-leverage 'Executive Asset' that sells your $25k engagements.</span>
                        </div>
                    </li>
                    <li style="margin-bottom: 25px; display: flex; gap: 20px;">
                        <span style="color: var(--accent-color); font-weight: 900; min-width: 60px; font-size: 1.2rem;">[08:15]</span>
                        <div>
                            <strong style="display: block; color: var(--primary-color); font-size: 1.2rem; margin-bottom: 5px;">Phase 3: The Qualification Protocol</strong>
                            <span style="opacity: 0.8;">Filtering out non-qualified leads and booking high-budget Diagnostic Sessions directly.</span>
                        </div>
                    </li>
                </ul>
            </div>

            <aside class="briefing-sidebar">
                <!-- Meet the Architect -->
                <?php
                $founder_name = get_theme_mod( 'ea_founder_name' );
                if ( $founder_name ) : ?>
                <div class="sidebar-block card" style="padding: 30px; margin-bottom: 30px; text-align: center;">
                    <div style="width: 80px; height: 80px; background: #eee; border-radius: 50%; margin: 0 auto 20px; overflow: hidden;">
                        <?php
                        $image = get_theme_mod( 'ea_founder_image' );
                        if ( $image ) : ?><img src="<?php echo esc_url( $image ); ?>" style="width:100%; height:100%; object-fit:cover;"><?php endif; ?>
                    </div>
                    <span style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; color: var(--accent-color);">Your Strategist</span>
                    <h3 style="font-size: 1.2rem; margin: 10px 0;"><?php echo esc_html( $founder_name ); ?></h3>
                </div>
                <?php endif; ?>

                <!-- Next Steps / Booking -->
                <div class="sidebar-block" style="background: var(--light-bg); padding: 40px; border-radius: 4px; text-align: center; border-top: 5px solid var(--accent-color);">
                    <h3 style="font-size: 1.3rem; margin-bottom: 15px;">Secure Your Session</h3>
                    <p style="font-size: 0.95rem; margin-bottom: 25px; color: var(--charcoal);">Limited slots available for the Institutional Intent Diagnostic. Recommended for $5M+ scaling Founders.</p>
                    <div id="delayed-cta" style="display: none;">
                        <a href="<?php echo esc_url( get_theme_mod( 'ea_booking_url', '#' ) ); ?>" class="btn" style="width: 100%;">Book Session →</a>
                    </div>
                    <p id="cta-timer" style="font-size: 0.8rem; font-style: italic; opacity: 0.7; margin-top: 15px;">The application gate will open as the core mechanism is revealed in the video...</p>
                </div>

                <!-- Success Path Visual -->
                <div style="margin-top: 30px; padding: 20px; border: 1px dashed #cbd5e1; border-radius: 4px; font-size: 0.8rem; text-align: left;">
                    <div style="font-weight: 900; color: var(--primary-color); margin-bottom: 10px;">The Success Path:</div>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <div style="display: flex; gap: 10px;"><span>✓</span> <span>Infrastructure Deployment</span></div>
                        <div style="display: flex; gap: 10px;"><span>✓</span> <span>Institutional Vetting</span></div>
                        <div style="display: flex; gap: 10px; color: var(--accent-color); font-weight: 700;"><span>→</span> <span>Diagnostic Session (Current)</span></div>
                        <div style="display: flex; gap: 10px; opacity: 0.5;"><span>•</span> <span>Engagement Strategy</span></div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<script>
    const ctaDelay = <?php echo (int) get_theme_mod( 'ea_briefing_cta_delay', 480 ); ?> * 1000;
    setTimeout(function() {
        const cta = document.getElementById('delayed-cta');
        const timer = document.getElementById('cta-timer');
        if (cta) cta.style.display = 'block';
        if (timer) timer.style.display = 'none';
    }, ctaDelay);
</script>

<?php get_footer(); ?>
