<?php get_header(); ?>

<!-- Section 1: Above-the-Fold (The Hook) -->
<section class="hero animate-in">
    <div class="container hero-grid">
        <div class="hero-content">
            <span class="pre-headline"><?php echo esc_html( get_theme_mod( 'ea_hero_pre_headline' ) ); ?></span>
            <h1><?php echo wp_kses_post( get_theme_mod( 'ea_hero_headline' ) ); ?></h1>
            <p style="font-size: 1.15rem; margin-bottom: 2.5rem;"><?php echo esc_html( get_theme_mod( 'ea_hero_subheadline', 'Our proprietary "Client Acquisition Infrastructure" identifies anonymous corporate decision-makers in your ecosystem and builds instant institutional trust.' ) ); ?></p>
            <a href="#cta" class="btn"><?php echo esc_html( get_theme_mod( 'ea_hero_cta_text' ) ); ?></a>
            <p style="font-size: 0.8rem; margin-top: 1.25rem; opacity: 0.8;">Takes 12 minutes. No 'salesy' fluff. Pure strategy.</p>
        </div>
        <div class="hero-video">
            <?php
            $video_url = get_theme_mod( 'ea_hero_video_url' );
            if ( $video_url ) : ?>
                <iframe src="<?php echo esc_url( $video_url ); ?>" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            <?php else : ?>
                <div style="display: flex; justify-content: center; align-items: center; height: 100%; color: #fff; background: #1a202c;">
                    <p>Executive Briefing Video Placeholder</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Logo Bar Section -->
<section class="logo-bar" style="padding: 50px 0; background: var(--white); border-bottom: 1px solid rgba(0,0,0,0.05);">
    <div class="container" style="text-align: center;">
        <p style="font-size: 0.75rem; font-weight: 700; letter-spacing: 2px; color: var(--accent-color); margin-bottom: 30px;"><?php echo esc_html( get_theme_mod( 'ea_logo_bar_text', 'TRUSTED BY LEADERS AT:' ) ); ?></p>
        <div class="logo-grid" style="display: flex; justify-content: center; gap: 60px; filter: grayscale(1); opacity: 0.6; align-items: center; flex-wrap: wrap;">
            <?php
            $has_custom_logos = false;
            for ($i = 1; $i <= 5; $i++) {
                $logo = get_theme_mod("ea_logo_{$i}");
                if ($logo) {
                    echo '<img src="'.esc_url($logo).'" style="max-height: 30px; width: auto;">';
                    $has_custom_logos = true;
                }
            }
            if (!$has_custom_logos) : ?>
                <div style="font-weight: 900; font-size: 1.25rem;">FORBES</div>
                <div style="font-weight: 900; font-size: 1.25rem;">INC.</div>
                <div style="font-weight: 900; font-size: 1.25rem;">HBR</div>
                <div style="font-weight: 900; font-size: 1.25rem;">FAST CO.</div>
                <div style="font-weight: 900; font-size: 1.25rem;">DELOITTE</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Section 2: Agitation (The Pain) -->
<section class="agitation-section" style="background-color: var(--light-bg);">
    <div class="container">
        <div class="section-title">
            <h2><?php echo esc_html( get_theme_mod( 'ea_agitation_title' ) ); ?></h2>
            <p style="font-size: 1.2rem; max-width: 700px; margin: 0 auto;"><?php echo esc_html( get_theme_mod( 'ea_agitation_subheadline', 'Despite your experience, your current acquisition strategy is likely leaking revenue in three critical areas:' ) ); ?></p>
        </div>
        <div class="grid-3">
            <?php for ($i = 1; $i <= 3; $i++) :
                $title = get_theme_mod( "ea_agitation_bullet_{$i}_title" );
                $text = get_theme_mod( "ea_agitation_bullet_{$i}_text" );
                ?>
                <div class="card">
                    <h3 style="font-size: 1.25rem;"><?php echo esc_html( $title ); ?></h3>
                    <p style="font-size: 0.95rem; line-height: 1.8; color: #4A5568;"><?php echo esc_html( $text ); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Founder Section -->
<?php
$founder_name = get_theme_mod( 'ea_founder_name' );
if ( $founder_name ) : ?>
<section class="founder-section" style="background-color: var(--white); border-top: 1px solid rgba(0,0,0,0.05);">
    <div class="container hero-grid">
        <div class="founder-image" style="text-align: center;">
            <?php
            $image = get_theme_mod( 'ea_founder_image' );
            if ( $image ) : ?>
                <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $founder_name ); ?>" loading="lazy" style="max-width: 100%; border-radius: 4px; box-shadow: 0 30px 60px -20px rgba(0,0,0,0.15);">
            <?php else : ?>
                <div style="width: 100%; aspect-ratio: 1/1; background: #e2e8f0; border-radius: 4px;"></div>
            <?php endif; ?>
        </div>
        <div class="founder-content">
            <span style="color: var(--accent-color); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem; display: block; margin-bottom: 15px;">The Architect Behind the Method</span>
            <h2 style="font-size: 2.75rem; line-height: 1.1; margin-bottom: 25px;"><?php echo esc_html( $founder_name ); ?></h2>
            <div style="font-size: 1.15rem; line-height: 1.85; color: #4A5568;">
                <?php echo wp_kses_post( get_theme_mod( 'ea_founder_bio' ) ); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Featured Testimonial -->
<?php
$quote = get_theme_mod( 'ea_testimonial_quote' );
if ( $quote ) : ?>
<section class="testimonial-featured" style="background: var(--primary-color); color: var(--white); padding: 120px 0;">
    <div class="container" style="max-width: 900px; text-align: center;">
        <div style="font-size: 5rem; font-family: var(--font-heading); line-height: 1; color: var(--accent-color); margin-bottom: -10px; opacity: 0.3;">“</div>
        <blockquote style="font-size: clamp(1.5rem, 1.25rem + 1vw, 2.25rem); font-family: var(--font-heading); font-style: italic; line-height: 1.4; margin-bottom: 40px; color: #fff;"><?php echo esc_html( $quote ); ?></blockquote>
        <p style="font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: var(--accent-color); font-size: 0.9rem;"><?php echo esc_html( get_theme_mod( 'ea_testimonial_author' ) ); ?></p>
    </div>
</section>
<?php endif; ?>

<!-- Section 3: The Mechanism -->
<section class="mechanism-section" style="background-color: var(--white);">
    <div class="container">
        <div class="section-title">
            <h2><?php echo esc_html( get_theme_mod( 'ea_mechanism_title' ) ); ?></h2>
            <p style="font-size: 1.2rem; max-width: 700px; margin: 0 auto;"><?php echo esc_html( get_theme_mod( 'ea_mechanism_subheadline', 'A 3-Step Predictive System to Turn Anonymous Decision-Makers into High-Value Partners.' ) ); ?></p>
        </div>
        <div class="grid-3">
            <?php for ($i = 1; $i <= 3; $i++) :
                $title = get_theme_mod( "ea_mechanism_step_{$i}_title" );
                $text = get_theme_mod( "ea_mechanism_step_{$i}_text" );
                ?>
                <div class="step-card" style="text-align: center; padding: 40px; border-radius: 4px; border: 1px solid rgba(0,0,0,0.05); transition: all 0.3s ease;">
                    <div style="font-size: 3.5rem; color: var(--accent-color); font-weight: 900; margin-bottom: 15px; opacity: 0.15; font-family: var(--font-heading);">0<?php echo $i; ?></div>
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px;"><?php echo esc_html( $title ); ?></h3>
                    <p style="font-size: 1rem; color: #4A5568; line-height: 1.7;"><?php echo esc_html( $text ); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq" style="background-color: var(--light-bg); border-top: 1px solid rgba(0,0,0,0.05);">
    <div class="container">
        <div class="section-title">
            <h2><?php echo esc_html( get_theme_mod( 'ea_faq_title', 'Common Objections & Executive FAQ' ) ); ?></h2>
            <p style="font-size: 1.1rem;"><?php echo esc_html( get_theme_mod( 'ea_faq_subheadline', 'Addressing the critical questions about the Institutional Intent Method™.' ) ); ?></p>
        </div>
        <div class="faq-container">
            <?php for ($i = 1; $i <= 4; $i++) :
                $q = get_theme_mod( "ea_faq_q_{$i}" );
                $a = get_theme_mod( "ea_faq_a_{$i}" );

                if ($q) : ?>
                <div class="faq-item animate-in">
                    <span class="faq-question"><?php echo esc_html($q); ?></span>
                    <div class="faq-answer"><?php echo esc_html($a); ?></div>
                </div>
            <?php endif; endfor; ?>
        </div>
    </div>
</section>

<!-- CTA / Form Section -->
<section id="cta" style="background-color: var(--primary-color); color: var(--white); padding: 120px 0;">
    <div class="container" style="max-width: 700px; text-align: center;">
        <h2 style="color: var(--white); font-size: clamp(2rem, 1.5rem + 2vw, 3.5rem); margin-bottom: 20px;"><?php echo esc_html( get_theme_mod( 'ea_cta_title', 'Apply for Your Private Executive Briefing' ) ); ?></h2>
        <p style="margin-bottom: 50px; font-size: 1.2rem; opacity: 0.9;"><?php echo esc_html( get_theme_mod( 'ea_cta_subheadline', 'Select a time below to see the architecture behind the Institutional Intent Method™ and how it can be applied to your coaching practice.' ) ); ?></p>

        <!-- Form Placeholder -->
        <div style="background: var(--white); padding: 50px; border-radius: 4px; color: var(--text-color); box-shadow: 0 40px 100px rgba(0,0,0,0.3);">
            <p style="font-weight: 700; font-size: 1.2rem; margin-bottom: 10px;">[Lead Qualification Form Placeholder]</p>
            <p style="font-size: 0.95rem; opacity: 0.7;">(Use Step 1: Work Email -> Step 2: Executive Qualifier)</p>
        </div>

        <div style="margin-top: 40px; font-size: 0.85rem; opacity: 0.6; letter-spacing: 1px; font-weight: 700;">
            <p>✓ STRICTLY CONFIDENTIAL | ✓ NO HIGH-PRESSURE SALES | ✓ C-SUITE OPTIMIZED</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
