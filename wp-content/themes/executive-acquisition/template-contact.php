<?php
/**
 * Template Name: Contact Us
 */
get_header(); ?>

<section class="contact-hero animate-in" style="padding: 120px 0; background: var(--light-bg); border-bottom: 1px solid rgba(0,0,0,0.05);">
    <div class="container" style="max-width: 800px; text-align: center;">
        <span style="color: var(--accent-color); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem; display: block; margin-bottom: 20px;">Institutional Channels</span>
        <h1 style="font-size: clamp(2.5rem, 2rem + 3vw, 4.5rem); line-height: 1.1;"><?php the_title(); ?></h1>
        <p style="margin-top: 30px; font-size: 1.25rem; opacity: 0.8;"><?php echo esc_html( get_theme_mod('ea_contact_inquiry_text') ); ?></p>
    </div>
</section>

<section class="contact-content" style="padding: 100px 0;">
    <div class="container" style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 80px;">
        <div class="contact-form-area card" style="padding: 60px; border: none; box-shadow: 0 40px 100px -20px rgba(0,0,0,0.1);">
            <h2 style="margin-bottom: 40px;">Partner Inquiry</h2>

            <!-- Contact Form Placeholder -->
            <div style="background: #f8fafc; padding: 40px; border: 1px dashed #cbd5e1; border-radius: 4px; text-align: center;">
                <p style="font-weight: 700;">[Executive Contact Form Placeholder]</p>
                <p style="font-size: 0.9rem; opacity: 0.7;">Recommended: Name, Company Email, Phone, Inquiry Depth.</p>
            </div>
        </div>

        <aside class="contact-details">
            <div style="margin-bottom: 50px;">
                <h3 style="font-size: 1.25rem; margin-bottom: 20px; color: var(--accent-color);">Global Headquarters</h3>
                <p style="font-size: 1.1rem; line-height: 1.6;"><?php echo esc_html( get_theme_mod('ea_contact_office') ); ?></p>
            </div>

            <div style="margin-bottom: 50px;">
                <h3 style="font-size: 1.25rem; margin-bottom: 20px; color: var(--accent-color);">Direct Secure Line</h3>
                <p style="font-size: 1.1rem;">+1 (212) 555-0198</p>
                <p style="font-size: 0.8rem; opacity: 0.6; margin-top: 10px;">Monitored 09:00 - 17:00 EST</p>
            </div>

            <div class="compliance-box" style="padding: 30px; background: var(--light-bg); border-radius: 4px; font-size: 0.85rem; color: #4A5568;">
                <p><strong>Note on Discretion:</strong> All initial inquiries are handled with strict institutional confidentiality. NDAs available upon request for strategic diagnostics.</p>
            </div>
        </aside>
    </div>
</section>

<?php get_footer(); ?>
