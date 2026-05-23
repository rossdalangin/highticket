<?php
/**
 * Template Name: Contact Us
 */
get_header(); ?>

<div class="contact-page animate-in">
    <?php
    $c_h1_def = 'Initiate a Strategic Diagnostic.';
    if ( $c_h1 = get_theme_mod('ea_contact_headline', $c_h1_def) ) : ?>
    <section class="contact-hero bg-light">
        <div class="container narrow-container text-center">
            <?php if ($c_tag = get_theme_mod('ea_contact_tag', 'Institutional Inquiry')) : ?>
                <span class="section-tag mb-xs"><?php echo esc_html($c_tag); ?></span>
            <?php endif; ?>
            <h1 class="mb-sm"><?php echo esc_html( $c_h1 ); ?></h1>
            <?php if ($c_inq = get_theme_mod('ea_contact_inquiry_text', 'Initiate a strategic diagnostic session through our secure inquiry channel. All submissions are handled with absolute discretion.')) : ?>
                <p class="subheadline opacity-80"><?php echo esc_html($c_inq); ?></p>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <section class="contact-content">
        <div class="container">
            <div class="post-layout-grid">
                <div class="contact-form-main card">
                    <h3 class="mb-lg"><?php echo esc_html( get_theme_mod('ea_contact_form_title', 'Secure Inquiry Channel') ); ?></h3>

                    <!-- Integrated Premium Form Style -->
                    <form action="#" method="POST" class="executive-inquiry-form">
                        <div class="grid-2 mb-md">
                            <div class="form-group">
                                <label><?php echo esc_html( get_theme_mod('ea_form_label_name', 'Full Name') ); ?></label>
                                <input type="text" name="name" placeholder="<?php echo esc_attr( get_theme_mod('ea_form_placeholder_name', 'Executive Name') ); ?>" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo esc_html( get_theme_mod('ea_form_label_email', 'Work Email') ); ?></label>
                                <input type="email" name="email" placeholder="<?php echo esc_attr( get_theme_mod('ea_form_placeholder_email', 'corporate@email.com') ); ?>" required>
                            </div>
                        </div>
                        <div class="form-group mb-md">
                            <label><?php echo esc_html( get_theme_mod('ea_form_label_org', 'Organization / Focus Area') ); ?></label>
                            <input type="text" name="org" placeholder="<?php echo esc_attr( get_theme_mod('ea_form_placeholder_org', 'Company Name or Niche') ); ?>">
                        </div>
                        <div class="form-group mb-lg">
                            <label><?php echo esc_html( get_theme_mod('ea_form_label_message', 'Briefly describe your institutional challenge') ); ?></label>
                            <textarea name="message" rows="5" placeholder="<?php echo esc_attr( get_theme_mod('ea_form_placeholder_message', 'Your inquiry...') ); ?>"></textarea>
                        </div>
                        <button type="submit" class="btn"><?php echo esc_html( get_theme_mod('ea_form_btn_contact', 'Send Inquiry →') ); ?></button>
                    </form>
                </div>

                <aside class="contact-sidebar">
                    <div class="sidebar-box">
                        <h4 class="widget-title">Office Location</h4>
                        <p class="opacity-80"><?php echo esc_html(get_theme_mod('ea_contact_office', 'Executive Suite, Financial District')); ?></p>
                    </div>

                    <div class="sidebar-box">
                        <h4 class="widget-title">Strategic Pathways</h4>
                        <div class="pathway-list">
                            <div class="pathway-item">
                                <div class="pathway-icon">A</div>
                                <div class="pathway-text">
                                    <strong>Authority Audit</strong>
                                    <p class="mb-0 opacity-70">Quantifying your current institutional reach.</p>
                                </div>
                            </div>
                            <div class="pathway-item">
                                <div class="pathway-icon">B</div>
                                <div class="pathway-text">
                                    <strong>Intent Mapping</strong>
                                    <p class="mb-0 opacity-70">Identifying anonymous decision-makers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</div>

<style>
    .executive-inquiry-form .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    @media (max-width: 600px) {
        .executive-inquiry-form .grid-2 { grid-template-columns: 1fr; }
    }
</style>

<?php get_footer(); ?>
