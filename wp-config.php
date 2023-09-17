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
define('DB_NAME', 'meyzjcmc_posglob');

/** MySQL database username */
define('DB_USER', 'meyzjcmc_posglouser');

/** MySQL database password */
define('DB_PASSWORD', 'posglo2019com');

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
define('AUTH_KEY',         '&0T,?}d]I(h9J)!VIJja?-A$I[n!4Lu)O#w`{!f<>$K)Xs~g]zW|FLsqb%ck>5N$');
define('SECURE_AUTH_KEY',  '^BAUmF=Ec{[AD`-/)Fa):qevTnqM=}s5^3[MF0M0&cqO.|TZaRi_Jj2|0ryEsO$y');
define('LOGGED_IN_KEY',    'wH(GTZHuP>`#-153A_j6Mle#~Az;DnZ-_r<r:SYxhobP*UeQOsExi>xS7fv^J;;9');
define('NONCE_KEY',        'kz8rw0QG`*ykUv],?@B:lqLOPS>$q:L<fvdnvJoE+=b5ztlES(uE}PR!T?i/,kcw');
define('AUTH_SALT',        'N/&(5NVvov2JRg3XNbd#=z?nH13Z~C30cyJ9X1+<.$qUuzpU;ob;r=TIRf0kN:Ht');
define('SECURE_AUTH_SALT', 'zS{{A_gRR{FaLKoJ4+{K*O<FI)Ck(g8+7lr%;D887->at[3X/b#.zH4aWI]{HCoy');
define('LOGGED_IN_SALT',   ']q^#wZBq<SFhU^O-dzI%n?B>~;Woz?YF)e55;iAh@UwNyGS/%6<=@sc9.%<5[B=6');
define('NONCE_SALT',       'jYDh9U@D~6{Yy(Rm73Y !tqbI|Sf ];P8**_eX~&Xo&uXw~,Y@N eJG|7&jVNzpT');

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
