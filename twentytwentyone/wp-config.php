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
define( 'DB_NAME', 'twentytwentyone' );

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
define( 'AUTH_KEY',         ',4ynT^9o_ltzu#V!t.m2xJCY$fm=>&OXP,l*F=IhZEY(dI1TR)t3Rj95BC,|Hi#s' );
define( 'SECURE_AUTH_KEY',  '<!si{W+g{1gNqVjt{v%(Zr7[GgEx7nz >H#MNo|I1}7#0KQX#(3l7NJXC1.Dh%-H' );
define( 'LOGGED_IN_KEY',    '$,~vT{o_Yd*O>Ozqnh=aA;[OA!fY@[1ysBAl8HY%dC#@_>viH(?I]^|{a}=ma$TV' );
define( 'NONCE_KEY',        'R|6K_6Pu>Qite~/Qpqw[Q[Y|Vd}bPw8o>{pd%quhRk*km;@WM0aPe2PS2RClxR]K' );
define( 'AUTH_SALT',        'q+VX.QCZ0TYx1W7tiPU$LJZJh#/Ne3G[O=D8C_E+ `@$e>af?z>]yy<&@)Di[:56' );
define( 'SECURE_AUTH_SALT', 'tHq|c(?Z~:SrHqSsOWcZn|9OK:bfbvF{`6OaWH584VAN.^tm&@[2Z~e_&PGh~l{1' );
define( 'LOGGED_IN_SALT',   'ynVz){J8!i9{BE?3a.Jwin+Op?n<zNBv::+QtEG!%K!{2r/[d4UapE&*%Ns:4sZ|' );
define( 'NONCE_SALT',       'lPV[i1u6bzm4Fx]R$>KsBIX$U^:.XG13U%e!9zH>.N^k&^Rjgfie#|`2-#oY)Acc' );

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
