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
                // Remove only block-level tags (p, div, etc.) but keep inline formatting (strong, em, span, etc.)
                $allowed_tags = '<strong><em><b><i><span><a><small><sup><sub>';
                $clean_title = strip_tags($hero_title, $allowed_tags);
                
                // Remove any wrapping paragraph tags specifically
                $clean_title = preg_replace('/<\/?p[^>]*>/', '', $clean_title);
                
                echo '<h1 class="wise-wolves-main-title">' . $clean_title . '</h1>';
            } else {
                // Fallback if field is empty
                echo '<h1 class="wise-wolves-main-title">Wise Wolves</h1>';
            }
            ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
