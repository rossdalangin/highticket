<aside id="secondary" class="widget-area" style="padding-left: 40px; border-left: 1px solid rgba(0,0,0,0.05);">
    <!-- Search Widget -->
    <div class="widget-box" style="margin-bottom: 50px;">
        <h3 style="font-size: 1.1rem; margin-bottom: 20px;">Strategy Search</h3>
        <?php get_search_form(); ?>
    </div>

    <!-- CTA Widget -->
    <div class="widget-box" style="margin-bottom: 50px; padding: 40px; background: var(--primary-color); border-radius: 4px; color: #fff; text-align: center;">
        <span style="color: var(--accent-color); font-weight: 700; letter-spacing: 1px; font-size: 0.75rem; text-transform: uppercase;">Next Step</span>
        <h3 style="color: #fff; font-size: 1.3rem; margin: 15px 0;">Predict Your Pipeline</h3>
        <p style="font-size: 0.85rem; opacity: 0.8; margin-bottom: 25px;">Access the 12-minute briefing on the Institutional Intent Method™.</p>
        <a href="<?php echo home_url('/#cta'); ?>" class="btn" style="padding: 0.8rem 1.5rem; font-size: 0.75rem; width: 100%;">View Briefing</a>
    </div>

    <!-- Categories Widget -->
    <div class="widget-box" style="margin-bottom: 50px;">
        <h3 style="font-size: 1.1rem; margin-bottom: 20px;">Insights by Category</h3>
        <ul style="list-style: none; padding: 0;">
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
    <div class="widget-box">
        <h3 style="font-size: 1.1rem; margin-bottom: 20px;">Recent Strategy</h3>
        <ul style="list-style: none; padding: 0;">
            <?php
            $recent_posts = wp_get_recent_posts( array( 'numberposts' => 4, 'post_status' => 'publish' ) );
            foreach( $recent_posts as $post ) : ?>
                <li style="margin-bottom: 15px;">
                    <a href="<?php echo get_permalink($post['ID']); ?>" style="text-decoration: none; color: var(--primary-color); font-weight: 700; font-size: 0.95rem; line-height: 1.4;"><?php echo $post['post_title']; ?></a>
                    <div style="font-size: 0.75rem; opacity: 0.6;"><?php echo get_the_date('', $post['ID']); ?></div>
                </li>
            <?php endforeach; wp_reset_query(); ?>
        </ul>
    </div>
</aside>

<style>
    .widget-box ul li { border-bottom: 1px solid rgba(0,0,0,0.03); padding: 10px 0; font-size: 0.95rem; }
    .widget-box ul li a { text-decoration: none; color: var(--text-color); }
    .widget-box ul li:last-child { border: none; }
</style>
