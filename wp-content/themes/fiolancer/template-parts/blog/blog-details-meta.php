

<div class="tg-blog-post-tag">
    <?php if(!empty(get_the_category())): ?>
      <a href="blog.html"><?php echo esc_html(get_the_category()[0]->name); ?></a>
    <?php endif; ?>
</div>
<h2 class="title"><?php the_title(); ?></h2>
<div class="tg-blog-post-meta">
    <ul class="list-wrap">
        <li><i class="far fa-eye"></i><?php echo get_post_views(get_the_ID()); ?></li>
        <li><a href="<?php comments_link();?>"><i class="far fa-comments"></i><?php comments_number();?></a></li>
        <li><i class="far fa-calendar-alt"></i><?php echo get_the_date('dS M Y') ?></li>
    </ul>
</div>
