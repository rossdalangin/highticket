<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <article class="case-study-article">
        <header class="archive-header bg-light">
            <div class="container text-center narrow-container">
                <span class="section-tag mb-xs">Institutional Case Study</span>
                <h1 class="mb-sm"><?php the_title(); ?></h1>
                <div class="case-meta-header opacity-70">
                    <?php echo get_the_date(); ?> • Board-Ready ROI Analysis
                </div>
            </div>
        </header>

        <div class="container post-layout-grid">
            <div class="case-study-main">
                <div class="case-content post-content animate-in">
                    <?php the_content(); ?>
                </div>

                <!-- ROI Calculator Visualization -->
                <div class="roi-visualization-box card mt-xl">
                    <h3 class="mb-md">Board-Ready ROI Summary</h3>
                    <div class="results-grid">
                        <div class="results-box">
                            <span class="label">Primary Impact</span>
                            <span class="value"><?php echo esc_html( get_post_meta( get_the_ID(), '_ea_case_impact', true ) ?: 'Institutional Growth' ); ?></span>
                        </div>
                        <div class="results-box">
                            <span class="label">Revenue Velocity</span>
                            <span class="value"><?php echo esc_html( get_post_meta( get_the_ID(), '_ea_case_revenue', true ) ?: '+312%' ); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="case-study-sidebar">
                <div class="cta-sidebar card">
                    <h4 class="mb-sm">Ready for Similar Results?</h4>
                    <p class="mb-md opacity-80">Discover how the Institutional Intent Method™ can be applied to your specific organization.</p>
                    <a href="<?php echo home_url('/#cta'); ?>" class="btn w-100 btn-small">Book Diagnostic →</a>
                </div>

                <div class="institutional-trust-box card mt-lg">
                    <div class="author-avatar mb-md">
                        <?php
                        $f_img = get_theme_mod('ea_founder_image');
                        if ($f_img) echo '<img src="'.esc_url($f_img).'" class="avatar-img">';
                        ?>
                    </div>
                    <p class="author-bio-small">“The cost of inaction in the corporate segment is often invisible until it's too late. We engineer the visibility you need.”</p>
                    <p class="mt-sm"><strong><?php echo esc_html(get_theme_mod('ea_founder_name', 'Executive Strategist')); ?></strong></p>
                </div>
            </aside>
        </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>
