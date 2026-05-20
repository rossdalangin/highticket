(function($) {
    /**
     * Executive Acquisition: Funnel Logic, Aesthetics & Security
     */

    // 1. GTM DataLayer Tracking
    window.dataLayer = window.dataLayer || [];

    $(document).on('submit', 'form', function() {
        const email = $(this).find('input[type="email"]').val();
        if (email) {
            window.dataLayer.push({
                'event': 'Lead_Step1',
                'lead_source': 'Landing_Page_Funnel'
            });
        }

        const fee = $(this).find('select[name*="fee"]').val();
        if (fee && fee !== '<$2,500') {
            window.dataLayer.push({
                'event': 'Lead_Qualified',
                'lead_value': fee
            });
        }
    });

    $('#delayed-cta a').on('click', function() {
        window.dataLayer.push({
            'event': 'CTA_Click_Booking',
            'intent': 'Diagnostic_Session'
        });
    });

    // 2. Secure Dynamic Text Replacement (DTR)
    // Sanitizes input to prevent DOM-based XSS
    function sanitize(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    const urlParams = new URLSearchParams(window.location.search);
    const replacements = {
        'company': sanitize(urlParams.get('company') || 'your organization'),
        'name': sanitize(urlParams.get('name') || 'Executive')
    };

    // Performance & Security Fix:
    // Only search within headlines, paragraphs and spans that likely contain placeholders
    $('h1, h2, h3, p, span, .btn').each(function() {
        let el = $(this);
        // We use text replacement logic to avoid breaking existing HTML structure
        let content = el.html();
        if (content && content.includes('{')) {
            let hasReplaced = false;
            for (const [key, value] of Object.entries(replacements)) {
                const regex = new RegExp(`{${key}}`, 'g');
                if (regex.test(content)) {
                    content = content.replace(regex, value);
                    hasReplaced = true;
                }
            }
            if (hasReplaced) {
                el.html(content);
            }
        }
    });

    // 3. Animate In (Intersection Observer)
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                $(entry.target).addClass('animate-in');
            }
        });
    }, { threshold: 0.1 });

    $('.card, .step-card, .section-title, .hero-content, .founder-section').each(function() {
        observer.observe(this);
    });

    // 4. Exit-Intent Logic
    let exitIntentShown = false;
    $(document).on('mouseleave', function(e) {
        if (e.clientY < 0 && !exitIntentShown) {
            $('#ea-exit-intent').css('display', 'flex');
            exitIntentShown = true;
            window.dataLayer.push({'event': 'Exit_Intent_Triggered'});
        }
    });

    $('#close-exit').on('click', function() {
        $('#ea-exit-intent').fadeOut();
    });

    // 5. Header Scroll Class
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 50) {
            $('header').addClass('scrolled');
        } else {
            $('header').removeClass('scrolled');
        }
    });

})(jQuery);
