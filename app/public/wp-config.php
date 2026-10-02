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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '%u$^QL,Yd52;}Zg,0|)I~%,)`|2R36xb9a-]Now:(-;!/$1q*o3{rii`-w~W>%v2' );
define( 'SECURE_AUTH_KEY',   '3J:$mG@Yd}/Sx62YV@6C?cxA%#ZXKSrD n,4/{~CHsKe-skk &-;L_9JOQ(>vMt/' );
define( 'LOGGED_IN_KEY',     '6dc6:sjo;r4W+9 [^V0[H7|XDdT`u50e.(#ul<fGP/rXVVD:?anO_Z(LE,~;]:zS' );
define( 'NONCE_KEY',         'r7ibKEcB&Y+k/,z;tWd|T13KJ70.nJ{GM]LgG?e2Ykn^Z2+}HAiH!Lb2|!~//5;t' );
define( 'AUTH_SALT',         'Y|!;31B$N9)*O]DpLKCvvETC_3X~o#>#ZI+fAXF4-Y]_FEgmRW7`X[ LIXHF>K3~' );
define( 'SECURE_AUTH_SALT',  '-,E#Bs$D<A!.8!1CHZr __ukuP3}d)9oEIQgRB/Q_F%x(ktYf>hE{(nQ8TlkMP/o' );
define( 'LOGGED_IN_SALT',    '~M<{Gq<QcS^IVziNxiZd^:D^gM0Bl0fZpA*(J;%`h]OXhVV+ByM>leGxjwgA3=HD' );
define( 'NONCE_SALT',        '_D#8%/}Z;|A$w4zp%Yml/]Qc[Uvgg_A}%1lhg+a&oN#xx`z1~%@}^8=Gm<Z49tOI' );
define( 'WP_CACHE_KEY_SALT', 'swl[N{xWvq)bNZu+g.wt$/J%*5WU}Xdx1Ne?z=SUMe>%^^3VR6s>2ALmFPqYyUn7' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
