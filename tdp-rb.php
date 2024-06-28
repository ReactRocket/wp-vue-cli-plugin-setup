<?php
/**
 * Plugin Name: tdp-rb
 * Description: Vue-App in WordPress.
 */

function func_load_vuescripts() {
    wp_register_script('tdp_rb_vuejs', plugin_dir_url( __FILE__ ) . 'dist/js/app.js', array(), null, true);
    wp_register_script('tdp_rb_vuejs1', plugin_dir_url( __FILE__ ) . 'dist/js/chunk-vendors.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'func_load_vuescripts');

// Add shortcode
function func_wp_vue(){
    wp_enqueue_script('tdp_rb_vuejs');
    wp_enqueue_script('tdp_rb_vuejs1');

    $str= "<div id='app'>"
          ."Message from Vue: "
          ."</div>";
    return $str;
} // end function

add_shortcode( 'tdp_rb', 'func_wp_vue' );
?>
