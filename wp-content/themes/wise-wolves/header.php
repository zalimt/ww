<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/favicon.png' ); ?>" sizes="32x32" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/favicon.png' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    
    <header id="masthead" class="wise-wolves-header site-header" role="banner">
        <div class="wise-wolves-header-container">
            <div class="wise-wolves-logo-section">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wise-wolves-logo-link" rel="home">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/wisewolves-logo-white.svg' ); ?>" 
                         alt="<?php bloginfo( 'name' ); ?>" 
                         class="wise-wolves-logo">
                </a>
            </div>
            <nav class="wise-wolves-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'wise-wolves' ); ?>">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'wise-wolves-primary',
                    'menu_id'        => 'wise-wolves-primary-menu',
                    'menu_class'     => 'wise-wolves-nav-menu',
                    'container'      => false,
                    'fallback_cb'    => 'wise_wolves_fallback_menu',
                ) );
                ?>
            </nav>
            <button class="wise-wolves-mobile-toggle" aria-label="<?php esc_attr_e( 'Toggle navigation', 'wise-wolves' ); ?>">
                <span class="wise-wolves-hamburger"></span>
                <span class="wise-wolves-hamburger"></span>
                <span class="wise-wolves-hamburger"></span>
            </button>
            
        </div>
    </header>
    
    <div id="content" class="site-content">
