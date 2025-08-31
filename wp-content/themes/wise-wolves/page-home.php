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
    <section id="hero" class="wise-wolves-hero" <?php echo $background_style; ?>>
        <div class="container">
            <div class="title-wrapper">
                <h1 class="wise-wolves-main-title">
                    <?php 
                    $hero_title = get_field('hero_section_title');
                    echo $hero_title ? wp_kses($hero_title, ['strong' => [], 'em' => [], 'b' => [], 'i' => [], 'span' => []]) : 'Wise Wolves';
                    ?>
                </h1>
                <?php if ($hero_subtitle = get_field('hero_section_subtitle')): ?>
                <div class="wise-wolves-subtitle">
                    <?php echo wp_kses($hero_subtitle, ['strong' => [], 'em' => [], 'b' => [], 'i' => [], 'span' => []]); ?>
                </div>
                <?php endif; ?>
            </div>
            
            <?php 
            $btn_text = get_field('hero_section_btn_text');
            $btn_link = get_field('hero_section_btn_link');
            if ($btn_text && $btn_link): 
            ?>
            <div class="hero-button-wrapper">
                <a href="<?php echo esc_url($btn_link); ?>" class="ww-btn ww-btn-white">
                    <?php echo esc_html($btn_text); ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </section>
    
    <section id="wise-wolves-corporation" class="wise-wolves-corporation">
        <div class="container">
            <div class="corporation-content">
                <div class="corporation-header">
                    <div class="corporation-title-section">
                        <h2 class="corporation-title">
                            <?php echo esc_html(get_field('ww-corporation_title')); ?>
                        </h2>
                        <p class="corporation-subtitle">
                            <?php echo esc_html(get_field('ww-corporation_subtitle')); ?>
                        </p>
                    </div>
                    <div class="corporation-description">
                        <p><?php echo esc_html(get_field('ww-corporation_description')); ?></p>
                    </div>
                </div>

                <div class="corporation-services">
                    <?php 
                    $tabs = get_field('ww-corporation_tabs');
                    if ($tabs): ?>
                        <div class="services-grid">
                            <?php foreach ($tabs as $tab): ?>
                                <div class="service-item">
                                    <?php if ($tab['ww-corporation_tab_icon']): ?>
                                        <div class="service-icon">
                                            <img src="<?php echo esc_url($tab['ww-corporation_tab_icon']['url']); ?>" 
                                                 alt="<?php echo esc_attr($tab['ww-corporation_tab_icon']['alt']); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="service-title">
                                        <?php echo esc_html($tab['ww-corporation_tab_title']); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section id="ww-stats" class="ww-stats">
        <?php
        $stats_background = get_field('ww_stats_background');
        $background_style = '';
        if ($stats_background && is_array($stats_background) && isset($stats_background['url'])) {
            $background_style = 'style="background-image: url(' . esc_url($stats_background['url']) . ');"';
        }
        ?>
        <div class="stats-background" <?php echo $background_style; ?>></div>
        
        <div class="container">
            <div class="stats-content">
                <!-- First Row - Cards 1, 2, 3 (Equal width) -->
                <div class="stats-row stats-row-1">
                    <div class="stat-item">
                        <div class="stat-number">
                            <?php echo esc_html(get_field('ww_stats_card_1')['card_title']); ?>
                        </div>
                        <div class="stat-description">
                            <?php echo esc_html(get_field('ww_stats_card_1')['card_description']); ?>
                        </div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-number">
                            <?php echo esc_html(get_field('ww_stats_card_2')['card_title']); ?>
                        </div>
                        <div class="stat-description">
                            <?php echo esc_html(get_field('ww_stats_card_2')['card_description']); ?>
                        </div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-number">
                            <?php echo esc_html(get_field('ww_stats_card_3')['card_title']); ?>
                        </div>
                        <div class="stat-description">
                            <?php echo esc_html(get_field('ww_stats_card_3')['card_description']); ?>
                        </div>
                    </div>
                </div>

                <!-- Second Row - Cards 4, 5 (2/3 and 1/3 width) -->
                <div class="stats-row stats-row-2">
                    <div class="stat-item stat-card-special">
                        <div class="stat-number">
                            <?php echo esc_html(get_field('ww_stats_card_4')['card_title']); ?>
                        </div>
                        <div class="stat-description">
                            <?php echo esc_html(get_field('ww_stats_card_4')['card_description']); ?>
                        </div>
                    </div>

                    <div class="stat-item stat-card-special">
                        <div class="stat-number">
                            <?php echo esc_html(get_field('ww_stats_card_5')['card_title']); ?>
                        </div>
                        <div class="stat-description">
                            <?php echo esc_html(get_field('ww_stats_card_5')['card_description']); ?>
                        </div>
                    </div>
                </div>

                <!-- Third Row - Cards 6, 7, 8 (Equal width) -->
                <div class="stats-row stats-row-3">
                    <div class="stat-item">
                        <div class="stat-number">
                            <?php echo esc_html(get_field('ww_stats_card_6')['card_title']); ?>
                        </div>
                        <div class="stat-description">
                            <?php echo esc_html(get_field('ww_stats_card_6')['card_description']); ?>
                        </div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-number">
                            <?php echo esc_html(get_field('ww_stats_card_7')['card_title']); ?>
                        </div>
                        <div class="stat-description">
                            <?php echo esc_html(get_field('ww_stats_card_7')['card_description']); ?>
                        </div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-number">
                            <?php echo esc_html(get_field('ww_stats_card_8')['card_title']); ?>
                        </div>
                        <div class="stat-description">
                            <?php echo esc_html(get_field('ww_stats_card_8')['card_description']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="what-sets-us-apart" class="what-sets-us-apart">
        <div class="container">
            <div class="what-sets-content">
                <!-- Main Section -->
                <div class="what-sets-main">
                    <!-- Left Side - Venn Diagram Image -->
                    <div class="venn-diagram-section">
                        <h2 class="section-title">
                            <?php 
                            $title_content = get_field('what_sets_us_apart_title');
                            echo $title_content ? wp_kses($title_content, ['strong' => [], 'em' => [], 'b' => [], 'i' => [], 'span' => [], 'br' => []]) : 'What Sets Us Apart';
                            ?>
                        </h2>
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/what-sets-us-apart-img1.webp'); ?>" alt="What Sets Us Apart Venn Diagram" class="venn-diagram-image">
                    </div>

                    <!-- Right Side - Text and Portrait -->
                    <div class="content-section">
                        <div class="description-text">
                            <p><?php echo esc_html(get_field('what_sets_us_apart_paragraph')); ?></p>
                        </div>
                        
                        <div class="founder-portrait">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/what-sets-us-apart-img2.webp'); ?>" alt="Founder Portrait" class="portrait-image">
                        </div>
                    </div>
                </div>
                <div class="founder-section">
                    <div class="founder-header">
                        <h2 class="founder-title">
                            <?php echo esc_html(get_field('what_sets_us_apart_founder_title')); ?>
                        </h2>
                        <p class="founder-subtitle">
                            <?php echo esc_html(get_field('what_sets_us_apart_founder_subitle')); ?>
                        </p>
                    </div>
                    
                    <div class="founder-bio-box">
                        <?php
                        $box_bg = get_field('what_sets_us_apart_box_box_bg');
                        $box_bg_style = '';
                        if ($box_bg && is_array($box_bg) && isset($box_bg['url'])) {
                            $box_bg_style = 'style="background-image: url(' . esc_url($box_bg['url']) . ');"';
                        }
                        ?>
                        <div class="bio-background" <?php echo $box_bg_style; ?>></div>
                        <div class="bio-content">
                            <p><?php echo esc_html(get_field('what_sets_us_apart_box_description')); ?></p>
                        </div>
                        
                        <?php 
                        $btn_text = get_field('what_sets_us_apart_box_btn_text');
                        $btn_link = get_field('what_sets_us_apart_box_btn_link');
                        if ($btn_text && $btn_link): ?>
                            <div class="bio-button">
                                <a href="<?php echo esc_url($btn_link); ?>" class="ww-btn ww-btn-white">
                                    <?php echo esc_html($btn_text); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Presence Section -->
    <section id="global-presence" class="global-presence">
        <div class="container">
            <div class="global-presence-content">
                <!-- Left Side - Text Content -->
                <div class="global-text-section">
                    <h2 class="global-title">
                        <?php 
                        $global_title = get_field('global_presence_title');
                        echo $global_title ? wp_kses($global_title, ['strong' => [], 'em' => [], 'b' => [], 'i' => [], 'span' => [], 'br' => []]) : 'Global presence';
                        ?>
                    </h2>
                    
                    <div class="global-info-box">
                        <div class="info-box-content">
                            <?php 
                            $text_box_content = get_field('global_presence_text_box');
                            echo $text_box_content ? wp_kses($text_box_content, ['strong' => [], 'em' => [], 'b' => [], 'i' => [], 'span' => [], 'br' => [], 'p' => []]) : 'Operating globally with a presence in Cyprus, the UAE, and Switzerland.';
                            ?>
                        </div>
                    </div>
                    
                    <div class="global-description">
                        <p><?php echo esc_html(get_field('global_presence_description')); ?></p>
                    </div>
                </div>

                <!-- Right Side - Globe Image -->
                <div class="global-image-section">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/ww-global-presence.webp'); ?>" alt="Global Presence Map" class="global-presence-image">
                </div>
            </div>
        </div>
    </section>
    <section id="insights-news" class="insights-news">

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