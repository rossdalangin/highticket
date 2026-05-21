<?php
/**
 * Template Name: Lead Magnet / Asset Capture
 */
get_header(); ?>

<section class="lead-magnet-page" style="padding: 100px 0; min-height: 80vh; display: flex; align-items: center; background: var(--light-bg);">
    <div class="container" style="max-width: 900px; display: grid; grid-template-columns: 1.2fr 1fr; gap: 60px; align-items: center;">
        <div class="asset-preview">
            <div style="background: var(--primary-color); padding: 60px; border-radius: 4px; text-align: center; box-shadow: 0 30px 60px rgba(0,0,0,0.15);">
                <span style="color: var(--accent-color); font-weight: 900; font-size: 3rem;">.PDF</span>
                <h2 style="color: #fff; margin-top: 20px; font-size: 1.8rem;"><?php the_title(); ?></h2>
            </div>
            <div style="margin-top: 40px;">
                <h3 style="font-size: 1.2rem; margin-bottom: 20px;">What's Inside:</h3>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span>✓</span> <span>Phase-by-phase ROI mapping framework.</span></li>
                    <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span>✓</span> <span>Internal C-Suite buy-in scripts.</span></li>
                    <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span>✓</span> <span>Benchmark data for mid-market leadership.</span></li>
                </ul>
            </div>
        </div>

        <div class="capture-form card" style="padding: 50px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
            <span style="color: var(--accent-color); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem; display: block; margin-bottom: 15px;">Executive Access</span>
            <h2 style="margin-bottom: 30px; font-size: 2rem;">Download the Framework</h2>

            <form action="<?php echo esc_url( get_theme_mod( 'ea_form_action_url', '#' ) ); ?>" method="POST">
                <div style="margin-bottom: 20px;">
                    <input type="text" name="FNAME" placeholder="First Name" style="width: 100%; padding: 15px; border: 1px solid #eee; border-radius: 2px;" required>
                </div>
                <div style="margin-bottom: 30px;">
                    <input type="email" name="EMAIL" placeholder="Work Email Address" style="width: 100%; padding: 15px; border: 1px solid #eee; border-radius: 2px;" required>
                </div>
                <button type="submit" class="btn" style="width: 100%;">Instant Access →</button>
            </form>

            <p style="font-size: 0.75rem; margin-top: 20px; opacity: 0.7; text-align: center;">✓ Secure & Confidential | ✓ No Spam</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
