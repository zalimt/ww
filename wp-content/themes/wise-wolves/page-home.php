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
     <section id="our-clients" class="our-clients">
         <div class="container">
             <div class="clients-top">
                 <div class="clients-title-block">
                     <h2 class="clients-title">
                         <?php echo wp_kses(get_field('our_clients_title'), array('strong' => array(), 'em' => array(), 'b' => array(), 'i' => array(), 'span' => array(), 'br' => array())); ?>
                     </h2>
                     <div class="clients-tooltip"><?php echo esc_html__('Who we serve', 'wise-wolves'); ?></div>
                 </div>
                 <?php if ($description = get_field('our_clients_description')): ?>
                 <div class="clients-description">
                     <?php echo wp_kses_post($description); ?>
                 </div>
                 <?php endif; ?>
             </div>

             <div class="clients-hero">
                 <?php if ($img = get_field('our_clients_image')): ?>
                 <div class="clients-hero-image">
                     <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
                 </div>
                 <?php endif; ?>

                 <?php 
                 $btn_text = get_field('our_clients_btn_text');
                 $btn_link = get_field('our_clients_btn_link');
                 if ($btn_text && $btn_link): ?>
                <a href="<?php echo esc_url($btn_link); ?>" class="ww-btn ww-btn-white"><?php echo esc_html($btn_text); ?></a>
                 <?php endif; ?>
             </div>

             <div class="clients-trusted">
                 <?php if ($trusted = get_field('our_clients_truste_by_text')): ?>
                 <h3 class="clients-trusted-title"><?php echo esc_html($trusted); ?></h3>
                 <?php endif; ?>

                 <?php $logos = get_field('our_clients_logos'); ?>
                 <?php if ($logos): ?>
                 <div class="clients-logos">
                     <?php foreach ($logos as $item): $logo = $item['our_clients_logo']; if (!$logo) { continue; } ?>
                     <div class="clients-logo">
                         <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                     </div>
                     <?php endforeach; ?>
                 </div>
                 <?php endif; ?>
             </div>
         </div>
     </section>
     <section id="partnership-program" class="partnership-program">
        <div class="container">
            <div class="program-top">
                <div class="program-title-block">
                    <h2 class="program-title">
                        <?php echo wp_kses_post(get_field('partnership_program_title')); ?>
                    </h2>
                    <?php if ($pp_tooltip = get_field('partnership_program_tooltip')): ?>
                    <div class="program-tooltip"><?php echo esc_html($pp_tooltip); ?></div>
                    <?php endif; ?>
                </div>
                <?php if ($pp_desc = get_field('partnership_program_description')): ?>
                <div class="program-description">
                    <?php echo wp_kses_post($pp_desc); ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="program-steps">
                <div class="steps-track">
                    <div class="step-item step-1 odd">
                        <div class="step-text"><?php echo wp_kses_post(get_field('partnership_program_step_1')); ?></div>
                    </div>
                    <div class="step-item step-2 even">
                        <div class="step-text"><?php echo wp_kses_post(get_field('partnership_program_step_2')); ?></div>
                    </div>
                    <div class="step-item step-3 odd">
                        <div class="step-text"><?php echo wp_kses_post(get_field('partnership_program_step_3')); ?></div>
                    </div>
                    <div class="step-item step-4 even">
                        <div class="step-text"><?php echo wp_kses_post(get_field('partnership_program_step_4')); ?></div>
                    </div>
                </div>
            </div>

            <?php 
            $pp_btn_text = get_field('partnership_program_btn_text');
            $pp_btn_link = get_field('partnership_program_btn_link');
            if ($pp_btn_text && $pp_btn_link): ?>
            <a class="ww-btn ww-btn-blue" href="<?php echo esc_url($pp_btn_link); ?>"><?php echo esc_html($pp_btn_text); ?></a>
            <?php endif; ?>
        </div>
    </section>
    <section id="career-corporate-culture" class="career-corporate-culture">
        <div class="container">
            <div class="career-top">
                <div class="career-title-block">
                    <h2 class="career-title">
                        <?php echo wp_kses_post(get_field('career_title')); ?>
                    </h2>
                    <?php if ($career_tooltip = get_field('career_tooltip')): ?>
                    <div class="career-tooltip"><?php echo esc_html($career_tooltip); ?></div>
                    <?php endif; ?>
                </div>
                <?php if ($career_desc = get_field('career_description')): ?>
                <div class="career-description">
                    <?php echo wp_kses_post($career_desc); ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="career-cards">
                <?php $card1 = get_field('career_card_1'); ?>
                <?php if ($card1): ?>
                <div class="career-card">
                    <div class="card-header">
                        <div class="card-title"><?php echo esc_html($card1['career_card_title_1'] ?? ''); ?></div>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo esc_html($card1['career_card_description_1'] ?? ''); ?></p>
                    </div>
                    <?php 
                    $img = $card1['career_card_image_1'] ?? null; 
                    $img_url = '';
                    $img_alt = '';
                    if (is_array($img)) {
                        $img_url = $img['url'] ?? '';
                        $img_alt = $img['alt'] ?? '';
                    } elseif (is_numeric($img)) {
                        $img_url = wp_get_attachment_image_url(intval($img), 'full');
                        $img_alt = get_post_meta(intval($img), '_wp_attachment_image_alt', true);
                    } elseif (is_string($img)) {
                        $img_url = $img;
                    }
                    ?>
                    <?php if ($img_url): ?>
                    <div class="card-image">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                        <?php if (!empty($card1['career_card_image_btn_link_1'])): ?>
                            <a href="<?php echo esc_url($card1['career_card_image_btn_link_1']); ?>" class="image-btn ww-btn ww-btn-white"><?php echo esc_html($card1['career_card_image_btn_text_1'] ?? ''); ?></a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php $card2 = get_field('career_card_2'); ?>
                <?php if ($card2): ?>
                <div class="career-card">
                    <div class="card-header">
                        <div class="card-title"><?php echo esc_html($card2['career_card_title_2'] ?? ''); ?></div>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo esc_html($card2['career_card_description_2'] ?? ''); ?></p>
                    </div>
                    <?php 
                    $img2 = $card2['career_card_image_2'] ?? null; 
                    $img2_url = '';
                    $img2_alt = '';
                    if (is_array($img2)) {
                        $img2_url = $img2['url'] ?? '';
                        $img2_alt = $img2['alt'] ?? '';
                    } elseif (is_numeric($img2)) {
                        $img2_url = wp_get_attachment_image_url(intval($img2), 'full');
                        $img2_alt = get_post_meta(intval($img2), '_wp_attachment_image_alt', true);
                    } elseif (is_string($img2)) {
                        $img2_url = $img2;
                    }
                    ?>
                    <?php if ($img2_url): ?>
                    <div class="card-image">
                        <img src="<?php echo esc_url($img2_url); ?>" alt="<?php echo esc_attr($img2_alt); ?>">
                        <?php if (!empty($card2['career_card_image_btn_link_2'])): ?>
                            <a href="<?php echo esc_url($card2['career_card_image_btn_link_2']); ?>" class="image-btn ww-btn ww-btn-white"><?php echo esc_html($card2['career_card_image_btn_text_2'] ?? ''); ?></a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php $card3 = get_field('career_card_3'); ?>
                <?php if ($card3): ?>
                <div class="career-card">
                    <div class="card-header">
                        <div class="card-title"><?php echo esc_html($card3['career_card_title_3'] ?? ''); ?></div>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo esc_html($card3['career_card_description_3'] ?? ''); ?></p>
                    </div>
                    <?php 
                    $img3 = $card3['career_card_image_3'] ?? null; 
                    $img3_url = '';
                    $img3_alt = '';
                    if (is_array($img3)) {
                        $img3_url = $img3['url'] ?? '';
                        $img3_alt = $img3['alt'] ?? '';
                    } elseif (is_numeric($img3)) {
                        $img3_url = wp_get_attachment_image_url(intval($img3), 'full');
                        $img3_alt = get_post_meta(intval($img3), '_wp_attachment_image_alt', true);
                    } elseif (is_string($img3)) {
                        $img3_url = $img3;
                    }
                    ?>
                    <?php if ($img3_url): ?>
                    <div class="card-image">
                        <img src="<?php echo esc_url($img3_url); ?>" alt="<?php echo esc_attr($img3_alt); ?>">
                        <?php if (!empty($card3['career_card_image_btn_link_3'])): ?>
                            <a href="<?php echo esc_url($card3['career_card_image_btn_link_3']); ?>" class="ww-btn ww-btn-white"><?php echo esc_html($card3['career_card_image_btn_text_3'] ?? ''); ?></a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section id="our-people" class="our-people">
        <div class="container">
            <div class="people-header">
                <h2 class="people-title">
                    <?php echo esc_html(get_field('our_people_title')); ?>
                </h2>
                <div class="people-slider-controls">
                    <button class="people-slider-arrow people-slider-prev" aria-label="Previous">
                        <
                    </button>
                    <button class="people-slider-arrow people-slider-next" aria-label="Next">
                        >
                    </button>
                </div>
            </div>
            
            <div class="people-slider-container">
                <div class="people-slider">
                    <?php 
                    $people_cards = get_field('our_people_card');
                    if ($people_cards): ?>
                        <?php foreach ($people_cards as $card): ?>
                            <div class="people-card">
                                <?php if ($card['our_people_card_photo']): ?>
                                    <div class="people-photo">
                                        <img src="<?php echo esc_url($card['our_people_card_photo']['url']); ?>" 
                                             alt="<?php echo esc_attr($card['our_people_card_photo']['alt']); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="people-info">
                                    <h3 class="people-name">
                                        <?php echo esc_html($card['our_people_card_name']); ?>
                                    </h3>
                                    <p class="people-title">
                                        <?php echo esc_html($card['our_people_card_description']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section id="join-a-team" class="join-a-team" <?php 
        $join_bg = get_field('join_a_team_bg');
        if (is_array($join_bg) && !empty($join_bg['url'])) {
            echo 'style="background-image: url(' . esc_url($join_bg['url']) . ');"';
        }
    ?>>
        <div class="container">
            <div class="join-content">
                <div class="join-left">
                    <h2 class="join-title"><?php echo wp_kses_post(get_field('join_a_team_title')); ?></h2>
                    <?php if ($join_desc = get_field('join_a_team_description')): ?>
                    <div class="join-description"><?php echo esc_html($join_desc); ?></div>
                    <?php endif; ?>
                    <?php 
                    $join_btn_text = get_field('join_a_team_btn_text');
                    $join_btn_link = get_field('join_a_team_btn_link');
                    if ($join_btn_text && $join_btn_link): ?>
                        <a href="<?php echo esc_url($join_btn_link); ?>" class="ww-btn ww-btn-blue join-cta"><?php echo esc_html($join_btn_text); ?></a>
                    <?php endif; ?>
                </div>
                <?php if ($join_caption = get_field('join_a_team_caption')): ?>
                <div class="join-right">
                    <div class="join-caption"><?php echo esc_html($join_caption); ?></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section

</main>

<?php get_footer(); ?>