<?php
/**
 * Template Name: Lead Magnet / Asset Capture
 */
get_header(); ?>

<div class="lead-magnet-page animate-in">
    <div class="container narrow-grid-layout">
        <div class="asset-preview">
            <div class="asset-visual card mb-lg">
                <span class="asset-format">.PDF</span>
                <h2 class="text-white mt-sm"><?php the_title(); ?></h2>
            </div>
            <div class="asset-details">
                <h3 class="mb-md">What's Inside:</h3>
                <ul class="check-list">
                    <li><span>✓</span> <span>Phase-by-phase ROI mapping framework.</span></li>
                    <li><span>✓</span> <span>Internal C-Suite buy-in scripts.</span></li>
                    <li><span>✓</span> <span>Benchmark data for mid-market leadership.</span></li>
                </ul>
            </div>
        </div>

        <div class="capture-section">
            <div class="capture-form card">
                <span class="section-tag mb-xs">Executive Access</span>
                <h2 class="mb-lg">Download the Framework</h2>

                <form action="<?php echo esc_url( get_theme_mod( 'ea_form_action_url', '#' ) ); ?>" method="POST" class="vertical-form">
                    <div class="form-group mb-sm">
                        <input type="text" name="FNAME" placeholder="First Name" required>
                    </div>
                    <div class="form-group mb-lg">
                        <input type="email" name="EMAIL" placeholder="Work Email Address" required>
                    </div>
                    <button type="submit" class="btn w-100">Instant Access →</button>
                </form>

                <p class="form-micro-copy mt-md text-center">✓ Secure & Confidential | ✓ No Spam</p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
