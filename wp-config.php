<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'thewshopwsc');

/** MySQL database username */
define('DB_USER', 'thewshopwsc');

/** MySQL database password */
define('DB_PASSWORD', 'eC9Fh5sT');

/** MySQL hostname */
define('DB_HOST', 'mysql51-54.bdb');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '&;ySQS!2=_h^ZCC!F]|aWzoK/TZ,^)2CP9[4J.b-TD}b,}F|fT),[lTh_t$%~T|p');
define('SECURE_AUTH_KEY',  'Et%(t-0eO5I%<uUFX.zF0NaaidjUl-dA-F.Vy*hQ+Qad7jLGppVY+&Q9NAp(trl8');
define('LOGGED_IN_KEY',    '3t;zKf#-MW%W;T.%$r##_; u5]rcmj+LnZ5/Ec,,q:-oRLZ1JapC!z% wP%LV<;.');
define('NONCE_KEY',        '`).zVlo?cPHBS}_czThvu?04$Kd5Uoy@r=$FWu*tx}^o?x)$`{7D[J@+{IAZc|!@');
define('AUTH_SALT',        'gS5E>3}(ajAZar1L=TOW^Wo{6F$Fswzt~J*iE`cvdH_H=j6k!4=1V8OCV|%:+Rgb');
define('SECURE_AUTH_SALT', '%Ve:VL<_%iaY35e%pE^[uwMSO{|9t+b8F5,nJM3#mC90 SCth>lu|F-O%Uj= hm6');
define('LOGGED_IN_SALT',   'qUi=52IP`w+6M!Z;v|`VF^*H89I_j-OCCV8;R&#]YsWdxWG-SQ0Un<EipJX Q+Nh');
define('NONCE_SALT',       'AJ>!Qc;X/~ugVGfF-u5^}]X)P5AGZR@MPKZL&72~fBF_2nDz4uZj+QqH<l l6xAn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp2013_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
