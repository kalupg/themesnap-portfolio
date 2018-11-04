<?php

/*
Plugin Name: themesnap Portfolio
Plugin URI: http://themesymbol.com
Description: Portfolio CPT and widget for themesnap themes
Version: 1.0
Author: themesnap
Author URI: http://themeforest.net/user/themesnap
*/

if ( ! defined( 'WPINC' ) ) {
    die;
}

require_once( DIRNAME(__FILE__) . '/include/class_portfolio_cpt.php' );
require_once( DIRNAME(__FILE__) . '/include/class_portfolio_taxonomy.php' );
require_once( DIRNAME(__FILE__) . '/include/class_portfolio_widget.php' );

function ts_setup_portfolio() {

    new TS_Portfolio_CPT();
    new TS_Portfolio_Taxonomy();

}

ts_setup_portfolio();

function ts_portfolio_activate() { 

    ts_setup_portfolio();
    flush_rewrite_rules();

}

register_activation_hook( __FILE__, 'ts_portfolio_activate' );
 

function ts_portfolio_deactivate() {

    flush_rewrite_rules();

}

register_deactivation_hook( __FILE__, 'ts_portfolio_deactivate' );

function ts_enqueue_scripts() {
    if ( is_admin() ) {

        wp_register_style('portfolio-css', plugin_dir_url(__FILE__) . 'css/style.css');
        wp_enqueue_style('portfolio-css');

    }
}

add_action( 'admin_enqueue_scripts', 'ts_enqueue_scripts' );  


if ( !function_exists('portfolio_is_bad_hierarchical_slug') ) {

    function portfolio_is_bad_hierarchical_slug( $is_bad_hierarchical_slug, $slug, $post_type, $post_parent ) {
        if ( !$post_parent && $slug == 'portfolio' )
            return true;
        return $is_bad_hierarchical_slug;
    }

}

add_filter( 'wp_unique_post_slug_is_bad_hierarchical_slug', 'portfolio_is_bad_hierarchical_slug', 10, 4 );


if ( !function_exists('portfolio_is_bad_flat_slug') ) {

    function portfolio_is_bad_flat_slug( $is_bad_flat_slug, $slug, $post_type ) {
        if ( $slug == 'portfolio' )
            return true;
        return $is_bad_flat_slug;
    }

}

add_filter( 'wp_unique_post_slug_is_bad_flat_slug', 'portfolio_is_bad_flat_slug', 10, 3 );