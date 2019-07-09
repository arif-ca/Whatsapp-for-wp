<?php
/*
Plugin Name: Whats app support
Plugin URI: 
Description: Plugin to send messages and promotions to customers
Version: 1.0.0
Author: Arif C.A
*/

/* --- Create tables in not exist --- */
global $wpdb;

$my_products_db_version = '1.0.0';
$charset_collate = $wpdb->get_charset_collate();
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
// Users list table
$table_name = $wpdb->prefix . "whatsapp_users";
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            user_id int(11) NOT NULL COMMENT 'id of registered customer',
  phone_number varchar(100) NOT NULL COMMENT 'Contact number of customer',
  is_whatsapp_available set('1','0') NOT NULL DEFAULT '0' COMMENT '1:whatsapp available for user, 0: not available',
  is_message_blocked set('1','0') NOT NULL DEFAULT '1' COMMENT '0:customer blocked notification, 1: not blocked',
  user_status set('1','0') NOT NULL COMMENT '0:admin disabled this user notfication, 1 notification enabled',
  created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (user_id)
    )    $charset_collate;";

    
    dbDelta( $sql );
    add_option( 'my_db_version', $my_products_db_version );
}

// Messages table
$table_name = $wpdb->prefix . "whatsapp_messages";
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            `message_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `total_send` int(11) NOT NULL,
  `total_viewed` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (message_id)
    )    $charset_collate;";

    //require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    add_option( 'my_db_version', $my_products_db_version );
}

// Customer message table
$table_name = $wpdb->prefix . "whatsapp_customer_msg";
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `status` set('0','1','2','3') NOT NULL,
  `delivered_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`user_id`,`message_id`),
	KEY `Status of message` (`status`) USING BTREE
    )    $charset_collate;";

    //require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    add_option( 'my_db_version', $my_products_db_version );
}

/* --- Create tables in not exist ends --- */
