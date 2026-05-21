<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    $gtm_id = get_theme_mod( 'ea_gtm_id' );
    if ( $gtm_id ) : ?>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?php echo esc_js( $gtm_id ); ?>');</script>
        <!-- End Google Tag Manager -->
    <?php endif; ?>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if ( is_singular() ) : ?>
        <meta name="description" content="<?php echo esc_attr( wp_trim_words( get_the_excerpt(), 25 ) ); ?>">
    <?php else : ?>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <?php endif; ?>

    <!-- Advanced SEO & Schema -->
    <?php
    $og_image = get_theme_mod( 'ea_og_image' );
    if ( $og_image ) : ?>
        <meta property="og:image" content="<?php echo esc_url( $og_image ); ?>">
    <?php endif; ?>

    <?php
    $manual_schema = get_theme_mod( 'ea_schema_json' );
    if ( $manual_schema ) {
        echo $manual_schema;
    } else {
        // Dynamic Schema Generation
        $founder = get_theme_mod('ea_founder_name', get_bloginfo('name'));
        $logo = get_theme_mod('ea_executive_logo', '');
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "ProfessionalService",
            "name" => get_bloginfo('name'),
            "description" => get_bloginfo('description'),
            "url" => home_url(),
            "founder" => [
                "@type" => "Person",
                "name" => $founder
            ]
        ];
        if ($logo) $schema["image"] = $logo;
        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';

        // Breadcrumb Schema for SEO
        if ( is_singular() && !is_front_page() ) {
            $breadcrumbs = [
                "@context" => "https://schema.org",
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    [
                        "@type" => "ListItem",
                        "position" => 1,
                        "name" => "Home",
                        "item" => home_url()
                    ],
                    [
                        "@type" => "ListItem",
                        "position" => 2,
                        "name" => get_the_title(),
                        "item" => get_permalink()
                    ]
                ]
            ];
            echo '<script type="application/ld+json">' . json_encode($breadcrumbs) . '</script>';
        }
    }
    ?>

    <!-- SEO & Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="canonical" href="<?php echo esc_url( get_permalink() ); ?>" />

    <?php
    echo get_theme_mod( 'ea_header_scripts' );
    wp_head();
    ?>

    <!-- Dynamic Customizer Styles -->
    <style>
        :root {
            --accent-color: <?php echo get_theme_mod( 'ea_accent_color', '#C5A059' ); ?>;
            --border-radius: <?php echo get_theme_mod( 'ea_border_radius', '2px' ); ?>;
        }
        .btn, .card, .step-card, .results-box, .booking-sidebar { border-radius: var(--border-radius); }

        <?php if ( ! get_theme_mod( 'ea_enable_animations', true ) ) : ?>
        .animate-in { opacity: 1 !important; transform: none !important; animation: none !important; }
        <?php endif; ?>
    </style>
</head>
<body <?php body_class( get_theme_mod( 'ea_enable_night_mode' ) ? 'executive-night-mode' : '' ); ?>>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'executive-acquisition' ); ?></a>
<?php
if ( $gtm_id ) : ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr( $gtm_id ); ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
<?php endif; ?>

<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container header-inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
            <?php
            $logo = get_theme_mod( 'ea_executive_logo' );
            if ( $logo ) : ?>
                <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
            <?php else : ?>
                <?php bloginfo( 'name' ); ?>
            <?php endif; ?>
        </a>

        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>

        <nav id="primary-menu" class="main-nav">
            <div class="mobile-nav-header">
                <div class="mobile-nav-close-row text-center mb-md">
                    <span class="close-nav-text">Close Navigation</span>
                </div>
                <div class="mobile-search-row mb-lg">
                    <?php get_search_form(); ?>
                </div>
                <div class="mobile-logo">
                    <?php if ( $logo ) : ?>
                        <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                    <?php else : ?>
                        <?php bloginfo( 'name' ); ?>
                    <?php endif; ?>
                </div>
            </div>

            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-list',
            ) );
            ?>

            <div class="mobile-nav-footer">
                <div class="menu-featured-asset mb-lg">
                    <span class="featured-asset-label">Recommended Strategy</span>
                    <span class="featured-asset-title"><?php echo esc_html( get_theme_mod('ea_lead_magnet_title', 'The Institutional Intent Roadmap') ); ?></span>
                    <a href="<?php echo esc_url( get_theme_mod('ea_lead_magnet_url', '#') ); ?>" class="btn btn-small w-100">Download Framework</a>
                </div>
                <div class="mobile-cta-box mb-lg">
                    <a href="#cta" class="btn w-100">Book Diagnostic Session</a>
                </div>
                <div class="mobile-social-links mb-lg">
                    <?php if ( get_theme_mod('ea_linkedin_url') ) : ?><a href="<?php echo esc_url(get_theme_mod('ea_linkedin_url')); ?>" class="social-link">LinkedIn</a><?php endif; ?>
                    <?php if ( get_theme_mod('ea_twitter_url') ) : ?><a href="<?php echo esc_url(get_theme_mod('ea_twitter_url')); ?>" class="social-link">X / Twitter</a><?php endif; ?>
                </div>
                <div class="mobile-utility-links">
                    <button id="ea-night-mode-toggle" class="mode-toggle mb-md">
                        <span class="light-text">Light Mode</span>
                        <span class="mode-separator">|</span>
                        <span class="night-text">Executive Night</span>
                    </button>
                    <p class="font-xs opacity-50">&copy; <?php echo date('Y'); ?> Executive Acquisition. Built for C-Suite conversion.</p>
                </div>
            </div>
        </nav>

        <a href="#cta" class="btn btn-small header-cta">Get Started</a>
    </div>
</header>
