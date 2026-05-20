<?php
/**
 * Template Name: Resource Asset Library
 */
get_header(); ?>

<section class="archive-header" style="background-color: var(--light-bg); padding: 80px 0;">
    <div class="container" style="max-width: 900px; text-align: center;">
        <span style="color: var(--accent-color); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem; display: block; margin-bottom: 10px;">Executive Asset Library</span>
        <h1 style="font-size: 3.5rem; line-height: 1.1;">Institutional Whitepapers & Strategic Frameworks</h1>
        <p style="font-size: 1.2rem; margin-top: 20px; opacity: 0.8;">Complimentary resources for scaling Founders and C-Suite leaders navigating institutional complexity.</p>
    </div>
</section>

<section class="asset-grid" style="padding: 100px 0;">
    <div class="container">
        <div class="grid-3">
            <!-- Sample Asset 1 -->
            <article class="card animate-in" style="display: flex; flex-direction: column;">
                <div style="background: var(--primary-color); padding: 30px; border-radius: 4px; margin-bottom: 25px; text-align: center; color: var(--accent-color); font-weight: 900; font-size: 1.5rem;">.PDF</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 15px;">The 2024 Leadership Retention Audit</h3>
                <p style="font-size: 0.95rem; margin-bottom: 25px; flex-grow: 1;">A technical breakdown of the 4 primary revenue leaks in mid-market leadership teams.</p>
                <a href="<?php echo esc_url( get_theme_mod( 'ea_lead_magnet_url', '#' ) ); ?>" class="btn" style="padding: 1rem; text-align: center; font-size: 0.8rem;">Download Framework →</a>
            </article>

            <!-- Sample Asset 2 -->
            <article class="card animate-in" style="display: flex; flex-direction: column;">
                <div style="background: var(--primary-color); padding: 30px; border-radius: 4px; margin-bottom: 25px; text-align: center; color: var(--accent-color); font-weight: 900; font-size: 1.5rem;">.MAP</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 15px;">The Institutional Intent Roadmap</h3>
                <p style="font-size: 0.95rem; margin-bottom: 25px; flex-grow: 1;">Map your acquisition sequence from anonymous visitor to $25k engagement.</p>
                <a href="<?php echo esc_url( get_theme_mod( 'ea_lead_magnet_url', '#' ) ); ?>" class="btn" style="padding: 1rem; text-align: center; font-size: 0.8rem;">Download Roadmap →</a>
            </article>

            <!-- Sample Asset 3 -->
            <article class="card animate-in" style="display: flex; flex-direction: column;">
                <div style="background: var(--primary-color); padding: 30px; border-radius: 4px; margin-bottom: 25px; text-align: center; color: var(--accent-color); font-weight: 900; font-size: 1.5rem;">.DOC</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 15px;">C-Suite Communication Protocol</h3>
                <p style="font-size: 0.95rem; margin-bottom: 25px; flex-grow: 1;">Strategic scripts for internal stakeholder buy-in during high-ticket leadership pivots.</p>
                <a href="<?php echo esc_url( get_theme_mod( 'ea_lead_magnet_url', '#' ) ); ?>" class="btn" style="padding: 1rem; text-align: center; font-size: 0.8rem;">Download Protocol →</a>
            </article>
        </div>
    </div>
</section>

<?php get_footer(); ?>
