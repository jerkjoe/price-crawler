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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_ij%2MW;=@MT) AO|.G5V8+Ik7JH)v3`>]]%HpN-%A^y#7d+[_(nEy!=.%Tz3bGS' );
define( 'SECURE_AUTH_KEY',  'zSTB]T8fpRqxtoGBI?mL`g,]Rij~D;]VNiEU[}2}%c30KXD[w%A03JRa]xp9,6Zz' );
define( 'LOGGED_IN_KEY',    'ragsl:TUpRCE=RdK,Fbh+Ra@wAP(3?yUp3d|!89i{DRvr0Z0L)2k;b8nw`KUCb&s' );
define( 'NONCE_KEY',        '5z*p|!lMc7D@X /-QvfQnb{mLo!=2o!lU^,T]6R(dyx7_TLXD2MaplW!0#+{Bw}_' );
define( 'AUTH_SALT',        'X6[dq_| !*{~:lIyE^nYd[V?%m5Dyil*<ZZZrGE/6DI7X/tKJJzM@e_xaOz]HDfo' );
define( 'SECURE_AUTH_SALT', 'xPLBhTBOI4o4Oi_2+ m-M~&?Of![Z|B=eb$`5N6KJ.kEhx)CbQJgP*T]UY#8ML]v' );
define( 'LOGGED_IN_SALT',   '>%D]acKa`3bS@4Jl]t1xtct+r+aU[6$6B#Wf?4sdO{$UPv0Z|EfO]7C_XmoO-:W ' );
define( 'NONCE_SALT',       '<_cnG|=x;QUX:#6/~m3l@x=FUE~23Ft`msP@S/JqW&QTPzi>0YmX81oj*btUt+,?' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
