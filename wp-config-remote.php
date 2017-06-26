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
define('DB_NAME', 'presenttenserelating');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'eu4-u45r01');

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
define('AUTH_KEY',         '>/j(Tx|=Nc*qw4 G_~?dO3r4pdmV(.`z6PQ3lAg^VWgUFb2sCta}Y^dSGG{XIx!I');
define('SECURE_AUTH_KEY',  'I,fApBw!EU*_m`ue@q,2*rVaBSD_-2/vy4*m61Rn@H8A>K2LR3jA<Td9[LItU3d[');
define('LOGGED_IN_KEY',    '/Qlm*&ebej(,n<fwWc50zDu>5xLOOweMs*VT2bGuH^Wj4D4b?`47>C|Fec8wm4;>');
define('NONCE_KEY',        'O&Zy^g3f%2>2y/6zF,eiTGA(lM2R2m+bh&_?q=S!9nvR@gR=]Yp?*`@gci^!7Jxq');
define('AUTH_SALT',        'IY(`. 1X^34nl@E51NR>i`]nXxo=53[xMG1vxHy6l{fTiT(FIjkP=xfzc{r9HcfP');
define('SECURE_AUTH_SALT', '!H.g[_!SinOKS+(H^(uFfP%{K`E>~VA[GifvcuEZbO@DB?g/Z@_<0n#bZZ-cUwoV');
define('LOGGED_IN_SALT',   '#yBd)LE}3@(WK(]m>};Wy@U@b5yxdIlE05wp[.@%/J2+7MgUk<;^Q&&!Lnj8:_U`');
define('NONCE_SALT',       'A<~pRY!_1Z5Wqex@&mj? 39MI^jDxY+H-t.eljtDjY8G~n!R77t<ebOU82F%[7nY');

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

define('WP_HOME','http://brycemckenney.co/presenttenserelating.com');
define('WP_SITEURL','http://brycemckenney.co/presenttenserelating.com');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
