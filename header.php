<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Perfect_Gutters
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <title>Home</title> -->
    <?php wp_head(); ?>
    <!--===========================-->
    <!-- Css Starts -->
    <!--===========================-->

    <!--Bootstrap css-->
    <link href="<?php echo get_template_directory_uri();?>/scss/bootstrap.min.css" rel="stylesheet">
    <!--Swiper-slider css-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/scss/swiper-bundle.min.css">
    <!--Fonts css-->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Saira:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!--Animation css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!--Font-awesome-icon css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/scss/style.css">
    <!-- Custom responsive -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/scss/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">

    <!--===========================-->
    <!-- Css End -->
    <!--===========================-->


</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- Loading Start-->
    <!-- <div id="pq-loading">
		<div id="pq-loading-center">
			<img src="images/logo.png" alt="loading">
		</div>
	</div> -->
    <!--Loading End -->

    <!-- header Start-->
    <header class="header-area pq-header-style-1 pq-has-sticky">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <span class="nv-open-bg d-lg-none"></span>
                <div class="col-auto">
                    <div class="logo">
                        <a href="<?php echo site_url();?>"><img class="mw-100" src="<?php echo get_field('site_logo','option');?>" alt=""></a>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="head-right">
                        <ul class="d-flex align-items-center">
                            <li class="hd-social"><a href="tel:4079700006"><span><img src="<?php echo get_field('mobile_icon','option');?>" alt=""></span><?php echo get_field('number_value','option');?></a></li>
							<?php
							$hd_btn = get_field('header_button','option');
							if($hd_btn) { ?>
                            <li><a href="<?php echo $hd_btn['url'];?>" class="common-btn"><?php echo $hd_btn['title'];?></a></li>
							<?php } ?>
                            <li class="humburger"><span></span></li>
                        </ul>
                    </div>
                    <div class="nav-bar">
                        <ul>
							<?php
							if ( has_nav_menu( 'menu-1' ) ) {

								wp_nav_menu(
									array(
										'container'  => '',
										'items_wrap' => '%3$s',
										'theme_location' => 'menu-1',
										'menu'   => 'Main Menu',
										'walker' => new Custom_Walker_Nav_Menu(), 
									)
								);
								
							} ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header End-->