jQuery(document).ready(function($) {
    'use strict';

    /**
     * Executive Acquisition: Master Theme Controller
     * Handles: FAQ, Navigation, Sticky Header, Scroll Animations, and Personalization (DTR)
     */

    // 1. FAQ Accordion Logic
    $('.faq-question').on('click', function() {
        const item = $(this).closest('.faq-item');
        const answer = item.find('.faq-answer');

        // Close others for a clean experience
        $('.faq-item').not(item).removeClass('active').find('.faq-answer').slideUp(300);

        // Toggle current
        item.toggleClass('active');
        answer.slideToggle(300);
    });

    // 2. Sticky Header Class
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });

    // 3. Mobile Menu Toggle with Drawer & Animation
    $('.menu-toggle').on('click', function(e) {
        e.preventDefault();
        const isExpanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !isExpanded);
        $(this).toggleClass('toggled');
        $('.main-navigation').toggleClass('toggled');
        $('#mobile-overlay').fadeToggle(300);
        $('body').toggleClass('no-scroll');
    });

    // 4. Close mobile menu on overlay click or link click
    $('#mobile-overlay, .nav-menu a').on('click', function() {
        $('.menu-toggle').removeClass('toggled').attr('aria-expanded', 'false');
        $('.main-navigation').removeClass('toggled');
        $('#mobile-overlay').fadeOut(300);
        $('body').removeClass('no-scroll');
    });

    // 5. Intersection Observer for Scroll Animations
    if ('IntersectionObserver' in window) {
        const observerOptions = { threshold: 0.1 };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    // Once visible, stop observing to save resources
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        $('.animate-in').each(function() {
            observer.observe(this);
        });
    } else {
        // Fallback for older browsers
        $('.animate-in').addClass('visible');
    }

    // 6. GTM DataLayer for Forms
    $(document).on('submit', 'form', function() {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event': 'form_submission',
            'form_id': $(this).attr('id') || 'unspecified'
        });
    });

    /**
     * 7. Dynamic Text Replacement (DTR)
     * Replaces content of elements with class 'dtr' based on URL parameters.
     * Example: ?name=John replaces <span class="dtr" data-dtr="name">Friend</span> with John.
     */
    const urlParams = new URLSearchParams(window.location.search);
    $('.dtr').each(function() {
        const key = $(this).data('dtr');
        if (urlParams.has(key)) {
            $(this).text(urlParams.get(key));
        }
    });

    // Briefing Page Redirect Logic
    if ($('.briefing-page').length && window.location.pathname.includes('/briefing/')) {
        // Handle any briefing specific client-side logic here
    }
});
