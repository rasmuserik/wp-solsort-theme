<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array('parent-style')
  );
}

function script_solsortjs() {
  echo '<script src="/solsort.js"></script>';
}

add_action( 'wp_print_footer_scripts', 'script_solsortjs' );

/**
 * Solsort Logo Widget
 */
class solsort_logo extends WP_Widget {
  /** constructor */
  function __construct() {
    parent::WP_Widget(false, $name = 'Solsort logo');  
  }
  /** @see WP_Widget::widget */
  function widget($args, $instance) { 
?>
<aside style="text-align: center" class="widget">
  <a href="https://solsort.com/">
    <img src=/icons/solsort.png width=50%>
    <h2 class="widget-title">solsort.com</h2>
  </a>
</aside>
<?php
  }
}
add_action('widgets_init', create_function('', 'return register_widget("solsort_logo");'));


?>
