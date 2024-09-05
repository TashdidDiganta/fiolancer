<?php
class Custom_Resent_Post_Widget extends WP_Widget {

    // Constructor function
    public function __construct() {
        parent::__construct(
            'Custom_Resent_Post_Widget',  // Widget ID
            'Fiolancer Resent Posts',  // Widget name
            array(
                'description' => 'A custom widget to display categories in the sidebar.'
            )
        );
    }

    // Widget output
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];

        $post_args = array(
            'post_type' => 'post', 
            'posts_per_page' => 3, 
        );

        $post = new WP_Query($post_args);
    
        ?>

    <h4 class="tg-sidebar-title"><?php echo $title ?></h4>
    <?php if($post->have_posts()) : ?>
        <?php while($post->have_posts()) : ?>
            <?php $post->the_post(); ?>       
            <div class="tg-rc-post">
                <div class="tg-rc-post-thumb">
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a>
                </div>
                <div class="tg-rc-post-content">
                <?php
                    $title = get_the_title();
                    $short_title = wp_trim_words( $title, 6, '.' );
                    ?>
                    <h5 class="title"><a href="<?php the_permalink(); ?>"><?php echo $short_title; ?></a></h5>
                    <div class="tg-rc-post-date">
                        <span><i class="far fa-calendar-alt"></i><?php echo get_the_date('dS M Y');  ?></span>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif;?>

        <?php
        echo $args['after_widget'];
    }

    // Widget form
    public function form($instance) {
        $title = isset($instance['title']) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php
    }

    // Update widget instance
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

add_action('widgets_init', function(){
	register_widget('Custom_Resent_Post_Widget');
});