<?php

// Create Custom Post Type
function bh_basic_slider_custom_post_register() {  
    $args = array(  
        'labels' => array (
			'name' => __( "BH Slider "),
			'singular_label' => __("BH Slider"),  
			'add_new_item' => __("Add New Slider"),
			'edit_item' => __("Edit Slider"),
			'new_item' => __("New Slider"),
			'view_item' => __("View Slider"),
		), 
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'editor', 'thumbnail')  
       );  
    register_post_type("bh_slider_post" , $args );  
}
add_action('init', 'bh_basic_slider_custom_post_register');
