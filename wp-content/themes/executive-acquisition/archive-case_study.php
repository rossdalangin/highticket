<?php get_header(); ?>

<section class="archive-header bg-light">
    <div class="container text-center narrow-container">
        <span class="section-tag mb-xs">ROI & Track Record</span>
        <h1 class="mb-sm">Institutional Success Stories</h1>
        <p class="subheadline opacity-80">Documented ROI and strategic transformations delivered via the Institutional Intent Method™.</p>
    </div>
</section>

<section class="case-studies-archive">
    <div class="container post-layout-grid">
        <div class="archive-main">
            <div class="archive-posts-grid">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="card archive-card case-study-card">
                        <span class="card-tag mb-xs">Case Study</span>
                        <h2 class="archive-post-title mb-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="case-impact-metric mb-md">
                            <strong>Impact:</strong> <?php echo esc_html( get_post_meta( get_the_ID(), '_ea_case_revenue', true ) ?: '+300% ROI' ); ?>
                        </div>
                        <div class="archive-post-excerpt mb-lg"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="archive-read-more mt-auto">View ROI Analysis →</a>
                    </article>
                <?php endwhile; else : ?>
                    <div class="no-results-box">
                        <p><?php esc_html_e( 'No case studies published yet.', 'executive-acquisition' ); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </div>
</section>

<?php get_footer(); ?>
