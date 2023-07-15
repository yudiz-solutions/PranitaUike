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
define( 'DB_NAME', 'expatriate' );

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
define( 'AUTH_KEY',         '2jZ8.6zAn#;EnRIXiW|+9L$es,)TLiRC]?(!a5v:}T5:]Zz[?pDOo9X`6s*p.T{A' );
define( 'SECURE_AUTH_KEY',  '^yn1^^TXYM)c$/9Jc&3EVfur6is{4tfF0M&vi O$6qm.-Yvi(#t|%/Q^qbc7C;*d' );
define( 'LOGGED_IN_KEY',    'C9H/UhqUil##1)$ok).=}jEij>1(8b5aO VAG+=OuPxRF3;*eKoGTZ0&vE*pH-mX' );
define( 'NONCE_KEY',        ',V1& BI%*V%m$v:ZUSeHA/d0a8Fas_kH%j2H[IrG$.H2%EE0DoVAX9LF)R2FYS9G' );
define( 'AUTH_SALT',        '/Ln$k_D_o7Hr$t*CB:NahJ|qpC>F6vZ N4|rh7G~JH)Z~U=YobygyYOjje]I3}[7' );
define( 'SECURE_AUTH_SALT', '~-(TMv<El-MhiSe0KO!+oyT@SLjt+pyNEEsOT3<_[+NA?xcIj}^KH9?C(U`HsyCa' );
define( 'LOGGED_IN_SALT',   'iBq9Clq2mv|s_`mb.~d51Rlc8|3o(&7;4}oR =KK0;BCP2Xu4&&4YIq5goq2s6@E' );
define( 'NONCE_SALT',       'DP:k^PW.Yu`nn8Py!&&-:^Yl|1Ch1]mS&Zj>Wg^AGE%v92q]j$=TyY ^MT0Qi>X=' );

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
