<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

/**
 * Plugin Version
 *
 * @since  0.0.1
 */
if ( ! defined( 'WPEELB_VERSION' ) )
{
	define( 'WPEELB_VERSION', '0.0.1' );
}

/**
 * WPEssential Plugin dir
 *
 * @since  0.0.1
 */
if ( ! defined( 'WPEELB_DIR' ) )
{
	define( 'WPEELB_DIR', plugin_dir_path( __FILE__ ) );
}

/**
 * WPEssential Plugin url
 *
 * @since  0.0.1
 */
if ( ! defined( 'WPEELB_URL' ) )
{
	define( 'WPEELB_URL', plugin_dir_url( __FILE__ ) );
}
