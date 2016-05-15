<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package materialistic
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer text-center footer_at" role="contentinfo">
		<div class="site-info">
                 <?php if ( ! get_theme_mod( 'materialistic_footers_text' ) ) : ?>   <p><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'materialistic' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'materialistic' ), 'WordPress' ); ?></a> | <?php printf( __( 'Theme: %1$s made with <i style="color:red;" class="icon icon-material-favorite icon-material-pink"></i><span class="hidden">love</span> by  %2$s.', 'materialistic' ), 'Materialistic', '<a class="white" href="http://www.blog.altertech.it/author/alberto-cocchiara/" rel="nofollow"> AlterTech</a> ' ); ?> </p>
                 <?php else : ?>
                 <?php echo get_theme_mod( 'materialistic_footers_text' ); ?>
                    <?php endif; ?>						
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
