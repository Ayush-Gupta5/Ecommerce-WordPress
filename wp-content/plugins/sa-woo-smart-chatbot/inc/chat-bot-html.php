<?php
    defined('ABSPATH') or die();
    $wscb_options = get_option('wscb_options_data');
?>
<style>

.wscb-chat-box-header , .wscb-cats .wscb-cm-msg-text , .wscb-self .wscb-cm-msg-text, .wscb-chat-logs::-webkit-scrollbar-thumb
{
 background-color: <?php echo $wscb_options['chatbox_color']; ?> !important;
}

.wscb-chat-box-body:after
{
  background:url('<?php echo $wscb_options['chatbox_bg']; ?>') !important;
}
</style>

<div id="wscb-body"> 

      <div id="wscb-chat-circle" class="btn btn-raised">
              <div id="wscb-chat-overlay"></div>
              <img src="<?php echo $wscb_options['chatbot_icon']; ?>">
      </div>
        
        <div class="wscb-chat-box">
          <div class="wscb-chat-box-header">
            <a href="#" class="wscb-reset-link" title="Delete Chat"><img src="<?php echo plugin_dir_url(__DIR__); ?>assets/imgs/trash.png"></i></a>
        
            <span class="wscb-chat-box-toggle"><img src="<?php echo plugin_dir_url(__DIR__); ?>assets/imgs/close.png"></span>
          </div>
  
          
          <div class="wscb-chat-box-body">
            <div class="wscb-chat-box-overlay">   
            </div>
            <div class="wscb-chat-logs">
             
            </div><!--chat-log -->
            <div class="wscb-typing-loader"><img src="<?php echo plugin_dir_url(__DIR__); ?>assets/imgs/typing.gif"><span>Typing...</span></div>
          </div>
          <div class="wscb-chat-input">      
              <input type="text" id="wscb-chat-input" placeholder="Send a message..." autocomplete="off">
               <button type="submit" class="wscb-chat-submit" id="wscb-chat-submit"><img src="<?php echo plugin_dir_url(__DIR__); ?>assets/imgs/send.png"></button>     
          </div>
        </div>

      </div>