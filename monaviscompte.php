<?php
/*
Plugin Name: monaviscompte
Plugin URI: https://www.monaviscompte.fr
Description: Easily display the monaviscompte widget on your website.
Version: 1.0.0
Author: monaviscompte
Author URI: https://www.monaviscompte.fr
License: GPL2 or later
Text Domain: monaviscompte
Domain Path: /languages
*/

include_once plugin_dir_path( __FILE__ ).'/monaviscompte_widget.php';

class monaviscompte_Plugin
{
    public function __construct()
    {
    	add_action('widgets_init', function() { register_widget('monaviscompte_Widget'); });
    	add_action('plugins_loaded', function() { self::monaviscompte_load_translation_files(); });
    }
    
    private function monaviscompte_load_translation_files() 
    {
		load_plugin_textdomain('monaviscompte', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		$pluginDescription = __('Easily display the monaviscompte widget on your website.', 'monaviscompte');
	}
}

new monaviscompte_Plugin();