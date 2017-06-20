<?php get_header(); ?>

<div class="container-fluid">
	<div class="row">

		<?php
			$prod_categories = get_terms( 'product_cat', array(
				'orderby'       => 'name',
				'order'         => 'ASC',
				'parent'        => 0,
				'number'        => 3,
				'hide_empty'    => true
			));

			$cat_links_array = array();
			$cat_names_array = array();
			$cat_images_array = array();

			foreach( $prod_categories as $prod_cat ) :
				//$shop_catalog_img = wp_get_attachment_image_src($cat_thumb_id, 'shop_catalog');
				//$term_link = get_term_link($prod_cat, 'product_cat');

				$cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );

				array_push( $cat_images_array, wp_get_attachment_image_src($cat_thumb_id, 'shop_catalog') );
				array_push( $cat_links_array, get_term_link($prod_cat, 'product_cat') );
				array_push( $cat_names_array, $prod_cat->name );
 
			endforeach;
			wp_reset_query();
		?>

		<div id="cat-container">
			
			<div class="front-category" style="background: url('<?php echo $cat_images_array[0][0]; ?>') no-repeat center center;background-size: cover;">
				<a class="front-category-link" href="<?php echo $cat_links_array[0]; ?>">
					<div class="btn btn-default front-btn">
						<?php echo $cat_names_array[0]; ?>
					</div>
				</a>
			</div>

			<div class="front-category" style="background: url('<?php echo $cat_images_array[1][0]; ?>') no-repeat center center;background-size: cover;">
				<a class="front-category-link" href="<?php echo $cat_links_array[1]; ?>">
					<div class="btn btn-default front-btn">
						<?php echo $cat_names_array[1]; ?>
					</div>
				</a>
			</div>

			<div class="front-category" style="background: url('<?php echo $cat_images_array[2][0]; ?>') no-repeat center center;background-size: cover;">
				<a class="front-category-link" href="<?php echo $cat_links_array[2]; ?>">
					<div class="btn btn-default front-btn">
						<?php echo $cat_names_array[2]; ?>
					</div>
				</a>
			</div>

		</div>

	</div><!-- /.row -->

	<?php if ( is_active_sidebar( 'home-slider-sidebar' ) ) : ?>

		<div class="row">
			<div class="col-sm-12 hidden-xs">
				<?php dynamic_sidebar( 'home-slider-sidebar' ); ?>
			</div>
		</div><!-- /.row -->

	<?php endif; ?>

	<?php

		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 1
		);

		$latest_permalink = "";
		$latest_thumbnail = "";
		$latest_title = "";
		$latest_description = "";

		$loop = new WP_Query( $args );

		while ( $loop->have_posts() ) : $loop->the_post();

			global $product;

			$latest_permalink = get_permalink();
			$latest_thumbnail = woocommerce_get_product_thumbnail('medium');
			$latest_title = get_the_title();
			$latest_description = $product->post->post_content;

			//echo '<pre>' . var_export($product, true) . '</pre>';
			$latest_image_id = $product->get_image_id();
			$latest_image_array = wp_get_attachment_image_src( $latest_image_id, "large" );
			$latest_image_url = $latest_image_array[0];
			//echo $test[0];

		endwhile;

		wp_reset_query();

	?>

	<div class="front-latest-product">
		<div class="front-latest-product-1" style="background: url('<?php echo $latest_image_url; ?>') no-repeat center center;background-size: cover;">
		</div>
		<div class="front-latest-product-2">
			<div class="front-latest-product-2a">
				<span>Latest</span>
				<h3><?php echo $latest_title; ?></h3>
				<p><?php echo $latest_description; ?></p>
				<a class="btn btn-default front-latest-product-btn" href="<?php echo $latest_permalink; ?>">View Product</a>
			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>