# WordPress Composer Installation

Base configuration for install and deploy WordPress sites using composer

The structure for your WordPress instalation will be:

    /config-dev.php
    /config-prod.php.dist
    /vendor
    /public
    /public/_wp        -> the WordPress installation dir (managed by composer)
    /public/index.php  -> the WordPress bootstrap file
    /public/wp-content -> the WordPress wp-content directory

It uses [WordPress Packagist](https://wpackagist.org/) in order to manage your plugins, themes and other php dependencies

## How to start

### Step1: Instalation

**Requirements:**
* PHP5.4 or greater
 
 

**Clone the repo in your project directory:**

```bash
git clone git@github.com:Simettric/wordpress-composer-installation.git my-project
    
# you can remove then the .git reposity and start a new git repo
#
# cd my-project
# rm -rf .git
# git init .
#
```
**Install the composer dependencies:**
```bash
composer install
```
**Create your configuration file:**
```bash
cp config-prod.php.dist config-dev.php
 
# Create the config-prod file if you want to work in production mode directly (not recommender)
# NOTE: If you do this, WordPress will use the config-prod.php file instead the config-dev.php
# cp config-prod.php.dist config-prod.php
```
**Set the WordPress permissions:**
```bash
# Configure the wp-content/uploads permissions
# https://codex.wordpress.org/Changing_File_Permissions
chmod -R 755 public/wp-content/uploads
```
 
### Step2: Configuration
 
You need almost one of these configuration files:
  
**config-dev.php:**
 
This file must be used for dev environment.
WordPress will use it only if there is not a config-prod.php file.
 
**config-prod.php:**
 
This file must be used for production environment only. 
Your probably want to create this file automatically during your deployment process.
 
#### Configure your WordPress url in config-prod and config-dev files:
  
 ```php
 //config-dev.php
 define('_BASE_URL', 'http://localhost:8887');
```

#### Configure the rest of conventional wp-config parameters

 ```php
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'database_name_here');

/** MySQL database username */
define('DB_USER', 'username_here');

/** MySQL database password */
define('DB_PASSWORD', 'password_here');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);


```