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

function add_book_meta_boxes(){
    add_meta_box(
        'book_details',
        'Book Details',
        'render_book_meta_box',
        'book',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'add_book_meta_boxes');

function render_book_meta_box($post){
    //Get current values
    $book_author = get_post_meta($post->ID, 'book_author', true);
    $published_year = get_post_meta($post->ID, 'published_year', true);

    wp_nonce_field('save_book_meta', 'book_meta_nonce');
    ?> <p>
    <label for="book_author">Author Name:</label>
    <input type="text" id="book_author" name="book_author" value="<?php echo esc_attr($book_author); ?>"
        class="widefat">
</p>
<p>
    <label for="published_year">Published Year:</label>
    <input type="text" id="published_year" name="published_year" value="<?php echo esc_attr($published_year); ?>"
        class="widefat">
</p> <?php
}

//save custom fields when the post is saved
function save_book_meta($post_id) {
    if (!isset($_POST['book_meta_nonce']) || !wp_verify_nonce($_POST['book_meta_nonce'], 'save_book_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['book_author'])) {
        update_post_meta($post_id, 'book_author', sanitize_text_field($_POST['book_author']));
    }

    if (isset($_POST['published_year'])) {
        update_post_meta($post_id, 'published_year', absint($_POST['published_year']));
    }
}
add_action('save_post', 'save_book_meta');

?>