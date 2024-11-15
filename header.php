<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__container">
                <div class="header__menu menu">
                    <div class="menu__icon">
                        <!-- .menu__icon::before -->
                    </div>
                    <nav class="menu__body">
                        <?php 
                            wp_nav_menu(array(
                                'theme_location' => 'header-menu',
                                'container' => false,
                                'menu_class' => 'menu_list',
                                'walker' => new Batoweb_Header_Menu(),
                            ));
                        ?>
                        <div class="header-phone-in-menu">
                            <div class="header-phone-in-menu__image">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/phone_image.svg'); ?>" alt="phone">
                            </div>
                            
                            <?php
                            $phone_number = get_field('phone_number', 'option');

                            if ($phone_number) : ?>
                                <a href="tel:<?php echo preg_replace('/\D+/', '', $phone_number); ?>" class="header-phone-in-menu__number">
                                    <?php echo $phone_number; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </nav>
                </div>
                <div class="logo">
                    <?php 
                    if ( has_custom_logo() ) : ?>
                        <a href="<?php echo home_url(); ?>">
                            <?php echo get_custom_logo(); ?>
                       </a>
                    <?php endif;
                    ?>
                </div>
                <div class="header-phone">
                    <div class="header-phone__image">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/phone_image.svg'); ?>" alt="phone">
                    </div>
                    
                    <?php
                    $phone_number = get_field('phone_number', 'option');

                    if ($phone_number) : ?>
                        <a href="tel:<?php echo preg_replace('/\D+/', '', $phone_number); ?>" class="header-phone__number">
                            <?php echo $phone_number; ?>
                        </a>
                    <?php endif; ?>
                </div>
                
            </div>   
        </header>