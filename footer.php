<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>

			<div class="site-info">
				<?php do_action( 'twentythirteen_credits' ); ?>
				<?php _e('&copy;', 'twentythirteen'); ?> <?php _e(date('Y'), 'twentythirteen'); ?> <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">Dominika-Mróz Toton. Wszelkie prawa zastrzeżone.</a>
			</div><!-- .site-info -->

			<?php if (is_active_sidebar('site-keywords')) {
				dynamic_sidebar('site-keywords');
			}
			?>
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>