<?php

/*
Plugin Name: Simple Accordion Menu
Plugin URI: https://github.com/abler98/wp-simple-accordion-menu
Description: Widget для вывода иерархического WordPress меню в виде “Accordion”
Version: 1.0
Author: abler98
Author URI: https://github.com/abler98
*/

define( 'MENU_VIEWS_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'views' );

require_once 'class.simple-accordion-menu-widget.php';

function register_menu_widget() {
	register_widget( 'Simple_Accordion_Menu_Widget' );
}

wp_enqueue_style( 'menu', plugin_dir_url( __FILE__ ) . 'simple-accordion-menu.css' );
wp_enqueue_script( 'menu', plugin_dir_url( __FILE__ ) . 'simple-accordion-menu.js', [ 'jquery' ], false, true );

add_action( 'widgets_init', 'register_menu_widget' );
