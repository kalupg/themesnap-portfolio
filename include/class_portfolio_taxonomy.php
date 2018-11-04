<?php

class TS_Portfolio_Taxonomy {

	public function __construct() {

		add_action( 'init', array( $this, 'taxonomy_register') );

	}

	public function taxonomy_register() {  

		$taxonomy_labels = array(
			'name' 							=> esc_html__( 'Portfolio Categories', 'themesnap' ),
			'singular_name' 				=> esc_html__( 'Portfolio Category', 'themesnap' ),
			'search_items' 					=> esc_html__( 'Search Portfolio Categories', 'themesnap' ),
			'popular_items'					=> esc_html__( 'Popular Portfolio Categories', 'themesnap' ),
			'all_items' 					=> esc_html__( 'All Portfolio Categories', 'themesnap' ),
			'parent_item' 					=> esc_html__( 'Parent Portfolio Category', 'themesnap' ),
			'parent_item_colon' 			=> esc_html__( 'Parent Portfolio Category:', 'themesnap' ),
			'edit_item' 					=> esc_html__( 'Edit Portfolio Category', 'themesnap' ),
			'update_item' 					=> esc_html__( 'Update Portfolio Category', 'themesnap' ),
			'add_new_item' 					=> esc_html__( 'Add New Portfolio Category', 'themesnap' ),
			'new_item_name' 				=> esc_html__( 'New Portfolio Category Name', 'themesnap' ),
			'separate_items_with_commas' 	=> esc_html__( 'Separate portfolio categories with commas', 'themesnap' ),
			'add_or_remove_items' 			=> esc_html__( 'Add or remove portfolio categories', 'themesnap' ),
			'choose_from_most_used' 		=> esc_html__( 'Choose from the most used portfolio categories', 'themesnap' ),
			'menu_name' 					=> esc_html__( 'Categories', 'themesnap' ),
		);

		$args = array( 
			'labels' 						=> $taxonomy_labels,
			'public' 						=> true,
			'show_in_nav_menus' 			=> true,
			'show_ui' 						=> true,
			'show_admin_column' 			=> true,
			'show_tagcloud'					=> false,
			'hierarchical' 					=> true,
			'rewrite' 						=> array( 'slug' => 'portfolio-category' ),
			'query_var' 					=> true
		);

	    register_taxonomy( 'portfolio_category' , 'portfolio', $args );

	}

}