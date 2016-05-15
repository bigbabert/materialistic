<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package materialistic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-header row">
            <div class="col-md-12">		
		<?php
			if ( is_single() ) {
				the_title( '<h1 id="type" class="entry-title">', '</h1>' );
			} else {
				the_title( '<h1 id="type" class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php materialistic_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
            </div>
	</div><!-- .entry-header -->

	<div class="entry-content row">
            <div class="col-md-12">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'materialistic' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'materialistic' ),
				'after'  => '</div>',
			) );
		?>
            </div>
	</div><!-- .entry-content -->
        <div class="row">
	<footer class="entry-footer">
            <div class="bs-component col-md-6">
                <ul class="nav nav-tabs">
		<?php materialistic_entry_footer(); ?>
                </ul>
            </div>
	</footer>
        </div><!-- .entry-footer -->
</article><!-- #post-## -->
<?php if ( is_user_logged_in() ) : ?>
<div id="PostEditor" class="modal front-end_editor fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-header">
          <h4 class="modal-title"><?php print __("Edit ",'materialistic').the_title( '', '', false ); ?> </h4><i class="icon icon-material-clear close_modal" data-dismiss="modal" aria-hidden="true"></i>
      </div>
        <div class="modal-content">
        <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="<?php echo get_edit_post_link();?>">  </iframe>  
        </div>
        </div>        
    </div>
</div>
<?php endif; ?>


