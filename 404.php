<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Perfect_Gutters
 */

get_header();
?>

	<main id="primary" class="site-main">
			<!-- banner Start-->
    	<section class="error-404 not-found banner-area inner-ban common-bg" style="background-image: url(https://perfectguttersfl.com/wp-content/uploads/2024/06/ban.jpg);">
			<div class="ban-slogan text-center">
				<h1>404</h1>
			</div>
    	</section>
    <!-- banner End-->

		<section class="who-we-sec pb-5">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<img src="https://perfectguttersfl.com/wp-content/uploads/2024/07/depositphotos_80897014-stock-photo-page-not-found.webp">
					</div>
					<div class="col-md-6">
						<p>
							Page You are Looking for Doesn't Exists.
						</p>
						<a class="common-btn" href="<?php echo site_url();?>">Back to Home</a>
					</div>
				</div>
			</div>
		</section>

	</main>

<?php
get_footer();
