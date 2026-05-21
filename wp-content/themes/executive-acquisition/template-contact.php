<?php
/**
 * Template Name: Contact Us
 */
get_header(); ?>

<div class="contact-page animate-in">
    <section class="contact-hero bg-light">
        <div class="container narrow-container text-center">
            <span class="section-tag mb-xs">Secure Channel</span>
            <h1 class="mb-sm">Institutional Inquiries</h1>
            <p class="subheadline opacity-80"><?php echo esc_html( get_theme_mod('ea_contact_inquiry_text') ); ?></p>
        </div>
    </section>

    <section class="contact-content">
        <div class="container narrow-grid-layout">
            <div class="contact-form-section card">
                <h2 class="mb-lg">Send a Message</h2>
                <!-- Form Placeholder -->
                <div class="form-group mb-md">
                    <input type="text" placeholder="Full Name" required>
                </div>
                <div class="form-group mb-md">
                    <input type="email" placeholder="Work Email" required>
                </div>
                <div class="form-group mb-lg">
                    <textarea placeholder="How can we assist your institutional growth?" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn w-100">Deliver Message →</button>
            </div>

            <div class="contact-info-section">
                <div class="info-box mb-xl">
                    <h3 class="mb-md">Strategic Headquarters</h3>
                    <p class="mb-xs"><strong>Location:</strong> <?php echo esc_html( get_theme_mod('ea_contact_office') ); ?></p>
                    <p><strong>Email:</strong> support@<?php echo $_SERVER['HTTP_HOST']; ?></p>
                </div>

                <div class="info-box">
                    <h3 class="mb-md">Institutional Socials</h3>
                    <div class="footer-social">
                        <?php if ( get_theme_mod('ea_linkedin_url') ) : ?><a href="<?php echo esc_url(get_theme_mod('ea_linkedin_url')); ?>" class="social-link">LinkedIn</a><?php endif; ?>
                        <?php if ( get_theme_mod('ea_twitter_url') ) : ?><a href="<?php echo esc_url(get_theme_mod('ea_twitter_url')); ?>" class="social-link">X / Twitter</a><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
