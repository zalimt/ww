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
            <h1 class="wise-wolves-main-title">Wise Wolves</h1>
            <p class="wise-wolves-subtitle">Welcome to our digital ecosystem where wisdom meets innovation. Discover stories, insights, and experiences that shape our pack.</p>
            <a href="#content" class="wise-wolves-cta">Explore Our Pack</a>
        </div>
    </section>

    <!-- Content Section -->
    <section class="wise-wolves-content" id="content">
        <div class="container">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <div class="page-content">
                        <?php the_content(); ?>
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>

            <!-- Latest Posts Section -->
            <div class="wise-wolves-posts-section">
                <h2 class="wise-wolves-section-title">Latest from the Pack</h2>
                
                <div class="wise-wolves-posts">
                    <?php
                    $recent_posts = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'post_status' => 'publish'
                    ));
                    
                    if ($recent_posts->have_posts()) : ?>
                        <div class="posts-grid">
                            <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                                <article class="wise-wolves-post-card">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="post-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        
                                        <div class="post-excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        
                                        <div class="post-meta">
                                            <time datetime="<?php echo get_the_date('c'); ?>">
                                                <?php echo get_the_date(); ?>
                                            </time>
                                        </div>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <p>No posts found. Start creating content to populate your Wise Wolves pack!</p>
                    <?php endif; ?>
                    
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
            
        </div>
    </section>

</main>

<?php get_footer(); ?>
