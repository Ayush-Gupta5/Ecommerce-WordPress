<?php

//var_dump(plugin_dir_path( __FILE__ ).'PluginSilentUpgraderSkin.php');die;
require_once(plugin_dir_path( __FILE__ ).'PluginSilentUpgraderSkin.php');

/** Absolute path to the WordPress directory. */
class PBWB_Install_Skin extends PBWB_PluginSilentUpgraderSkin {

    /**
     * Instead of outputting HTML for errors, json_encode the errors and send them
     * back to the Ajax script for processing.
     *
     * @since 1.0.0
     *
     * @param array $errors Array of errors with the install process.
     */
    public function error( $errors ) {
    
        if ( ! empty( $errors ) ) {
            wp_send_json_error( $errors );
        }
    }
}
