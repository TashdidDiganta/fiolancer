<?php

class Custom_Populer_Post_Widget extends WP_Widget {

    // Constructor function
    public function __construct() {
        parent::__construct(
            'custom_categories_widget',  // Widget ID
            'zeta populer post',  // Widget name
            array(
                'description' => 'A custom widget to display categories in the sidebar.'
            )
        );
    }

    // Widget output
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $post_number = $instance['post_number'];
        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        ?>
        <?php 
        $query = new WP_Query(array(
            'post_type' => 'post',
            'post_status'   => 'publish',
            'posts_per_page' => $post_number,
            'order'     => 'DESC'
        ));
        
        ?>




        <!-- Popular Post -->

        <?php if($query->have_posts()): ?>
          <?php while($query->have_posts()) : ?>
            <?php $query->the_post(); ?>
                <div class="popular_post d-flex flex-row justify-content-start">
                    <div class="popular_post_image">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                    </div>
                    <div class="popular_post_content">
                        <h4 class="popular_post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <span class="popular_post_date"><?php echo get_the_date(); ?></span>
                    </div>
              </div>
          
          <?php endwhile; ?>
        <?php endif; ?>




<?php

        echo $args['after_widget'];
    }

    // Widget form
    public function form($instance) {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $post_number = isset($instance['post_number']) ? $instance['post_number'] : 5;
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : 0;

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_number'); ?>">Show Number:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('post_number'); ?>"
                   name="<?php echo $this->get_field_name('post_number'); ?>" type="number"
                   value="<?php echo esc_attr($post_number); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('show_date'); ?>">Show Date:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('show_date'); ?>"
                   name="<?php echo $this->get_field_name('show_date'); ?>" type="checkbox"
                   value="<?php echo esc_attr($show_date); ?>"/>
        </p>
        <?php
    }

    // Update widget instance
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['post_number'] = (!empty($new_instance['post_number'])) ? strip_tags($new_instance['post_number']) : 5;
        $instance['show_date'] = (!empty($new_instance['show_date'])) ? strip_tags($new_instance['show_date']) : 0;
        return $instance;
    }
}
