<?php

/**

 * The template for displaying single service posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post

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





    <section class="serice_bdy_sec">

        <div class="container">

            <div class="row">

                <div class="col-md-4">

                    <h3><?php echo get_field('left_heading',$post->ID);?></h3>

                    <ul>

                        <?php

                        $args = array(

                            'post_type' => 'service',

                            'post_status' => 'publish',

                            'posts_per_page' => -1,

                            'orderby' => 'date',

                            'order' => 'ASC'

                        );



                        $posts = new WP_Query($args);



                        if ($posts->have_posts()) {

                            while ($posts->have_posts()) {

                                $posts->the_post();

                                $current_class = (get_the_ID() == get_queried_object_id()) ? 'active' : '';

                                ?>

                        <li class="<?php echo $current_class; ?>">

                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                        </li>

                        <?php

                            }

                        }

                        wp_reset_postdata();

                        ?>

                    </ul>



                </div>

                <div class="col-md-8 pt-3">

                    <div class="abt-compny wow animate__animated animate__fadeIn animate__slower 2s">

                        <h5><?php echo get_field('right_title',$post->ID);?></h5>

                        <div class="row">

                            <div class="abt-compny-left">

                                <h2><?php echo get_field('right_heading',$post->ID);?></h2>

                                <p><?php echo get_field('right_description',$post->ID);?></p>

                                <div class="reach_btn">

                                    <?php 

                                    $r_btn = get_field('right_button',$post->ID);

                                    if($r_btn) { ?>

                                    <a href="<?php echo $r_btn['url'];?>"><?php echo $r_btn['title'];?></a>

                                    <?php } ?>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>





    <section class="serice_bdy_sec dive-sec">

        <div class="container">

            <div class="row">

                <div class="col-md-4">

                    <div class="dive-img">

                        <img src="<?php echo get_field('sec3_left_card_ban_image',$post->ID);?>" alt="">

                        <h3><?php echo get_field('sec3_left_card_heading',$post->ID);?></h3>

                        <?php 

                            $inq_btn = get_field('sec3_left_card_button',$post->ID);

                            if($inq_btn) { ?>

                        <a class="common-btn" href="<?php echo $inq_btn['url'];?>"><?php echo $inq_btn['title'];?></a>

                        <?php } ?>

                    </div>

                </div>

                <div class="col-md-8">

                    <div class="abt-compny wow animate__animated animate__fadeIn animate__slower 2s">

                        <div class="row">

                            <div class="abt-compny-left">

                                <h2><?php echo get_field('sec3_right_heading',$post->ID);?></h2>

                                <p><?php echo get_field('sec3_right_description',$post->ID);?></p><br>

                                <img src="<?php echo get_field('sec3_right_image',$post->ID);?>" alt="" class="w-100">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>







    <section class="rvrs_sec">

        <div class="container">

            <?php 

                if(have_rows('sec4_repeater')) {

                    while(have_rows('sec4_repeater')) {

                        the_row(); ?>

            <div class="each_rev_box">

                <div class="row">

                    <div class="col-md-6">

                        <div class="each_rev_img">

                            <img class="w-100" src="<?php echo get_sub_field('left_images',$post->ID);?>" alt="">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="each_rev_text">

                            <h3><?php echo get_sub_field('right_heading',$post->ID);?></h3>

                            <p><?php echo get_sub_field('right_description',$post->ID);?></p>

                        </div>

                    </div>

                </div>

            </div>

            <?php } } ?>

        </div>

    </section>





    <section class="reach-sec">

        <div class="container">

            <div class="reach-wrap">

                <h3><?php echo get_field('sec5_title',$post->ID);?></h3>

                <h2><?php echo get_field('sec5_heading',$post->ID);?></h2>

                <p><?php echo get_field('sec5_description',$post->ID);?></p>

                <?php 

                    $cll_btn = get_field('sec5_button',$post->ID);

                    if($cll_btn) { ?>

                <a class="common-btn" href="<?php echo $cll_btn['url'];?>"><?php echo $cll_btn['title'];?></a>

                <?php } ?>

            </div>

        </div>

    </section>



</main>







<?php

get_footer();?>