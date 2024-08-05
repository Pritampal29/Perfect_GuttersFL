<?php

/**
 * Template Name: FAQ Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-files
 *
 * @package Perfect_Gutters
 */

get_header();

global $post;

?>

<main>

    <!-- banner Start-->
    <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
    <section class="banner-area inner-ban common-bg" style="background-image: url(<?php echo $featured_image;?>);">
        <div class="ban-slogan text-center">
            <h1><?php the_title();?></h1>
        </div>
    </section>
    <!-- banner End-->

    <section class="who-we-sec">
        <div class="container">
            <?php the_content();?>
        </div>
    </section>

    <section class="faq_section py-5">
        <div class="container">
            <div class="col-md-8 mx-auto">
                <div class="accordion">
                    <?php
                        if(have_rows('faq_accordion')) {
                            while(have_rows('faq_accordion')) {
                                the_row(); ?>
                    <div class="accordion-item">
                        <h3 class="accordion-header me-2 d-flex justify-content-between align-items-center">
                            <?php echo get_sub_field('questions',$post->ID);?>
                            <i class="fas fa-chevron-down"></i>
                        </h3>
                        <div class="accordion-content">
                            <p><?php echo get_sub_field('answers',$post->ID);?></p>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </section>

</main>


<?php
get_footer();?>