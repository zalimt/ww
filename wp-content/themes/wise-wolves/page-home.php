<?php
/**
 * Template Name: Wise Wolves Home Page
 * 
 * Custom home page template for Wise Wolves
 * 
 * @package Wise_Wolves
 * @since 1.0.0
 */

$background_style = '';
$hero_background = get_field('hero_section_background');
if (is_array($hero_background)) {
    $hero_background = $hero_background['url'];
}
if ($hero_background) {
    $background_style = 'style="background-image: url(' . esc_url($hero_background) . ');"';
}

get_header(); ?>

<main class="wise-wolves-home">
    
    <!-- Hero Section -->
    <section class="wise-wolves-hero" <?php echo $background_style; ?>>
        <div class="container">
            <h1 class="wise-wolves-main-title">
                <?php 
                $hero_title = get_field('hero_section_title');
                echo $hero_title ? wp_kses($hero_title, ['strong' => [], 'em' => [], 'b' => [], 'i' => [], 'span' => []]) : 'Wise Wolves';
                ?>
            </h1>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about-us" class="wise-wolves-about">
        <div class="container">
            <h2>About Us</h2>
            <!-- Add your about content here -->
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="wise-wolves-news">
        <div class="container">
            <h2>News</h2>
            <!-- Add your news content here -->
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="wise-wolves-services">
        <div class="container">
            <h2>Our Services</h2>
            <!-- Add your services content here -->
        </div>
    </section>

    <!-- Career Section -->
    <section id="career" class="wise-wolves-career">
        <div class="container">
            <h2>Career</h2>
            <!-- Add your career content here -->
        </div>
    </section>

    <!-- Contacts Section -->
    <section id="contacts" class="wise-wolves-contacts">
        <div class="container">
            <h2>Contacts</h2>
            <!-- Add your contacts content here -->
        </div>
    </section>

</main>

<?php get_footer(); ?>