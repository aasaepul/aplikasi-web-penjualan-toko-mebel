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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'u302938286_blog');

/** MySQL database username */
define('DB_USER', 'u302938286_blog');

/** MySQL database password */
define('DB_PASSWORD', 'jajaka07');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'duI=^)w41#0DRMHGw,3+b6(Q5|2.dNl<rx#y o)Is1IIeSDx[J3n4_&znk5jy-DM');
define('SECURE_AUTH_KEY',  '4Ws0d%9UhZt%P|4sJJF6 $R@>(7^Gg6SArxy^/#[[ w<y-lE`SSuHzG,+,9dA[<#');
define('LOGGED_IN_KEY',    '^!naG2L43V9%tY`=X7Pmf2ThAWF+s.]n%zcy]Uuo.yh%h`_i4DB9,*EWWtE*%750');
define('NONCE_KEY',        '$~PrYeS1,&]fbN8n[QPH{Pay.B2OTTqCaez:}_*v~I5yt2kQ](aO@ZP@_]|>Z[8H');
define('AUTH_SALT',        'g=y,q/lgI/I},ngM?(|wDP8}Fun]M!gCgp>9`=I!txP&zG|kScPdbYzwb3pEho^(');
define('SECURE_AUTH_SALT', 'AcIJ(-yg9 B44l~B/3[-*+[muQedhyav3T;|mw$fg,`[MP;@OwUN5l3vj>S]g>e~');
define('LOGGED_IN_SALT',   'RxDl<zh/zFolZiW&ty-6Yvn0J:jb>XVZXL=gRa2njD:3=b0Ed+7 I? 9tAGYb?|]');
define('NONCE_SALT',       '@,vYA>mzEriS+,=*FzJ<ihX-ud+$BH2JzAK@5C<aO<,D?aB#+:*>yx:+~cg!ox}e');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
