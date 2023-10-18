<?php
defined('ABSPATH') or die();

//=============================================================================
//* Ajax response - Get Categories *//
//=============================================================================
add_action( 'wp_ajax_wscb_get_product_categories' , 'wscb_get_product_categories' );
add_action( 'wp_ajax_nopriv_wscb_get_product_categories' , 'wscb_get_product_categories' );
function wscb_get_product_categories()
{
  $orderby = 'name';
  $order = 'asc';
  $hide_empty = true ;
  $cat_args = array(
      'orderby'    => $orderby,
      'order'      => $order,
      'hide_empty' => $hide_empty,
  );
  
  $product_categories = get_terms( 'product_cat', $cat_args );
  
  $return = array(
    'response'  => 'true',
    'categories' =>  $product_categories
  );

  wp_send_json($return);
  die();
}

//=============================================================================
//* Ajax response - Get Products by Categories *//
//=============================================================================
add_action( 'wp_ajax_wscb_get_products_by_cat' , 'wscb_get_products_by_cat' );
add_action( 'wp_ajax_nopriv_wscb_get_products_by_cat' , 'wscb_get_products_by_cat' );
function wscb_get_products_by_cat()
{
  $wscb_options = get_option('wscb_options_data' );
   $cat_slug = sanitize_text_field($_POST['slug']);

   $args = array(
    'posts_per_page' => 10,
    'post_type' => 'product',
    'orderby' => 'title',
    'post_status' => 'publish',
    'product_cat' => $cat_slug
    );

    $query = new WP_Query( $args );
    $product = array();
    $msg = '';
 

    if( $query->have_posts() ):
      
      $msg = $wscb_options['category_message'];
      while( $query->have_posts() ) : $query->the_post();
      $p = wc_get_product( get_the_ID() );
      $product[] = array(
          'image' =>  wp_get_attachment_image_src( get_post_thumbnail_id() )[0],
          'url' =>  get_permalink(),
          'title' => get_the_title(),
          'price' => $p->get_price_html()
      );
      endwhile;
    endif;

    $return = array(
      'products' => $product,
      'cat_link' => get_term_link( $cat_slug , 'product_cat' ),
      'message' => $msg
    );
  
   wp_send_json($return);
  
   die();
}


//=============================================================================
//* Ajax response - Get Message Results *//
//=============================================================================
add_action( 'wp_ajax_wscb_get_msg_results' , 'wscb_get_msg_results' );
add_action( 'wp_ajax_nopriv_wscb_get_msg_results' , 'wscb_get_msg_results' );
function wscb_get_msg_results()
{
  $wscb_options = get_option('wscb_options_data' );
  $msg = sanitize_text_field($_POST['msg']);
  $greetings = ['hi' , 'hello' , 'hey!' , 'hey' , 'hi there!', 'hi there' , 'hi dabbu' ];
  $name_msg = 'what is your name?';
  $product = array();


  if( in_array( strtolower($msg) , $greetings ) )
  {
    $msg = "Hi there! I can help you finding products on our website.";
  }
  elseif( strtolower($msg) == $name_msg )
  {
    $msg = "I already told you that before :D";
  }
  else
  {

    if( str_word_count($msg) > 2 )
    {
        $clean_msg = preg_replace('/[^A-Za-z 0-9\-]/', '', $msg);
        $pieces = explode(' ', $clean_msg);
        $msg = array_pop($pieces);
    }

    // Query - Title Search
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'order' => 'ASC',
      's' => $msg,
    );
    $query = new WP_Query($args);


    // Query - Category Search ( IF title search is empty)
    if( $query->post_count == 0 )
    {
      $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'product_cat' => $msg
      );
      $query = new WP_Query($args);
    }

    if( $query->have_posts() ):
        
      $msg =  $wscb_options["keyword_message"] . ' <b>' . $msg .'</b>';
      while( $query->have_posts() ) : $query->the_post();

      $product[] = array(
        'image' =>  wp_get_attachment_image_src( get_post_thumbnail_id() )[0],
        'url'   =>  get_permalink(),
        'title' =>  get_the_title(),
      );

      endwhile;
    else:
      $msg = 'Oops! Nothing matches your criteria <b>' . $msg .'</b>. Click to see our <a class="wscb-catalog" href="#">Catalog</a>';
    endif;

  }


$return = array(
  'products' => $product,
  'message' => $msg
);

wp_send_json($return);
  die();
}

?>