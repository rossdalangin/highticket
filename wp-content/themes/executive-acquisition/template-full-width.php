<?php
/**
 * Template Name: Full Width (Page Builder Friendly)
 */
get_header(); ?>

<div class="full-width-container">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<style>
    .full-width-container { width: 100%; }
    .entry-content > section { padding: 100px 0; }
</style>

<?php get_footer(); ?>
