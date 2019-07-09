<?php
/*
Plugin Name: Whats app support
Plugin URI: 
Description: Plugin to send messages and promotions to customers
Version: 1.0.0
Author: Arif C.A
*/

/* --- Installation process --- */
function installer(){
    include('includes/installer.php');
}
register_activation_hook( __file__, 'installer' );
/* --- Installation process ends --- */
// Add menu options for admin
function wpdocs_register_my_custom_menu_page(){
	add_menu_page('Whatsapp Support', 'Whatsapp Support', 'manage_options','customers-list','customer_list','dashicons-groups');
	add_submenu_page( 'customer-reports', 'Whatsapp Support', 'Users', 'manage_options', 'customer-reports');
	add_submenu_page( 'customer-reports', 'Send new message', 'Send new message','manage_options', 'my-secondary-slug');
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
// Add Css and Js
function whatsapp_support_assets() {
	wp_register_style('whatsapp_support', plugins_url('assets/css/style.css',__FILE__ ));
	wp_enqueue_style('whatsapp_support');
	wp_register_script( 'whatsapp_support', plugins_url('assets/js/custom.js',__FILE__ ));
	wp_enqueue_script('whatsapp_support');
}

// Function start from here
add_action( 'admin_init','whatsapp_support_assets');
function customer_list()
{
	include('templates/customers.php');
}
