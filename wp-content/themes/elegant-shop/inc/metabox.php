<?php
/**
 * Elegant Shop Meta Box
 * 
 * @package Elegant_Shop
 */

 add_action('add_meta_boxes', 'elegant_shop_add_layout_box');

function elegant_shop_add_layout_box(){ 
    add_meta_box( 
        'elegant_shop_sidebar_layout',
        __( 'Sidebar Layout', 'elegant-shop' ),
        'elegant_shop_sidebar_layout_callback', 
        array( 'page', 'post' ),
        'normal',
        'high'
    );
} 

$es_sidebar_layout = array(    
    'default-sidebar'=> array(
    	 'value'     => 'default-sidebar',
    	 'label'     => __( 'Default Sidebar', 'elegant-shop' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/sidebar/general-Default.jpg'
   	),
    'no-sidebar'     => array(
    	 'value'     => 'no-sidebar',
    	 'label'     => __( 'Full Width', 'elegant-shop' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/sidebar/general-full.jpg'
    ),
    'left-sidebar' => array(
         'value'     => 'left-sidebar',
    	 'label'     => __( 'Left Sidebar', 'elegant-shop' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/sidebar/general-left.jpg'         
    ),
    'right-sidebar' => array(
         'value'     => 'right-sidebar',
    	 'label'     => __( 'Right Sidebar', 'elegant-shop' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/sidebar/general-right.jpg'         
     )    
);

function elegant_shop_sidebar_layout_callback(){
    global $post , $es_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'es_sidebar_nonce' );
    ?>     
    <table class="form-table">
        <tr>
            <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'elegant-shop' ); ?></em></td>
        </tr>    
        <tr>
            <td>
                <?php  
                    foreach( $es_sidebar_layout as $field ){  
                        $layout = get_post_meta( $post->ID, '_elegant_shop_sidebar_layout', true ); ?>
                        <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                            <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="es_sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $layout ); if( empty( $layout ) ){ checked( $field['value'], 'default-sidebar' ); }?>/>
                            <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                                <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php echo esc_attr( $field['label'] ); ?>" />                               
                            </label>
                        </div>
                        <?php 
                    } // end foreach 
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>
 <?php 
}

function elegant_shop_save_sidebar_layout( $post_id ){
    global $es_sidebar_layout;

    // Verify the nonce before proceeding.
    if( !isset( $_POST[ 'es_sidebar_nonce' ] ) || !wp_verify_nonce( $_POST[ 'es_sidebar_nonce' ], basename( __FILE__ ) ) )
        return;
    
    // Stop WP from clearing custom fields on autosave
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;
    
    $layout = isset( $_POST['es_sidebar_layout'] ) ? sanitize_key( $_POST['es_sidebar_layout'] ) : 'default-sidebar';

    if( array_key_exists( $layout, $es_sidebar_layout ) ){
        update_post_meta( $post_id, '_elegant_shop_sidebar_layout', $layout );
    }else{
        delete_post_meta( $post_id, '_elegant_shop_sidebar_layout' );
    }
      
}
add_action( 'save_post' , 'elegant_shop_save_sidebar_layout' );