<?php

/**

 * 

 * This is the template that displays Home Page

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package Perfect_Gutters

 * 

 */

get_header();

global $post;



?>





<main>



    <!-- banner Start-->

    <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

    <section class="banner-area common-bg" style="background-image: url(<?php echo $featured_image;?>);">

        <div class="container">

            <div class="row align-items-top">

                <div class="col-md-5">

                    <div class="ban-slogan">

                        <div class="swiper">

                            <div class="swiper-wrapper">

                                <?php 

                                if(have_rows('banner_repeater')) {

                                    while(have_rows('banner_repeater')) {

                                        the_row(); ?>

                                <div class="swiper-slide">

                                    <div class="each-ban-slogan">

                                        <h1><?php echo get_sub_field('headings',$post->ID);?></h1>

                                        <p><?php echo get_sub_field('descriptions',$post->ID);?></p>

                                    </div>

                                </div>

                                <?php } } ?>

                                <!-- <div class="swiper-slide">

                                    <div class="each-ban-slogan">

                                        <h1>Exceptional Gutter Solutions Await You</h1>

                                        <p>Discover unmatched gutter services with Perfect Gutters FL. We cater to both

                                            commercial and residential clients in Orlando, FL, and the surrounding

                                            areas, offering reliable solutions to protect your property from water

                                            damage.</p>

                                    </div>

                                </div> -->

                            </div>

                        </div>

                        <div class="swiper-pagination"></div>

                    </div>

                </div>

                <div class="col-md-7">

                    <div class="ban-right">

                        <div class="contact-frm" id="cntct_frm">

                            <?php echo do_shortcode('[contact-form-7 id="a24ce71" title="Home Banner Form"]');?>

                        </div>

                        <div class="social-link wow animate__animated animate__fadeIn">

                            <ul>

                                <?php 

                                if(have_rows('banner_social_buttons')) {

                                    while(have_rows('banner_social_buttons')) {

                                        the_row(); ?>

                                <li><a href="<?php echo get_sub_field('links',$post->ID);?>"><img
                                            src="<?php echo get_sub_field('icons',$post->ID);?>" alt=""></a></li>

                                <?php } } ?>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- banner End-->





    <!-- about-us-sec start-->

    <section class="about-us-sec">

        <div class="container">

            <div class="row">

                <div class="col-md-5">

                    <div class="about-us-txt wow animate__animated animate__fadeIn animate__slower 2s">

                        <div class="hd-social common-bg"
                            style="background-image: url(<?php echo get_field('review_bg_image',$post->ID);?>);">

                            <img src="<?php echo get_field('review_text_icon',$post->ID);?>" alt="">

                            <span class="locate-txt">

                                <h2><?php echo get_field('review_title',$post->ID);?></h2>

                            </span>

                        </div>

                        <div class="text-center">

                            <h2><?php echo get_field('review_heading',$post->ID);?></h2>

                        </div>

                        <?php 

                        $r_btn = get_field('review_buttons',$post->ID);

                        if($r_btn) { ?>

                        <a class="common-btn" href="<?php echo $r_btn['url'];?>"><?php echo $r_btn['title'];?></a>

                        <?php } ?>

                    </div>

                </div>

                <div class="col-md-7">

                    <!-- <div class="taggbox"  style="width:100%;height:100%" data-widget-id="156564" data-tags="false" ></div>

                    <script src="https://widget.taggbox.com/embed-lite.min.js" type="text/javascript"></script> -->

                    <div class="review-slider wow animate__animated animate__fadeIn animate__slower 2s">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php 
                            $testm = new WP_Query(
                                array(
                                    'post_type'=>'testimonial', 
                                    'post_status'=>'publish',
                                    'posts_per_page'=>'-1' ,
                                    'orderby' => 'date' ,
                                    'order' => 'DESC' ,
                                )
                            );

                            if($testm->have_posts()) {
                                while($testm->have_posts()) {
                                    $testm->the_post(); ?>
                                <div class="swiper-slide">
                                    <div class="each-review-box">
                                        <div class="hd-social">
                                            <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                            <img src="<?php echo $featured_image;?>" alt="">
                                            <div class="review-txt">
                                                <h3><?php the_title();?></h3>
                                                <p><?php echo get_field('review_date',$post->ID);?></p>
                                            </div>
                                        </div>
                                        <ul class="rvw-str">
                                            <?php
                                            $rev_num = get_field('ratings', $post->ID); 
                                            $full_stars = floor($rev_num);
                                            $partial_star = $rev_num - $full_stars;

                                            for ($i = 1; $i <= $full_stars; $i++) { ?>
                                            <li><i class="fas fa-star"></i></li>
                                            <?php } if ($partial_star > 0) { ?>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                            <?php }
                                            for ($i = ceil($rev_num); $i < 5; $i++) { ?>
                                            <li><i class="far fa-star"></i></li>
                                            <?php } ?>
                                            <!-- <li><img src="<?php echo get_template_directory_uri();?>/images/star.png"
                                                    alt=""></li> -->
                                        </ul>
                                        <p><?php echo wp_trim_words(get_the_content(),22);?></p>
                                    </div>
                                </div>
                                <?php } } 
                                    wp_reset_postdata();?>
                                <!-- <div class="swiper-slide">

                                    <div class="each-review-box">

                                        <div class="hd-social">

                                            <img src="<?php echo get_template_directory_uri();?>/images/face-2.png"

                                                alt="">

                                            <div class="review-txt">

                                                <h3>Lori Coleman</h3>

                                                <p>3 days ago</p>

                                            </div>

                                        </div>

                                        <ul class="rvw-str">

                                            <li><img src="<?php echo get_template_directory_uri();?>/images/star.png"

                                                    alt=""></li>

                                            <li><img src="<?php echo get_template_directory_uri();?>/images/star.png"

                                                    alt=""></li>

                                            <li><img src="<?php echo get_template_directory_uri();?>/images/star.png"

                                                    alt=""></li>

                                            <li><img src="<?php echo get_template_directory_uri();?>/images/star.png"

                                                    alt=""></li>

                                            <li><img src="<?php echo get_template_directory_uri();?>/images/star.png"

                                                    alt=""></li>

                                        </ul>

                                        <p>Maecenas gravida sollicitudin enim sed dignissim. Cras tempus pretium Nulla

                                        </p>

                                    </div>

                                </div>

                                <div class="swiper-slide">

                                    <div class="each-review-box">

                                        <div class="hd-social">

                                            <img src="images/face-1.png" alt="">

                                            <div class="review-txt">

                                                <h3>John Doe</h3>

                                                <p>3 days ago</p>

                                            </div>

                                        </div>

                                        <ul class="rvw-str">

                                            <li><img src="images/star.png" alt=""></li>

                                            <li><img src="images/star.png" alt=""></li>

                                            <li><img src="images/star.png" alt=""></li>

                                            <li><img src="images/star.png" alt=""></li>

                                            <li><img src="images/star.png" alt=""></li>

                                        </ul>

                                        <p>Maecenas gravida sollicitudin enim sed dignissim. Cras tempus pretium Nulla

                                        </p>

                                    </div>

                                </div>

                                <div class="swiper-slide">

                                    <div class="each-review-box">

                                        <div class="hd-social">

                                            <img src="images/face-2.png" alt="">

                                            <div class="review-txt">

                                                <h3>Lori Coleman</h3>

                                                <p>3 days ago</p>

                                            </div>

                                        </div>

                                        <ul class="rvw-str">

                                            <li><img src="images/star.png" alt=""></li>

                                            <li><img src="images/star.png" alt=""></li>

                                            <li><img src="images/star.png" alt=""></li>

                                            <li><img src="images/star.png" alt=""></li>

                                            <li><img src="images/star.png" alt=""></li>

                                        </ul>

                                        <p>Maecenas gravida sollicitudin enim sed dignissim. Cras tempus pretium Nulla

                                        </p>

                                    </div>

                                </div>

                                <div class="swiper-slide">

                                    <div class="each-review-box">

                                        <div class="hd-social">

                                            <img src="images/face-1.png" alt="">

                                            <div class="review-txt">

                                                <h3>John Doe</h3>

                                                <p>3 days ago</p>

                                            </div>

                                        </div>

                                        <ul class="rvw-str">

                                            <li><img src="images/star.png" alt=""></li>

                                            <li><img src="images/star.png" alt=""></li>

                                            <li><img src="images/star.png" alt=""></li>

                                            <li><img src="images/star.png" alt=""></li>

                                            <li><img src="images/star.png" alt=""></li>

                                        </ul>

                                        <p>Maecenas gravida sollicitudin enim sed dignissim. Cras tempus pretium Nulla

                                        </p>

                                    </div>

                                </div> -->

                            </div>

                        </div>

                        <div class="swiper-pagination"></div>

                    </div>

                </div>

            </div>

            <div class="abt-compny wow animate__animated animate__fadeIn animate__slower 2s">

                <h5><?php echo get_field('about_title',$post->ID);?></h5>

                <div class="row">

                    <div class="col-md-6">

                        <div class="abt-compny-left">

                            <h2><?php echo get_field('about_heading',$post->ID);?></h2>

                        </div>



                    </div>

                    <div class="col-md-6">

                        <div class="abt-compny-right">

                            <?php echo get_field('about_right_description',$post->ID);?>

                        </div>

                    </div>

                </div>

            </div>

            <div class="choose-area wow animate__animated animate__fadeIn animate__slower 2s">

                <div class="row">

                    <div class="col-md-6">

                        <div class="choose-img">

                            <img class="w-100" src="<?php echo get_field('about_left_image',$post->ID);?>" alt="">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="choose-txt">

                            <?php echo get_field('about_right_description_2',$post->ID);?>

                        </div>

                    </div>

                </div>

                <!-- <ul class="counter-area wow animate__animated animate__fadeIn animate__slower 2s">

                    <?php 

                    if(have_rows('about_below_counters')) {

                        while(have_rows('about_below_counters')) {

                            the_row(); ?>

                    <li>

                        <div class="count-part">

                            <img src="<?php echo get_sub_field('images',$post->ID);?>" alt="">

                            <h2><span class="count"><?php echo get_sub_field('numbers',$post->ID);?></h2><br>

                        </div>

                        <p><?php echo get_sub_field('titles',$post->ID);?></p>

                    </li>

                    <?php } } ?>

                </ul> -->

            </div>

        </div>

    </section>

    <!-- about-us-sec end-->





    <!-- depend-sec start-->

    <section class="depend-sec" style="background-image: url(<?php echo get_field('dep_bg_image',$post->ID);?>);">

        <div class="container">

            <div class="common-head text-center wow animate__animated animate__fadeIn animate__slower 2s">

                <h2><?php echo get_field('dep_heading',$post->ID);?></h2>

                <p><?php echo get_field('dep_description',$post->ID);?></p>

            </div>

            <div class="depend-box-slider wow animate__animated animate__fadeIn animate__slower 2s">

                <div class="swiper">

                    <div class="swiper-wrapper">

                        <?php 

                        if(have_rows('dep_repeater')) {

                            $i = 1;

                            while(have_rows('dep_repeater')) {

                                the_row();                   

                                    if (($i - 1) % 3 == 0) {

                                        $addClass = "orng-box";

                                    } elseif (($i - 2) % 3 == 0) {

                                        $addClass = "wht-box";

                                    } elseif (($i - 3) % 3 == 0) {

                                        $addClass = "blck-box";

                                    } ?>

                        <div class="swiper-slide">

                            <div class="each-depend-box <?php echo $addClass;?>">

                                <div class="each-depend-img">

                                    <img class="w-100" src="<?php echo get_sub_field('box_images',$post->ID);?>" alt="">

                                </div>

                                <div class="each-depend-txt">

                                    <div class="each-depend-smal-img">

                                        <img class="w-100" src="<?php echo get_sub_field('small_images',$post->ID);?>"
                                            alt="">

                                    </div>

                                    <div class="each-depend-list">

                                        <h3><?php echo get_sub_field('headings',$post->ID);?></h3>

                                        <ul>

                                            <?php 

                                            if(have_rows('description_repeater')) {

                                                while(have_rows('description_repeater')) {

                                                    the_row(); ?>

                                            <li><span></span>

                                                <p><?php echo get_sub_field('description',$post->ID);?></p>

                                            </li>

                                            <?php } } ?>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <?php 

                            $i++; } } ?>

                    </div>

                </div>

                <div class="swiper-pagination"></div>

                <div class="swiper-button-next common-arrow"><i class="fas fa-chevron-right"></i></div>

                <div class="swiper-button-prev common-arrow"><i class="fas fa-chevron-left"></i></div>



            </div>



        </div>

    </section>

    <!-- depend-sec end-->





    <!-- system-sec start-->

    <section class="depend-sec system-sec">

        <div class="system-wrap">

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-md-6">

                        <div class="system-left wow animate__animated animate__fadeIn animate__slower 2s">

                            <h5><?php echo get_field('gs_title',$post->ID);?></h5>

                            <h2><?php echo get_field('gs_heading',$post->ID);?></h2>

                            <p><?php echo get_field('gs_description',$post->ID);?></p>



                            <?php 

                            $reach_btn = get_field('gs_button',$post->ID);

                                if($reach_btn) { ?>

                            <a class="common-btn"
                                href="<?php echo $reach_btn['url'];?>"><?php echo $reach_btn['title'];?></a>

                            <?php } ?>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="system-right wow animate__animated animate__fadeIn animate__slower 2s">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="each-sys-img">

                                        <img class="w-100" src="<?php echo get_field('gs_image_1',$post->ID);?>" alt="">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="text-center">

                                        <div class="rotate-img">

                                            <img src="<?php echo get_field('gs_image_2',$post->ID);?>" alt="">

                                        </div>

                                        <div class="each-sys-img">

                                            <img class="w-100" src="<?php echo get_field('gs_image_3',$post->ID);?>"
                                                alt="">

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- system-sec end-->





    <!-- offer-sec start-->

    <section class="depend-sec offers-sec"
        style="background-image: url(<?php echo get_field('offer_bg_image',$post->ID);?>);">

        <div class="container">

            <div class="offers-hd">

                <h5><?php echo get_field('offer_title',$post->ID);?></h5>

                <h2><?php echo get_field('offer_heading',$post->ID);?></h2>

            </div>

            <div class="offers-img-area wow animate__animated animate__fadeIn animate__slower 2s">

                <div class="row">

                    <?php

                    if(have_rows('offers_repeater')) {

                        while(have_rows('offers_repeater')) {

                            the_row(); ?>

                    <div class="col-md-6">

                        <div class="each-offers-box">

                            <div class="each-offers-img">

                                <img class="w-100" src="<?php echo get_sub_field('images',$post->ID);?>" alt="">

                            </div>

                            <div class="each-offers-txt">

                                <h3><?php echo get_sub_field('headings',$post->ID);?></h3>

                                <p><?php echo get_sub_field('descriptions',$post->ID);?></p>

                                <?php 

                                $o_btn = get_sub_field('buttons',$post->ID);

                                if($o_btn) { ?>

                                <a class="common-btn"
                                    href="<?php echo $o_btn['url'];?>"><?php echo $o_btn['title'];?></a>

                                <?php } ?>

                            </div>

                        </div>

                    </div>

                    <?php } } ?>

                </div>

            </div>

        </div>

    </section>

    <!-- offer-sec end-->



</main>









<?php

get_footer(); ?>