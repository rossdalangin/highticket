<aside id="secondary" class="widget-area sidebar-container">
    <!-- Search Widget -->
    <div class="widget-box search-widget">
        <h3 class="widget-title">Strategy Search</h3>
        <?php get_search_form(); ?>
    </div>

    <!-- Dynamic CTA Widget -->
    <div class="widget-box sidebar-cta">
        <span class="sidebar-tag">Next Step</span>
        <h3 class="sidebar-cta-title"><?php echo esc_html( get_theme_mod('ea_sidebar_cta_title', 'Predict Your Pipeline') ); ?></h3>
        <p class="sidebar-cta-desc"><?php echo esc_html( get_theme_mod('ea_sidebar_cta_desc', 'Access the 12-minute briefing on the Institutional Intent Method™.') ); ?></p>
        <a href="<?php echo home_url('/#cta'); ?>" class="btn sidebar-cta-btn">View Briefing</a>
    </div>

    <!-- Newsletter Widget -->
    <div class="widget-box sidebar-newsletter">
        <h3 class="widget-title"><?php echo esc_html( get_theme_mod('ea_newsletter_title', 'The Institutional Brief') ); ?></h3>
        <p class="sidebar-newsletter-desc"><?php echo esc_html( get_theme_mod('ea_newsletter_desc', 'Bi-weekly strategic insights.') ); ?></p>
        <form action="<?php echo esc_url( get_theme_mod( 'ea_form_action_url', '#' ) ); ?>" method="POST">
            <input type="email" name="EMAIL" placeholder="Work Email" required>
            <button type="submit" class="btn newsletter-submit">Join Briefing →</button>
        </form>
    </div>

    <!-- Categories Widget -->
    <div class="widget-box sidebar-categories">
        <h3 class="widget-title">Insights by Category</h3>
        <ul class="sidebar-list">
            <?php
            wp_list_categories( array(
                'title_li' => '',
                'style'    => 'list',
                'show_count' => true,
            ) );
            ?>
        </ul>
    </div>

    <!-- Recent Posts Widget -->
    <div class="widget-box sidebar-recent">
        <h3 class="widget-title">Recent Strategy</h3>
        <ul class="sidebar-list">
            <?php
            $recent_posts = wp_get_recent_posts( array( 'numberposts' => 4, 'post_status' => 'publish' ) );
            foreach( $recent_posts as $post ) : ?>
                <li class="sidebar-recent-item">
                    <a href="<?php echo get_permalink($post['ID']); ?>" class="sidebar-recent-link"><?php echo $post['post_title']; ?></a>
                    <div class="sidebar-recent-date"><?php echo get_the_date('', $post['ID']); ?></div>
                </li>
            <?php endforeach; wp_reset_query(); ?>
        </ul>
    </div>
</aside>
