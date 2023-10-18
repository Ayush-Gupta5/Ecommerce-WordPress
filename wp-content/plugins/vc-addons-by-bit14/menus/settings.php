<?php
function pbwb_addons_settings_page(){
    do_action('pb_admin_pages_before_content');
?>
 <div id="container"  class="bit14-admin">
     
    <div class="settings-content-wrapper">  
        <h1><?php _e("Settings",'bit14') ?></h1>
        <form method="post" action="" id="bit14_form_setting">
                <?php 
                $rtl_language = get_option( 'bit14_rtl_language');

                $rtl_is_checked = ($rtl_language == "1") ? "checked" : "" ;

                
                $enable_fontawesone = get_option( 'bit14_enable_fontawesone' , '1');

                $fontawesone_is_checked = ($enable_fontawesone == "1") ? "checked" : "" ;

                
                $enable_googlefonts = get_option( 'bit14_enable_googlefonts' , '1');

                $googlefonts_is_checked = ($enable_googlefonts == "1") ? "checked" : "" ;
                ?>
            <div class="settings-main-div">
                <div class="settings-heading">
                    <h2><?php _e("RTL Language",'bit14') ?></h2>
                </div>
                <div class="settings-field">
                    <input type="checkbox" <?php echo esc_attr($rtl_is_checked) ?> value
                    ="<?php echo esc_html($rtl_is_checked) ?>" name="rtl_check" id="rtl_check"  class="settings-checkbox rtl-checkbox">
                   <label class="settings-label" for="rtl_check"><?php _e("RTL Language Enable/Disable",'bit14') ?></label>
                </div>
            </div>
            <div class="settings-main-div">
                <div class="settings-heading">
                    <h2><?php _e("Restricted Content",'bit14') ?></h2>
                </div>
                <div class="settings-field">
                    <input type="checkbox" name="restricted_check" id="restricted_check"  class="settings-checkbox restricted-checkbox" disabled>
                    <label class="settings-label" for="restricted_check"><?php _e("Restricted Content Enable/Disable",'bit14') ?></label>
                    <p class="desccription"><?php _e("This option is only available in the ",'bit14') ?><a href="https://pagebuilderaddons.com/plan-and-pricing/" target="_blank"><?php _e('Professional Plan') ?></a></p>
                </div>
            </div>
            <div class="settings-main-div">
                <div class="settings-heading">
                    <h2><?php _e("Font Awesome",'bit14') ?></h2>
                </div>
                <div class="settings-field">
                    <input type="checkbox" <?php echo esc_attr($fontawesone_is_checked) ?> value
                    ="<?php echo esc_html($fontawesone_is_checked) ?>" name="enable_fontawesone" id="enable_fontawesone"  class="settings-checkbox fontawesone-checkbox">
                    <label class="settings-label" for="enable_fontawesone"><?php _e("Font Awesome Enable/Disable",'bit14') ?></label>
                </div>
            </div>
            <div class="settings-main-div">
                <div class="settings-heading">
                    <h2><?php _e("Google Font",'bit14') ?></h2>
                </div>
                <div class="settings-field">
                    <input type="checkbox" <?php echo esc_attr($googlefonts_is_checked) ?> value
                    ="<?php echo esc_html($googlefonts_is_checked) ?>" name="enable_googlefonts" id="enable_googlefonts"  class="settings-checkbox googlefonts-checkbox">
                    <label class="settings-label" for="enable_googlefonts"><?php _e("Google Font Enable/Disable",'bit14') ?></label>
                </div>
            </div>
        </form>
    </div>  
 </div>
 <!-- <script> -->
   
 <!-- </script> -->
<?php
}
