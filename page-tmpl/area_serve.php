<?php

/**
 * Template Name: Areas We Serve
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


    <section class="mini_card pb-3">
        <div class="container">
            <div class="row">
                <?php 
            if(have_rows('service_locations')) {
                while(have_rows('service_locations')) {
                    the_row(); ?>
                <div class="col-md-2">
                    <div class="mini_box">
                        <div class="img_box">
                            <img src="<?php echo get_sub_field('images',$post->ID);?>" alt="">
                        </div>
                        <p><?php echo get_sub_field('area_title',$post->ID);?></p>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </section>


    <section class="map-sec">
        <?php echo get_field('map_link',$post->ID); ?>
    </section>


    <section class="contact-us-sec abt-cont-us">
        <div class="container">
            <div class="contact-frm">
                <?php echo do_shortcode('[contact-form-7 id="0676cbc" title="Area Serve Form"]');?>
            </div>
        </div>
    </section>


    <section class="contact-section abt pb-5">
        <div class="container">
            <h5 class="text-center"><?php echo get_field('contact_title',$post->ID); ?></h5>
            <h2 class="text-center"><?php echo get_field('contact_heading',$post->ID); ?></h2>
            <div class="row pt-5">
                <?php 
            if(have_rows('contact_repeater')) {
                while(have_rows('contact_repeater')) {
                    the_row(); ?>
                <div class="col-md-4">
                    <div class="icon"><?php echo get_sub_field('icon',$post->ID); ?></div>
                    <div class="info">
                        <h4><?php echo get_sub_field('heading',$post->ID);?></h4>
                        <p><?php echo get_sub_field('description',$post->ID);?></p>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </section>

</main>


<?php
get_footer();?>