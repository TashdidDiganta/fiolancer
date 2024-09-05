<?php
class Custom_About_Widget extends WP_Widget {

    // Constructor function
    public function __construct() {
        parent::__construct(
            'Custom_About_Widget',  // Widget ID
            'Fiolancer About Widget',  // Widget name
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

        <?php $about_img = get_theme_mod('image_setting_url','fiola-core');?>
        <?php $user_name = get_theme_mod('author_name','fiola-core');?>
        <?php $user_textarea = get_theme_mod('about_textarea','fiola-core');?>
        <?php $about_socials = get_theme_mod('about_social','fiola-core');?>
        
        

        <h4 class="tg-sidebar-title"><?php echo $title ?></h4>
        <div class="tg-blog-about text-center">
            <div class="tg-sidebar-avatar-img">
                <img src="<?php echo $about_img ?>" alt="img">
            </div>
            <div class="tg-blog-about-content">
                <h4 class="name"><?php echo $user_name; ?></h4>
                <p><?php echo $user_textarea; ?></p>
            </div>
            <div class="tg-blog-about-social">
            <?php foreach($about_socials as $social) : ?>
                <a href="<?php echo $social['link_url']; ?>"><?php echo $social['link_target']; ?></a>
            <?php endforeach; ?>
            </div>
        </div>

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
	register_widget('Custom_About_Widget');
});