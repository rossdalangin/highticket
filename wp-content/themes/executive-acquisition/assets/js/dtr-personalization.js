(function($) {
    /**
     * Executive Acquisition: Funnel Logic & Aesthetics
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

    // 2. Dynamic Text Replacement (DTR)
    const urlParams = new URLSearchParams(window.location.search);
    const replacements = {
        'company': urlParams.get('company') || 'your organization',
        'name': urlParams.get('name') || 'Executive'
    };

    $('*').each(function() {
        let content = $(this).html();
        if (content && content.includes('{')) {
            for (const [key, value] of Object.entries(replacements)) {
                const regex = new RegExp(`{${key}}`, 'g');
                content = content.replace(regex, value);
            }
            $(this).html(content);
        }
    });

    // 3. Animate In
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                $(entry.target).addClass('animate-in');
            }
        });
    }, { threshold: 0.1 });

    $('.card, .step-card, .section-title, .hero-content').each(function() {
        observer.observe(this);
    });

    // 4. Simulated Exit-Intent (if enabled)
    let exitIntentShown = false;
    $(document).on('mouseleave', function(e) {
        if (e.clientY < 0 && !exitIntentShown) {
            // In a real theme, we would check a global JS variable set by PHP Customizer
            // For now, we simulate the logic
            console.log('Exit Intent Triggered: Offering Final ROI Diagnostic.');
            exitIntentShown = true;
        }
    });

})(jQuery);
