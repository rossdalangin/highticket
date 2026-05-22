(function($) {
    'use strict';

    /**
     * Executive Acquisition: Navigation & Funnel Interactions
     */

    // Mobile Menu Toggle
    $('.menu-toggle').on('click', function(e) {
        e.preventDefault();
        var $nav = $('.main-navigation');
        var isExpanded = $(this).attr('aria-expanded') === 'true';

        $nav.toggleClass('toggled');
        $('body').toggleClass('menu-open');
        $(this).attr('aria-expanded', !isExpanded);

        if (!isExpanded) {
            $('body').css('overflow', 'hidden');
        } else {
            $('body').css('overflow', '');
        }
    });

    // Close menu when clicking the overlay
    $('.mobile-overlay').on('click', function() {
        $('.main-navigation').removeClass('toggled');
        $('body').removeClass('menu-open').css('overflow', '');
        $('.menu-toggle').attr('aria-expanded', 'false');
    });

    // Close menu on link click
    $('.nav-menu a').on('click', function() {
        $('.main-navigation').removeClass('toggled');
        $('body').removeClass('menu-open').css('overflow', '');
        $('.menu-toggle').attr('aria-expanded', 'false');
    });

    // Sticky Header Scroll
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 50) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });

    // GTM DataLayer for Forms
    $(document).on('submit', 'form', function() {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event': 'form_submission',
            'form_id': $(this).attr('id') || 'unspecified'
        });
    });

    /**
     * Dynamic Text Replacement (DTR)
     * Replaces content of elements with class 'dtr' based on URL parameters.
     * Example: ?name=John will replace <span class="dtr" data-dtr="name">Friend</span> with John.
     */
    const urlParams = new URLSearchParams(window.location.search);
    $('.dtr').each(function() {
        const key = $(this).data('dtr');
        if (urlParams.has(key)) {
            $(this).text(urlParams.get(key));
        }
    });

})(jQuery);
