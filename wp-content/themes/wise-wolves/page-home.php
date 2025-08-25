<?php
/**
 * Template Name: Wise Wolves Home Page
 * 
 * Custom home page template for Wise Wolves
 * 
 * @package Wise_Wolves
 * @since 1.0.0
 */

get_header(); ?>

<main class="wise-wolves-home">
    
    <!-- Hero Section -->
    <section class="wise-wolves-hero">
        <div class="container">
            <?php 
            // Get the ACF field value
            $hero_title = get_field('hero_section_title');
            
            if ($hero_title) {
                // Strip HTML tags and get clean text content for H1
                $clean_title = wp_strip_all_tags($hero_title);
                echo '<h1 class="wise-wolves-main-title">' . esc_html($clean_title) . '</h1>';
            } else {
                // Fallback if field is empty
                echo '<h1 class="wise-wolves-main-title">Wise Wolves</h1>';
            }
            ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
