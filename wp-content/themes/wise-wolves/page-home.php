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
        <?php
        $news_bg = get_field('insights_and_news_bg');
        $background_style = '';
        if ($news_bg && is_array($news_bg) && isset($news_bg['url'])) {
            $background_style = 'style="background-image: url(' . esc_url($news_bg['url']) . ');"';
        }
        ?>
        <div class="news-background" <?php echo $background_style; ?>></div>
        
        <div class="container">
            <div class="insights-news-content">
                <!-- Header Section -->
                <div class="news-header">
                    <div class="news-title-section">
                        <h2 class="news-title">
                            <?php echo esc_html(get_field('insights_and_news_title')); ?>
                        </h2>
                        <div class="newsroom-btn">Newsroom</div>
                    </div>
                    
                    <div class="news-description-section">
                        <p class="news-description">
                            <?php echo esc_html(get_field('insights_and_news_description')); ?>
                        </p>
                        <div class="slider-controls">
                            <button class="slider-arrow slider-prev" aria-label="Previous">
                                <
                            </button>
                            <button class="slider-arrow slider-next" aria-label="Next">
                                >
                            </button>
                        </div>
                    </div>
                </div>

                <!-- News Cards Slider -->
                <div class="news-slider-container">
                    <div class="news-slider">
                        <?php 
                        $news_cards = get_field('insights_and_news_card');
                        if ($news_cards): ?>
                            <?php foreach ($news_cards as $card): ?>
                                <?php if ($card['insights_and_news_card_link']): ?>
                                    <a href="<?php echo esc_url($card['insights_and_news_card_link']); ?>" class="news-card">
                                        <?php if ($card['insights_and_news_card_image']): ?>
                                            <div class="card-image">
                                                <img src="<?php echo esc_url($card['insights_and_news_card_image']['url']); ?>" 
                                                     alt="<?php echo esc_attr($card['insights_and_news_card_image']['alt']); ?>">
                                            </div>
                                        <?php endif; ?>
                                    </a>
                                <?php else: ?>
                                    <div class="news-card">
                                        <?php if ($card['insights_and_news_card_image']): ?>
                                            <div class="card-image">
                                                <img src="<?php echo esc_url($card['insights_and_news_card_image']['url']); ?>" 
                                                     alt="<?php echo esc_attr($card['insights_and_news_card_image']['alt']); ?>">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="our-services" class="our-services">
        <div class="container">
            <div class="services-header">
                <div class="header-title">
                    <h2 class="services-title">
                        <?php echo esc_html(get_field('our_services_title')); ?>
                    </h2>
                </div>
                <div class="header-content">
                    <div class="services-tooltip">
                        <?php echo esc_html(get_field('our_services_tooltip')); ?>
                    </div>
                    <div class="header-description">
                        <p><?php echo esc_html(get_field('our_services_description')); ?></p>
                    </div>
                </div>
            </div>
            <div class="services-separator">
                <div class="ecosystem-label"><?php echo esc_html(get_field('our_services_separator')); ?></div>
            </div>

            <!-- Investments Section -->
            <div class="service-section investments-section">
                <h3 class="section-title"><?php echo esc_html(get_field('investments_investments_title')); ?></h3>
                
                <div class="investments-content">
                    <div class="investment-left">
                        <h4 class="investment-card-title"><?php echo esc_html(get_field('investments_investments_left_title')); ?></h4>
                        <div class="investment-bullets">
                            <?php echo wp_kses(get_field('investments_investments_left_bullet_points'), array(
                                'ul' => array(),
                                'li' => array(),
                                'strong' => array(),
                                'em' => array()
                            )); ?>
                        </div>
                        <?php if (get_field('investments_investments_left_btn_text') && get_field('investments_investments_left_btn_link')): ?>
                            <a href="<?php echo esc_url(get_field('investments_investments_left_btn_link')); ?>" class="ww-btn ww-btn-blue">
                                <?php echo esc_html(get_field('investments_investments_left_btn_text')); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <div class="investment-right" <?php if (get_field('investments_investments_right_bg')): ?>style="background-image: url('<?php echo esc_url(get_field('investments_investments_right_bg')['url']); ?>')"<?php endif; ?>>
                        <h4 class="investment-card-title"><?php echo esc_html(get_field('investments_investments_right_title')); ?></h4>
                        <div class="investment-bullets">
                            <?php echo wp_kses(get_field('investments_investments_right_bullets'), array(
                                'ul' => array(),
                                'li' => array(),
                                'strong' => array(),
                                'em' => array()
                            )); ?>
                        </div>
                        <div class="investment-caption">
                            <?php echo wp_kses(get_field('investments_investments_right_caption'), array(
                                'p' => array(),
                                'strong' => array(),
                                'em' => array(),
                                'br' => array()
                            )); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Support Section -->
            <div class="service-section business-support-section" <?php if (get_field('business_suport_business_support_bg')): ?>style="background-image: url('<?php echo esc_url(get_field('business_suport_business_support_bg')['url']); ?>')"<?php endif; ?>>
                <div class="business-support-content">
                    <div class="business-support-left">
                        <div class="business-left-wrapper">
                            <div class="section-header">
                                <h3 class="section-title"><?php echo esc_html(get_field('business_suport_business_support_title')); ?></h3>
                                <div class="section-tooltip"><?php echo esc_html(get_field('business_suport_business_support_tooltip')); ?></div>
                            </div>
                            
                            <div class="business-bullets">
                                <?php echo wp_kses(get_field('business_suport_business_support_left_bullets'), array(
                                    'ul' => array(),
                                    'li' => array(),
                                    'strong' => array(),
                                    'em' => array()
                                )); ?>
                            </div>
                        </div>
                        
                        <div class="business-buttons">
                            <h4 class="buttons-title"><?php echo esc_html(get_field('business_suport_business_support_btns_title')); ?></h4>
                            <div class="button-group">
                                <?php if (get_field('business_suport_business_support_btn_1_text') && get_field('business_suport_business_support_btn_1_link')): ?>
                                    <a href="<?php echo esc_url(get_field('business_suport_business_support_btn_1_link')); ?>" class="ww-btn ww-btn-white">
                                        <?php echo esc_html(get_field('business_suport_business_support_btn_1_text')); ?>
                                    </a>
                                <?php endif; ?>
                                
                                <?php if (get_field('business_suport_business_support_btn_2_text') && get_field('business_suport_business_support_btn_2_link')): ?>
                                    <a href="<?php echo esc_url(get_field('business_suport_business_support_btn_2_link')); ?>" class="ww-btn ww-btn-white">
                                        <?php echo esc_html(get_field('business_suport_business_support_btn_2_text')); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="business-support-right">
                        <div class="business-description">
                            <?php echo esc_html(get_field('business_suport_business_support_right_description')); ?>
                        </div>
                        <div class="business-caption">
                            <?php echo wp_kses(get_field('business_suport_business_support_right_caption'), array(
                                'p' => array(),
                                'strong' => array(),
                                'em' => array(),
                                'br' => array()
                            )); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Digital Assets Section -->
            <div class="service-section digital-assets-section">
                <div class="digital-assets-content">
                    <div class="digital-assets-left">
                        <h3 class="section-title"><?php echo esc_html(get_field('digital_assets_digital_assets_title')); ?></h3>
                        <h4 class="investment-card-title"><?php echo esc_html(get_field('digital_assets_digital_assets_description')); ?></h4>
                        <div class="investment-bullets">
                            <?php if (get_field('digital_assets_digital_assets_btn_text') && get_field('digital_assets_digital_assets_btn_link')): ?>
                                <a href="<?php echo esc_url(get_field('digital_assets_digital_assets_btn_link')); ?>" class="ww-btn ww-btn-blue">
                                    <?php echo esc_html(get_field('digital_assets_digital_assets_btn_text')); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="digital-assets-right" <?php if (get_field('digital_assets_digital_assets_right_bg')): ?>style="background-image: url('<?php echo esc_url(get_field('digital_assets_digital_assets_right_bg')['url']); ?>')"<?php endif; ?>>
                        <h4 class="investment-card-title"><?php echo esc_html(get_field('digital_assets_digital_assets_right_tooltip')); ?></h4>
                        <div class="investment-bullets">
                            <?php echo wp_kses(get_field('digital_assets_digital_assets_right_bullets'), array(
                                'ul' => array(),
                                'li' => array(),
                                'strong' => array(),
                                'em' => array()
                            )); ?>
                        </div>
                        <div class="investment-caption">
                            <?php echo wp_kses(get_field('digital_assets_digital_assets_right_caption'), array(
                                'p' => array(),
                                'strong' => array(),
                                'em' => array(),
                                'br' => array()
                            )); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technology & Infrastructure Section -->
            <div class="service-section technology-section">
                
                <div class="technology-content">
                    <div class="technology-left" <?php if (get_field('technology_and_infrastructure_technology_and_infrastructure_left_bg')): ?>style="background-image: url('<?php echo esc_url(get_field('technology_and_infrastructure_technology_and_infrastructure_left_bg')['url']); ?>')"<?php endif; ?>>
                        <div class="technology-top-banner">
                            <?php echo esc_html(get_field('technology_and_infrastructure_technology_and_infrastructure_left_tooltip')); ?>
                        </div>
                        <div class="technology-caption">
                            <?php echo wp_kses(get_field('technology_and_infrastructure_technology_and_infrastructure_left_caption'), array(
                                'p' => array(),
                                'strong' => array(),
                                'em' => array(),
                                'br' => array()
                            )); ?>
                        </div>
                    </div>
                    
                    <div class="technology-right">
                        <h3 class="technology-title">
                            <span class="title-main"><?php echo esc_html(get_field('technology_and_infrastructure_technology_and_infrastructure_title')); ?></span>
                            <span class="title-sub"><?php echo esc_html(get_field('technology_and_infrastructure_technology_and_infrastructure_subtitle')); ?></span>
                        </h3>
                        <div class="technology-description">
                            <?php echo esc_html(get_field('technology_and_infrastructure_technology_and_infrastructure_description')); ?>
                        </div>
                        <div class="technology-buttons">
                            <?php if (get_field('technology_and_infrastructure_technology_and_infrastructure_btn_1_text') && get_field('technology_and_infrastructure_technology_and_infrastructure_btn_1_link')): ?>
                                <a href="<?php echo esc_url(get_field('technology_and_infrastructure_technology_and_infrastructure_btn_1_link')); ?>" class="ww-btn-primary">
                                    <?php echo esc_html(get_field('technology_and_infrastructure_technology_and_infrastructure_btn_1_text')); ?>
                                </a>
                            <?php endif; ?>
                            
                            <?php if (get_field('technology_and_infrastructure_technology_and_infrastructure_btn_2_text') && get_field('technology_and_infrastructure_technology_and_infrastructure_btn_2_link')): ?>
                                <a href="<?php echo esc_url(get_field('technology_and_infrastructure_technology_and_infrastructure_btn_2_link')); ?>" class="ww-btn-secondary">
                                    <?php echo esc_html(get_field('technology_and_infrastructure_technology_and_infrastructure_btn_2_text')); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
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