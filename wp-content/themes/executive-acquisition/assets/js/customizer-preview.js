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
            $('.sidebar-block h3').first().text(newval);
        });
    });

    wp.customize('ea_founder_bio', function(value) {
        value.bind(function(newval) {
            $('.founder-content div').html(newval);
        });
    });

    // About Page
    wp.customize('ea_about_mission', function(value) {
        value.bind(function(newval) {
            $('.about-main p').first().text(newval);
            $('.footer-brand p').text(newval);
        });
    });

    wp.customize('ea_about_experience', function(value) {
        value.bind(function(newval) {
            $('.about-main div').first().html(newval);
        });
    });

    // Contact Page
    wp.customize('ea_contact_inquiry_text', function(value) {
        value.bind(function(newval) {
            $('.contact-hero p').text(newval);
        });
    });

    wp.customize('ea_contact_office', function(value) {
        value.bind(function(newval) {
            $('.contact-details p').first().text(newval);
            $('.footer-contact p').first().html('<strong>Location:</strong> ' + newval);
        });
    });

    // Sidebar
    wp.customize('ea_sidebar_cta_title', function(value) {
        value.bind(function(newval) {
            $('#secondary .widget-box:nth-child(2) h3').text(newval);
        });
    });

    wp.customize('ea_sidebar_cta_desc', function(value) {
        value.bind(function(newval) {
            $('#secondary .widget-box:nth-child(2) p').text(newval);
        });
    });

    wp.customize('ea_newsletter_title', function(value) {
        value.bind(function(newval) {
            $('.newsletter-front h2').text(newval);
            $('#secondary .widget-box:nth-child(3) h3').text(newval);
        });
    });

    wp.customize('ea_newsletter_desc', function(value) {
        value.bind(function(newval) {
            $('.newsletter-front p').text(newval);
            $('#secondary .widget-box:nth-child(3) p').text(newval);
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

    wp.customize('ea_hero_subheadline', function(value) {
        value.bind(function(newval) {
            $('.hero-content p').first().text(newval);
        });
    });

    wp.customize('ea_hero_cta_text', function(value) {
        value.bind(function(newval) {
            $('.hero-content .btn').text(newval);
        });
    });

    wp.customize('ea_header_cta_text', function(value) {
        value.bind(function(newval) {
            $('.header-cta').text(newval);
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

    // Lead Magnet
    wp.customize('ea_lead_magnet_title', function(value) {
        value.bind(function(newval) {
            $('.asset-preview h2').text(newval);
        });
    });

    // Agitation
    wp.customize('ea_agitation_title', function(value) {
        value.bind(function(newval) {
            $('.agitation-section h2').first().text(newval);
        });
    });

    wp.customize('ea_agitation_subheadline', function(value) {
        value.bind(function(newval) {
            $('.agitation-section .section-title p').text(newval);
        });
    });

    // Agitation Bullets - Loop for 3
    for(let i=1; i<=3; i++) {
        wp.customize('ea_agitation_bullet_'+i+'_title', function(value) {
            value.bind(function(newval) {
                $('.agitation-section .card:nth-child('+i+') h3').text(newval);
            });
        });
        wp.customize('ea_agitation_bullet_'+i+'_text', function(value) {
            value.bind(function(newval) {
                $('.agitation-section .card:nth-child('+i+') p').text(newval);
            });
        });
    }

    // Mechanism
    wp.customize('ea_mechanism_title', function(value) {
        value.bind(function(newval) {
            $('.mechanism-section h2').text(newval);
        });
    });

    wp.customize('ea_mechanism_subheadline', function(value) {
        value.bind(function(newval) {
            $('.mechanism-section .section-title p').text(newval);
        });
    });

    // Mechanism Steps - Loop for 3
    for(let i=1; i<=3; i++) {
        wp.customize('ea_mechanism_step_'+i+'_title', function(value) {
            value.bind(function(newval) {
                $('.mechanism-section .step-card:nth-child('+i+') h3').text(newval);
            });
        });
        wp.customize('ea_mechanism_step_'+i+'_text', function(value) {
            value.bind(function(newval) {
                $('.mechanism-section .step-card:nth-child('+i+') p').text(newval);
            });
        });
    }

    // FAQ - Comprehensive Preview for all 4
    wp.customize('ea_faq_title', function(value) { value.bind(function(newval) { $('.faq h2').text(newval); }); });
    wp.customize('ea_faq_subheadline', function(value) { value.bind(function(newval) { $('.faq .section-title p').text(newval); }); });

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

    // Engagement Tiers
    for(let i=1; i<=2; i++) {
        wp.customize('ea_tier_'+i+'_name', function(value) { value.bind(function(newval) { $('.tier-card:nth-child('+i+') span').text(newval); }); });
        wp.customize('ea_tier_'+i+'_price', function(value) { value.bind(function(newval) { $('.tier-card:nth-child('+i+') div').text(newval); }); });
        wp.customize('ea_tier_'+i+'_desc', function(value) { value.bind(function(newval) { $('.tier-card:nth-child('+i+') p').text(newval); }); });
    }

    // Final CTA
    wp.customize('ea_cta_title', function(value) { value.bind(function(newval) { $('#cta h2').text(newval); }); });
    wp.customize('ea_cta_subheadline', function(value) { value.bind(function(newval) { $('#cta p').first().text(newval); }); });

    // Brand Assets
    wp.customize('ea_executive_logo', function(value) {
        value.bind(function(newval) {
            if(newval) {
                $('.logo').html('<img src="'+newval+'" style="max-height: 40px; width: auto;">');
                $('.footer-logo').html('<img src="'+newval+'" style="max-height: 40px; filter: brightness(0) invert(1);">');
            }
        });
    });

})(jQuery);
