<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Solebroadway_Theme_1
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container-fluid">

			<div class="row">
				<div class="col-xs-6 col-xs-offset-3">
					<div id="footer-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
					</div>
				</div>
			</div><!-- /.row -->

			<div class="row">
				<div class="col-xs-12">

					<div id="footer-info">

						<div class="socials">
							<a href="https://www.facebook.com/SoleBroadwayInc/" target="_blank">
								<i class="fa fa-facebook-official" aria-hidden="true"></i>
							</a>
							<a href="https://www.instagram.com/solebroadwayinc/" target="_blank">
								<i class="fa fa-instagram" aria-hidden="true"></i>
							</a>
						</div>

					</div><!-- /#footer-info -->

					<div id="credits">
						<div id="sphiere">
							<p>Powered by</p>
							<a href="http://www.sphiere.com.bn" target="_blank">
								<span class="image"></span>
							</a>
						</div>
						<div id="solebroadway">
							<p>© <?php echo date("Y"); ?> Solebroadway Inc </p>
							<span class="image"></span>
						</div>
					</div><!-- /#credits -->

				</div>
			</div><!-- /.row -->

		</div><!-- /.container-fluid -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
