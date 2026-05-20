<?php get_header(); ?>

<section class="archive-header" style="background-color: var(--light-bg); padding: 60px 0;">
    <div class="container">
        <h1><?php printf( esc_html__( 'Search Results for: %s', 'executive-acquisition' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </div>
</section>

<section class="search-results" style="padding: 80px 0;">
    <div class="container">
        <div class="grid-3">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="card">
                    <h2 style="font-size: 1.4rem; margin-bottom: 15px;"><a href="<?php the_permalink(); ?>" style="text-decoration: none; color: var(--primary-color);"><?php the_title(); ?></a></h2>
                    <div style="font-size: 0.95rem; margin-bottom: 20px;"><?php the_excerpt(); ?></div>
                    <a href="<?php the_permalink(); ?>" style="font-weight: 700; color: var(--accent-color); text-decoration: none;">View Detail →</a>
                </article>
            <?php endwhile; else : ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                    <h3>No insights found for that query.</h3>
                    <p>Try searching for different leadership or acquisition terms.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
