////// Admin Panel Tabs //////////////
jQuery(function() {
    // Change settings tabs
    jQuery('#wscb-settings-tabs li').click(function(){
          var tab_id = jQuery(this).attr('data-tab');
  
          jQuery('#wscb-settings-tabs li').removeClass('active');
          jQuery('.wscb-settings-content').removeClass('active');
  
          jQuery(this).addClass('active');
          jQuery("#"+tab_id).addClass('active');

          jQuery('.section-tab-check').val(tab_id);
      })
  });
  
  
  ///// color picker //////////////
  const valueInput = document.querySelector('.wscb-color-picker > input[type="text"]');
  const colorInput = document.querySelector('.wscb-color-picker > input[type="color"]');
  
  // Sync the color from the picker
  const syncColorFromPicker = () => {
    valueInput.value = colorInput.value;
  };
  
  // Sync the color from the field
  const syncColorFromText = () => {
    colorInput.value = valueInput.value;
  };
  
  // Bind events to callbacks
  colorInput.addEventListener("input", syncColorFromPicker, false);
  valueInput.addEventListener("input", syncColorFromText, false);
  
  // Optional: Trigger the picker when the text field is focused
  valueInput.addEventListener("focus", () => colorInput.click(), false);
  
  // Refresh the text field
  syncColorFromPicker();


  ////////////// Media Upload ////////////
  jQuery(function($){
 
    // on upload button click
    $('body').on( 'click', '.wscb-upl', function(e){
   
      e.preventDefault();
   
      var button = $(this),
      custom_uploader = wp.media({
        title: 'Insert image',
        library : {
          // uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
          type : 'image'
        },
        button: {
          text: 'Use this image' // button label text
        },
        multiple: false
      }).on('select', function() { // it also has "open" and "close" events
        var attachment = custom_uploader.state().get('selection').first().toJSON();
        button.html('<img src="' + attachment.url + '">').next().val(attachment.url);
      }).open();
   
    });
   

   
  });


// Switch Toggle JS
  jQuery(document).on( 'change' , '.wscb-toggle-switch input' , function(){

    var checkBox = jQuery(this).is(':checked');
    if( checkBox === false )
    {
      jQuery(this).attr('checked' , false);
    }else
    {
      jQuery(this).attr('checked' , true);
    }

  } )


  jQuery(document).ready(function(){

    setTimeout(() => {
        jQuery('.wscb-options-updated-msg').fadeOut();
     }, 1500);

  })
  
  