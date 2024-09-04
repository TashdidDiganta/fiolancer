<?php 

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fio
 */

$categories = get_the_terms( $post->ID, 'category' );

$fio_blog_date = get_theme_mod( 'fio_blog_date', true );
$fio_blog_comments = get_theme_mod( 'fio_blog_comments', true );
$fio_blog_author = get_theme_mod( 'fio_blog_author', true );
$fio_blog_cat = get_theme_mod( 'fio_blog_cat', false );

?>
<div class="news-page__date-and-comment">
    <div class="news-page__date-box">
        <p class="news-page__date-sub-title"><a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a></p>
        <p class="news-page__date"><span class="icon-calendar"></span><?php the_time( get_option('date_format') ); ?></p>
    </div>
    <ul class="news-page__comment list-unstyled">
        <li>
            <p><span class="icon-chat"></span><?php comments_number();?></p>
        </li>
        <li>
            <p><span class="icon-open-eye"></span>2000+ View</p>
        </li>
    </ul>
</div>
