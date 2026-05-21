<?php get_header(); ?>

<section class="archive-header">
    <div class="container">
        <h1>Executive Insights & Strategy</h1>
        <p>Advanced acquisition and leadership strategies for the modern executive coach.</p>
    </div>
</section>

<section class="blog-archive">
    <div class="container post-layout-grid">
        <div class="archive-main">
            <div class="archive-posts-grid">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="card archive-card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail-container" style="margin-bottom: 25px;">
                                <?php the_post_thumbnail( 'executive-card', array( 'class' => 'responsive-img' ) ); ?>
                            </div>
                        <?php endif; ?>
                        <h2 class="archive-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="archive-post-date"><?php echo get_the_date(); ?></div>
                        <div class="archive-post-excerpt"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="archive-read-more">Read Strategy →</a>
                    </article>
                <?php endwhile; endif; ?>
            </div>
        </div>

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </div>
</section>

<?php get_footer(); ?>
