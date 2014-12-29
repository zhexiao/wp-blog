<?php
/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache

/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'wp-blog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'xiaozhe');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '0@{`@2u7rF}SPKlg5Cl-AW|g#%HcRM3Po{&Lz8Gx11~T$0*VT|/FZWp8c[8}$RJ{');
define('SECURE_AUTH_KEY',  'Jg?087-z@`e3t!_O-}34f(P+l`z,xeEn<y3kY@0XqY+|)<+aUpvF !D1-(.DZP^R');
define('LOGGED_IN_KEY',    '&#`=D@4(z-iD-^o;Sc<?[-kXX#-PB2((<ypuRERU 8+CQ$CicR0A<:.vdQYJ!mBl');
define('NONCE_KEY',        'iazSGoctnI5C+E|/n`x+_^B:MDbg#H*^BdezcD|)l4cj,n6B@@<T:=kQXu3Mn$)>');
define('AUTH_SALT',        'x>2?->bZqg2V$3Eu6&Z8],c<TFl Wu|tHov%2!G3P|r<,}A/PBF:SGVv+i2leK <');
define('SECURE_AUTH_SALT', 'tV|k[)BMsU^on= z|gVaW|BZ7,PrL$N]+jrXDmAHJNhz;[kv|z&w^_+X:_%CSob5');
define('LOGGED_IN_SALT',   'CHn4NK-S fX#{S|52Y*r~!T9$aYOw)WJV`I#EEq0=t<QQEz?>K1y.Fz(1]Ah$l%R');
define('NONCE_SALT',       '<k{+(CfCq;}mIJmd9l8HhCVLb>^{-OL$SGAEk84]_iweJUC=SL+d++&lU-S7^*@<');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
