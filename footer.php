<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WebPromo
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer row">
		<div class="site-info col-md-12">
			<p>&copy; <?php echo Date('Y'); ?> - <?php bloginfo('name'); ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
