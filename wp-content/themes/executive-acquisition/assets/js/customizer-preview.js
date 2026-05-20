(function($) {
    /**
     * Customizer Live Preview scripts
     */

    // Brand Identity
    wp.customize('ea_accent_color', function(value) {
        value.bind(function(newval) {
            $(':root').css('--accent-color', newval);
        });
    });

    wp.customize('ea_border_radius', function(value) {
        value.bind(function(newval) {
            $(':root').css('--border-radius', newval);
        });
    });

    // Profile
    wp.customize('ea_founder_name', function(value) {
        value.bind(function(newval) {
            $('.founder-content h2').text(newval);
        });
    });

    wp.customize('ea_founder_bio', function(value) {
        value.bind(function(newval) {
            $('.founder-content div').html(newval);
        });
    });

    // Hero
    wp.customize('ea_hero_pre_headline', function(value) {
        value.bind(function(newval) {
            $('.pre-headline').text(newval);
        });
    });

    wp.customize('ea_hero_headline', function(value) {
        value.bind(function(newval) {
            $('.hero-content h1').html(newval);
        });
    });

    wp.customize('ea_hero_cta_text', function(value) {
        value.bind(function(newval) {
            $('.hero-content .btn').text(newval);
        });
    });

    // Social Proof
    wp.customize('ea_logo_bar_text', function(value) {
        value.bind(function(newval) {
            $('.logo-bar p').text(newval);
        });
    });

    wp.customize('ea_testimonial_quote', function(value) {
        value.bind(function(newval) {
            $('.testimonial-featured blockquote').text(newval);
        });
    });

    wp.customize('ea_testimonial_author', function(value) {
        value.bind(function(newval) {
            $('.testimonial-featured p').text(newval);
        });
    });

    // Agitation
    wp.customize('ea_agitation_title', function(value) {
        value.bind(function(newval) {
            $('.faq-container').parent().parent().find('.section-title h2').text(newval); // This selector might be tricky if structure changes
            // More direct selector for the actual Agitation section
            $('section:has(.grid-3) h2').first().text(newval);
        });
    });

    // Mechanism
    wp.customize('ea_mechanism_title', function(value) {
        value.bind(function(newval) {
            $('.mechanism-section h2').text(newval);
        });
    });

    // FAQ - Loop for all 4
    for(let i=1; i<=4; i++) {
        wp.customize('ea_faq_q_'+i, function(value) {
            value.bind(function(newval) {
                $('.faq-item:nth-child('+i+') .faq-question').text(newval);
            });
        });
        wp.customize('ea_faq_a_'+i, function(value) {
            value.bind(function(newval) {
                $('.faq-item:nth-child('+i+') .faq-answer').text(newval);
            });
        });
    }

})(jQuery);
