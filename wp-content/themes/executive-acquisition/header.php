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

    <style>
        :root {
            --accent-color: <?php echo get_theme_mod( 'ea_accent_color', '#C5A059' ); ?>;
            --border-radius: <?php echo get_theme_mod( 'ea_border_radius', '2px' ); ?>;
            --h1-size: clamp(2.75rem, 8vw, <?php echo get_theme_mod( 'ea_h1_size_rem', '4.75' ); ?>rem);
        }
    </style>
</head>
<body <?php body_class( (get_theme_mod( 'ea_enable_night_mode' ) ? 'executive-night-mode ' : '') . 'design-preset-' . get_theme_mod( 'ea_design_preset', 'unisex' ) ); ?>>
<?php
if ( $gtm_id ) : ?>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr( $gtm_id ); ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php endif; ?>

<?php wp_body_open(); ?>

<div id="mobile-overlay" class="mobile-overlay"></div>

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

        <nav id="site-navigation" class="main-navigation">
            <div class="menu-container">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                ) );
                ?>
            </div>
        </nav>

        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
            <span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'executive-acquisition' ); ?></span>
        </button>

        <a href="<?php echo esc_url( get_theme_mod('ea_header_cta_url', '#cta') ); ?>" class="btn btn-small header-cta"><?php echo esc_html( get_theme_mod('ea_header_cta_text', 'Get Started') ); ?></a>
    </div>
</header>
<main id="primary" class="site-main">
