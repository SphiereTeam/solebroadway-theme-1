<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
		echo get_the_password_form();
		return;
	 }
?>

<div class="row">
		
	<div class="shop-container">
			
		<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php wc_print_notices(); ?>

			<?php
				$args = array(
					'delimiter' => ' > '
				);
				woocommerce_breadcrumb( $args );
			?>

			<div class="col-xs-12 col-md-7">

				<div class="single-product-1-left">
					
					<?php global $product; ?>

					<!-- Get product gallery -->
					<?php $attachment_ids = $product->get_gallery_attachment_ids(); ?>
					<?php $product_additional_imgs = wp_get_attachment_image_src( $attachment_ids[0], 'large' )[0]; ?>

					<!-- Display two main images if available -->
					<?php if( has_post_thumbnail() && ! empty( $product_additional_imgs ) ) : ?>
						
						<!-- Featured image -->
						<?php $product_main_img = get_the_post_thumbnail_url( $product->ID, 'large' ); ?>
						<figure>
							<img src="<?php echo $product_main_img; ?>" alt="">
						</figure>
						
						<!-- First image in gallery -->
						<figure>
							<img src="<?php echo $product_additional_imgs; ?>" alt="">
						</figure>

						<!-- <a href="#" class="btn btn-default btn-gallery">View Gallery</a> -->
						<button type="button" class="btn btn-default btn-gallery btn-gallery-desktop">View Gallery</button>

					<?php else : ?>
						
						<!-- Placeholder 1 -->
						<?php $placeholder_1 = get_template_directory_uri() . "/images/placeholder-1.jpg"; ?>
						<figure>
							<img src="<?php echo $placeholder_1; ?>" alt="">
						</figure>

						<!-- Placeholder 2 -->
						<?php $placeholder_2 = get_template_directory_uri() . "/images/placeholder-2.jpg"; ?>
						<figure>
							<img src="<?php echo $placeholder_2; ?>" alt="">
						</figure>

					<?php endif; ?>

				</div><!-- /.single-product-1-left -->

			</div><!-- /.col-xs-12.col-md-7 -->

			<div class="col-xs-12 col-md-5">

				<div class="single-product-1-right">

					<button type="button" class="btn btn-default btn-gallery btn-gallery-mobile">View Gallery</button>
					
					<?php woocommerce_template_single_title(); ?>

					<?php woocommerce_template_single_price(); ?>
					<?php woocommerce_template_single_add_to_cart(); ?>

					<?php //woocommerce_breadcrumb(); ?>
					<?php //woocommerce_template_single_excerpt(); ?>

					<?php //woocommerce_template_single_sharing(); ?>

					<?php
						/**
						 * woocommerce_single_product_summary hook.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action( 'woocommerce_single_product_summary' );
					?>

				</div><!-- /.single-product-1-right -->

			</div><!-- /.col-xs-12.col-md-5 -->

			<?php global $product; ?>

			<div class="col-xs-12 col-md-7">
				
				<div class="single-product-2-left">
					<span class="single-product-tiny-heading">Details</span>
					<?php the_content(); ?>
				</div><!-- /.single-product-2-left -->
				
			</div><!-- /.col-xs-12.col-md-7 -->

			<div class="col-xs-12 col-md-5">
				
				<div class="single-product-2-right">
					<?php if( $product->has_attributes() || $product->has_dimensions() || $product->has_weight() ) : ?>
						<?php woocommerce_output_product_data_tabs(); ?>
					<?php endif; ?>
					
					<?php woocommerce_template_single_meta(); ?>
				</div><!-- /.single-product-2-right -->

			</div><!-- /.col-xs-12.col-md-5 -->

			<div class="col-xs-12">
				<?php
					global $product;
					$product_image_url_array = array();

					if( has_post_thumbnail() ){
						//place image url in array
						array_push( $product_image_url_array, get_the_post_thumbnail_url( $product->ID, 'large' ) );
					}
					
					//get all images on product gallery
					$attachment_ids = $product->get_gallery_attachment_ids();
					
					foreach( $attachment_ids as $attachment_id ) {
						//place image url in array
						array_push( $product_image_url_array , wp_get_attachment_url( $attachment_id ) );
					}

					//echo '<pre>' . var_export($product_image_url_array, true) . '</pre>';
				?>

				<?php if( !empty( $product_image_url_array ) ) : ?>

					<?php
						$string1 = "";
						foreach ($product_image_url_array as $key => $val) {
							$string1 = $string1 . "|" . $val;
						}
						$string1 = substr($string1, 1);
					?>
					<input id="product-images-list" type="hidden" value="<?php echo $string1; ?>">

				<?php endif; ?>
				
				<?php woocommerce_output_related_products(); ?>
				<?php solebroadway_theme_1_output_upsells(); ?>
			</div><!-- /.col-xs-12 -->

			<div class="col-xs-12">

				<div class="single-product-details-2">
					<?php //woocommerce_template_single_rating(); ?>
					<?php echo comments_template('woocommerce/single-product-reviews'); ?>
				</div><!-- /.single-product-details-2 -->

			</div><!-- /.col-xs-12 -->

		</div><!-- #product-<?php the_ID(); ?> -->

	</div><!-- /.shop-container -->
			
</div><!-- /.row -->

<div class="row">
	<div class="col-xs-12">
		<!-- Root element of PhotoSwipe. Must have class pswp. -->
		<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

			<!-- Background of PhotoSwipe. 
				 It's a separate element as animating opacity is faster than rgba(). -->
			<div class="pswp__bg"></div>

			<!-- Slides wrapper with overflow:hidden. -->
			<div class="pswp__scroll-wrap">

				<!-- Container that holds slides. 
					PhotoSwipe keeps only 3 of them in the DOM to save memory.
					Don't modify these 3 pswp__item elements, data is added later on. -->
				<div class="pswp__container">
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
				</div>

				<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
				<div class="pswp__ui pswp__ui--hidden">

					<div class="pswp__top-bar">

						<!--  Controls are self-explanatory. Order can be changed. -->

						<div class="pswp__counter"></div>

						<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

						<button class="pswp__button pswp__button--share" title="Share"></button>

						<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

						<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

						<!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
						<!-- element will get class pswp__preloader--active when preloader is running -->
						<div class="pswp__preloader">
							<div class="pswp__preloader__icn">
							  <div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							  </div>
							</div>
						</div>
					</div>

					<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
						<div class="pswp__share-tooltip"></div> 
					</div>

					<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
					</button>

					<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
					</button>

					<div class="pswp__caption">
						<div class="pswp__caption__center"></div>
					</div>

				</div>

			</div>

		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
