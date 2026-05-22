<?php
/**
 * Template Name: About Us
 */
get_header(); ?>

<div class="about-page animate-in">
    <section class="about-hero bg-light">
        <div class="container narrow-container text-center">
            <span class="section-tag mb-xs"><?php echo esc_html( get_theme_mod('ea_about_tag', 'The Architecture of Authority') ); ?></span>
            <h1 class="mb-sm"><?php echo esc_html( get_theme_mod('ea_about_headline', 'We Engineer Institutional Trust for Elite Coaches.') ); ?></h1>
            <p class="subheadline opacity-80"><?php echo esc_html( get_theme_mod('ea_about_mission', "We engineer institutional trust for the world's most impactful leadership architects.") ); ?></p>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <div class="post-layout-grid">
                <div class="about-main post-content">
                    <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>

                    <div class="pillars-grid">
                        <div class="pillar-item">
                            <h3 class="mb-sm"><?php echo esc_html( get_theme_mod('ea_about_p1_title', 'Institutional Integrity') ); ?></h3>
                            <p><?php echo esc_html( get_theme_mod('ea_about_p1_desc', 'Acquisition should mirror the discretion of the boardroom.') ); ?></p>
                        </div>
                        <div class="pillar-item">
                            <h3 class="mb-sm"><?php echo esc_html( get_theme_mod('ea_about_p2_title', 'Predictable Precision') ); ?></h3>
                            <p><?php echo esc_html( get_theme_mod('ea_about_p2_desc', 'Identifying anonymous decision-makers through intent mapping.') ); ?></p>
                        </div>
                    </div>

                    <div class="experience-box mt-xl card">
                        <h3 class="mb-md"><?php echo esc_html( get_theme_mod('ea_about_exp_title', 'The Track Record') ); ?></h3>
                        <p><?php echo esc_html( get_theme_mod('ea_about_experience', 'Since 2012, we have been the silent architects behind the leadership transitions of over 150 mid-market organizations.') ); ?></p>
                    </div>
                </div>

                <aside class="about-sidebar">
                    <div class="founder-card card">
                        <div class="author-avatar mb-md">
                            <?php
                            $f_img = get_theme_mod('ea_founder_image');
                            if ($f_img) echo '<img src="'.esc_url($f_img).'" class="avatar-img">';
                            ?>
                        </div>
                        <h4 class="mb-xs"><?php echo esc_html(get_theme_mod('ea_founder_name', 'Executive Strategist')); ?></h4>
                        <p class="author-bio-small"><?php echo esc_html(get_theme_mod('ea_founder_bio', 'Specializing in leadership architecture for $5M+ organizations. Bridging the gap between vision and institutional scale.')); ?></p>
                        <div class="footer-social mt-md">
                            <?php if ( get_theme_mod('ea_linkedin_url', '#') ) : ?><a href="<?php echo esc_url(get_theme_mod('ea_linkedin_url', '#')); ?>" class="social-link">LinkedIn</a><?php endif; ?>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
