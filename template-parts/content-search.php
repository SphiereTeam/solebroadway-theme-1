<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Solebroadway_Theme_1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="search-product">

		<div class="image">
			<?php the_post_thumbnail( 'thumbnail' ); ?>
		</div>
		<div class="description">
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
			<a class="btn btn-default front-latest-product-btn" href="<?php echo esc_url( get_permalink() ); ?>">View Product</a>
		</div>
		
	</div><!-- .search-product -->

</article><!-- #post-## -->
