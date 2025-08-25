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
            <h1 class="wise-wolves-main-title">
                <?php 
                $hero_title = get_field('hero_section_title');
                echo $hero_title ? wp_kses($hero_title, ['strong' => [], 'em' => [], 'b' => [], 'i' => [], 'span' => []]) : 'Wise Wolves';
                ?>
            </h1>
        </div>
    </section>

</main>

<?php get_footer(); ?>
