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
define('DB_NAME', 'villageatcoosaw');

/** MySQL database username */
define('DB_USER', 'ClaytonKinder');

/** MySQL database password */
define('DB_PASSWORD', 'localDbPassword');

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
define('AUTH_KEY',         'cSY`sb4&hl;EZweZ/ IAes4wy3Js0`_B*z<#ScvUGGX8gjl<xt%@pH>U2S9!f^GB');
define('SECURE_AUTH_KEY',  'b0}wnL>z:BfvFO#E;g$>nZ{UYF1eKFurROQ#%{bu8?4uE%KZ27,d,ljE@K5u4O~w');
define('LOGGED_IN_KEY',    '<?:pa_HmRCT[jkm$SMpThX0;zZ|.rHHSoAE>{];dUft4Edh^iJ2!CRx|;jG|P_MI');
define('NONCE_KEY',        'dAUd,K5;v_u=sJluR[l{NkrM0D=m5Q@$aX|,FWue//@Turcp}tf>Lt1(*3,09JEf');
define('AUTH_SALT',        ',tJeFSb?&95)-Y|EO1}9%ScJek(aF736$qYSsT`,[FUUVfa2)x fx fVJyFU>jE2');
define('SECURE_AUTH_SALT', '!Aq.n-r#:sI^YqAnXz2xvt;7gm:k,%<[|1Zd?Y7A7,$vLp-0Z.zGT FG6$sC@<m#');
define('LOGGED_IN_SALT',   '-Imhz(,4EYFqYY[=?cKVNU*;,)gY$f(n$vC+n~mR/wOj7`-uTZU`s+5X`3ey6_%T');
define('NONCE_SALT',       ';cMc+AC8N5r4^&C]>ct:SGX)xk&ztJ#cl Jl]*an5,56 9FC&~l o,F6Sj);b!86');

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
