<div class="news-details__top">
    <div class="news-page__date-and-comment">
        <div class="news-page__date-box">
            <?php if(!empty(get_the_category())): ?>
            <p class="news-page__date-sub-title"><?php echo esc_html(get_the_category()[0]->name); ?></p>
            <?php endif; ?>
            <p class="news-page__date"><span class="icon-calendar"></span><?php the_time( get_option('date_format') ); ?></p>
        </div>
        <ul class="news-page__comment list-unstyled">
            <li>
                <p><span class="icon-chat"></span><a href="<?php comments_link();?>"><?php comments_number();?></a></p>
            </li>
            <li>
                <p><span class="icon-open-eye"></span>2000+ View</p>
            </li>
        </ul>
    </div>
    <h3 class="news-page__title"><?php the_title(); ?></h3>
    <p class="news-details__text"><?php echo esc_html(get_the_excerpt()); ?></p>
</div>

