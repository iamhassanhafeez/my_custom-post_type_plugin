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
            
        ];

    }
}
?>