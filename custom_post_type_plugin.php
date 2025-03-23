<?php
/**
 * Plugin Name: My Custom Post Type API Plugin
 * Description: This plugin creates custom post type "Books".
 * Plugin URI: mailto:iamhassanhafeez@gmail.com
 * Author: Hassan Hafeez
 * Author URI: mailto:iamhassanhafeez@gmail.com
 * Version: 1.0.0
 * License: GPL2
 */

 if (!defined('ABSPATH')) exit;
require_once plugin_dir_path(__FILE__).'includes/class-custom-post-type-api-plugin.php';

function custom_post_type_init(){
    new CustomPostTypeAPI();
}

add_action('plugins_loaded', 'custom_post_type_init');

?>