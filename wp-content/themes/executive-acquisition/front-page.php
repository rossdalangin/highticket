<?php get_header(); ?>

<!-- Section 1: Above-the-Fold (The Hook) -->
<?php
$hero_h1_def = 'Book $25k+ Corporate Engagements Every Month Using Institutional Intent Mapping WITHOUT the Content Hamster Wheel or Cold Outreach.';
$hero_sub_def = 'Identify anonymous C-Suite decision-makers and build instant institutional trust with a predictable, intent-driven acquisition engine—even if you have no current corporate pipeline.';
if ( $hero_h1 = get_theme_mod('ea_hero_headline', $hero_h1_def) ) : ?>
<section id="primary" class="hero animate-in">
    <div class="container hero-grid">
        <div class="hero-content">
            <?php if ( $pre = get_theme_mod('ea_hero_pre_headline', 'Strictly for Executive Coaches targeting the C-Suite:') ) : ?>
                <span class="pre-headline mb-xs"><?php echo esc_html($pre); ?></span>
            <?php endif; ?>

            <h1 class="mb-sm"><?php echo wp_kses_post($hero_h1); ?></h1>

            <?php if ( $sub = get_theme_mod('ea_hero_subheadline', $hero_sub_def) ) : ?>
                <p class="mb-lg"><?php echo esc_html($sub); ?></p>
            <?php endif; ?>

            <?php
            $hero_cta_type = get_theme_mod( 'ea_hero_cta_type', 'button' );
            if ( 'button' === $hero_cta_type ) :
                if ( $cta = get_theme_mod('ea_hero_cta_text', 'Access the Private Executive Briefing →') ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod('ea_hero_cta_url', '#cta') ); ?>" class="btn"><?php echo esc_html($cta); ?></a>
                <?php endif;
            else :
                $hero_form = get_theme_mod( 'ea_hero_form_code' );
                if ( $hero_form ) :
                    echo '<div class="hero-inline-form-wrapper">' . do_shortcode( $hero_form ) . '</div>';
                endif;
            endif;
            ?>

            <?php if ( $micro = get_theme_mod('ea_hero_micro_copy', 'Takes 12 minutes. No \'salesy\' fluff. Pure strategy.') ) : ?>
                <p class="hero-micro-copy mt-sm"><?php echo esc_html($micro); ?></p>
            <?php endif; ?>
        </div>
        <div class="hero-media">
            <?php
            $hero_media_type = get_theme_mod( 'ea_hero_media_type', 'video' );
            $video_url = get_theme_mod( 'ea_hero_video_url' );
            $hero_img = get_theme_mod( 'ea_hero_image' );
            $hero_form = get_theme_mod( 'ea_hero_form_code' );

            if ( 'form' === $hero_media_type && $hero_form ) :
                echo '<div class="hero-form-wrapper card">' . do_shortcode( $hero_form ) . '</div>';
            elseif ( 'image' === $hero_media_type && $hero_img ) : ?>
                <div class="hero-image-box">
                    <img src="<?php echo esc_url( $hero_img ); ?>" alt="Executive Briefing" class="img-fluid hero-main-img">
                </div>
            <?php elseif ( 'video' === $hero_media_type && $video_url ) : ?>
                <div class="hero-video">
                    <iframe src="<?php echo esc_url( $video_url ); ?>" fetchpriority="high" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php else : ?>
                <div class="hero-video video-placeholder">
                    <p>Executive Media Placeholder</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

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
<?php
$ag_title_def = "The 'High-Ticket' Paradox: Why Your Expertise Isn't Converting";
if ( $ag_title = get_theme_mod('ea_agitation_title', $ag_title_def) ) : ?>
<section class="agitation-section bg-light">
    <div class="container">
        <div class="section-title mb-xl text-center">
            <?php if ($ag_tag = get_theme_mod('ea_agitation_pre_headline', 'The Cost of Invisibility')) : ?>
                <span class="section-tag"><?php echo esc_html($ag_tag); ?></span>
            <?php endif; ?>
            <h2><?php echo esc_html( $ag_title ); ?></h2>
            <?php if ($ag_sub = get_theme_mod('ea_agitation_subheadline', 'The hidden costs of the content hamster wheel.')) : ?>
                <p class="subheadline"><?php echo esc_html($ag_sub); ?></p>
            <?php endif; ?>
        </div>

        <div class="side-image-layout reverse">
            <div class="content-side">
                <div class="agitation-bullets">
                    <?php
                    $ag_defaults = array(
                        1 => array('title' => 'The Content Hamster Wheel', 'text'  => 'Wasting executive hours on low-conversion LinkedIn posts that attract "vanity metrics" instead of institutional decision-makers.'),
                        2 => array('title' => 'Brand Reputation Erosion', 'text'  => 'Burning C-Suite bridges with low-quality automated outreach that signals desperation rather than institutional authority.'),
                        3 => array('title' => 'The Discovery Call Drain', 'text'  => 'Filling your calendar with unqualified leads who lack the budget or the institutional authority to trigger a $25k engagement.')
                    );
                    for ($i = 1; $i <= 3; $i++) :
                        $title = get_theme_mod( "ea_agitation_bullet_{$i}_title", $ag_defaults[$i]['title'] );
                        $text = get_theme_mod( "ea_agitation_bullet_{$i}_text", $ag_defaults[$i]['text'] );
                        if ( $title || $text ) :
                        ?>
                        <div class="card agitation-card mb-md">
                            <?php if ($title) : ?><h3 class="mb-xs"><?php echo esc_html( $title ); ?></h3><?php endif; ?>
                            <?php if ($text) : ?><p><?php echo esc_html( $text ); ?></p><?php endif; ?>
                        </div>
                    <?php endif; endfor; ?>
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
<?php endif; ?>

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
<?php
$m_title_def = 'The Institutional Intent Engine';
if ( $m_title = get_theme_mod('ea_mechanism_title', $m_title_def) ) : ?>
<section class="mechanism-section bg-white">
    <div class="container">
        <div class="section-title mb-xl text-center">
            <?php if ($m_tag = get_theme_mod('ea_mechanism_pre_headline', 'The Institutional Intent Engine™')) : ?>
                <span class="section-tag"><?php echo esc_html($m_tag); ?></span>
            <?php endif; ?>
            <h2><?php echo esc_html( $m_title ); ?></h2>
            <?php if ($m_sub = get_theme_mod('ea_mechanism_subheadline', 'A predictable, intent-driven acquisition system.')) : ?>
                <p class="subheadline"><?php echo esc_html($m_sub); ?></p>
            <?php endif; ?>
        </div>

        <div class="side-image-layout">
            <div class="content-side">
                <div class="steps-list">
                    <?php
                    $m_defaults = array(
                        1 => array('title' => 'Intent Beacon Identification', 'text'  => 'We deploy proprietary tracking that identifies anonymous VP and C-Suite visitors before they ever fill out a form.'),
                        2 => array('title' => 'Institutional Trust Anchoring', 'text'  => 'Our Authority Bridge sequence builds instant boardroom-level trust, positioning you as the only logical solution.'),
                        3 => array('title' => 'Strategic Diagnostic Conversion', 'text'  => 'Move highly-qualified leads directly into a high-leverage diagnostic session to finalize $10k–$25k engagements.')
                    );
                    for ($i = 1; $i <= 3; $i++) :
                        $title = get_theme_mod( "ea_mechanism_step_{$i}_title", $m_defaults[$i]['title'] );
                        $text = get_theme_mod( "ea_mechanism_step_{$i}_text", $m_defaults[$i]['text'] );
                        if ( $title || $text ) :
                        ?>
                        <div class="step-card mb-lg">
                            <div class="step-number mb-xs">0<?php echo $i; ?></div>
                            <?php if ($title) : ?><h3 class="mb-sm"><?php echo esc_html( $title ); ?></h3><?php endif; ?>
                            <?php if ($text) : ?><p><?php echo esc_html( $text ); ?></p><?php endif; ?>
                        </div>
                    <?php endif; endfor; ?>
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
<?php endif; ?>

<!-- FAQ Section (CPT Driven) -->
<?php
$f_title_def = 'Strategic Clarifications';
if ( $f_title = get_theme_mod('ea_faq_title', $f_title_def) ) : ?>
<section class="faq bg-light">
    <div class="container">
        <div class="section-title mb-xl text-center">
            <h2><?php echo esc_html( $f_title ); ?></h2>
            <?php if ($f_sub = get_theme_mod('ea_faq_subheadline', 'Common questions regarding the acquisition engine.')) : ?>
                <p><?php echo esc_html($f_sub); ?></p>
            <?php endif; ?>
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
                <?php
                $faq_defs = array(
                    1 => array('q' => 'How does the Intent Beacon identify anonymous visitors?', 'a' => 'We utilize B2B identity resolution technology that matches corporate IP addresses and browser fingerprints against institutional databases.'),
                    2 => array('q' => 'Does this system work for boutique coaching firms?', 'a' => 'Yes. It is specifically designed to level the playing field, allowing boutique firms to project the same institutional authority as global consultancies.'),
                    3 => array('q' => 'What is the typical timeframe for ROI?', 'a' => 'Most clients see their first identified "High-Intent" lead within 14 days of system deployment, with full funnel stabilization in 45 days.'),
                    4 => array('q' => 'Is this a specialized CRM or a lead gen service?', 'a' => 'It is a hybrid infrastructure—combining proprietary conversion psychology with automated identification tech that feeds into your existing CRM.')
                );
                for ($i = 1; $i <= 4; $i++) :
                    $q = get_theme_mod( "ea_faq_q_{$i}", $faq_defs[$i]['q'] );
                    $a = get_theme_mod( "ea_faq_a_{$i}", $faq_defs[$i]['a'] );
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
<?php endif; ?>

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
<?php
$t_title_def = 'Institutional Engagement Tiers';
if ( $t_title = get_theme_mod('ea_tiers_title', $t_title_def) ) : ?>
<section class="engagement-tiers bg-white">
    <div class="container">
        <div class="section-title mb-xl text-center">
            <?php if ($t_tag = get_theme_mod('ea_tiers_tag', 'Strategic Engagement')) : ?>
                <span class="section-tag"><?php echo esc_html($t_tag); ?></span>
            <?php endif; ?>
            <h2><?php echo esc_html( $t_title ); ?></h2>
            <?php if ($t_sub = get_theme_mod('ea_tiers_subheadline', 'Quantifiable ROI for Every Stage of Organizational Growth.')) : ?>
                <p class="subheadline"><?php echo esc_html($t_sub); ?></p>
            <?php endif; ?>
        </div>
        <div class="grid-2">
            <?php
            $tier_defs = array(
                1 => array('name'  => 'Strategic Advisory', 'price' => '$10,000', 'desc'  => 'Intensive 90-day engagement focused on leadership architecture and authority infrastructure deployment.'),
                2 => array('name'  => 'Institutional Retainer', 'price' => '$25,000', 'desc'  => 'Full-scale acquisition engine management, intent mapping, and executive stakeholder alignment for mid-market orgs.')
            );
            for ($i = 1; $i <= 2; $i++) :
                $name = get_theme_mod( "ea_tier_{$i}_name", $tier_defs[$i]['name'] );
                $price = get_theme_mod( "ea_tier_{$i}_price", $tier_defs[$i]['price'] );
                $desc = get_theme_mod( "ea_tier_{$i}_desc", $tier_defs[$i]['desc'] );
                if ( $name || $price ) :
                ?>
                <div class="card tier-card animate-in">
                    <div class="tier-header mb-md">
                        <?php if ($name) : ?><h3 class="mb-xxs"><?php echo esc_html( $name ); ?></h3><?php endif; ?>
                        <?php if ($price) : ?><div class="tier-price text-accent"><?php echo esc_html( $price ); ?><span class="price-suffix">/ engagement</span></div><?php endif; ?>
                    </div>
                    <?php if ($desc) : ?><p class="mb-lg"><?php echo esc_html( $desc ); ?></p><?php endif; ?>
                    <a href="<?php echo esc_url( get_theme_mod("ea_tier_{$i}_url", "#cta") ); ?>" class="btn btn-small w-100">Inquire for Availability →</a>
                </div>
            <?php endif; endfor; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Newsletter Section -->
<?php
$n_title_def = 'Join 2,400+ C-Suite Leaders';
if ( $n_title = get_theme_mod('ea_newsletter_title', $n_title_def) ) : ?>
<section class="newsletter-front bg-light">
    <div class="container narrow-container text-center">
        <?php if ($n_tag = get_theme_mod('ea_newsletter_tag', 'The Institutional Brief')) : ?>
            <span class="section-tag mb-xs"><?php echo esc_html($n_tag); ?></span>
        <?php endif; ?>
        <h2 class="mb-sm"><?php echo esc_html( $n_title ); ?></h2>
        <?php if ($n_desc = get_theme_mod('ea_newsletter_desc', 'Get bi-weekly leadership architecture and acquisition strategies delivered directly to your inbox.')) : ?>
            <p class="mb-lg"><?php echo esc_html($n_desc); ?></p>
        <?php endif; ?>

        <form action="<?php echo esc_url( get_theme_mod( 'ea_form_action_url', '#' ) ); ?>" method="POST" class="newsletter-inline-form">
            <input type="email" name="EMAIL" placeholder="<?php echo esc_attr( get_theme_mod('ea_form_placeholder_newsletter', 'Work Email Address') ); ?>" required>
            <button type="submit" class="btn"><?php echo esc_html( get_theme_mod('ea_newsletter_btn', 'Join Briefing →') ); ?></button>
        </form>
    </div>
</section>
<?php endif; ?>

<!-- CTA / Form Section -->
<?php
$c_title_def = 'Ready to exit the content hamster wheel and book $25k engagements on autopilot?';
if ( $c_title = get_theme_mod('ea_cta_title', $c_title_def) ) : ?>
<section id="cta" class="final-cta">
    <div class="container narrow-container text-center">
        <h2 class="text-white mb-sm"><?php echo esc_html( $c_title ); ?></h2>
        <?php if ($c_sub = get_theme_mod('ea_cta_subheadline', 'Book your strategic diagnostic session today.')) : ?>
            <p class="text-white mb-xl opacity-90"><?php echo esc_html($c_sub); ?></p>
        <?php endif; ?>

        <?php
        $cta_type = get_theme_mod( 'ea_cta_type', 'shortcode' );
        if ( 'button' === $cta_type ) : ?>
            <div class="cta-btn-wrapper">
                <a href="<?php echo esc_url( get_theme_mod('ea_cta_btn_url', '/diagnostic-session') ); ?>" class="btn">
                    <?php echo esc_html( get_theme_mod('ea_cta_btn_text', 'Book Your Diagnostic Session →') ); ?>
                </a>
            </div>
        <?php else :
            $cta_form = get_theme_mod('ea_cta_form_code');
            if ( $cta_form ) :
                echo '<div class="cta-form-container">' . do_shortcode($cta_form) . '</div>';
            else : ?>
                <!-- Form Placeholder -->
                <div class="cta-form-container card">
                    <p class="form-placeholder-title mb-xxs"><?php echo esc_html( get_theme_mod('ea_form_title_cta', '[Lead Qualification Form Placeholder]') ); ?></p>
                    <p class="form-placeholder-desc"><?php echo esc_html( get_theme_mod('ea_form_desc_cta', '(Use Step 1: Work Email -> Step 2: Executive Qualifier)') ); ?></p>
                </div>
            <?php endif;
        endif; ?>

        <div class="compliance-row mt-lg">
            <p><?php echo esc_html( get_theme_mod( 'ea_cta_compliance', '✓ STRICTLY CONFIDENTIAL | ✓ NO HIGH-PRESSURE SALES | ✓ C-SUITE OPTIMIZED' ) ); ?></p>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
