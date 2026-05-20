<?php get_header(); ?>

<section style="padding: 100px 0;">
    <div class="container" style="max-width: 900px;">
        <?php while ( have_posts() ) : the_post(); ?>
            <h1 style="margin-bottom: 40px;"><?php the_title(); ?></h1>
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
