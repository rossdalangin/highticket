<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">

    <!-- SEO & Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <div class="container header-inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
            <?php bloginfo( 'name' ); ?>
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
