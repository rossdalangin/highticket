<?php
/**
 * Template Name: Lead Magnet / Asset Capture
 */
get_header(); ?>

<div class="lead-magnet-page animate-in">
    <?php
    $lm_h_def = 'Download the Executive Framework';
    if ( get_theme_mod('ea_lm_headline', $lm_h_def) || get_theme_mod('ea_lm_benefit_1', 'The exact 5-step sequence for identified intent visitors.') ) : ?>
    <div class="container narrow-grid-layout">
        <div class="asset-preview">
            <div class="asset-visual card mb-lg">
                <span class="asset-format">.PDF</span>
                <h2 class="text-white mt-sm"><?php the_title(); ?></h2>
            </div>
            <div class="asset-details">
                <h3 class="mb-md"><?php esc_html_e("What's Inside:", 'executive-acquisition'); ?></h3>
                <ul class="check-list">
                    <?php
                    $lm_benefit_defs = array(
                        1 => 'The exact 5-step sequence for identified intent visitors.',
                        2 => 'Board-ready templates for internal stakeholder buy-in.',
                        3 => 'ROI-mapping frameworks for high-ticket coaching engagements.'
                    );
                    for ($i = 1; $i <= 3; $i++) :
                        $benefit = get_theme_mod("ea_lm_benefit_{$i}", $lm_benefit_defs[$i]);
                        if ($benefit) : ?>
                            <li><span>✓</span> <span><?php echo esc_html($benefit); ?></span></li>
                        <?php endif;
                    endfor; ?>
                </ul>
            </div>
        </div>

        <div class="capture-section">
            <div class="capture-form card">
                <span class="section-tag mb-xs"><?php esc_html_e('Executive Access', 'executive-acquisition'); ?></span>
                <h2 class="mb-lg"><?php echo esc_html( get_theme_mod('ea_lm_headline', 'Download the Executive Framework') ); ?></h2>

                <?php
                $lm_form = get_theme_mod('ea_lm_form_code');
                if ( $lm_form ) :
                    echo '<div class="lm-form-wrapper">' . do_shortcode($lm_form) . '</div>';
                else : ?>
                    <form action="<?php echo esc_url( get_theme_mod( 'ea_form_action_url', '#' ) ); ?>" method="POST" class="vertical-form">
                        <div class="form-group mb-sm">
                            <input type="text" name="FNAME" placeholder="<?php echo esc_attr( get_theme_mod('ea_form_placeholder_name', 'First Name') ); ?>" required>
                        </div>
                        <div class="form-group mb-lg">
                            <input type="email" name="EMAIL" placeholder="<?php echo esc_attr( get_theme_mod('ea_form_placeholder_email', 'Work Email Address') ); ?>" required>
                        </div>
                        <button type="submit" class="btn w-100"><?php echo esc_html( get_theme_mod('ea_newsletter_btn', 'Instant Access →') ); ?></button>
                    </form>
                <?php endif; ?>

                <p class="form-micro-copy mt-md text-center"><?php echo esc_html( get_theme_mod('ea_cta_compliance', '✓ Secure & Confidential | ✓ No Spam') ); ?></p>
            </div>
        </div>
    </div>
    <?php else : ?>
        <div class="container text-center py-xl">
            <p>Lead Magnet content is currently being updated. Please check back shortly.</p>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
