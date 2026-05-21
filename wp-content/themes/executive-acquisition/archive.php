<?php get_header(); ?>

<section class="archive-header" style="background-color: var(--light-bg); padding: 60px 0;">
    <div class="container">
        <h1><?php the_archive_title(); ?></h1>
        <?php the_archive_description(); ?>
    </div>
</section>

<section class="blog-archive" style="padding: 100px 0;">
    <div class="container" style="display: grid; grid-template-columns: 2.5fr 1fr; gap: 80px;">
        <div class="archive-main">
            <div class="grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="card">
                        <h2 style="font-size: 1.4rem; margin-bottom: 15px;"><a href="<?php the_permalink(); ?>" style="text-decoration: none; color: var(--primary-color);"><?php the_title(); ?></a></h2>
                        <div style="font-size: 0.95rem; margin-bottom: 20px;"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>" style="font-weight: 700; color: var(--accent-color); text-decoration: none;">Read More →</a>
                    </article>
                <?php endwhile; endif; ?>
            </div>
        </div>

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </div>
</section>

<?php get_footer(); ?>
