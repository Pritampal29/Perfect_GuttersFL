<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Perfect_Gutters
 */

get_header();
global $post;
?>


<main id="search" class="site-main">

    <!-- banner Start-->
    <section class="banner-area inner-ban common-bg"
        style="background-image: url(<?php echo site_url('/wp-content/uploads/2024/06/magnifying-lens-is-seen-focusing-financial-graphical-indicators_845712-488.jpg');?>);">
        <div class="ban-slogan text-center">
            <h1><?php printf( esc_html__( 'Search Results for: %s', 'perfect_gutters' ), '<span>' . get_search_query() . '</span>' );?>
            </h1>
        </div>
    </section>
    <!-- banner End-->

    <?php if ( have_posts() ) { ?>

    <section class="serch_res py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                    <img src="<?php echo $featured_image;?>" alt="">
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <h5 class="mb-2"><?php the_title();?></h5>
                    <span class="fw-bold"><?php echo ucwords(get_post_type());?></span>
                    <p><?php echo wp_trim_words( get_the_content(), 30);?></p>
                    <a class="common-btn py-2" href="<?php the_permalink();?>">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <?php } else { ?>

    <section class="noreslt py-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center">Sorry, but nothing matched your search terms. Please try again with some different keywords.</h2>
                <form method="get" action="<?php echo site_url('/');?>" class="search-form  mt-4" role="search">
                    <label for="search">
                        <span class="screen-reader-text">Search for:</span>
                    </label>
                    <input type="search" class="search-field" placeholder="Type Keyword..." value="" name="s"
                        id="search">
                    <button type="submit" class="search-submit common-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <?php } ?>


</main>

<?php
get_footer();