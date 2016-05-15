<?php
        if ( is_home() || is_front_page()) : ?>
    <!-- Full Page Image Background Carousel Header -->
    <div id="materialistic_Carousel" class="materialistic_slider carousel slide <?php if(true === get_theme_mod('materialistic_sticky_header')){echo " fixed_header_slide";}?>">
                <?php 
                $count = 0;
                query_posts(array('post_type' => 'slide', 'posts_per_page' => 1 )); 
                if(have_posts()) : while(have_posts()) : the_post();
                $slide_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), NULL );?>
             <!-- Wrapper for Slides -->
        <div class="carousel-inner">
        <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div id="slides" class="fill" style="background-image:url('<?php echo $slide_img[0]; ?>');"></div>
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
                $count = 1;
                foreach ($slide_img as $post_id){
                    ?>
            <li data-target="#materialistic_Carousel" data-slide-to="<?php echo $count++; ?>" class="<?php if ($count = 0) {echo "active";}?>"></li>
                
                <?php $count++; if ($post_id >= $count){
                                break;
                                } elseif ($count == 1 ) { ?>
            <li data-target="#materialistic_Carousel" data-slide-to="<?php echo $count; ?>" class="active"></li>
                                <?php 
                                continue;
                                }                                
                } ?>
            </ol>
            <div class="item">
                <!-- Set the first background image using inline CSS below. -->
                <div id="slides" class="fill" style="background-image:url('<?php echo $slide_img[0]; ?>');"></div>
                <div class="carousel-caption">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            </div>
                <?php endwhile; wp_reset_postdata(); endif; wp_reset_query();?>
                </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#materialistic_Carousel" data-slide="prev">
            <span class="icon-prev"><i class="icon icon-material-chevron-left"></i></span>
        </a>
        <a class="right carousel-control" href="#materialistic_Carousel" data-slide="next">
            <span class="icon-next"><i class="icon icon-material-chevron-right"></i></span>
        </a>

    </div> 
<?php endif;