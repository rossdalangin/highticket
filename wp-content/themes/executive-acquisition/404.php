<?php get_header(); ?>

<div class="error-404-page animate-in">
    <div class="container narrow-container text-center">
        <span class="section-tag mb-xs">404 Error</span>
        <h1 class="mb-sm">Strategic Detour.</h1>
        <p class="subheadline mb-xl opacity-80">The resource you're looking for has moved or no longer exists. Let's get you back on track.</p>

        <div class="error-actions">
            <a href="<?php echo home_url(); ?>" class="btn mb-md">Return to Command Center</a>
            <div class="mt-lg">
                <p class="mb-sm">Or search our Strategy Archive:</p>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
