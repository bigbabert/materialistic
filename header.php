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
<?php if ( get_theme_mod( 'material_at_favicon' ) ) : ?>
<link rel="icon" sizes="192x192" href="<?php echo esc_url( get_theme_mod( 'material_at_favicon' ) );?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_theme_mod( 'material_at_favicon' ) );?>">
<meta name="msapplication-TileImage" content="<?php echo esc_url( get_theme_mod( 'material_at_favicon' ) );?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'material-at' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
        <div class="navbar navbar-default <?php if(true === get_theme_mod('material_at_sticky_header')) {echo "sticky_head";} ?>">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>  
                    <!-- site-branding -->
                        <?php if (get_theme_mod('material_at_logo')) : ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <img class="gs_logo" src="<?php echo esc_url(get_theme_mod('material_at_logo')); ?>" alt="<?php bloginfo(); ?>" title="<?php bloginfo(); ?>">
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
                            <form id="searchform" class="navbar-form navbar-right" method="get" action="<?php bloginfo('url'); ?>/">
                                    <input type="text" value="<?php print __( 'Search', 'material_at' );?>" onblur="if(this.value == '') {this.value = '<?php print __('Search', 'material_at');?>';}" onfocus="if(this.value == '<?php print __('Search', 'material_at');?>') {this.value = '';}" name="s" id="s" size="25" class="form-control" />        
                                    <input type="submit" id="searchsubmit" value="<?php print  __('Search', 'material_at');?>" class="submit" name="searchsubmit"/>
                            </form>
                    </div>
                </nav>
                </div>
        </div><!-- #site-navigation -->
        </header><!-- #masthead -->
<?php
if (true === get_theme_mod('material_at_slider_opt')) {
        if ( is_home() || is_front_page()) : ?>
    <!-- Full Page Image Background Carousel Header -->
    <div id="material_at_Carousel" class="material_at_slider carousel slide <?php if(true === get_theme_mod('material_at_sticky_header')){echo " fixed_header_slide";}?>">
                <?php 
                $count = 0;
                query_posts(array('post_type' => 'slide', 'posts_per_page' => 1 )); 
                if(have_posts()) : while(have_posts()) : the_post();
                $slide_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), NULL );
                ?>             
             <!-- Wrapper for Slides -->
        <div class="carousel-inner">
        <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php echo $slide_img[0]; ?>');"></div>
                <div class="carousel-caption">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            </div>
                <?php endwhile; wp_reset_postdata(); endif; wp_reset_query(); 
                query_posts(array('post_type' => 'slide', 'posts_per_page' => 5,'offset' => 1  )); 
                if(have_posts()) : while(have_posts()) : the_post();
                $slide_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), NULL );?>
                        <ol class="carousel-indicators">
                <?php
                $count = 0;
                foreach ($slide_img as $post_id){
                    ?>
            <li data-target="#material_at_Carousel" data-slide-to="<?php echo $count++; ?>" class="<?php if ($count = 0) {echo "active";}?>"></li>
                
                <?php $count++; if ($post_id >= $count){
                                break;
                                } elseif ($count == 1 ) { ?>
            <li data-target="#material_at_Carousel" data-slide-to="0" class="active"></li>
                                <?php 
                                continue;
                                }                                
                } ?>
            </ol>
            <div class="item">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php echo $slide_img[0]; ?>');"></div>
                <div class="carousel-caption">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            </div>
                <?php endwhile; wp_reset_postdata(); endif; wp_reset_query();?>
                </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#material_at_Carousel" data-slide="prev">
            <span class="icon-prev"><i class="icon icon-material-chevron-left"></i></span>
        </a>
        <a class="right carousel-control" href="#material_at_Carousel" data-slide="next">
            <span class="icon-next"><i class="icon icon-material-chevron-right"></i></span>
        </a>

    </div> 
<?php endif; }?>        
	<div id="content" class="site-content container">