<?php get_header(); ?>

<div class="default-page animate-in" id="primary">
    <div class="container narrow-container">
        <?php while ( have_posts() ) : the_post(); ?>
            <article class="page-article">
                <header class="page-header mb-lg text-center">
                    <h1 class="mb-sm"><?php the_title(); ?></h1>
                </header>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
