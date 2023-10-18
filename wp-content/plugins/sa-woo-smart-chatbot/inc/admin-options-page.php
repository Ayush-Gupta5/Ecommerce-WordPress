<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

//=============================================================================
//* Register Menu Page *//
//=============================================================================
add_action( 'admin_menu', 'wscb_register_menu_page' );
function wscb_register_menu_page()
{
    add_menu_page(
        'Woo Smart Bot', // page <title>Title</title>
        'Woo Smart Bot', // menu link text
        'manage_options', // capability to access the page
        'wscb-options', // page URL slug
        'wscb_admin_page_content', // callback function /w content
        'dashicons-star-half', // menu icon
        99 // priority
    );
}

//=============================================================================
//* Admin Page Content *//
//=============================================================================
function wscb_admin_page_content()
{
  $success_msg = 'style="display:none;"';
  $curren_section = ( isset($_POST['section-tab']) && !empty($_POST['section-tab']) ) ? sanitize_text_field($_POST['section-tab']) : 'wscb-settings-general';
  // Update Options
  if ( isset( $_POST['wscb_nonce'] ) 
  && wp_verify_nonce( $_POST['wscb_nonce'], 'wscb_action_nonce' )  )
  {
     
        $options_array = array(
          'auto_popup'           => sanitize_text_field($_POST['auto-open-chat']),
          'chatbox_color'        => sanitize_text_field($_POST['chatbox-primary-color']),
          'chatbot_icon'         => esc_url(sanitize_text_field($_POST['chatbox-bot-icon'])),
          'chatbox_bg'           => esc_url(sanitize_text_field($_POST['chatbox-bg-img'])),
          'greeting_message'     => sanitize_text_field($_POST['greeting_message']),
          'catalog_message'      => sanitize_text_field($_POST['catalog_message']),
          'category_message'     => sanitize_text_field($_POST['category_message']),
          'keyword_message'      => sanitize_text_field($_POST['keyword_message']),
        );
   
      update_option('wscb_options_data', $options_array);
      $success_msg = 'style="display:block;"';
  }

    // Get Options
    $wscb_options = get_option('wscb_options_data');
    $auto_popup = ( $wscb_options['auto_popup'] == 'on') ? 'checked="checked"' : '';
    $chatbox_color = $wscb_options['chatbox_color'];
    $chatbot_icon = $wscb_options['chatbot_icon'];
    $chatbox_bg =  $wscb_options['chatbox_bg'];
    $greeting_msg = $wscb_options['greeting_message'];
    $catalog_msg = $wscb_options['catalog_message'];
    $category_msg = $wscb_options['category_message'];
    $keyword_msg = $wscb_options['keyword_message'];
  
    ?>

        <div class="wrap">
            <h1>Woo Smart Chatbot Options</h1>
        <section id="wscb-settings-panel">
           
            <aside id="wscb-settings-tabs">
              <ul>
                <li id="settings-tab-general" data-tab="wscb-settings-general" title="General Settings" <?php echo ( $curren_section == 'wscb-settings-general' ) ? 'class="active"' : '';  ?>><img src="<?php echo plugin_dir_url(__FILE__); ?>../assets/imgs/settings.png"></li>
                <li id="settings-tab-replies" data-tab="wscb-settings-replies" title="Default Messages" <?php echo ( $curren_section == 'wscb-settings-replies' ) ? 'class="active"' : '';  ?> ><img src="<?php echo plugin_dir_url(__FILE__); ?>../assets/imgs/email.png"></li>
              </ul>
            </aside>


            <!-- Settings Seciton Start -->
            <article id="wscb-settings-general" class="wscb-settings-content <?php echo ( $curren_section == 'wscb-settings-general' ) ? 'active' : '';  ?>">
              <form class="wscb-option-panel" method="post">
              <h1>General Settings</h1>

              <div class="wscb-setting-field">
                <h3>Auto Open Chat</h3>
                <small>Auto Start Chat when visitor comes first time on website.</small>
                <div class="wscb-toggle-switch">
                  <input id="auto-open-chat" name="auto-open-chat" class="wscb-switch" type="checkbox" <?php echo esc_html($auto_popup); ?>>
                  <label for="auto-open-chat"></label>
                  <div class="toggle-off">OFF</div>
                  <div class="toggle-on">ON</div>
                </div>
              </div>

              <div class="wscb-setting-field">
                <h3>Primary Color</h3>
                <small>Change chat popup color</small>
                    <div class="wscb-color-picker">
                        <input type="color" id="chatbox-primary-color" name="chatbox-primary-color" value="<?php echo esc_html($chatbox_color); ?>">
                        <input type="text" autocomplete="off" spellcheck="false">
                    </div>
              </div>


              <div class="wscb-setting-field">
                <h3>Bot Icon Image</h3>
                <small>Select Icon image for bot. You can also upload your company logo.</small>
                <a href="#" class="wscb-upl"><img src="<?php echo $chatbot_icon; ?>"></a>
                <input type="hidden" id="chatbox-bot-icon" name="chatbox-bot-icon" value="<?php echo esc_url($chatbot_icon); ?>">
              </div>

              <div class="wscb-setting-field">
                <h3>ChatBox Background Image</h3>
                <small>Select Background image for chat box.</small>
                <a href="#" class="wscb-upl"><img src="<?php echo $chatbox_bg; ?>"></a>
                <input type="hidden" id="chatbox-bg-img" name="chatbox-bg-img" value="<?php echo esc_url($chatbox_bg); ?>">
              </div>

              <div class="panel-footer">

            </article>
             <!-- Settings Seciton Ends -->



              <!-- Replies Seciton Start -->
              <article id="wscb-settings-replies" class="wscb-settings-content <?php echo ( $curren_section == 'wscb-settings-replies' ) ? 'active' : '';  ?>">
                <form class="wscb-option-panel" method="post">
                  <h1>Default Messages</h1>

                  <div class="wscb-setting-field">
                    <h3>Greeting Message</h3>
                    <input type="text" name="greeting_message" class="wscb-text-field" value="<?php echo esc_html($greeting_msg); ?>" autocomplete="off">
                  </div>

                  <div class="wscb-setting-field">
                    <h3>Catalog Message</h3>
                    <input type="text" name="catalog_message" class="wscb-text-field" value="<?php echo esc_html($catalog_msg); ?>" autocomplete="off">
                  </div>

                  <div class="wscb-setting-field">
                    <h3>Category Search Message</h3>
                    <input type="text" name="category_message" class="wscb-text-field" value="<?php echo esc_html($category_msg); ?>" autocomplete="off">
                  </div>

                  <div class="wscb-setting-field">
                    <h3>Keyword Search Message</h3>
                    <input type="text" name="keyword_message" class="wscb-text-field" value="<?php echo esc_html($keyword_msg); ?>" autocomplete="off">
                  </div>


              </article>


              <div class="panel-footer">
                  <div class="wscb-options-updated-msg" <?php echo $success_msg; ?>>Changes Saved!</div>
                    <?php wp_nonce_field( 'wscb_action_nonce', 'wscb_nonce' ); ?>
                    <input type="hidden" class="section-tab-check" name="section-tab" value="<?php echo $curren_section; ?>">
                    <button type="submit" class="wscb-admin-btn">Save Changes</button>
                  </div>
            </form>
      </section>
</div>

    <?php
}

?>