<?php
/*
Plugin Name: Abirvab Bangla Radio
Plugin URI: http://radio.studioarrival.com
Description: Easily add Radio Abirvab to your website. Use widget or jus to the shortcode [radioabirvab] to any page/post 
Author: Jabed Bhuiyan
Author URI: http://studioarrival.com
Version: 1.0
*/

/*-- Create Sortcode For Online Bangla Radio Station --*/
function radio_abirvab_source( $atts ){
?>
<iframe src="http://radio.studioarrival.com/widgets/index.php" width="200" height="95" frameborder="0" scrolling="no"></iframe>

<?php
}
add_shortcode('radioabirvab', 'radio_abirvab_source');
add_filter('widget_text', 'do_shortcode');


/*-- Widget For AAM Bangla Radio Player --*/
class radioabirvabwidget extends WP_Widget
{
  function radioabirvabwidget()
  {
    $widget_ops = array('classname' => 'radioabirvabwidget', 'description' => '24/7 Online Bangla Radio.' );
    $this->WP_Widget('radioabirvabwidget', 'Radio Abirvab', $widget_ops);
  }
 
  function form($instance) 
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    //echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
    echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
  ?>
<iframe src="http://radio.studioarrival.com/widgets/index.php" width="200" height="95" frameborder="0" scrolling="no"></iframe>
 <?php
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("radioabirvabwidget");') );
?>