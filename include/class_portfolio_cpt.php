<?php

class TS_Portfolio_CPT {


	public function __construct() {

		add_action( 'init', array( $this, 'cpt_register') );

	}


	public function cpt_register() {  
	    	 
		$portfolio_labels = array(
			'name' 					 => esc_html__( 'Portfolio', 'themesnap' ),
			'singular_name' 		 => esc_html__( 'Portfolio Post', 'themesnap' ),
			'add_new' 				 => esc_html__( 'Add New', 'themesnap' ),
			'add_new_item'			 => esc_html__( 'Add New Portfolio', 'themesnap' ),
			'edit_item' 			 => esc_html__( 'Edit Portfolio', 'themesnap' ),
			'new_item' 				 => esc_html__( 'Add New', 'themesnap' ),
			'view_item' 			 => esc_html__( 'View Portfolio', 'themesnap' ),
			'all_items'       	  	 => esc_html__( 'All Portfolio Items', 'themesnap' ),
			'search_items' 			 => esc_html__( 'Search Portfolio', 'themesnap' ),
			'not_found' 			 => esc_html__( 'No portfolio items found', 'themesnap' ),
			'not_found_in_trash'	 => esc_html__( 'No portfolio items found in trash', 'themesnap' )
		);

		$args = array(
	    	'labels' 				 => $portfolio_labels,
	    	'public' 				 => true,
	    	'publicly_queryable'	 => true,
	    	'query_var' 			 => true,
	    	'exclude_from_search'	 => true,
			'supports' 				 => array( 'title', 'editor', 'thumbnail', 'post-formats'),
			'capability_type' 		 => 'post',
			'rewrite' 				 => array("slug" => "portfolio"),
			'menu_position' 		 => 20,
			'has_archive' 			 => true,
			'menu_icon'		   		 => 'dashicons-portfolio',			
		);  
	  
	    register_post_type( 'portfolio' , $args );
  
	} 

}