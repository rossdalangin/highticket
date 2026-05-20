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
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">

    <!-- Advanced SEO & Schema -->
    <?php
    $og_image = get_theme_mod( 'ea_og_image' );
    if ( $og_image ) : ?>
        <meta property="og:image" content="<?php echo esc_url( $og_image ); ?>">
    <?php endif; ?>
    <?php echo get_theme_mod( 'ea_schema_json' ); ?>

    <!-- SEO & Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

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
<body <?php body_class(); ?>>
<?php
if ( $gtm_id ) : ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr( $gtm_id ); ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
<?php endif; ?>

<?php wp_body_open(); ?>

<header>
    <div class="container header-inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
            <?php
            $logo = get_theme_mod( 'ea_executive_logo' );
            if ( $logo ) : ?>
                <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" style="max-height: 40px; width: auto;">
            <?php else : ?>
                <?php bloginfo( 'name' ); ?>
            <?php endif; ?>
        </a>
        <nav class="main-nav">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-list',
            ) );
            ?>
        </nav>
        <a href="#cta" class="btn btn-small">Get Started</a>
    </div>
</header>
<style>
    .nav-list { display: flex; list-style: none; gap: 20px; }
    .nav-list a { text-decoration: none; color: var(--primary-color); font-weight: 600; font-size: 0.9rem; }
    .btn-small { padding: 0.5rem 1.2rem; font-size: 0.8rem; }
</style>
