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
add_action('admin_menu', 'wo_wp_support_menu');
function wo_wp_support_menu() // Function to create left menu on wp-admin
{
	if (function_exists('add_menu_page')) {
		
	  add_menu_page('Wp-message', 'Whatsapp Promo', 'manage_options', 'wp-whatsapp-messaging/users.php', 'wo_wp_support_menu','dashicons-email-alt2');
	  add_submenu_page( 'invoice-sync-for-xero-and-wpecommerce/xero-invoice.php', 'Page title', 'Customers', 'manage_options', 'invoice-sync-for-xero-and-wpecommerce/isxwpe_invoice_history.php', 'customers_list');
	add_submenu_page( 'invoice-sync-for-xero-and-wpecommerce/xero-invoice.php', 'Page title', 'Reports', 'manage_options', 'invoice-sync-for-xero-and-wpecommerce/isxwpe_plugin_help.php', 'isxwpe_plugin_help');
	 add_submenu_page( 'invoice-sync-for-xero-and-wpecommerce/xero-invoice.php', 'Page title', 'Settings', 'manage_options', 'invoice-sync-for-xero-and-wpecommerce/isxwpe_invoice_history.php', 'isxwpe_invoice_history');
	  add_submenu_page( 'invoice-sync-for-xero-and-wpecommerce/xero-invoice.php', 'Page title', 'Help', 'manage_options', 'invoice-sync-for-xero-and-wpecommerce/isxwpe_plugin_help.php', 'isxwpe_plugin_help');
	}
	  
}

function customers_list()
{

}
