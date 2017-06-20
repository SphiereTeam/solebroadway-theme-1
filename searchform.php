<?php
/**
 * The template for displaying search form
 *
 * @package Solebroadway_Theme_1
 */
?>

<form role="search" method="get" class="form-inline search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'solebroadway-theme-1' ); ?></span>
		<input type="search" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'solebroadway-theme-1' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</div>
	
	<button type="submit" class="btn btn-default search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'solebroadway-theme-1' ); ?></span><?php echo _x( 'Search', 'submit button', 'solebroadway-theme-1' ); ?></button>
</form>