<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

$config_dev_file  = __DIR__ . "/../config-dev.php";
$config_prod_file = __DIR__ . "/../config-prod.php";

if( file_exists( $config_prod_file ) ) {
	include $config_prod_file;
}else{
	include $config_dev_file;
}


define('WP_SITEURL', _BASE_URL . '/_wp' );

/**
 * NOTE: 
 * in multisite installation you will probably need to update this option manually 
 * directly in the database just after the network activation process.
 * You can do this in the wp_options table, updating the row´s value with the "home" option_name 
 * */
define('WP_HOME',    _BASE_URL . '/' );

define( 'WP_CONTENT_DIR', __DIR__ . '/wp-content' );
define( 'WP_CONTENT_URL', _BASE_URL . '/wp-content' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/_wp');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
