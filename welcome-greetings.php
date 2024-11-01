<?php
/*
Plugin Name: Welcome Greetings based on Time
Plugin URI: https://store.devilhunter.net/wordpress-plugin/welcome-greetings/
Description:  This Plugin will automatically match your Theme's style. Go to Appearance > Widgets, and drag 'Plugin' in sidebar or footer or into any widgetized area. Insert into page or post by Page Builder. There is no need to use any short-code or to edit settings. Theme must be non-block Theme. 
Version: 1.0
Author: Tawhidur Rahman Dear
Author URI: https://www.tawhidurrahmandear.com/
Text Domain: tawhidurrahmandearthree
License: GPLv2 or later
 
 */
 
 
 // Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}
// 
 
class tawhidurrahmandearthreeWidget extends WP_Widget {
  function tawhidurrahmandearthreeWidget() {
    $widget_ops = array('classname' => 'tawhidurrahmandearthreeWidget', 'description' => 'Drag the Plugin in sidebar or footer. Insert into page or post by Page Builder' );
    $this->WP_Widget('tawhidurrahmandearthreeWidget', 'Welcome Greetings', $widget_ops);
  }
 
  function form($instance) {
    $instance = wp_parse_args((array) $instance, array( 'title' => '' ));
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title (optional) :<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance) {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
?>

<center>
<script language="Javascript">

day = new Date()
hr = day.getHours()

if (hr < "5") {
document.write("Good night.")
}

else if (hr < "9") {
document.write("Good morning.")
}

else if (hr < "15") {
document.write("Have a nice day.")
}

else if (hr < "18") {
document.write("Good afternoon.")
}

else if (hr < "22") {
document.write("Good evening.")
}

else if (hr < "24") {
document.write("Good night.")
}

</script>
</center>


<?php
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("tawhidurrahmandearthreeWidget");') );?>