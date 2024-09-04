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
define( 'DB_NAME', 'wp_fiolancer' );

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
define( 'AUTH_KEY',         'YiQ05Zx73E$>OfJh@`iVx@;39Ogq%[pb:tkk7P$M(L2P4B!SMW9.Hi2IRd~r[z<v' );
define( 'SECURE_AUTH_KEY',  '%?ypXP|pOzZ8PLyx<LUO=RYP}1CTR$[P&U>D;IF>^lN7V[ZPG$,:@&!Gi(To8| k' );
define( 'LOGGED_IN_KEY',    '>RsCwf!#$cu#I&sxKGO?7rRF%vButivLVU+hvcf=$`h8A2Rk}_A#GgMh/L=&y?]u' );
define( 'NONCE_KEY',        '0zKAYpq%xFc@=j[|$Bn///ay}p|`Uc&_EC:drb.{U(T<;!:iQzPfAL%u(TiKjbba' );
define( 'AUTH_SALT',        'ns|^E@ -tArqj3xjH{YOswRRYM~f e.J}.T0@z%}MdF %xG2h)9yLi51c>OIf`BO' );
define( 'SECURE_AUTH_SALT', 'Leiu,zxpGSi OK c+~0I6/dE7*z )6 fb*8ImP/%zp8MlqV3<I9~$!u;o=5mnr]#' );
define( 'LOGGED_IN_SALT',   'i.!qFFCe$jO&9qX0hk_]a,` M=M?(!}vc ,g%P<{xy%59HikeI+?~m%0lO?Tu^G+' );
define( 'NONCE_SALT',       '4&n9^yGtl7Z5{#HX,}hWNIskXX:}t;PjDV?p]  #1WfJ1/5M8<2H}KEivJ?IsWS[' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
