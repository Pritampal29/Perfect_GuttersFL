<?php

/**

 * Template Name: About Us

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


    <!-- who-we-sec start-->
    <section class="who-we-sec">
        <div class="container">
            <?php the_content();?>
            <div class="text-center">
                <?php 
                $t_btn = get_field('talk_button',$post->ID);
                if($t_btn) { ?>
                <a class="common-btn" href="<?php echo $t_btn['url'];?>"><?php echo $t_btn['title'];?></a>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- who-we-sec end-->


    <!-- contact-us-sec start-->
    <section class="contact-us-sec abt-cont-us">
        <div class="container">
            <div class="contact-frm">
                <?php echo do_shortcode('[contact-form-7 id="35bc6a3" title="About Contact Form"]');?>
            </div>
        </div>
    </section>
    <!-- contact-us-sec end-->
    <section class="map-sec">
        <?php echo get_field('map_link',$post->ID); ?>
    </section>

</main>


<?php

get_footer();?>