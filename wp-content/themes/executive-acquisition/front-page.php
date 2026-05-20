<?php get_header(); ?>

<!-- Section 1: Above-the-Fold (The Hook) -->
<section class="hero">
    <div class="container hero-grid">
        <div class="hero-content">
            <span class="pre-headline"><?php echo esc_html( get_theme_mod( 'ea_hero_pre_headline' ) ); ?></span>
            <h1><?php echo wp_kses_post( get_theme_mod( 'ea_hero_headline' ) ); ?></h1>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">Our proprietary "Client Acquisition Infrastructure" identifies anonymous corporate decision-makers in your ecosystem and builds instant institutional trust.</p>
            <a href="#cta" class="btn"><?php echo esc_html( get_theme_mod( 'ea_hero_cta_text' ) ); ?></a>
            <p style="font-size: 0.8rem; margin-top: 1rem; opacity: 0.8;">Takes 12 minutes. No 'salesy' fluff. Pure strategy.</p>
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
<section class="logo-bar" style="padding: 40px 0; background: var(--white); border-bottom: 1px solid #eee;">
    <div class="container" style="text-align: center;">
        <p style="font-size: 0.75rem; font-weight: 700; letter-spacing: 2px; color: var(--accent-color); margin-bottom: 25px;"><?php echo esc_html( get_theme_mod( 'ea_logo_bar_text', 'TRUSTED BY LEADERS AT:' ) ); ?></p>
        <div class="logo-grid" style="display: flex; justify-content: center; gap: 60px; filter: grayscale(1); opacity: 0.6; align-items: center; flex-wrap: wrap;">
            <!-- Placeholder Logos -->
            <div style="font-weight: 900; font-size: 1.2rem;">FORBES</div>
            <div style="font-weight: 900; font-size: 1.2rem;">INC.</div>
            <div style="font-weight: 900; font-size: 1.2rem;">HBR</div>
            <div style="font-weight: 900; font-size: 1.2rem;">FAST CO.</div>
            <div style="font-weight: 900; font-size: 1.2rem;">DELOITTE</div>
        </div>
    </div>
</section>

<!-- Section 2: Agitation (The Pain) -->
<section style="background-color: var(--light-bg);">
    <div class="container">
        <div class="section-title">
            <h2><?php echo esc_html( get_theme_mod( 'ea_agitation_title', "The 'High-Ticket' Paradox: Why Your Expertise Isn't Converting Into Calendars" ) ); ?></h2>
            <p>Despite your experience, your current acquisition strategy is likely leaking revenue in three critical areas:</p>
        </div>
        <div class="grid-3">
            <?php for ($i = 1; $i <= 3; $i++) :
                $title = get_theme_mod( "ea_agitation_bullet_{$i}_title" );
                $text = get_theme_mod( "ea_agitation_bullet_{$i}_text" );

                // Fallbacks
                if (!$title && $i == 1) $title = 'The "Content Hamster Wheel" Burnout';
                if (!$text && $i == 1) $text = 'You’re spending hours crafting "thought leadership" that gets likes from peers but is ignored by the VPs and Founders who actually have the budget to hire you.';
                if (!$title && $i == 2) $title = 'The "Cold Outreach" Reputation Tax';
                if (!$text && $i == 2) $text = 'Using automated LinkedIn bots or generic email blasts doesn\'t just fail; it actively burns your brand with the C-Suite.';
                if (!$title && $i == 3) $title = 'The "Discovery Call" Trap';
                if (!$text && $i == 3) $text = 'Your calendar is filled with "free consults" that lead to "let me think about it." You’re wasting executive time on prospects who can’t afford your $10k+ engagements.';
                ?>
                <div class="card">
                    <h3 style="font-size: 1.2rem;"><?php echo esc_html( $title ); ?></h3>
                    <p style="font-size: 0.95rem;"><?php echo esc_html( $text ); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Featured Testimonial -->
<?php
$quote = get_theme_mod( 'ea_testimonial_quote' );
if ( $quote ) : ?>
<section class="testimonial-featured" style="background: var(--primary-color); color: var(--white); padding: 100px 0;">
    <div class="container" style="max-width: 900px; text-align: center;">
        <div style="font-size: 4rem; font-family: var(--font-heading); line-height: 1; color: var(--accent-color); margin-bottom: -20px;">“</div>
        <blockquote style="font-size: 2rem; font-family: var(--font-heading); font-style: italic; margin-bottom: 30px;"><?php echo esc_html( $quote ); ?></blockquote>
        <p style="font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--accent-color);"><?php echo esc_html( get_theme_mod( 'ea_testimonial_author' ) ); ?></p>
    </div>
</section>
<?php endif; ?>

<!-- Section 3: The Mechanism -->
<section style="background-color: var(--white);">
    <div class="container">
        <div class="section-title">
            <h2><?php echo esc_html( get_theme_mod( 'ea_mechanism_title', 'Introducing: The Institutional Intent Method™' ) ); ?></h2>
            <p>A 3-Step Predictive System to Turn Anonymous Decision-Makers into High-Value Partners.</p>
        </div>
        <div class="grid-3">
            <?php for ($i = 1; $i <= 3; $i++) :
                $title = get_theme_mod( "ea_mechanism_step_{$i}_title" );
                $text = get_theme_mod( "ea_mechanism_step_{$i}_text" );

                // Fallbacks
                if (!$title && $i == 1) $title = 'The Decision-Maker Beacon';
                if (!$text && $i == 1) $text = 'We identify the exact VPs and Founders who are currently searching for leadership solutions using intent-based data.';
                if (!$title && $i == 2) $title = 'The Authority Infrastructure';
                if (!$text && $i == 2) $text = 'We replace your "sales funnel" with an Institutional Asset—a high-level briefing that builds 6 months of trust in 12 minutes.';
                if (!$title && $i == 3) $title = 'The Frictionless Conversion Gate';
                if (!$text && $i == 3) $text = 'We implement a qualification protocol that filters out everyone except those ready to engage at your $5k–$25k price point.';
                ?>
                <div class="step-card" style="text-align: center;">
                    <div style="font-size: 3rem; color: var(--accent-color); font-weight: 900; margin-bottom: 10px;">0<?php echo $i; ?></div>
                    <h3 style="font-size: 1.3rem;"><?php echo esc_html( $title ); ?></h3>
                    <p><?php echo esc_html( $text ); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- CTA / Form Section -->
<section id="cta" style="background-color: var(--primary-color); color: var(--white);">
    <div class="container" style="max-width: 600px; text-align: center;">
        <h2 style="color: var(--white);">Apply for Your Private Executive Briefing</h2>
        <p style="margin-bottom: 40px;">Select a time below to see the architecture behind the Institutional Intent Method™ and how it can be applied to your coaching practice.</p>

        <!-- Form Placeholder -->
        <div style="background: var(--white); padding: 30px; border-radius: 8px; color: var(--text-color);">
            <p style="font-weight: 700;">[Lead Qualification Form Placeholder]</p>
            <p style="font-size: 0.9rem;">(Use Step 1: Work Email -> Step 2: Executive Qualifier)</p>
        </div>

        <div style="margin-top: 30px; font-size: 0.8rem; opacity: 0.8;">
            <p>✓ Strictly Confidential | ✓ No High-Pressure Sales | ✓ C-Suite Optimized</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
