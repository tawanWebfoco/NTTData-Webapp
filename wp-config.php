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
define( 'DB_NAME', "wp_lpnttdata" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "" );

/** Database hostname */
define( 'DB_HOST', "127.0.0.1:3307" );

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
define( 'AUTH_KEY',         'p,1bZE_cE5eRo<A?lHcj6jPvd0}-.|m+.jEK!9~ar?PB&#}bSmeR$H#ZJECG0B|I' );
define( 'SECURE_AUTH_KEY',  'bs?x:aAnpW{f;n%^442D]RY65jBt!;hpSgw#@lt#AEty/|+Ig%?rX0v_1A5cP]4^' );
define( 'LOGGED_IN_KEY',    ':!Y7r;a4E{t3(wSl`@qpt2i};T3Wt)jd$MPOG+i<1f(Rr5%c )<O;q1t;!/-$ULO' );
define( 'NONCE_KEY',        '>icxo4YatFjAMi=KIa{x,#+S|1!6uD6~Kss;JuH~QAC>agjTDo^|@Iwv<>O6~yo9' );
define( 'AUTH_SALT',        'jr=K%]^w7zpxMbm4e0)A_=Id_V0%fxH=C*lS-fbv)R34iqDpio5-3). itf lX Y' );
define( 'SECURE_AUTH_SALT', '$1|j}z3.w@[K&U~QIlem.DD@[&.M K.;Gzkqy?kkuZiA3C%9bGHItC:D}tD/+F-~' );
define( 'LOGGED_IN_SALT',   'dXT:?T&F.gy|dWfI yYuL&3E#$`I&$pBogD?l.vAIS)fxeQbu.IaVwKUb4=3XjC{' );
define( 'NONCE_SALT',       '~Cs}&*9KrHJCXy:mTmhZlnZtG#c^Mq,-Z,I*ojmMQ5!r=V$`=RWQuv>sxIUGXEFS' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



define( 'WP_SITEURL', 'http://localhost/htdocs/Webfoco/nttdata/LP-site/' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}


/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
