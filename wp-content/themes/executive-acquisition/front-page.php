<?php get_header(); ?>

<!-- Section 1: Above-the-Fold (The Hook) -->
<section id="primary" class="hero animate-in">
    <div class="container hero-grid">
        <div class="hero-content">
            <span class="pre-headline mb-xs"><?php echo esc_html( get_theme_mod( 'ea_hero_pre_headline', 'Strictly for Executive Coaches targeting the C-Suite:' ) ); ?></span>
            <h1 class="mb-sm"><?php echo wp_kses_post( get_theme_mod( 'ea_hero_headline', 'Book 3-5 High-Ticket Corporate Engagements Every Month Using an Institutional Intent Engine.' ) ); ?></h1>
            <p class="mb-lg"><?php echo esc_html( get_theme_mod( 'ea_hero_subheadline', 'Identifies anonymous corporate decision-makers and builds instant institutional trust without the content hamster wheel.' ) ); ?></p>
            <a href="#cta" class="btn"><?php echo esc_html( get_theme_mod( 'ea_hero_cta_text', 'Access the Private Executive Briefing →' ) ); ?></a>
            <p class="hero-micro-copy mt-sm"><?php echo esc_html( get_theme_mod( 'ea_hero_micro_copy', 'Takes 12 minutes. No \'salesy\' fluff. Pure strategy.' ) ); ?></p>
        </div>
        <div class="hero-media">
            <?php
            $video_url = get_theme_mod( 'ea_hero_video_url' );
            $hero_img = get_theme_mod( 'ea_hero_image' );
            $hero_form = get_theme_mod( 'ea_hero_form_code' );

            if ( $hero_form ) :
                echo '<div class="hero-form-wrapper card">' . do_shortcode( $hero_form ) . '</div>';
            elseif ( $video_url ) : ?>
                <div class="hero-video">
                    <iframe src="<?php echo esc_url( $video_url ); ?>" fetchpriority="high" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php elseif ( $hero_img ) : ?>
                <div class="hero-image-box">
                    <img src="<?php echo esc_url( $hero_img ); ?>" alt="Executive Briefing" class="img-fluid hero-main-img">
                </div>
            <?php else : ?>
                <div class="hero-video video-placeholder">
                    <p>Executive Briefing Video Placeholder</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Logo Bar Section -->
<?php $is_marquee = get_theme_mod( 'ea_enable_marquee', false ); ?>
<section class="logo-bar bg-white" style="border-bottom: 1px solid var(--border-soft); padding: 60px 0;">
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
<section class="agitation-section bg-light">
    <div class="container">
        <div class="section-title mb-xl text-center">
            <span class="section-tag"><?php echo esc_html( get_theme_mod('ea_agitation_pre_headline', 'The Cost of Invisibility') ); ?></span>
            <h2><?php echo esc_html( get_theme_mod( 'ea_agitation_title', "The 'High-Ticket' Paradox: Why Your Expertise Isn't Converting" ) ); ?></h2>
            <p class="subheadline"><?php echo esc_html( get_theme_mod( 'ea_agitation_subheadline', "The hidden costs of the content hamster wheel." ) ); ?></p>
        </div>

        <div class="side-image-layout reverse">
            <div class="content-side">
                <div class="agitation-bullets">
                    <?php for ($i = 1; $i <= 3; $i++) :
                $title = get_theme_mod( "ea_agitation_bullet_{$i}_title", "Pain Point $i" );
                $text = get_theme_mod( "ea_agitation_bullet_{$i}_text", "Description of pain point $i." );
                ?>
                        <div class="card agitation-card mb-md">
                            <h3 class="mb-xs"><?php echo esc_html( $title ); ?></h3>
                            <p><?php echo esc_html( $text ); ?></p>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="image-side">
                <?php $ag_img = get_theme_mod('ea_agitation_image'); ?>
                <div class="side-img-wrapper card">
                    <?php if ($ag_img) : ?>
                        <img src="<?php echo esc_url($ag_img); ?>" alt="Market Frustration" class="img-fluid">
                    <?php else : ?>
                        <div class="img-placeholder">High-Impact Executive Imagery</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials (CPT Driven) -->
<?php
$testimonials = get_posts( array('post_type' => 'testimonial', 'posts_per_page' => 3) );
if ( $testimonials ) : ?>
<section class="testimonials-cpt bg-dark">
    <div class="container">
        <div class="section-title mb-xl">
            <h2><?php echo esc_html( get_theme_mod( 'ea_testimonials_title', 'Institutional Praise' ) ); ?></h2>
            <p><?php echo esc_html( get_theme_mod( 'ea_testimonials_subheadline', 'What C-Suite leaders are saying about the Intent Method™.' ) ); ?></p>
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
        <div class="section-title mb-xl text-center">
            <span class="section-tag"><?php echo esc_html( get_theme_mod('ea_mechanism_pre_headline', 'The Institutional Intent Engine™') ); ?></span>
            <h2><?php echo esc_html( get_theme_mod( 'ea_mechanism_title', 'The Institutional Intent Engine' ) ); ?></h2>
            <p class="subheadline"><?php echo esc_html( get_theme_mod( 'ea_mechanism_subheadline', 'A predictable, intent-driven acquisition system.' ) ); ?></p>
        </div>

        <div class="side-image-layout">
            <div class="content-side">
                <div class="steps-list">
                    <?php for ($i = 1; $i <= 3; $i++) :
                        $title = get_theme_mod( "ea_mechanism_step_{$i}_title", "Step $i Title" );
                        $text = get_theme_mod( "ea_mechanism_step_{$i}_text", "Description for step $i." );
                        ?>
                        <div class="step-card mb-lg">
                            <div class="step-number mb-xs">0<?php echo $i; ?></div>
                            <h3 class="mb-sm"><?php echo esc_html( $title ); ?></h3>
                            <p><?php echo esc_html( $text ); ?></p>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="image-side">
                <?php $mech_img = get_theme_mod('ea_mechanism_image'); ?>
                <div class="side-img-wrapper card">
                    <?php if ($mech_img) : ?>
                        <img src="<?php echo esc_url($mech_img); ?>" alt="Strategic Mechanism" class="img-fluid">
                    <?php else : ?>
                        <div class="img-placeholder">Proprietary Framework Visualization</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section (CPT Driven) -->
<section class="faq bg-light">
    <div class="container">
        <div class="section-title mb-xl">
            <h2><?php echo esc_html( get_theme_mod( 'ea_faq_title', 'Strategic Clarifications' ) ); ?></h2>
            <p><?php echo esc_html( get_theme_mod( 'ea_faq_subheadline', 'Common questions regarding the acquisition engine.' ) ); ?></p>
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

<!-- Case Studies Preview -->
<?php
$home_cases = get_posts( array('post_type' => 'case_study', 'posts_per_page' => 3) );
if ( $home_cases ) : ?>
<section class="home-case-studies bg-light">
    <div class="container">
        <div class="section-title mb-xl text-center">
            <span class="section-tag"><?php echo esc_html( get_theme_mod('ea_case_studies_tag', 'Proof of Impact') ); ?></span>
            <h2><?php echo esc_html( get_theme_mod('ea_case_studies_title', 'Measurable Institutional ROI') ); ?></h2>
        </div>
        <div class="grid-3">
            <?php foreach ( $home_cases as $hc ) : ?>
                <div class="card case-card animate-in">
                    <h3 class="mb-sm"><?php echo get_the_title($hc->ID); ?></h3>
                    <p class="mb-lg opacity-80"><?php echo get_the_excerpt($hc->ID); ?></p>
                    <a href="<?php echo get_permalink($hc->ID); ?>" class="text-accent font-bold">View ROI Analysis →</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Authority Tiers / Engagement Logic -->
<section class="engagement-tiers bg-white">
    <div class="container">
        <div class="section-title mb-xl text-center">
            <span class="section-tag"><?php echo esc_html( get_theme_mod('ea_tiers_tag', 'Strategic Engagement') ); ?></span>
            <h2><?php echo esc_html( get_theme_mod('ea_tiers_title', 'Institutional Engagement Tiers') ); ?></h2>
            <p class="subheadline"><?php echo esc_html( get_theme_mod('ea_tiers_subheadline', 'Quantifiable ROI for Every Stage of Organizational Growth.') ); ?></p>
        </div>
        <div class="grid-2">
            <?php for ($i = 1; $i <= 2; $i++) :
                $name = get_theme_mod( "ea_tier_{$i}_name", "Tier $i Name" );
                $price = get_theme_mod( "ea_tier_{$i}_price", "$5,000" );
                $desc = get_theme_mod( "ea_tier_{$i}_desc", "Tier $i description." );
                ?>
                <div class="card tier-card animate-in">
                    <div class="tier-header mb-md">
                        <h3 class="mb-xxs"><?php echo esc_html( $name ); ?></h3>
                        <div class="tier-price text-accent"><?php echo esc_html( $price ); ?><span class="price-suffix">/ engagement</span></div>
                    </div>
                    <p class="mb-lg"><?php echo esc_html( $desc ); ?></p>
                    <a href="#cta" class="btn btn-small w-100">Inquire for Availability →</a>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-front bg-light">
    <div class="container narrow-container text-center">
        <span class="section-tag mb-xs"><?php echo esc_html( get_theme_mod('ea_newsletter_tag', 'The Institutional Brief') ); ?></span>
        <h2 class="mb-sm"><?php echo esc_html( get_theme_mod('ea_newsletter_title', 'Join 2,400+ C-Suite Leaders') ); ?></h2>
        <p class="mb-lg"><?php echo esc_html( get_theme_mod('ea_newsletter_desc', 'Get bi-weekly leadership architecture and acquisition strategies delivered directly to your inbox.') ); ?></p>

        <form action="<?php echo esc_url( get_theme_mod( 'ea_form_action_url', '#' ) ); ?>" method="POST" class="newsletter-inline-form">
            <input type="email" name="EMAIL" placeholder="<?php echo esc_attr( get_theme_mod('ea_form_placeholder_newsletter', 'Work Email Address') ); ?>" required>
            <button type="submit" class="btn"><?php echo esc_html( get_theme_mod('ea_newsletter_btn', 'Join Briefing →') ); ?></button>
        </form>
    </div>
</section>

<!-- CTA / Form Section -->
<section id="cta" class="final-cta">
    <div class="container narrow-container text-center">
        <h2 class="text-white mb-sm"><?php echo esc_html( get_theme_mod( 'ea_cta_title', 'Ready to exit the content hamster wheel?' ) ); ?></h2>
        <p class="text-white mb-xl opacity-90"><?php echo esc_html( get_theme_mod( 'ea_cta_subheadline', 'Book your strategic diagnostic session today.' ) ); ?></p>

        <?php
        $cta_form = get_theme_mod('ea_cta_form_code');
        if ( $cta_form ) :
            echo '<div class="cta-form-container">' . do_shortcode($cta_form) . '</div>';
        else : ?>
            <!-- Form Placeholder -->
            <div class="cta-form-container card">
                <p class="form-placeholder-title mb-xxs"><?php echo esc_html( get_theme_mod('ea_form_title_cta', '[Lead Qualification Form Placeholder]') ); ?></p>
                <p class="form-placeholder-desc"><?php echo esc_html( get_theme_mod('ea_form_desc_cta', '(Use Step 1: Work Email -> Step 2: Executive Qualifier)') ); ?></p>
            </div>
        <?php endif; ?>

        <div class="compliance-row mt-lg">
            <p><?php echo esc_html( get_theme_mod( 'ea_cta_compliance', '✓ STRICTLY CONFIDENTIAL | ✓ NO HIGH-PRESSURE SALES | ✓ C-SUITE OPTIMIZED' ) ); ?></p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
