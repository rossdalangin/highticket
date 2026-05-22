<?php
/**
 * Template Name: Strategic Asset Library
 */
get_header(); ?>

<div class="resources-page animate-in">
    <section class="archive-header bg-light">
        <div class="container narrow-container text-center">
            <span class="section-tag mb-xs"><?php esc_html_e('Executive Asset Library', 'executive-acquisition'); ?></span>
            <h1 class="mb-sm"><?php echo esc_html( get_theme_mod('ea_resources_headline', 'Institutional Whitepapers & Strategic Frameworks') ); ?></h1>
            <p class="subheadline opacity-80"><?php echo esc_html( get_theme_mod('ea_resources_subheadline', 'Complimentary resources for scaling Founders and C-Suite leaders navigating institutional complexity.') ); ?></p>
        </div>
    </section>

    <section class="asset-grid-section">
        <div class="container">
            <div class="grid-3">
                <?php
                $resources = get_posts( array('post_type' => 'resource', 'posts_per_page' => -1) );
                if ($resources) :
                    foreach ($resources as $res) : ?>
                        <article class="card asset-card animate-in">
                            <div class="asset-icon mb-md">
                                <?php
                                $icon = get_post_meta($res->ID, '_ea_res_icon', true) ?: '.PDF';
                                echo esc_html($icon);
                                ?>
                            </div>
                            <h3 class="mb-sm"><?php echo get_the_title($res->ID); ?></h3>
                            <div class="mb-lg flex-grow"><?php echo get_the_excerpt($res->ID); ?></div>
                            <a href="<?php echo get_permalink($res->ID); ?>" class="btn btn-small"><?php esc_html_e('Access Resource →', 'executive-acquisition'); ?></a>
                        </article>
                    <?php endforeach;
                else: ?>
                    <!-- Fallback Strategic Assets if no CPTs exist -->
                    <article class="card asset-card animate-in">
                        <div class="asset-icon mb-md">.PDF</div>
                        <h3 class="mb-sm"><?php esc_html_e('The 2024 Leadership Retention Audit', 'executive-acquisition'); ?></h3>
                        <p class="mb-lg flex-grow"><?php esc_html_e('A technical breakdown of the 4 primary revenue leaks in mid-market leadership teams.', 'executive-acquisition'); ?></p>
                        <a href="<?php echo esc_url( get_theme_mod( 'ea_lead_magnet_url', '#' ) ); ?>" class="btn btn-small"><?php esc_html_e('Download Framework →', 'executive-acquisition'); ?></a>
                    </article>

                    <article class="card asset-card animate-in">
                        <div class="asset-icon mb-md">.MAP</div>
                        <h3 class="mb-sm"><?php echo esc_html( get_theme_mod('ea_lead_magnet_title', 'The Institutional Intent Roadmap') ); ?></h3>
                        <p class="mb-lg flex-grow"><?php esc_html_e('Map your acquisition sequence from anonymous visitor to $25k engagement.', 'executive-acquisition'); ?></p>
                        <a href="<?php echo esc_url( get_theme_mod( 'ea_lead_magnet_url', '#' ) ); ?>" class="btn btn-small"><?php esc_html_e('Download Roadmap →', 'executive-acquisition'); ?></a>
                    </article>

                    <article class="card asset-card animate-in">
                        <div class="asset-icon mb-md">.DOC</div>
                        <h3 class="mb-sm"><?php esc_html_e('C-Suite Communication Protocol', 'executive-acquisition'); ?></h3>
                        <p class="mb-lg flex-grow"><?php esc_html_e('Strategic scripts for internal stakeholder buy-in during high-ticket leadership pivots.', 'executive-acquisition'); ?></p>
                        <a href="<?php echo esc_url( get_theme_mod( 'ea_lead_magnet_url', '#' ) ); ?>" class="btn btn-small"><?php esc_html_e('Download Protocol →', 'executive-acquisition'); ?></a>
                    </article>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
