<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fio
 */

get_header();

$blog_column 		= is_active_sidebar( 'blog-sidebar' ) ? 'col-lg-8' : 'col-xl-12 col-lg-8';
?>
<!-- breadcrumb area start -->
<section class="standard-blog-area pt-120 pb-120 nl-blog-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="<?php echo esc_attr($blog_column); ?>">
                <div class="postbox__text">
                <?php
                    while ( have_posts() ):
                    the_post();

                    get_template_part( 'template-parts/content', get_post_format() );
                ?>
                
                <?php 
                    if ( get_previous_post_link() AND get_next_post_link() ): 
                    $prev_post = get_adjacent_post(false, '', true);
                    $next_post = get_adjacent_post(false, '', false);
                ?>
                <?php endif;?>
                <!-- navigation end -->

                <?php
                    get_template_part( 'template-parts/biography', get_post_format() );
                    endwhile; // End of the loop.
                ?>
                </div>
            </div>

            <?php if ( is_active_sidebar( 'blog-sidebar' ) ): ?>
            <div class="col-lg-4 col-md-7">
                <div class="tg-blog-sidebar">
                    <?php get_sidebar();?>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->
<?php
get_footer();
