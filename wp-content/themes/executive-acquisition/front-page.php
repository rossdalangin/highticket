<?php get_header(); ?>

<!-- Section 1: Above-the-Fold (The Hook) -->
<section class="hero animate-in">
    <div class="container hero-grid">
        <div class="hero-content">
            <span class="pre-headline"><?php echo esc_html( get_theme_mod( 'ea_hero_pre_headline' ) ); ?></span>
            <h1><?php echo wp_kses_post( get_theme_mod( 'ea_hero_headline' ) ); ?></h1>
            <p style="font-size: 1.15rem; margin-bottom: 2.5rem;"><?php echo esc_html( get_theme_mod( 'ea_hero_subheadline' ) ); ?></p>
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
<?php $is_marquee = get_theme_mod( 'ea_enable_marquee', false ); ?>
<section class="logo-bar" style="padding: 50px 0; background: var(--white); border-bottom: 1px solid rgba(0,0,0,0.05); overflow: hidden;">
    <div class="container" style="text-align: center;">
        <p style="font-size: 0.75rem; font-weight: 700; letter-spacing: 2px; color: var(--accent-color); margin-bottom: 30px;"><?php echo esc_html( get_theme_mod( 'ea_logo_bar_text', 'TRUSTED BY LEADERS AT:' ) ); ?></p>

        <div class="<?php echo $is_marquee ? 'logo-marquee' : ''; ?>">
            <div class="logo-grid <?php echo $is_marquee ? 'logo-marquee-content' : ''; ?>" style="<?php echo $is_marquee ? '' : 'display: flex; justify-content: center; gap: 60px; filter: grayscale(1); opacity: 0.6; align-items: center; flex-wrap: wrap;'; ?>">
                <?php
                $has_custom_logos = false;
                $logo_items = '';
                for ($i = 1; $i <= 5; $i++) {
                    $logo = get_theme_mod("ea_logo_{$i}");
                    if ($logo) {
                        $logo_items .= '<img src="'.esc_url($logo).'" style="max-height: 30px; width: auto;">';
                        $has_custom_logos = true;
                    }
                }
                if (!$has_custom_logos) {
                    $logo_items = '<div style="font-weight: 900; font-size: 1.25rem;">FORBES</div>
                                   <div style="font-weight: 900; font-size: 1.25rem;">INC.</div>
                                   <div style="font-weight: 900; font-size: 1.25rem;">HBR</div>
                                   <div style="font-weight: 900; font-size: 1.25rem;">FAST CO.</div>
                                   <div style="font-weight: 900; font-size: 1.25rem;">DELOITTE</div>';
                }
                echo $logo_items;
                if ($is_marquee) echo $logo_items; // Duplicate for seamless loop
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Agitation (The Pain) -->
<section class="agitation-section" style="background-color: var(--light-bg);">
    <div class="container">
        <div class="section-title">
            <h2><?php echo esc_html( get_theme_mod( 'ea_agitation_title' ) ); ?></h2>
            <p style="font-size: 1.2rem; max-width: 700px; margin: 0 auto;"><?php echo esc_html( get_theme_mod( 'ea_agitation_subheadline' ) ); ?></p>
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

<!-- Testimonials (CPT Driven) -->
<?php
$testimonials = get_posts( array('post_type' => 'testimonial', 'posts_per_page' => 3) );
if ( $testimonials ) : ?>
<section class="testimonials-cpt" style="background: var(--primary-color); color: #fff; padding: 100px 0;">
    <div class="container">
        <div class="section-title">
            <h2 style="color:#fff;">Institutional Praise</h2>
            <p>What C-Suite leaders are saying about the Intent Method™.</p>
        </div>
        <div class="grid-3">
            <?php foreach ( $testimonials as $t ) : ?>
                <div class="card" style="background: rgba(255,255,255,0.05); border: none; color: #fff;">
                    <div style="font-size: 3rem; color: var(--accent-color); margin-bottom: -15px; opacity: 0.5;">“</div>
                    <div style="font-size: 1.1rem; font-style: italic; margin-bottom: 25px; line-height: 1.7;"><?php echo get_the_content(null, false, $t->ID); ?></div>
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <div style="width: 50px; height: 50px; border-radius: 50%; background: #eee; overflow: hidden;">
                            <?php echo get_the_post_thumbnail($t->ID, 'thumbnail', array('style' => 'width:100%; height:100%; object-fit:cover;')); ?>
                        </div>
                        <div style="font-weight: 700; text-transform: uppercase; letter-spacing: 1px; font-size: 0.8rem; color: var(--accent-color);"><?php echo get_the_title($t->ID); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Section 3: The Mechanism -->
<section class="mechanism-section" style="background-color: var(--white);">
    <div class="container">
        <div class="section-title">
            <h2><?php echo esc_html( get_theme_mod( 'ea_mechanism_title' ) ); ?></h2>
            <p style="font-size: 1.2rem; max-width: 700px; margin: 0 auto;"><?php echo esc_html( get_theme_mod( 'ea_mechanism_subheadline' ) ); ?></p>
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

<!-- FAQ Section (CPT Driven) -->
<section class="faq" style="background-color: var(--light-bg); border-top: 1px solid rgba(0,0,0,0.05);">
    <div class="container">
        <div class="section-title">
            <h2><?php echo esc_html( get_theme_mod( 'ea_faq_title' ) ); ?></h2>
            <p style="font-size: 1.1rem;"><?php echo esc_html( get_theme_mod( 'ea_faq_subheadline' ) ); ?></p>
        </div>
        <div class="faq-container">
            <?php
            $faqs = get_posts( array('post_type' => 'faq', 'posts_per_page' => -1) );
            if ($faqs) :
                foreach ( $faqs as $f ) : ?>
                <div class="faq-item animate-in">
                    <span class="faq-question"><?php echo get_the_title($f->ID); ?></span>
                    <div class="faq-answer"><?php echo apply_filters('the_content', $f->post_content); ?></div>
                </div>
            <?php endforeach; else: ?>
                <!-- Fallback to Customizer FAQ if no CPTs exist yet -->
                <?php for ($i = 1; $i <= 4; $i++) :
                    $q = get_theme_mod( "ea_faq_q_{$i}" );
                    $a = get_theme_mod( "ea_faq_a_{$i}" );
                    if ($q) : ?>
                    <div class="faq-item animate-in">
                        <span class="faq-question"><?php echo esc_html($q); ?></span>
                        <div class="faq-answer"><?php echo esc_html($a); ?></div>
                    </div>
                <?php endif; endfor; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA / Form Section -->
<section id="cta" style="background-color: var(--primary-color); color: var(--white); padding: 120px 0;">
    <div class="container" style="max-width: 700px; text-align: center;">
        <h2 style="color: var(--white); font-size: clamp(2rem, 1.5rem + 2vw, 3.5rem); margin-bottom: 20px;"><?php echo esc_html( get_theme_mod( 'ea_cta_title' ) ); ?></h2>
        <p style="margin-bottom: 50px; font-size: 1.2rem; opacity: 0.9;"><?php echo esc_html( get_theme_mod( 'ea_cta_subheadline' ) ); ?></p>

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
