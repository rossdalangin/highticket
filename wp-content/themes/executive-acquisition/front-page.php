<?php get_header(); ?>

<!-- Section 1: Above-the-Fold (The Hook) -->
<section id="primary" class="hero animate-in">
    <div class="container hero-grid">
        <div class="hero-content">
            <span class="pre-headline mb-xs"><?php echo esc_html( get_theme_mod( 'ea_hero_pre_headline' ) ); ?></span>
            <h1 class="mb-sm"><?php echo wp_kses_post( get_theme_mod( 'ea_hero_headline' ) ); ?></h1>
            <p class="mb-lg"><?php echo esc_html( get_theme_mod( 'ea_hero_subheadline' ) ); ?></p>
            <a href="#cta" class="btn"><?php echo esc_html( get_theme_mod( 'ea_hero_cta_text' ) ); ?></a>
            <p class="hero-micro-copy mt-sm">Takes 12 minutes. No 'salesy' fluff. Pure strategy.</p>
        </div>
        <div class="hero-video">
            <?php
            $video_url = get_theme_mod( 'ea_hero_video_url' );
            if ( $video_url ) : ?>
                <iframe src="<?php echo esc_url( $video_url ); ?>" fetchpriority="high" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            <?php else : ?>
                <div class="video-placeholder">
                    <p>Executive Briefing Video Placeholder</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Logo Bar Section -->
<?php $is_marquee = get_theme_mod( 'ea_enable_marquee', false ); ?>
<section class="logo-bar">
    <div class="container text-center">
        <p class="logo-bar-label mb-md"><?php echo esc_html( get_theme_mod( 'ea_logo_bar_text', 'TRUSTED BY LEADERS AT:' ) ); ?></p>

        <div class="<?php echo $is_marquee ? 'logo-marquee' : ''; ?>">
            <div class="logo-grid <?php echo $is_marquee ? 'logo-marquee-content' : ''; ?>">
                <?php
                $has_custom_logos = false;
                $logo_items = '';
                for ($i = 1; $i <= 5; $i++) {
                    $logo = get_theme_mod("ea_logo_{$i}");
                    if ($logo) {
                        $logo_items .= '<img src="'.esc_url($logo).'" loading="lazy" width="150" height="30" alt="Partner Logo" class="logo-item">';
                        $has_custom_logos = true;
                    }
                }
                if (!$has_custom_logos) {
                    $logo_items = '<div class="fallback-logo">FORBES</div>
                                   <div class="fallback-logo">INC.</div>
                                   <div class="fallback-logo">HBR</div>
                                   <div class="fallback-logo">FAST CO.</div>
                                   <div class="fallback-logo">DELOITTE</div>';
                }
                echo $logo_items;
                if ($is_marquee) echo $logo_items; // Duplicate for seamless loop
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Agitation (The Pain) -->
<section class="agitation-section">
    <div class="container">
        <div class="section-title mb-xl">
            <h2><?php echo esc_html( get_theme_mod( 'ea_agitation_title' ) ); ?></h2>
            <p class="subheadline"><?php echo esc_html( get_theme_mod( 'ea_agitation_subheadline' ) ); ?></p>
        </div>
        <div class="grid-3">
            <?php for ($i = 1; $i <= 3; $i++) :
                $title = get_theme_mod( "ea_agitation_bullet_{$i}_title" );
                $text = get_theme_mod( "ea_agitation_bullet_{$i}_text" );
                ?>
                <div class="card agitation-card">
                    <h3 class="mb-xs"><?php echo esc_html( $title ); ?></h3>
                    <p><?php echo esc_html( $text ); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Testimonials (CPT Driven) -->
<?php
$testimonials = get_posts( array('post_type' => 'testimonial', 'posts_per_page' => 3) );
if ( $testimonials ) : ?>
<section class="testimonials-cpt">
    <div class="container">
        <div class="section-title mb-xl">
            <h2 class="text-white">Institutional Praise</h2>
            <p class="text-white">What C-Suite leaders are saying about the Intent Method™.</p>
        </div>
        <div class="grid-3">
            <?php foreach ( $testimonials as $t ) : ?>
                <div class="card testimonial-card">
                    <div class="quote-mark mb-xxs">“</div>
                    <div class="testimonial-content mb-md"><?php echo get_the_content(null, false, $t->ID); ?></div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <?php echo get_the_post_thumbnail($t->ID, 'thumbnail', array('class' => 'avatar-img', 'loading' => 'lazy')); ?>
                        </div>
                        <div class="author-meta"><?php echo get_the_title($t->ID); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Section 3: The Mechanism -->
<section class="mechanism-section bg-white">
    <div class="container">
        <div class="section-title mb-xl">
            <h2><?php echo esc_html( get_theme_mod( 'ea_mechanism_title' ) ); ?></h2>
            <p class="subheadline"><?php echo esc_html( get_theme_mod( 'ea_mechanism_subheadline' ) ); ?></p>
        </div>
        <div class="grid-3">
            <?php for ($i = 1; $i <= 3; $i++) :
                $title = get_theme_mod( "ea_mechanism_step_{$i}_title" );
                $text = get_theme_mod( "ea_mechanism_step_{$i}_text" );
                ?>
                <div class="step-card">
                    <div class="step-number mb-xs">0<?php echo $i; ?></div>
                    <h3 class="mb-sm"><?php echo esc_html( $title ); ?></h3>
                    <p><?php echo esc_html( $text ); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- FAQ Section (CPT Driven) -->
<section class="faq">
    <div class="container">
        <div class="section-title mb-xl">
            <h2><?php echo esc_html( get_theme_mod( 'ea_faq_title' ) ); ?></h2>
            <p><?php echo esc_html( get_theme_mod( 'ea_faq_subheadline' ) ); ?></p>
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

<!-- Newsletter Section -->
<section class="newsletter-front">
    <div class="container narrow-container text-center">
        <span class="section-tag mb-xs">The Institutional Brief</span>
        <h2 class="mb-sm"><?php echo esc_html( get_theme_mod('ea_newsletter_title', 'Join 2,400+ C-Suite Leaders') ); ?></h2>
        <p class="mb-lg"><?php echo esc_html( get_theme_mod('ea_newsletter_desc', 'Get bi-weekly leadership architecture and acquisition strategies delivered directly to your inbox.') ); ?></p>

        <form action="<?php echo esc_url( get_theme_mod( 'ea_form_action_url', '#' ) ); ?>" method="POST" class="newsletter-inline-form">
            <input type="email" name="EMAIL" placeholder="Work Email Address" required>
            <button type="submit" class="btn">Join Briefing →</button>
        </form>
    </div>
</section>

<!-- CTA / Form Section -->
<section id="cta" class="final-cta">
    <div class="container narrow-container text-center">
        <h2 class="text-white mb-sm"><?php echo esc_html( get_theme_mod( 'ea_cta_title' ) ); ?></h2>
        <p class="text-white mb-xl opacity-90"><?php echo esc_html( get_theme_mod( 'ea_cta_subheadline' ) ); ?></p>

        <!-- Form Placeholder -->
        <div class="cta-form-container card">
            <p class="form-placeholder-title mb-xxs">[Lead Qualification Form Placeholder]</p>
            <p class="form-placeholder-desc">(Use Step 1: Work Email -> Step 2: Executive Qualifier)</p>
        </div>

        <div class="compliance-row mt-lg">
            <p>✓ STRICTLY CONFIDENTIAL | ✓ NO HIGH-PRESSURE SALES | ✓ C-SUITE OPTIMIZED</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
