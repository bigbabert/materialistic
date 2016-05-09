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
                 <?php if ( ! get_theme_mod( 'material_at_footers_text' ) ) : ?>   <p><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'material_at' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'material_at' ), 'WordPress' ); ?></a> | <?php printf( __( 'Theme: %1$s made with <i style="color:red;" class="icon icon-material-favorite icon-material-pink"></i><span class="hidden">love</span> by  %2$s.', 'material_at' ), 'Materialistic', '<a class="white" href="http://www.blog.altertech.it/author/alberto-cocchiara/" rel="nofollow"> AlterTech</a> ' ); ?> </p>
                 <?php else : ?>
                 <?php echo get_theme_mod( 'material_at_footers_text' ); ?>
                    <?php endif; ?>						
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<?php
if (true === get_theme_mod('material_at_slider_opt')) {
    if ( is_home() || is_front_page()) : ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('.material_at_slider').carousel({
  		interval: 5000	
  	});
            <?php if(true === get_theme_mod('material_at_sticky_header')) :?>
            var winWidth = $(window).width();
            var navBarHeight = $(".navbar-responsive-collapse").outerHeight() / 2;
            var winHeight = $(window).outerHeight();
            var margTop = $(".navbar-default.sticky_head").outerHeight() / 2;
            $(".material_at_slider").css({"width": winWidth, "height": winHeight - navBarHeight, "margin-top": margTop});                    
            <?php else : ?>
            var winWidth = $(window).width();
            var navBarHeight = $(".navbar-responsive-collapse").outerHeight();
            var winHeight = $(window).outerHeight();
            $(".material_at_slider").css({"width": winWidth, "height": winHeight - navBarHeight});
            <?php endif; ?>
});
</script> 
<?php if(true != get_theme_mod('material_at_sticky_header')) :?>
<style>
    header#masthead, .navbar-default {
        width: 100%;
        float: left;
        margin: 0;
        padding: 0;
        height: 80px;
    }
</style>
<?php else: ?>
<style>
    header#masthead, .navbar-default {
        width: 100%;
        float: left;
        margin: 0;
        padding: 0;
    }
    #wpadminbar {
        position: fixed;
    }
</style>
<?php endif; ?>
<?php endif;} ?>
</body>
</html>
