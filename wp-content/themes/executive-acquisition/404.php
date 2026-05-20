<?php get_header(); ?>

<section class="error-404" style="padding: 120px 0; text-align: center; background: var(--light-bg); min-height: 70vh; display: flex; align-items: center;">
    <div class="container" style="max-width: 700px;">
        <h1 style="font-size: 6rem; color: var(--accent-color); margin-bottom: 20px;">404</h1>
        <h2 style="font-size: 2.5rem; margin-bottom: 20px;">Executive Asset Not Found</h2>
        <p style="font-size: 1.2rem; margin-bottom: 40px;">The page you are looking for has been moved or doesn't exist. However, your path to a predictable acquisition system is still open.</p>

        <div class="error-actions">
            <a href="<?php echo home_url(); ?>" class="btn">Return to Infrastructure</a>
            <p style="margin-top: 30px; font-size: 0.9rem; opacity: 0.7;">Or search for specific insights:</p>
            <div style="max-width: 400px; margin: 20px auto;">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
