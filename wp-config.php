<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
// define( 'DB_NAME', 'wordpress' );
define( 'DB_NAME', 'Pandora' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'xjV~@#|TaI-P$$Bada9E+?tmN6;L}r__v9[YPR@k[iOoEU1{ O_*W5%9XpTZE}po' );
define( 'SECURE_AUTH_KEY',  'do4BI0S:>_%qt%R[qZMBMaYcmvOxDj,JvqO51U6W~QH]ny$Kv~_~jWR(uI3KvJa(' );
define( 'LOGGED_IN_KEY',    '3gIdOX6~6CdtDGPUE>G$T1R| mD A(D,&iprImT&il,Fwqgm9p;H4%$(4dDGI=r*' );
define( 'NONCE_KEY',        ')hu84:r3uo}_,E]ond~fUBNs{e msh{ESV6uOP] 6 yM1l7*%Ll=HyLn@![}DBk6' );
define( 'AUTH_SALT',        '6o;b;{iC0Q*G>PR4s0fwr$KRJPpJ8>8Gjc!I8%AVn9?VY12irld9zEL1$I+n=>~C' );
define( 'SECURE_AUTH_SALT', 'qA7~<wM+77Mrbz^UQ*,5fO0>^?ECCj2q,q>WB+4(0t0,6dCKBzYK$@;oTQ?%;AXw' );
define( 'LOGGED_IN_SALT',   '=c300BZZm=n0 19V(Ao|3gBb=?O2YzcaWmM6v!(e{L1wgBH)1%K TLpY*)d%caI(' );
define( 'NONCE_SALT',       '%He%QEfO W#{He*+kF|Z`&=WEuDR6R?KuVE<W?0gq BiEn(w|i.Ji}7YEYtZIp@Z' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
