<?php
/*
Plugin Name: Curiosity Features
Plugin URI:  http://webzakt.com/product/curiosity-responsive-newspaper-theme/
Description: Shortcodes plugin for Curiosity theme from <a href="http://webzakt.com" target="_blank">Webzakt</a>. Get <a href="http://webzakt.com/product/curiosity-responsive-newspaper-theme/" target="_blank">Pro Version</a> with widgets, event and portfolio modules.
Version: 1.0.1
Author: Webzakt
Author URI: http://webzakt.com
*/

class CuriosityPlugin {

    function __construct()
    {
    	define( 'CURIOSITY_VERSION', '1.0' );

    	// Plugin folder path
    	if ( ! defined( 'CURIOSITY_PLUGIN_DIR' ) ) {
    		define( 'CURIOSITY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
    	}

    	// Plugin folder URL
    	if ( ! defined( 'CURIOSITY_PLUGIN_URL' ) ) {
    		define( 'CURIOSITY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
    	}

    	require_once( CURIOSITY_PLUGIN_DIR .'includes/shortcodes.php' );

        add_action( 'init', array(&$this, 'init') );
        add_action( 'admin_init', array(&$this, 'admin_init') );
	}

	/**
	 * Enqueue front end scripts and styles
	 *
	 * @return	void
	 */
	function init()
	{
		if( ! is_admin() )
		{
			wp_enqueue_style( 'curiosity-shortcodes', CURIOSITY_PLUGIN_URL . 'assets/css/shortcodes.css' );			
			wp_enqueue_style( 'flexslider', CURIOSITY_PLUGIN_URL . 'assets/css/flexslider.css' );
		}
	}

	/**
	 * Enqueue admin Scripts and Styles
	 *
	 * @return	void
	 */
	function admin_init()
	{
		include_once( CURIOSITY_PLUGIN_DIR . 'includes/class-curiosity-admin-insert.php' );
		
		// css
		wp_enqueue_style( 'curiosity-popup', CURIOSITY_PLUGIN_URL . 'assets/css/curiosity-admin.css' );
	}
}
new CuriosityPlugin();
