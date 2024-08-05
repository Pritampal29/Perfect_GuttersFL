<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Perfect_Gutters
 */

get_header();
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
    

    <section class="blog_body">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo $featured_image;?>" alt="">
                </div>
                <div class="col-md-6">
                    <h3><?php the_title();?></h3>
                    <p class="p_date">Publish: <?php echo get_the_date('F j, Y');?></p>
                    <p><?php the_content();?></p>
                </div>
                <div class="next_prev">
                    <?php 
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'perfect_gutters' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'perfect_gutters' ) . '</span> <span class="nav-title">%title</span>',
						)
					);
					?>
                </div>
            </div>
            <!-- <div class="row">
                <div class="comment_sec">
                    <?php
					// if ( comments_open() || get_comments_number() ) :
					// 	comments_template();
					// endif;
					?>
                </div>
            </div> -->
        </div>
    </section>

</main>

<?php

get_footer();