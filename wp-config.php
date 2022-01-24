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
define( 'DB_NAME', 'shrite' );

/** MySQL database username */
define( 'DB_USER', 'majmua' );

/** MySQL database password */
define( 'DB_PASSWORD', 'aC[SRcujj(3EyXxI' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'L`gkn}YeWF>@_)E4ueh>Sgr-wX(a>Hy3qB,eQYB3rWW>VE!`:h#9n?%dCnv+Y)of' );
define( 'SECURE_AUTH_KEY',  ':!q ;tS+IsoiN)~2psx.VLLhk?Sza7OqG;33i;c>[{i1Cqw3_EB,2g]fW)N{=O.3' );
define( 'LOGGED_IN_KEY',    '|`kxw%wq)h?^FN>5P,!L_,o9K;Q-E[zhd%PONr%N:x%&+) O7P<n#E=x^wB`(D-!' );
define( 'NONCE_KEY',        'CP#5PXjS*3]-usKXD@F^10EWQbdR)[dO_H*rXI-Hh`&6[,6rs~9s^,^V 5L}F?kw' );
define( 'AUTH_SALT',        'fprJ+9K?(ofJ #}nC[/]?*Kslu_b#&&n/g;/L]i.-N*DRWrX6s:$]@;*V(t]KJsR' );
define( 'SECURE_AUTH_SALT', '_o7I6UkyNyPLr=`M.6$Ir7]wF;u.o#p*T~k#h_5}mV)DCS%}0c{fgD08uV9.H Ls' );
define( 'LOGGED_IN_SALT',   'mjl|aWMZrdd+tt4j;$6{m*(XzYOM)BhPP]$j7+/@X<rC-X=c;OdEFv<[#!]hF6|Z' );
define( 'NONCE_SALT',       'PU)B4&d7iLkU-7zkHW=GRooyXRtZDo9/CeQ(j__m{G[|Uz}nsIbWo7}?Wf:]<B+x' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
