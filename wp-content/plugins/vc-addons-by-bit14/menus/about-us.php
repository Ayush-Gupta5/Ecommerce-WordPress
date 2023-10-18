<?php 
function pbwb_about_us_page(){
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php 
	$action =	"";
    $active	= 'class="selected"';
	if(isset($_GET['tab']))
        $action	= sanitize_text_field($_GET['tab']);
    
    $can_install_plugins = true;
    if ( ! current_user_can( 'install_plugins' ) ) {
        $can_install_plugins = false;
    }


    $images_url = plugin_dir_url(__FILE__).'../assets/images/';
    $all_plugins = get_plugins();

    $genetech_products = array(

        'pie-forms-for-wp/pie-forms-for-wp.php' => array(
            'icon'  => $images_url . 'pie-forms.jpg',
            'name'  => esc_html__( 'Pie Forms', 'bit14' ),
            'desc'  => esc_html__( 'Your custom Drag and Drop Form Builder with a user-friendly interface, built-in ready to use templates, and various Form Field options to Create Advanced Forms without a single line of Code!', 'bit14' ),
            'wporg' => 'https://wordpress.org/plugins/pie-forms-for-wp/',
            'url'   => 'https://downloads.wordpress.org/plugin/pie-forms-for-wp.zip',
        ),

        'pie-register/pie-register.php' => array(
            'icon'  => $images_url . 'pie-register.png',
            'name'  => esc_html__( 'Pie Register', 'bit14' ),
            'desc'  => esc_html__( 'Your custom registration form builder plugin for WordPress websites to help you create simple to most robust registration forms in minutes, without a single line of code!', 'bit14' ),
            'wporg' => 'https://wordpress.org/plugins/pie-register/',
            'url'   => 'https://downloads.wordpress.org/plugin/pie-register.zip',
        ),
    );
    do_action('pb_admin_pages_before_content');
	?>

<div id="container"  class="pb-admin aboutus-page-admin">
    <div class="aboutus-page">
        <div class="aboutus-header">
            <img src="<?php echo esc_url(plugin_dir_url(__FILE__)."../assets/images/pb-logo.png"); ?>" alt="PB Addons Logo">
        </div>
    </div>
        
        <ul class="aboutus-menu-tabs">
            <li <?php echo ($action != "addons") ? esc_html($active) :""; ?>>
                <a href="admin.php?page=page_builder_addons_about_us"><?php _e("About Us","bit14") ?></a>
            </li>
        </ul>
        <div class="pane">
        	<?php if( $_GET['page'] == 'page_builder_addons_about_us' ) { ?> 
            	<div id="tab2" class="tab-content">
                <div class="addons-container-section">
                    <div class="content-row">
                        <div class="about-content">
                            <h3 class="welcome-to-pr">Welcome to PB Addons for WP Bakery Page Builder. Create stunning websites with easy-to-use premium Drag and Drop elements for WP Bakery Page Builder without writing a single line of code!</h3>
                            <p class="about-us-p">Page Builder Addons is a collection of free and premium add-ons for WordPress. They allow you to build a website with the WP Bakery plugin. With Page Builder Addons, you can create and manage your website in minutes. The add-ons are clean, responsive, and well-designed for use with the WP Bakery plugin. Additionally, they are easy-to-use and highly functional.</p>
                            <h3 class="welcome-to-pr">Resourceful links:</h3>
                            <ul class="resourceful-links">
                                <li><a href="https://pagebuilderaddons.com/documentation/how-to-install-and-activate/?utm_source=plugindashboard&utm_medium=abouttab&utm_campaign=documentlink" target="_blank">Getting Started</a></li>
                                <li><a href="https://pagebuilderaddons.com/addons/?utm_source=plugindashboard&utm_medium=abouttab&utm_campaign=addonslink" target="_blank">All in One Addons</a></li>
                            </ul>
                            <p class="about-us-p genetech-resource">PB Addons for WP Bakery is a product of <a class="red-anchor" href="https://www.genetechsolutions.com/?utm_source=PBplugindashboard&utm_medium=pbabouttab&utm_campaign=Genetech" target="_blank" rel="noopener noreferrer">Genetech Solutions</a>.</p>
                            <p class="about-us-p">Other products by the Team include:</p>
                            <p class="about-us-p"><a class="red-anchor" href="http://pieregister.com/?utm_source=PBplugindashboard&utm_medium=pbabouttab&utm_campaign=prfrompb" target="_blank">Pie Register</a>, a WordPress Registration plugin to create custom registration forms with the simplest drag and drop builder.</p>
                            <p class="about-us-p"><a class="red-anchor" href="http://pieforms.com/?utm_source=PBplugindashboard&utm_medium=pbabouttab&utm_campaign=pffrompb" target="_blank" rel="noopener noreferrer">Pie Forms</a>, the Easiest Drag and Drop WordPress Form Builder Plugin.</p>
                        </div>
                        <div class="about-links">
                            <div class="about-pr-docs">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__)."../assets/images/web-addons.png"); ?>" alt="Web Addons">
                            </div>
                        </div>
                    </div>
                </div>
            </div>			
						
			<?php } ?>
        </div>
        <div class="pieregister-sib-products">
            <div class="sib-products-container">
                <div class="sib-products">
                    <?php
                foreach ( $genetech_products as $plugin => $details ) :
					$plugin_data = get_about_plugin_data( $plugin, $details, $all_plugins );
                    ?>
                    <div class="sib-product-container">
                        <div class="sib-product">
                            <div class="sib-product-detail">
                                <img src="<?php echo esc_url( $plugin_data['details']['icon'] ); ?>">
								<h5>
									<?php echo esc_html( $plugin_data['details']['name'] ); ?>
								</h5>
								<p>
									<?php echo esc_html(wp_kses_post( $plugin_data['details']['desc']) ); ?>
								</p>
                            </div>
                            <div class="sib-product-action">
                                <div class="product-status">
                                    <strong>
										<?php
										printf(
										/* translators: %s - addon status label. */
											esc_html__( 'Status: %s', 'bit14' ),
											'<span class="status-label ' . esc_attr( $plugin_data['status_class'] ) . '">' . esc_html(wp_kses_post( $plugin_data['status_text']) ) . '</span>'
										);
										?>
									</strong>
                                </div>
                                <div class="product-action">
                                    <?php if ( $can_install_plugins ) { ?>
										<button class="<?php echo esc_attr( $plugin_data['action_class'] ); ?>" data-plugin="<?php echo esc_attr( $plugin_data['plugin_src'] ); ?>" data-type="plugin">
											<?php echo esc_html(wp_kses_post( $plugin_data['action_text'] )); ?>
										</button>
									<?php } else { ?>
										<a href="<?php echo esc_url( $details['wporg'] ); ?>" target="_blank" rel="noopener noreferrer">
											<?php esc_html_e( 'WordPress.org', 'bit14' ); ?>
											<span aria-hidden="true" class="dashicons dashicons-external"></span>
										</a>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
add_action( 'wp_ajax_pbwb_activate_addon', 'pbwb_activate_addon' );
add_action( 'wp_ajax_pbwb_deactivate_addon', 'pbwb_deactivate_addon' );
add_action( 'wp_ajax_pbwb_install_addon', 'pbwb_install_addon' );

function pbwb_activate_addon() {

    // Run a security check.
    if ( ! check_ajax_referer( 'pb_activate_nonce', 'security', false ) ) {
        wp_send_json_error( esc_html__( 'Your session expired. Please reload the page.', 'pie-forms' ) );
    }
    
    // Check for permissions.
    if ( ! current_user_can( 'activate_plugins' ) ) {
        wp_send_json_error( esc_html__( 'Plugin activation is disabled for you on this site.', 'bit14' ) );
    }

    if ( isset( $_POST['plugin'] ) ) {
        $type = 'addon';
        if ( ! empty( $_POST['type'] ) ) {
            $type = sanitize_key( $_POST['type'] );
        }

        $plugin   = sanitize_text_field( wp_unslash( $_POST['plugin'] ) );
        $activate = activate_plugins( $plugin );

        // do_action( 'wpforms_plugin_activated', $plugin );

        if ( ! is_wp_error( $activate ) ) {
            if ( 'plugin' === $type ) {
                wp_send_json_success( esc_html__( 'Plugin activated.', 'bit14' ) );
            } else {
                wp_send_json_success( esc_html__( 'Addon activated.', 'bit14' ) );
            }
        }
    }

    wp_send_json_error( esc_html__( 'Could not activate addon. Please activate from the Plugins page.', 'bit14' ) );
}

function pbwb_deactivate_addon() {

    // Run a security check.
    if ( ! check_ajax_referer( 'pb_activate_nonce', 'security', false ) ) {
        wp_send_json_error( esc_html__( 'Your session expired. Please reload the page.', 'pie-forms' ) );
    }

    // Check for permissions.
    if ( ! current_user_can( 'deactivate_plugins' ) ) {
        wp_send_json_error( esc_html__( 'Plugin deactivation is disabled for you on this site.', 'bit14' ) );
    }

    $type = 'addon';
    if ( ! empty( $_POST['type'] ) ) {
        $type = sanitize_key( $_POST['type'] );
    }

    if ( isset( $_POST['plugin'] ) ) {
        $plugin = sanitize_text_field( wp_unslash( $_POST['plugin'] ) );

        deactivate_plugins( $plugin );

        do_action( 'wpforms_plugin_deactivated', $plugin );

        if ( 'plugin' === $type ) {
            wp_send_json_success( esc_html__( 'Plugin deactivated.', 'bit14' ) );
        } else {
            wp_send_json_success( esc_html__( 'Addon deactivated.', 'bit14' ) );
        }
    }

    wp_send_json_error( esc_html__( 'Could not deactivate the addon. Please deactivate from the Plugins page.', 'bit14' ) );
}

function pbwb_install_addon() {

    // Run a security check.
    if ( ! check_ajax_referer( 'pb_activate_nonce', 'security', false ) ) {
        wp_send_json_error( esc_html__( 'Your session expired. Please reload the page.', 'pie-forms' ) );
    }

    $generic_error = esc_html__( 'There was an error while performing your request.', 'bit14' );
    $type = 'addon';
    if ( ! empty( $_POST['type'] ) ) {
        $type = sanitize_key( $_POST['type'] );
    }
   
    // var_dump($_POST['plugin']);die;
    $error = esc_html__( 'Could not install addon. Please download from pagebuilderaddons.com and install manually.', 'bit14' );

    if ( empty( $_POST['plugin'] ) ) {
        wp_send_json_error( $error );
    }
      
    // Set the current screen to avoid undefined notices.
    set_current_screen( 'page-builder-addons_page_page_builder_addons_about_us' );
    
    // Prepare variables.
    $url = esc_url_raw(
        add_query_arg(
            array(
                'page' => 'page-builder-addons_page_page_builder_addons_about_us',
            ),
            admin_url( 'admin.php' )
        )
    );
    

    $creds = request_filesystem_credentials( $url, '', false, false, null );

    // Check for file system permissions.
    if ( false === $creds ) {
        wp_send_json_error( $error );
    }

    if ( ! WP_Filesystem( $creds ) ) {
        wp_send_json_error( $error );
    }

    /*
     * We do not need any extra credentials if we have gotten this far, so let's install the plugin.
     */
    // var_dump( plugin_dir_path( __FILE__ ) . 'helpers/install-skin.php');die ;
    require_once(plugin_dir_path( __FILE__ ) . 'helpers/install-skin.php');
    require_once(plugin_dir_path( __FILE__ ) . 'helpers/PluginSilentUpgrader.php');

    // Do not allow WordPress to search/download translations, as this will break JS output.
    remove_action( 'upgrader_process_complete', array( 'Language_Pack_Upgrader', 'async_upgrade' ), 20 );

    // Create the plugin upgrader with our custom skin.
    $installer = new PBWB_PluginSilentUpgrader( new PBWB_Install_Skin() );

    // Error check.
    if ( ! method_exists( $installer, 'install' ) || empty( $_POST['plugin'] ) ) {
        wp_send_json_error( $error );
    }

    $installer->install( sanitize_text_field( wp_unslash( $_POST['plugin'] ) ) ); 

    // Flush the cache and return the newly installed plugin basename.
    wp_cache_flush();

    $plugin_basename = $installer->plugin_info();

    if ( empty( $plugin_basename ) ) {
        wp_send_json_error( $error );
    }

    $result = array(
        'msg'          => $generic_error,
        'is_activated' => false,
        'basename'     => $plugin_basename,
    );

    // Check for permissions.
    if ( ! current_user_can( 'activate_plugins' ) ) {
        $result['msg'] = 'plugin' === $type ? esc_html__( 'Plugin installed.', 'bit14' ) : esc_html__( 'Addon installed.', 'bit14' );

        wp_send_json_success( $result );
    }

    // Activate the plugin silently.
    $activated = activate_plugin( $plugin_basename );

    if ( ! is_wp_error( $activated ) ) {
        $result['is_activated'] = true;
        $result['msg']          = 'plugin' === $type ? esc_html__( 'Plugin installed & activated.', 'bit14' ) : esc_html__( 'Addon installed & activated.', 'bit14' );

        wp_send_json_success( $result );
    }

    // Fallback error just in case.
    wp_send_json_error( $result );
}

function get_about_plugin_data( $plugin, $details, $all_plugins ) {

    if ( array_key_exists( $plugin, $all_plugins ) ) {
        if ( is_plugin_active( $plugin ) ) {
            // Status text/status.
            $plugin_data['status_class'] = 'status-active';
            $plugin_data['status_text']  = esc_html__( 'Active', 'bit14' );
            // Button text/status.
            $plugin_data['action_class'] = $plugin_data['status_class'] . ' button button-secondary disabled';
            $plugin_data['action_text']  = esc_html__( 'Activated', 'bit14' );
            $plugin_data['plugin_src']   = esc_attr( $plugin );
        } else {
            // Status text/status.
            $plugin_data['status_class'] = 'status-inactive';
            $plugin_data['status_text']  = esc_html__( 'Inactive', 'bit14' );
            // Button text/status.
            $plugin_data['action_class'] = $plugin_data['status_class'] . ' button button-secondary';
            $plugin_data['action_text']  = esc_html__( 'Activate', 'bit14' );
            $plugin_data['plugin_src']   = esc_attr( $plugin );
        }
    } else {
        // Doesn't exist, install.
        // Status text/status.
        $plugin_data['status_class'] = 'status-download';
        if ( isset( $details['act'] ) && 'go-to-url' === $details['act'] ) {
            $plugin_data['status_class'] = 'status-go-to-url';
        }
        $plugin_data['status_text'] = esc_html__( 'Not Installed', 'bit14' );
        // Button text/status.
        $plugin_data['action_class'] = $plugin_data['status_class'] . ' button button-primary';
        $plugin_data['action_text']  = esc_html__( 'Install Plugin', 'bit14' );
        $plugin_data['plugin_src']   = esc_url( $details['url'] );
    }

    $plugin_data['details'] = $details;

    return $plugin_data;
}