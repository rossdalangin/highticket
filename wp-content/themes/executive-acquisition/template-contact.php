<?php
/**
 * Template Name: Contact Us
 */
get_header(); ?>

<div class="contact-page animate-in">
    <section class="contact-hero bg-light">
        <div class="container narrow-container text-center">
            <span class="section-tag mb-xs">Institutional Inquiry</span>
            <h1 class="mb-sm">Initiate a Strategic Diagnostic.</h1>
            <p class="subheadline opacity-80"><?php echo esc_html( get_theme_mod('ea_contact_inquiry_text') ); ?></p>
        </div>
    </section>

    <section class="contact-content">
        <div class="container">
            <div class="post-layout-grid">
                <div class="contact-form-main card">
                    <h3 class="mb-lg">Secure Inquiry Channel</h3>

                    <!-- Integrated Premium Form Style -->
                    <form action="#" method="POST" class="executive-inquiry-form">
                        <div class="grid-2 mb-md">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" placeholder="Executive Name" required>
                            </div>
                            <div class="form-group">
                                <label>Work Email</label>
                                <input type="email" name="email" placeholder="corporate@email.com" required>
                            </div>
                        </div>
                        <div class="form-group mb-md">
                            <label>Organization / Focus Area</label>
                            <input type="text" name="org" placeholder="Company Name or Niche">
                        </div>
                        <div class="form-group mb-lg">
                            <label>Briefly describe your institutional challenge</label>
                            <textarea name="message" rows="5" placeholder="Your inquiry..."></textarea>
                        </div>
                        <button type="submit" class="btn">Send Inquiry →</button>
                    </form>
                </div>

                <aside class="contact-sidebar">
                    <div class="sidebar-box">
                        <h4 class="widget-title">Office Location</h4>
                        <p class="opacity-80"><?php echo esc_html(get_theme_mod('ea_contact_office')); ?></p>
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
