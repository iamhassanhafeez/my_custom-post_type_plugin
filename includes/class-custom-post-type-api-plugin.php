<?php
class CustomPostTypeAPI{
    public function __construct(){
        add_action('init', [$this, 'register_custom_post_type']);
        register_activation_hook( __FILE__, [$this,'my_rewrite_flush'] );

    }
    public function register_custom_post_type(){
        echo "Plugin initialized";
        $labels = [
            'name'=>'Books',
            'singular_name'=>'Book',
            'add_new'=>'Add New',
            'edit_item'=>'Edit Book',
            'add_new_item'=>'Add New Book',
            'new_item'=>'New Book',
            'view_item'=>'View Book',
            'all_items'=>'All Books',
            'search_items'=>'Search Books',
            'not_found'=>'No books found'
        ];

        $args = [
            'labels'=>$labels,
            'public'=>true,
            'has_archive'=> true,
            'supports'=>['title', 'editor', 'thumbnail'],
            'show_in_rest'=>true,
            'rest_base'=>'books',
            'menu_icon'=>'dashicons-book',
            'rewrite'=>array('slug'=>'book')
        ];

        register_post_type('books', $args);

    }
    
    public function my_rewrite_flush() {
        register_custom_post_type();
        flush_rewrite_rules();
    }

}

?>