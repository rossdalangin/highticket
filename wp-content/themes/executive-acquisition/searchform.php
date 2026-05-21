<?php
/**
 * The template for displaying search forms
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-form-inner">
        <label>
            <span class="screen-reader-text">Search for:</span>
            <input type="search" class="search-field" placeholder="Search strategy..." value="<?php echo get_search_query(); ?>" name="s" />
        </label>
        <button type="submit" class="search-submit">
            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <span class="screen-reader-text">Search</span>
        </button>
    </div>
</form>
