<?php
class CustomPostTypeAPI{
    public function __construct(){
        add_action('init', [$this, 'register_custom_post_type']);
    }
    public function register_custom_post_type(){
        echo "Plugin initialized";
        $labels = [
            'name'=>'Books',
            'singular_name'=>'Book',
            'add_new'=>'Add New Book',
            'edit_item'=>'Edit Book',
            'new_item'=>'New Book',
            'view_item'=>'View Book',
            'all_items'=>'All Books',
            'search_items'=>'Search Books',
            'not found'=>'No books found'
        ];

        $args = [
            'labels'=>$labels,
            'public'=>true,
            'has_archive'=> true,
            'suports'=>['title', 'editor', 'thumbnail'],
            'show_in_rest'=>true,
            'rest_base'=>'books',
            'menu_icon'=>'dashicons-book'
        ];

        register_post_type('books', $args);

    }
}
?>