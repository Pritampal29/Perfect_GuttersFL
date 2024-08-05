<?php

/**
 * Template Name: Blog Page
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


    <!-- Blog Section Start -->
    <section class="main_blg_list py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 left">
                    <h5 class="mb-2">Search</h5>
                    <div class="mb-4">
                        <?php //get_search_form();?>
                        <form method="get" action="<?php echo site_url('/');?>" class="search-form" role="search">
                            <label for="search">
                                <span class="screen-reader-text">Search for:</span>
                            </label>
                            <input type="search" class="search-field" placeholder="Enter Keyword.." value="" name="s"
                                id="search">
                            <button type="submit" class="search-submit common-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="mb-4">
                        <h5>Categories</h5>
                        <?php
                    $categories = get_categories();
                    ?>
                        <ul class="list-unstyled mt-1">
                            <?php 
                        foreach($categories as $cat) { ?>
                            <li class="mb-2"><?php echo $cat->name;?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="cont_box">
                        <div class="row">
                            <?php
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'ASC'
                        );

                        $posts = new WP_Query($args);

                        if ($posts->have_posts()) {
                            while ($posts->have_posts()) {
                                $posts->the_post(); ?>

                            <div class="col-md-6">
                                <div class="blog-card p-3">
                                    <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                    <img src="<?php echo $featured_image;?>" class="card-img-top" alt="...">
                                    <div class="card-body px-0">
                                        <h5 class="card-title"><?php the_title();?></h5>
                                        <small class="card-text text-muted p_date"><b>Publish On:
                                            <?php echo get_the_date('F j, Y');?></b></small>
                                        <p class="card-text pt-1"><?php echo wp_trim_words( get_the_content(), 10);?></p>
                                        <a href="<?php the_permalink();?>" class="common-btn py-2 px-4 mt-3">Read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                            <?php } } 
                        wp_reset_postdata();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->



</main>





<?php

get_footer(); ?>