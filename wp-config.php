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
define( 'DB_NAME', 'fiolancer' );

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
define( 'AUTH_KEY',         'WL$K?<X${{&3>SyyL?av7}sc=&}m%+1cZbVIZU-Eqj{boW$(,5m?Z+:X16^eVN*0' );
define( 'SECURE_AUTH_KEY',  '0ZXOp1$8K+/y4-;Q71VxYZ9VZ)p_j+u{eH?D`,7a$8o+i,w,hDnGp-hD5lLQ?Q^@' );
define( 'LOGGED_IN_KEY',    '6R/t:H@d4-*XK@=tQ?=Cky;C2X23j;XmI7R`UOD1o&FTKf7s455Vw4MUY!f*hr4v' );
define( 'NONCE_KEY',        'R6YZN:^7ix;t4VdcFEar*kyFdc+)Z6??{L&CH,wNYNEl@S|BIhI=Zyo$h-=9$XpJ' );
define( 'AUTH_SALT',        'siTr%B_15G8U)+w>|t9&-$|;Uy+rEXUEE$Q-_OFH`BEQJa>flRs/.9!}BjS*}74@' );
define( 'SECURE_AUTH_SALT', 'A9!g@XDJhjxu4Nl#^{!vrx=W$ntLpP-V[?K@@#.=#8rv T:7SB#(g%RC2@3/;`L!' );
define( 'LOGGED_IN_SALT',   'VTr.35nUNZ[.,PNLp,m$2$TlnusPWutteUT#biHgxG2Gl^)SIkwj6 #mdwyzXm&9' );
define( 'NONCE_SALT',       '@/Y&e8E<SsY,@xrb5K@2#Yhe>DYdaB8tYYi.t&0^[jAkLzDwK}wmvbL}B%,89$,Z' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'FS_METHOD', 'direct' );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
