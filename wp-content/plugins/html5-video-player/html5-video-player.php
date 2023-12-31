<?php 
/*
 * Plugin Name: Html5 Video Player
 * Plugin URI:  http://wpvideoplayer.com/
 * Description: You can easily integrate html5 Video player to play mp4/ogg file in your wordress website using this plugin.
 * Version:     2.5.11
 * Author:      bPlugins LLC
 * Author URI:  http://bplugins.com
 * License:     GPLv3
 * Text Domain:  html5-video-player
 * Domain Path:  /languages
 */
use HTML5Player\Model\ImportData;

function h5vp_load_textdomain() {
    load_plugin_textdomain( 'html5-video-player', false, dirname( __FILE__ ) . "/languages" );
}
add_action( "plugins_loaded", 'h5vp_load_textdomain' );



/*Some Set-up*/
define('H5VP_PLUGIN_DIR', plugin_dir_url(__FILE__) ); 
define('H5VP_VER', '2.5.9' ); 

if(!function_exists('h5vp_sdk')){
    function h5vp_sdk(){
        global $h5vp_sdk;
        require_once(plugin_dir_path(__FILE__).'bplugins_sdk/init.php');
        $h5vp_sdk = new BPlugins_SDK(__FILE__, [
            "prefix" => "h5vp",
            "blockHandler" => false,
            "permalinks" => [],
            "features" => [
              "license" => false,
              "optIn" => true
            ],
            "isBlock" => false
          ]);
        return $h5vp_sdk;
    }
    h5vp_sdk();
}else {
	$h5vp_sdk->uninstall_plugin(__FILE__);
}


    
add_action('admin_init', 'h5vp_plugin_redirect');
function h5vp_plugin_redirect() {
    if (get_option('h5vp_plugin_do_activation_redirect', false)) {
        delete_option('h5vp_plugin_do_activation_redirect');
        wp_redirect('edit.php?post_type=videoplayer&page=h5vp-support');
    }
    if(get_option('h5vp_import', '1.5.0') != '2.3.7'){
        ImportData::importMeta();
	    ImportData::importControls();
        update_option('h5vp_import', '2.3.7');
    }
}

require_once(__DIR__.'/upgrade.php');