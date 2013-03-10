<?php

// Register nav menu
register_nav_menu('english', 'English Menu');
register_nav_menu('spanish', 'Spanish Menu');
register_nav_menu('somali', 'Somali Menu');

// Create short excerpt and edit regular excerpt more
function short_excerpt($string, $wordsreturned) {
  $retval = $string;
  $array = explode(" ", $string);
  if (count($array)<=$wordsreturned) {
    $retval = $string;
  } else {
    array_splice($array, $wordsreturned);
    $retval = implode(" ", $array)."...";
  }
  echo $retval;
}

// Admin styles
function my_admin_head() {
    $template_url = get_bloginfo('template_url');
    echo '<link rel="stylesheet" href="' .$template_url. '/admin-style.css">';
}
add_action('admin_head', 'my_admin_head');

// Only show paragraph and h4 tags in tinyMCE
function only_p_h4($in) {
    $in['theme_advanced_blockformats']='p,h4';
    return $in;
}
add_filter('tiny_mce_before_init', 'only_p_h4' );

// include jQuery
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   // As of Nov. 2012, latest jQuery is 1.8.2
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

// Featured images
add_theme_support('post-thumbnails');

// Remove some stuff from head
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');

// Remove a few admin pages
add_action( 'admin_menu', 'my_remove_menus', 999 );
function my_remove_menus() {
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'link-manager.php' );
}

// Admin footer
add_filter('admin_footer_text', 'left_admin_footer_text_output'); //left side
function left_admin_footer_text_output($text) {
    $text = 'Site developed by <a href="http://parsleyandsprouts.com" target="_blank">Parsley &amp Sprouts</a>.';
    return $text;
}
add_filter('update_footer', 'right_admin_footer_text_output', 11); //right side
function right_admin_footer_text_output($text) {
    $text = '&copy '.date('Y').'.';
    return $text;
}

?>