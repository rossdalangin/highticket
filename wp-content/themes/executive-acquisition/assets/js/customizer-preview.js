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
            $('section:has(.grid-3) h2').first().text(newval);
        });
    });

    // Agitation Bullets - Loop for 3
    for(let i=1; i<=3; i++) {
        wp.customize('ea_agitation_bullet_'+i+'_title', function(value) {
            value.bind(function(newval) {
                $('.card:nth-child('+i+') h3').text(newval);
            });
        });
        wp.customize('ea_agitation_bullet_'+i+'_text', function(value) {
            value.bind(function(newval) {
                $('.card:nth-child('+i+') p').text(newval);
            });
        });
    }

    // Mechanism
    wp.customize('ea_mechanism_title', function(value) {
        value.bind(function(newval) {
            $('.mechanism-section h2').text(newval);
        });
    });

    // Mechanism Steps - Loop for 3
    for(let i=1; i<=3; i++) {
        wp.customize('ea_mechanism_step_'+i+'_title', function(value) {
            value.bind(function(newval) {
                $('.step-card:nth-child('+i+') h3').text(newval);
            });
        });
        wp.customize('ea_mechanism_step_'+i+'_text', function(value) {
            value.bind(function(newval) {
                $('.step-card:nth-child('+i+') p').text(newval);
            });
        });
    }

    // FAQ - Comprehensive Preview for all 4
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

    // Compliance
    wp.customize('ea_cookie_notice', function(value) {
        value.bind(function(newval) {
            console.log('Compliance Update:', newval);
        });
    });

    // Brand Assets
    wp.customize('ea_executive_logo', function(value) {
        value.bind(function(newval) {
            if(newval) {
                $('.logo').html('<img src="'+newval+'" style="max-height: 40px; width: auto;">');
            }
        });
    });

})(jQuery);
