<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress-task' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '~j=;9X}jWP1PJ.ebuiGk<(niDS pB6{qH5Il_&xj+_&9Guboa@v3`tY~Cs;{PfE^' );
define( 'SECURE_AUTH_KEY',  'G]AG1V:{E3JpB2`U4{l(KQWK1oK}sOo[1e%Z ZU@QQnzK`U,S_[q=e&fcYi@k5VR' );
define( 'LOGGED_IN_KEY',    'J<|v5R/W6Xr9bwnC5{l to7$16@H?G|8A>L*4mj$0~,/**)bScJG*x;YYjk_}5mm' );
define( 'NONCE_KEY',        'xd68I4|SZ81l|w~]h_u^?$T`i0kc-ubf>)[bxt7gP9-:.f21&`Tc1k0$1@n~[:Fm' );
define( 'AUTH_SALT',        'L&@+6M0`ry2=Lf w^o_ZnL5Y-u>[ub$6L#Wg-a|a7U|l]o@MCU<iNswjd,!$2Xap' );
define( 'SECURE_AUTH_SALT', 'S]I*JA:v<WeYRnV~-@gguI>4`cXZ}5bDyc`cHHw2=$/~^E*n{M~|a(D%_lFw.Ur0' );
define( 'LOGGED_IN_SALT',   ']3&nTd9t{JPeLCkahy(&dGs4mX&[)CK|8v@[YF7@;|9+YB6>Dsmkrs{QgX98.XT]' );
define( 'NONCE_SALT',       ' o`yKt~QVPHKONuDUL!3pKd`|P@g%P3@HwQ9y9}tARnY2wW67E zDkC!XP>JhL:C' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
