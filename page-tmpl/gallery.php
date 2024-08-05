<?php
/**
 * Template Name: Gallery Page
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


    <!-- Gallery text Start -->
    <section class="gtxt mt-5">
        <div class="container">
            <div class="abt-compny wow animate__animated animate__fadeIn animate__slower 2s text-center">
                <h5><?php echo get_field('sec2_title',$post->ID); ?></h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="abt-compny-left">
                            <h2><?php echo get_field('sec2_heading',$post->ID); ?></h2>
                            <p><?php echo get_field('sec2_description',$post->ID); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery text End -->


    <!-- Gallery Image Section Start -->
    <section class="g_img mt-3" id="img_glry_sec">
        <div class="container">
            <div class="row" id="image-gallery">
                <?php 
                if(have_rows('sec3_image_repeater')) {
                    while(have_rows('sec3_image_repeater')) {
                        the_row(); ?>
                <div class="col-md-4 my-3">
                    <div class="gal_box">
                        <a href="<?php echo get_sub_field('images'); ?>" data-fancybox="group">
                            <img src="<?php echo get_sub_field('images'); ?>" alt="">
                        </a>
                    </div>
                </div>
                <?php } } ?>
            </div>
            <div class="text-center mt-4 mb-5">
                <button id="load-more" class="common-btn">Load More</button>
                <button id="load-less" class="common-btn" style="display: none;">Load Less</button>
            </div>
        </div>
    </section>

    <!-- Gallery Image Section End -->


</main>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php
get_footer();?>