<?php
/**
 * Template Name: Contact Us
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

    <!-- contact-us-sec start-->
    <section class="contact-us-sec">
        <div class="container">
            <div class="contact-frm">
                <?php echo do_shortcode('[contact-form-7 id="6bc2db7" title="Contact Us Form"]');?>
            </div>
        </div>
    </section>
    <!-- contact-us-sec end-->
    <section class="map-sec">
        <?php the_content();?>
    </section>
</main>


<?php
get_footer();?>