<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package materialistic
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod( 'materialistic_favicon' ) ) : ?>
<link rel="icon" sizes="192x192" href="<?php echo esc_url( get_theme_mod( 'materialistic_favicon' ) );?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_theme_mod( 'materialistic_favicon' ) );?>">
<meta name="msapplication-TileImage" content="<?php echo esc_url( get_theme_mod( 'materialistic_favicon' ) );?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'materialistic' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
        <div class="navbar navbar-default <?php if(true === get_theme_mod('materialistic_sticky_header')) {echo "sticky_head";} ?>">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>  
                    <!-- site-branding -->
                        <?php if (get_theme_mod('materialistic_logo')) : ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <img class="gs_logo" src="<?php echo esc_url(get_theme_mod('materialistic_logo')); ?>" alt="<?php bloginfo(); ?>" title="<?php bloginfo(); ?>">
                        </a>
                    <?php else : ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    <?php endif; ?>
                    <!-- .site-branding -->
                <div class="navbar-collapse collapse navbar-responsive-collapse container-fluid">
		<nav id="site-navigation" class="main-navigation" role="navigation">
                    <div class="col-md-7 col-sm-7 ">
                    <?php  wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => '', 'items_wrap' => '<ul id="primary" class="nav navbar-nav">%3$s</ul>', 'walker' => new Material_AT_Nav_Menu ) ); ?>                        
                    </div>
                    <div class="col-md-4 col-sm-4 pull-right">
                            <form id="searchform" class="navbar-form navbar-right" method="get" action="<?php echo esc_url( home_url()); ?>/">
                                    <input type="text" value="<?php print __( 'Search...', 'materialistic' );?>" onblur="if(this.value == '') {this.value = '<?php print __('Search...', 'materialistic');?>';}" onfocus="if(this.value == '<?php print __('Search...', 'materialistic');?>') {this.value = '';}" name="s" id="s" size="25" class="form-control" />        
                                    <input type="submit" id="searchsubmit" value="<?php print  __('Search', 'materialistic');?>" class="submit" name="searchsubmit"/>
                            </form>
                    </div>
                </nav>
                </div>
        </div><!-- #site-navigation -->
        </header><!-- #masthead -->
        <div class="clearfix"></div>
<?php
if (true === get_theme_mod('materialistic_slider_opt')) {
get_template_part('template-parts/carousel', 'none');
}?>        
	<div id="content" class="site-content container">