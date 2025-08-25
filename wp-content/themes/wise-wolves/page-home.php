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
                // Display ACF field content (WYSIWYG field allows HTML)
                echo '<h1 class="wise-wolves-main-title">' . $hero_title . '</h1>';
            } else {
                // Fallback if field is empty
                echo '<h1 class="wise-wolves-main-title">Wise Wolves</h1>';
            }
            ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
