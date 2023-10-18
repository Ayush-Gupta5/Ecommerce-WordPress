// On load Activate Bot //
jQuery(document).ready(function($){
  var chathistory = localStorage.getItem('wscbChatHistory');
  if( chathistory !== null && jQuery(chathistory).length > 0  )
  {
    jQuery('.wscb-chat-logs').html(chathistory);
  }
  else
  {

    // Greeting Message
    if( wscbObj.wscb_options.auto_popup !== 'on' )
    {
      wscb_greeting_message();
    }

  }

// Get Catalog
jQuery(document).on('click', '.wscb-catalog' , function(e){
e.preventDefault();
wscb_catalog();
})


// Get Products from Category

jQuery(document).on('click' , '.wscb-chat-msg.wscb-cats > .wscb-cm-msg-text a' , function(e){
  e.preventDefault();
  var cat_name = jQuery(this).text();
  var cat_slug = jQuery(this).data('slug');
  jQuery('.wscb-chat-msg.wscb-cats').remove();
  jQuery(".wscb-typing-loader").show();
  wscb_generate_message(cat_name, 'self');

  jQuery(".wscb-typing-loader").show();
  setTimeout(() => {
  jQuery.ajax({
    type : "post",
    dataType : "json",
    url : wscbObj.ajax_url,
    data : {action: "wscb_get_products_by_cat" , slug:cat_slug },
    beforeSend: function(){
      jQuery(".wscb-typing-loader").hide();
    },
    success: function(response) {

        var html = '<p>'+ response.message +'</p>';

        if( jQuery(response.products).length > 0 )
        {
          html += '<ul class="wscb-product-images">';
          jQuery.each( response.products , function(ind , p){

              html += '<li><a target="_blank" href="'+ p.url +'"><img src="'+ p.image +'"><div class="wscb-product-title">'+ p.title +'<br>'+ p.price+ '</div></a></li>';
          });

          
          html += '</ul><a class="wscb-see-more-link" href="'+ response.cat_link + '">See More</a>';
         
        }
      
          wscb_generate_message(html , 'user');
        

        
    },
    error:function(data , err){
      alert(err);
    }
 })  
}, 500);
})



// Submit button code
  jQuery("#wscb-chat-submit").click(function(e) {
    e.preventDefault();
    wscb_submit_message();  
  });


  // Enter Press submit meesage
  jQuery("#wscb-chat-input").on('keypress' , function(e) {
    if (e.keyCode == 13) {
      wscb_submit_message();
    }
   
  });


  jQuery(document).delegate(".wscb-chat-btn", "click", function() {
    var value = jQuery(this).attr("chat-value");
    var name = jQuery(this).html();
    jQuery("#wscb-chat-input").attr("disabled", false);
    wscb_generate_message(name, 'self');
  })
  
  jQuery("#wscb-chat-circle").click(function() {    
    jQuery("#wscb-chat-circle").toggle('scale');
    jQuery(".wscb-chat-box").toggle('scale');
  })
  
  jQuery(".wscb-chat-box-toggle").click(function() {
    jQuery("#wscb-chat-circle").toggle('scale');
    jQuery(".wscb-chat-box").toggle('scale');
  })

  
})


jQuery(document).on('click' , '.wscb-reset-link' , function(e){

    e.preventDefault();
    localStorage.removeItem('wscbChatHistory');
    jQuery(".wscb-chat-logs").html('');
    wscb_greeting_message();

})


function wscb_submit_message()
{
  var msg = jQuery("#wscb-chat-input").val();
  wscb_generate_message(msg, 'self');
  jQuery(".wscb-typing-loader").show();
  setTimeout(() => {
  jQuery.ajax({
    type : "post",
    dataType : "json",
    url : wscbObj.ajax_url,
    data : {action: "wscb_get_msg_results" , msg:msg },
    beforeSend: function(){
      jQuery(".wscb-typing-loader").hide();
    },
    success: function(response) {

        var html = '<p>'+ response.message +'</p>';

        if( jQuery(response.products).length > 0 )
        {
          html += '<ul class="wscb-product-images">';
          jQuery.each( response.products , function(ind , p){

              html += '<li><a target="_blank" href="'+ p.url +'"><img src="'+ p.image +'"><div class="wscb-product-title">'+ p.title +'</div></a></li>';
          });
        }
       
          wscb_generate_message(html , 'user');
       

        
    },
    error:function(data , err){
      alert(err);
    }
})  
}, 500);
}


function wscb_greeting_message()
{
 // show chat after some delay
 setTimeout(() => {
  wscb_generate_message( wscbObj.wscb_options.greeting_message , 'user');
  jQuery(".wscb-typing-loader").show();
}, 500);


// show chat after some delay
setTimeout(() => {
  wscb_catalog();
 }, 500);
}



function wscb_catalog()
{
jQuery(".wscb-typing-loader").show();

jQuery(".wscb-typing-loader").show();
 setTimeout(() => {
jQuery.ajax({
  type : "post",
  dataType : "json",
  url : wscbObj.ajax_url,
  data : {action: "wscb_get_product_categories"},
  beforeSend: function(){
    jQuery(".wscb-typing-loader").hide();
  },
  success: function(response) {
    if( jQuery(response.categories).length > 0 )
    {
      wscb_generate_message(wscbObj.wscb_options.catalog_message, 'user');
      jQuery.each( response.categories , function( i , val ) {
        jQuery(".wscb-typing-loader").hide();
        var cat_link = '<a href="#" data-slug="'+ val.slug +'">'+ val.name +'</a>';
        wscb_generate_message(cat_link , 'cats');
      })
    }

  }
  })
}, 500);
}


   // generate Message Bubble
   var INDEX = 0; 
   function wscb_generate_message(msg, type) {
     INDEX++;
     var str="";
     str += "<div id='wscb-cm-msg-"+INDEX+"' class=\"wscb-chat-msg wscb-"+type+"\">";
     if( type == 'user' )
     {
       str += "<span class=\"wscb-msg-avatar\">";
       str += '<img src="'+ wscbObj.wscb_options.chatbot_icon + '">';
       str += "<\/span>";
     }

     if( type == 'self')
     {
       str += "<span class=\"wscb-msg-avatar\">";
       str += '<img src="'+ wscbObj.wscb_plugin_url +'assets/imgs/user.png">';
       str += "<\/span>";
     }
    
     str += "<div class=\"wscb-cm-msg-text\">";
     str += msg;
     str += "<\/div>";
     str += "<\/div>";
     jQuery(".wscb-chat-logs").append(str);
     jQuery("#wscb-cm-msg-"+INDEX).hide().fadeIn(300);
     if(type == 'self'){
      jQuery("#wscb-chat-input").val(''); 
     }    
     jQuery(".wscb-chat-logs").stop().animate({ scrollTop: jQuery(".wscb-chat-logs")[0].scrollHeight}, 500);  
     
     // Save Chat history
     var chathistory = localStorage.getItem('wscbChatHistory');
    //  if( type !== 'cats' )
    //  {
       if( chathistory !== null && jQuery(chathistory).length > 0  )
       {
         localStorage.setItem('wscbChatHistory', chathistory + str);  
       }
       else{
         localStorage.setItem('wscbChatHistory', str);  
       }
    //  }
     
   }  