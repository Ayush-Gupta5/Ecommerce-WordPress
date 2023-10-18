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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mobile_db' );

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
define( 'AUTH_KEY',         '?Kzi1y{G_?6=` wb4g5G7u0J ;L~A_5w4}uSMy ve{feF|b@fun}J2qIxF^JS]k4' );
define( 'SECURE_AUTH_KEY',  'Yr%y1!Vtm,Ai#V7U<l6T>} H`-9$q!i?_dJN-ZY0G`&$RPDRa>tY:!b|?}erx=}m' );
define( 'LOGGED_IN_KEY',    'hrrRk5A@5Q]HA5/h6t<bl?,<<HSp*?*x|}9DtZ?S1-=]fF4o/eC*4F(Qf<v:nAB^' );
define( 'NONCE_KEY',        '[_rG&wi[ari`&?V7t!~UgQ2}w!>JiXKZxvbUS9c2vB+[cmTto,,e+f~r4)V O<E9' );
define( 'AUTH_SALT',        '1 TCF,$S@04#yi]F*gTG&0FY&vd1<_.^z|MQlf8RR*X-U%qgb(Qq<NFCX9,E&w !' );
define( 'SECURE_AUTH_SALT', '->[kIbP8o52wsc2Zyn2zcW#pf=`xE]8mm~:+TrFg6d%-(1E?gS`O#6uNj3Ds!6}H' );
define( 'LOGGED_IN_SALT',   'zv;q9$Lxo+ J fPME&%6-.~[aLkIzAvp?F@I@1:Yw&KEvA>3-3<$k.>Bh<Yj~TbA' );
define( 'NONCE_SALT',       '_,y5+m9?z{. d9m[)t.cw7K/+q~YW}PcFK-4rj.JJ@qlMEz:{EIZ285WJ:ndkt{7' );

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
