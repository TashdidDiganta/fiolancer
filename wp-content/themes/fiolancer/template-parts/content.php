<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fio
 */

$fio_audio_url = function_exists( 'get_field' ) ? get_field( 'fio_post_audio' ) : NULL;
$gallery_images = function_exists('get_field') ? get_field('fio_post_gallery') : '';
$fio_video_url = function_exists( 'get_field' ) ? get_field( 'fio_post_video' ) : NULL;



$fio_blog_single_social = get_theme_mod( 'fio_blog_single_social', true );
$blog_tag_col = $fio_blog_single_social ? 'col-xl-6 col-md-7' : 'col-xl-12';

if ( is_single() ) : ?>
<!-- details start -->
<article id="post-<?php the_ID();?>" <?php post_class( 'tg-blog-post-item mb-0' );?>>

    
    <div class="news-details__img">
    <?php if ( has_post_format('image') ): ?>
    <!-- if post has image -->
    <?php if ( has_post_thumbnail() ): ?>
    <div class="tg-blog-post-thumb">
        <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
    </div>
    <?php endif;?>


    <!-- if post has video -->
    <?php elseif ( has_post_format('video') ): ?>
    <?php if ( has_post_thumbnail() ): ?>
    <div class="tg-blog-post-thumb nl-postbox-details-video">

        <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>

        <?php if(!empty($fio_video_url)) : ?>
        <a href="<?php print esc_url( $fio_video_url );?>" class="nl-postbox-video-btn popup-video"><i
                class="fas fa-play"></i></a>
        <?php endif; ?>
    </div>
    <?php endif; ?>


    <!-- if post has audio -->
    <?php elseif ( has_post_format('audio') ): ?>
    <?php if ( !empty( $fio_audio_url ) ): ?>
    <div class="tg-blog-post-thumb nl-postbox-details-audio">
        <?php echo wp_oembed_get( $fio_audio_url ); ?>
    </div>
    <?php endif; ?>

    <!-- if post has gallery -->
    <?php elseif ( has_post_format('gallery') ): ?>
    <?php if ( !empty( $gallery_images ) ): ?>
    <div class="nl-postbox-thumb nl-postbox-slider swiper-container p-relative">
        <div class="swiper-wrapper">
            <?php foreach ( $gallery_images as $key => $image ): ?>
            <div class="nl-postbox-slider-item swiper-slide">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
            <?php endforeach;?>
        </div>
        <div class="nl-postbox-nav">
            <button class="nl-postbox-slider-button-next"><i class="fal fa-arrow-right"></i></button>
            <button class="nl-postbox-slider-button-prev"><i class="fal fa-arrow-left"></i></button>
        </div>
    </div>
    <?php endif; ?>
    <!-- defalut image format -->
    <?php else: ?>
    <?php if ( has_post_thumbnail() ): ?>
    <div class="tg-blog-post-thumb">
        <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
    </div>
    <div class="">
      
    </div>
    <?php endif;?>
    <?php endif;?>
    </div>
    
    <div class="tg-blog-post-content tg-blog-details-content">
        <?php get_template_part( 'template-parts/blog/blog-details-meta' ); ?>
        <!-- content start -->
        <?php the_content(); ?>

        <?php if(has_tag() OR $fio_blog_single_social) :?>
        <div class="blog-details-bottom">
            <div class="row">
                <div class="<?php echo esc_attr($blog_tag_col); ?>">
                    <?php print fio_get_tag(); ?>
                </div>
    
                <?php if(!empty($fio_blog_single_social)) :?>
                    <div class="col-xl-6 col-md-5">
                        <div class="post-share text-md-end">
                            <h5><?php echo _e('Social Share','fiola'); ?></h5>
                            <ul class="list-wrap mb-0">
                                <?php foreach($fio_blog_single_social as $social) : ?>
                                    <li><a href="<?php echo $social['link_url']; ?>"><?php echo $social['link_target']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif ?>
        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ):
            comments_template();
        endif;
        ?>
    </div>
</article>

<!-- details end -->
<?php else: ?>

<article id="post-<?php the_ID();?>" <?php post_class( 'nl-postbox-item format-image mb-50 transition-3' );?>>

<?php 
$category = get_the_category();
?>

<?php if(get_post_format() == 'quote' ) : ?>
<div class="tg-blog-post-item">
    <div class="tg-blog-post-content quote-post" data-background="<?php the_post_thumbnail_url(); ?>">
        <div class="tg-blog-quote-icon">
            <img src=" <?php echo get_template_directory_uri(); ?> /assets/img/blog/blockquote.png" alt="">
        </div>
        <div class="tg-blog-quote-content">
            <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="tg-blog-post-meta">
                <ul class="list-wrap">
                    <li><i class="far fa-eye"></i><?php echo get_post_views(get_the_ID()); ?></li>
                    <li><a href="<?php the_permalink(); ?>"><i class="far fa-comments"></i><?php echo get_comments_number(); ?></a></li>
                    <li><i class="far fa-calendar-alt"></i><?php echo get_the_date('dS M Y') ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php elseif(get_post_format() == 'video' ) : ?>
<div class="tg-blog-post-item">
    <div class="tg-blog-post-thumb position-relative">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        <?php 
        $video_url = get_field('video_url');
        
        ?>
        <a href="<?php echo esc_url($video_url);?>" class="video--icon popup-video"><i class="fas fa-play"></i></a>
    </div>
    <div class="tg-blog-post-content">
        <div class="tg-blog-post-tag">
            <a href="<?php echo get_category_link($category[0]->term_id); ?>"><?php echo $category[0]->name; ?></a>
        </div>
        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="tg-blog-post-meta">
            <ul class="list-wrap">
                <li><i class="far fa-eye"></i><?php echo get_post_views(get_the_ID()); ?></li>
                <li><a href="<?php the_permalink(); ?>"><i class="far fa-comments"></i><?php echo get_comments_number(); ?></a></li>
                <li><i class="far fa-calendar-alt"></i><?php echo get_the_date('dS M Y') ?></li>
            </ul>
        </div>
        <div class="tg-post-text">
           <?php echo substr(get_the_excerpt(),0, 320);  ?>
        </div>
        <div class="tg-blog-post-bottom">
            <a href="<?php the_permalink(); ?>" class="btn theme-btn read-more"> <?php _e('Read More', 'fiolancer'); ?> </a>
        </div>
    </div>
</div>




<?php elseif(get_post_format() == 'gallery') :  ?>

<?php 
$gallery = tpmeta_gallery_field('gallery_fields'); 
?>

<div class="tg-blog-post-item">
    <div class="tg-blog-post-thumb tg-blog-thumb-active">
        <?php foreach($gallery as $img) : ?>
        <div class="slide-post">
            <img src="<?php  ?>" alt="img">
        </div>
        <?php endforeach; ?>
    </div>
    <div class="tg-blog-post-content">
        <div class="tg-blog-post-tag">
            <a href="<?php echo get_category_link($category[0]->term_id); ?>"><?php echo $category[0]->name; ?></a>
        </div>
        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="tg-blog-post-meta">
            <ul class="list-wrap">
                <li><i class="far fa-eye"></i> <?php echo get_post_views(get_the_ID()); ?></li>
                <li><a href="<?php the_permalink(); ?>"><i class="far fa-comments"></i><?php echo get_comments_number(); ?></a></li>
                <li><i class="far fa-calendar-alt"></i><?php echo get_the_date('dS M Y') ?></li>
            </ul>
        </div>
        <div class="tg-post-text">
           <?php echo substr(get_the_excerpt(),0, 320);  ?>
        </div>
        <div class="tg-blog-post-bottom">
            <a href="<?php the_permalink(); ?>" class="btn theme-btn read-more"><?php _e('Read More', 'fiolancer'); ?></a>
        </div>
    </div>
</div>
<?php elseif(get_post_format() == 'audio') : ?>
<div class="tg-blog-post-item">
    <div class="tg-blog-post-thumb ratio ratio-16x9">
        <?php
        $audio_url = get_field('audio_url');
        ?>
        <iframe src="<?php echo esc_url($audio_url); ?>"></iframe>
    </div>
    <div class="tg-blog-post-content">
        <div class="tg-blog-post-tag">
            <a href="<?php echo get_category_link($category[0]->term_id); ?>"><?php echo $category[0]->name; ?></a>
        </div>
        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="tg-blog-post-meta">
            <ul class="list-wrap">
                <li><i class="far fa-eye"></i><?php echo get_post_views(get_the_ID()); ?></li>
                <li><a href="<?php the_permalink(); ?>"><i class="far fa-comments"></i><?php echo get_comments_number(); ?></a></li>
                <li><i class="far fa-calendar-alt"></i> <?php echo get_the_date('dS M Y') ?></li>
            </ul>
        </div>
        <div class="tg-post-text">
           <?php echo substr(get_the_excerpt(),0, 320);  ?>
        </div>
        <div class="tg-blog-post-bottom">
            <a href="blog-details.html" class="btn theme-btn read-more"> <?php _e('Read More', 'fiolancer'); ?></a>
        </div>
    </div>
</div>
<?php else : ?>

<div class="tg-blog-post-item">
    <div class="tg-blog-post-thumb">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    </div>
    <div class="tg-blog-post-content">
        <div class="tg-blog-post-tag">
            <a href="<?php echo get_category_link($category[0]->term_id); ?>"><?php echo $category[0]->name; ?></a>
        </div>
        <h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
        <div class="tg-blog-post-meta">
            <ul class="list-wrap">
                <li><i class="far fa-eye"></i><?php echo get_post_views(get_the_ID()); ?></li>
                <li><a href="<?php the_permalink(); ?>"><i class="far fa-comments"></i><?php echo get_comments_number(); ?></a></li>
                <li><i class="far fa-calendar-alt"></i> <?php echo get_the_date('dS M Y') ?></li>
            </ul>
        </div>
        <div class="tg-post-text">
            <?php echo substr(get_the_excerpt(),0, 320);  ?>
            
        </div>
        <div class="tg-blog-post-bottom">
            <a href="<?php the_permalink();?>" class="btn theme-btn read-more"><?php _e('Read More', 'fiolancer'); ?></a>
        </div>
    </div>
</div>
<?php endif; ?>
</article>
<?php endif;?>
