<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Perfect_Gutters
 */

?>

<!-- Footer Start-->
<footer class="footer-area common-bg"
    style="background-image: url(<?php echo get_field('footer_bg_image','option');?>);">
    <div class="container">
        <div class="footer-wrap">
            <div class="row">
                <div class="col-md-2">
                    <div class="foot-logo">
                        <a class="mw-100" href="<?php echo site_url();?>"><img
                                src="<?php echo get_field('footer_logo','option');?>" alt=""></a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="each-foot-box wow animate__animated animate__fadeIn animate__slower 2s">
                                <?php 
                                if(have_rows('footer_contact_repeater','options')) {
                                    while(have_rows('footer_contact_repeater','options')) {
                                        the_row(); ?>
                                <h6><?php echo get_sub_field('headings','options');?></h6>
                                <ul class="ft-social mb-3">
                                    <?php 
                                    if(have_rows('values','option')) {
                                        while(have_rows('values','options')) {
                                            the_row(); ?>
                                    <li><a
                                            href="<?php echo get_sub_field('link','options');?>"><span><?php echo get_sub_field('icon','options');?></span><?php echo get_sub_field('name','options');?></a>
                                    </li>
                                    <?php } } ?>
                                </ul>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="each-foot-box wow animate__animated animate__fadeIn animate__slower 2s">
                                <h6><?php echo get_field('instagram_heading','option');?></h6>
                                <ul class="ft-gallery">
                                    <?php 
                                        if(have_rows('instagram_images','option')) {
                                            while(have_rows('instagram_images','options')) {
                                                the_row(); ?>
                                    <li><a href="#"><img src="<?php echo get_sub_field('images','options');?>"
                                                alt=""></a></li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="each-foot-box wow animate__animated animate__fadeIn animate__slower 2s">
                                <h6>Newsletter:</h6>
                                <p>Subscribe to our newsletter to get our latest updates & news.</p>
                                <!-- <div class="ft-serch-input">
                                    <input type="text">
                                    <button><i class="fas fa-paper-plane"></i></button>
                                </div> -->
                                <div class="nwsletter ft-serch-input">
                                    <?php echo do_shortcode('[newsletter_form]');?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Footer End -->

<!--Back to top Start-->
<div id="back-to-top">
    <a class="top" id="#top" href="#"> <i class="fas fa-angle-up"></i> </a>
</div>
<!--Back to top End-->


<!--===========================-->
<!-- js Starts -->
<!--===========================-->

<!--jquery js-->
<script src="<?php echo get_template_directory_uri();?>/js/jquery.min.js"></script>
<!--Bootstrap js-->
<script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
<!--Swiper-slider js-->
<script src="<?php echo get_template_directory_uri();?>/js/swiper-bundle.min.js"></script>

<script src="<?php echo get_template_directory_uri();?>/js/ajax-pagination.js"></script>
<!-- Wow animation js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<!-- Custom js -->
<script src="<?php echo get_template_directory_uri();?>/js/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
<!--===========================-->
<!-- js End -->
<!--===========================-->
<?php wp_footer(); ?>

</body>

</html>

