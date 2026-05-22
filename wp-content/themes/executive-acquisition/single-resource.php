<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <article class="resource-article">
        <header class="archive-header bg-light">
            <div class="container text-center narrow-container">
                <span class="section-tag mb-xs">Strategic Resource</span>
                <h1 class="mb-sm"><?php the_title(); ?></h1>
            </div>
        </header>

        <div class="container narrow-container">
            <div class="resource-content post-content animate-in card mt-xl">
                <?php the_content(); ?>

                <div class="resource-cta mt-xl pt-lg border-top">
                    <h4>Ready to Implement this Framework?</h4>
                    <p class="mb-lg">Schedule a strategic diagnostic to map these institutional outcomes to your specific organization.</p>
                    <a href="<?php echo home_url('/#cta'); ?>" class="btn">Apply for Diagnostic →</a>
                </div>
            </div>
        </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>
