<?php

/**
 * Template Name: Gutter Color Option
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


    <section class="home_gal py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion">
                        <?php
                        if(have_rows('home_accordion')) {
                            while(have_rows('home_accordion')) {
                                the_row(); ?>
                        <div class="accordion-item">
                            <h3 class="accordion-header me-2 d-flex justify-content-between align-items-center">
                                <?php echo get_sub_field('colors',$post->ID);?>
                                <i class="fas fa-chevron-down"></i>
                            </h3>
                            <div class="accordion-content">
                                <div class="img_box">
                                    <img src="<?php echo get_sub_field('images',$post->ID);?>" alt="">
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="color_gal">
        <div class="container">
            <div class="row my-4">
                <div class="col-12 text-center">
                    <h2><?php echo get_field('color_heading',$post->ID);?></h2>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="row my-4">
                <div class="col-12 text-center">
                    <div class="filter-button-group">
                        <button class="btn py-2 me-2 common-btn active" data-filter="*">Show All</button>
                        <?php
                        $categories = get_terms('color_palette-category');
                        foreach ($categories as $category) { ?>
                        <button class="btn py-2 me-2 common-btn"
                            data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></button>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Gallery -->
            <div class="row my-4" id="gallery">
                <?php
                $args = array(
                    "post_type" => "color_palette",
                    "post_status" => "publish",
                    "posts_per_page" => "-1",
                    "orderby" => "date",
                    "order" => "ASC",
                );
                $color = new Wp_Query($args);

                if($color->have_posts()) {
                    while ($color->have_posts()) {
                        $color->the_post();
                        $categories = get_the_terms(get_the_ID(), 'color_palette-category');
                        $category_classes = '';
                        if ($categories) {
                            foreach ($categories as $category) {
                                $category_classes .= $category->slug . ' ';
                                $category_name = $category->name;  
                            }
                        }

            ?>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4 gallery-item <?php echo $category_classes;?>">
                    <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                    <a href="<?php echo $featured_image;?>" data-fancybox="gallery">
                        <div class="img_box">
                            <img src="<?php echo $featured_image;?>" class="img-fluid" alt="Image">
                            <div class="text_area">
                                <h5><?php the_title();?></h5>
                                <p><?php echo $category_name;?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } } 
                    wp_reset_postdata();?>
            </div>
        </div>
    </section>




</main>



<?php
get_footer();?>