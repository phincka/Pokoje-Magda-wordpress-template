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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hinczykk_wp15' );

/** MySQL database username */
define( 'DB_USER', 'hinczykk_wp15' );

/** MySQL database password */
define( 'DB_PASSWORD', 'C.m0pfi[azCTe&tCHL*60&]5' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'VCCbanqFtkYt9ia4inx28woeybUcW7UnrUUdHEpy7s6uvXlM8jXp0wvo6vmAlrgG');
define('SECURE_AUTH_KEY',  'Wz3kfpinYBLob0KfLOYkwD2fGjxObX9rqvOUpEZO7ApNXPdmILfZ574TFSOniOl8');
define('LOGGED_IN_KEY',    'mFQ5nwctBKiNzIOkDxo6UdfAfDiQzDh8GRutXBySgvXnPdvZ1BNrbY93YYiO9VND');
define('NONCE_KEY',        'bGz9Yi51j9EqKztlz3mkkiKk2MZG8zpLUR3DsTicWjM5XoN1AXq2e4cnxzb6de5S');
define('AUTH_SALT',        'fb44Ax56Kl9NVQX9kOI9jnc93kMwQyU9EFYzGubPFnav4DUgEZQLCJ9Ivby5RjQx');
define('SECURE_AUTH_SALT', 'F0q32KiDQUC93mo8Ng8ajIIjtWfhOlL3pTk2itDegvy8TJ6NmD0xmUgEODBctwRl');
define('LOGGED_IN_SALT',   'L5TGRkvzK7ZbSKAqIdMIHfTA0DvlVm84ycibie5v8hWGfdpdym1TWdM0zkUFH4g9');
define('NONCE_SALT',       'qVrNd85sqpQll5oM21uYk0MZmspGSUM8USnRMzYOQRdv3WXGaVhMFrbTiHER1ywR');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('WPCF7_AUTOP', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
