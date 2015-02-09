<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package sparcwp
 */
?>

		<!--</div>--><!-- close .row -->
	<!-- </div> --><!-- close .container -->
<!-- </section> --><!-- close .main-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<?php if ( is_active_sidebar( 'footer-widgets-four-column' ) ) : ?>

				<?php dynamic_sidebar( 'footer-widgets-four-column' ); ?>

			<?php elseif ( is_active_sidebar( 'footer-widgets-full-width' ) ): ?>

			<?php dynamic_sidebar( 'footer-widgets-full-width' ); ?>
	<?php endif; ?>

			<?php //if ( is_active_sidebar( 'footer-widgets-four-column' ) ) : ?>
				<?php //dynamic_sidebar( 'footer-widgets-four-column' ); ?>
			<?php //endif; ?>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<span class="pull-left">Copyright &copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>. All Rights Reserved.</span>
			</div><!-- .col-lg-12 -->
		</div><!-- .row -->
	</div><!-- close .container -->
</footer><!-- close #colophon -->
			
<?php wp_footer(); ?>

</body>
</html>