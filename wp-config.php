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
define('DB_NAME', 'wpb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password');

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
define('AUTH_KEY',         '9x;lF)D-g)/U9P$1;Ao|l}G,k@qt8ls5w>v3h0qQ93%boK:~|VqXQv-5PI+OS}7h');
define('SECURE_AUTH_KEY',  'ht(M(5Y*^Lc|!`>D$krW@$$<ZOuMOH&[h=e7Y5m%Xpf{HCz_4f;pr*W.^cvqy|{@');
define('LOGGED_IN_KEY',    '4k.<y9B8zp{,oPQ6ts8VR.qv>=^zK=>dHj96%8A%eX1o=(kbEq@rK-lit5}9_buy');
define('NONCE_KEY',        '6U=CDEO<ZxQkg]S%{I|sLl^7~(n92t|c&p,7`pl{y@1NkJ7x2UC_Y=0Iz em(q/o');
define('AUTH_SALT',        'cm+o_Ln.g^=53P-{?K}#~Z9c*IB2>?7Wa#5 ~xUsCDFh-T*a(fZkq,Ki2P~,$xfg');
define('SECURE_AUTH_SALT', 'j1EG}G%6uh/OBDUmT>oz2 t|-/o@aZm*fx.^+[)Tx,+oe{X8*Qju1V8|Zls_1d;Z');
define('LOGGED_IN_SALT',   'M+QTI)&L@$zehPw;r_t1~<<g!0c:+DWpcH.3,2+=K`:]$!kXGr`0p~#bq^at;Ep7');
define('NONCE_SALT',       's$}9ku4:t$6B/T|0&AP9(~%#YXEq36s0~GP[]OE2#)2A:U6(C3Vw*A*bx8>m/e_8');

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
