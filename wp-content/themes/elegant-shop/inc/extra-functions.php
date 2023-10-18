<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Elegant_Shop
 */

if( ! function_exists( 'elegant_shop_get_categories' ) ) :
    /**
     * Function to list post categories in customizer options
    */
    function elegant_shop_get_categories( $select = true, $taxonomy = 'category', $slug = false ){
        if( elegant_shop_is_woocommerce_activated() ){
            /* Option list of all categories */
            $categories = array();

            $args = array(
                'hide_empty' => false,
                'taxonomy'   => $taxonomy
            );

            $catlists = get_terms( $args );
            if( $select ) $categories[''] = __( 'Choose Category', 'elegant-shop' );
            foreach( $catlists as $category ){
                if( $category ){
                    if( $slug ){
                        $categories[$category->slug] = $category->name;
                    }else{
                        $categories[$category->term_id] = $category->name;
                    }
                }
            }

            return $categories;
        }else{
            return [];
        }
    }
endif;

if ( ! function_exists( 'elegant_shop_fallback_svg' ) ) :
/**
 * Get Fallback SVG
*/
function elegant_shop_fallback_svg( $post_thumbnail ) {
    if( ! $post_thumbnail ){
        return;
    }

    $image_size = elegant_shop_get_image_sizes( $post_thumbnail );

    if( $image_size ){ ?>
        <div class="svg-holder">
            <svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
                <rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:#b2b2b2;"></rect>
            </svg>
        </div>
        <?php
    }
}
endif;

if( ! function_exists( 'elegant_shop_get_image_sizes' ) ) :
/**
 * Get information about available image sizes
 */
function elegant_shop_get_image_sizes( $size = '' ) {

    global $_wp_additional_image_sizes;

    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();

    // Create the full array with sizes and crop info
    foreach( $get_intermediate_image_sizes as $_size ) {
        if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
            $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
            $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
            $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );
        } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
            $sizes[ $_size ] = array(
                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
            );
        }
    }
    // Get only 1 size if found
    if ( $size ) {
        if( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        } else {
            return false;
        }
    }
    return $sizes;
}
endif;

if( ! function_exists( 'elegant_shop_top_bar' ) ) :
/**
 * Top bar
*/
function elegant_shop_top_bar(){

    if( has_nav_menu( 'secondary' ) ) { ?>
        <div class="header-t">
            <div class="container">
                <div class="details">
                    <?php elegant_shop_secondary_navigation();  ?>
                </div>
            </div>
        </div><!-- Header-top -->
        <?php
    }
}
endif;

if( ! function_exists( 'elegant_shop_site_branding' ) ) :
/**
 * Site Branding
*/
function elegant_shop_site_branding( $mobile = false ){ ?>
    <div class="site-branding" itemscope itemtype="http://schema.org/Organization">
		<?php
        if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
            the_custom_logo();
        }

        if( is_front_page() && ! $mobile ){ ?>
            <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
            <?php
        }else{ ?>
            <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
        <?php
        }
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ){ ?>
                <p class="site-description" itemprop="description"><?php echo $description; ?></p>
            <?php
            }
        ?>
	</div>
    <?php
}
endif;

if( ! function_exists( 'elegant_shop_favourite_block' ) ) :
/**
 * Header favourite Block
*/
function elegant_shop_favourite_block(){
    if( elegant_shop_is_woocommerce_activated() && elegant_shop_is_yith_whislist_activated() ) :
        $whislist_url = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) );
        $ed_whislist  = get_theme_mod( 'ed_whislist', true );
        if( $ed_whislist && $whislist_url ) : ?>
            <div class="favourite-block">
                <a href="<?php echo esc_url( get_permalink( $whislist_url ) ); ?>" class="favourite" title="<?php esc_attr_e( 'View your favourite cart', 'elegant-shop' ); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15"><path d="M15.719,9.545A4.339,4.339,0,0,0,12.14,6.413a4.669,4.669,0,0,0-.815-.064,4.374,4.374,0,0,0-3.34,1.6c-.016.016-.032.048-.048.064A7.419,7.419,0,0,0,7.315,7.4,4.353,4.353,0,0,0,4.47,6.349,4.459,4.459,0,0,0,.076,9.784a5.4,5.4,0,0,0,.7,4.17,13.563,13.563,0,0,0,2.573,3A27.341,27.341,0,0,0,7.826,20.25a.182.182,0,0,0,.128.048.232.232,0,0,0,.112-.032A27.657,27.657,0,0,0,13.53,16a9.646,9.646,0,0,0,1.933-2.732A4.722,4.722,0,0,0,15.9,11.8a.227.227,0,0,1,.032-.1V10.424C15.863,10.128,15.8,9.832,15.719,9.545Zm-.92,2a.352.352,0,0,0-.016.128,3.568,3.568,0,0,1-.336,1.134,8.5,8.5,0,0,1-1.742,2.413A24.928,24.928,0,0,1,7.944,19a27.921,27.921,0,0,1-3.835-2.876,12.246,12.246,0,0,1-2.365-2.764,4.314,4.314,0,0,1-.559-3.34A3.362,3.362,0,0,1,4.493,7.451a3.234,3.234,0,0,1,2.125.783c.112.1.224.208.352.336a2.857,2.857,0,0,1,.208.224l.959.959.751-1.119a3.19,3.19,0,0,1,2.461-1.182,4.092,4.092,0,0,1,.623.048A3.22,3.22,0,0,1,14.687,9.88a2.023,2.023,0,0,1,.1.447c.016.064.016.128.032.192v1.023Z" transform="translate(0.073 -6.349)"></path></svg>
                </a>
                <span class="count"><?php echo yith_wcwl_count_products(); ?></span>
            </div>
            <?php
        endif;
    endif;
}
endif;

if( ! function_exists( 'elegant_shop_user_block' ) ) :
/**
 * Header User Block
*/
function elegant_shop_user_block(){
    $ed_user = get_theme_mod( 'ed_user_login', true );

    if( $ed_user && elegant_shop_is_woocommerce_activated() && wc_get_page_id( 'myaccount' ) ) :
        ?>
        <div class="user-block">
            <a href="<?php the_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
                <svg width="23" height="25" viewBox="0 0 23 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.1105 20.0859C21.5417 18.7387 20.7163 17.515 19.6803 16.4829C18.6475 15.4479 17.4239 14.6226 16.0773 14.0528C16.0652 14.0467 16.0532 14.0437 16.0411 14.0377C17.9195 12.6809 19.1406 10.4709 19.1406 7.97739C19.1406 3.84673 15.7939 0.5 11.6632 0.5C7.53258 0.5 4.18585 3.84673 4.18585 7.97739C4.18585 10.4709 5.40695 12.6809 7.28535 14.0407C7.27329 14.0467 7.26123 14.0497 7.24917 14.0558C5.89841 14.6256 4.68635 15.4427 3.64615 16.4859C2.6111 17.5188 1.78586 18.7423 1.216 20.0889C0.656167 21.4073 0.354237 22.8207 0.326552 24.2528C0.325748 24.2849 0.331392 24.317 0.343153 24.3469C0.354914 24.3769 0.372553 24.4042 0.395032 24.4272C0.417511 24.4503 0.444374 24.4686 0.474038 24.4811C0.503703 24.4936 0.535569 24.5 0.567759 24.5H2.3768C2.50947 24.5 2.615 24.3945 2.61801 24.2648C2.67831 21.9372 3.61298 19.7573 5.26525 18.105C6.97479 16.3955 9.24515 15.4548 11.6632 15.4548C14.0813 15.4548 16.3517 16.3955 18.0612 18.105C19.7135 19.7573 20.6482 21.9372 20.7085 24.2648C20.7115 24.3975 20.817 24.5 20.9497 24.5H22.7587C22.7909 24.5 22.8228 24.4936 22.8524 24.4811C22.8821 24.4686 22.909 24.4503 22.9314 24.4272C22.9539 24.4042 22.9716 24.3769 22.9833 24.3469C22.9951 24.317 23.0007 24.2849 22.9999 24.2528C22.9698 22.8116 22.6713 21.4095 22.1105 20.0859ZM11.6632 13.1633C10.2793 13.1633 8.9768 12.6236 7.9969 11.6437C7.017 10.6638 6.47731 9.36131 6.47731 7.97739C6.47731 6.59347 7.017 5.29095 7.9969 4.31106C8.9768 3.33116 10.2793 2.79146 11.6632 2.79146C13.0472 2.79146 14.3497 3.33116 15.3296 4.31106C16.3095 5.29095 16.8492 6.59347 16.8492 7.97739C16.8492 9.36131 16.3095 10.6638 15.3296 11.6437C14.3497 12.6236 13.0472 13.1633 11.6632 13.1633Z" fill="black"/>
                </svg>
            </a>
            <?php if ( is_user_logged_in() ): ?>
                <div class="user-block-popup">
                    <?php
                    $edit_account       = get_option( 'woocommerce_myaccount_edit_account_endpoint', 'edit-account' );
                    $customer_logout    = get_option( 'woocommerce_logout_endpoint', 'customer-logout' );

                    ?>
                    <?php if( $customer_logout ) : ?><li><a class="user-account-log" href="<?php echo esc_url( wc_get_account_endpoint_url( $customer_logout ) ); ?>"><?php esc_html_e( 'Sign in','elegant-shop' ); ?></a></li><?php endif; ?>
                    <?php if( $edit_account ) : ?><li><a class="user-account-edit" href="<?php echo esc_url( wc_get_account_endpoint_url( $edit_account ) ); ?>"><?php esc_html_e( 'Account','elegant-shop' ); ?></a></li><?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    endif;
}
endif;

if ( ! function_exists( 'elegant_shop_primary_navigation' ) ) :
    /**
    * Site Branding
    */
    function elegant_shop_primary_navigation( $schema = true ){
        if ( current_user_can( 'manage_options' ) || has_nav_menu( 'primary' ) ) {
        $schema_class = '';

        if( $schema ){
            $schema_class = ' itemscope itemtype="https://schema.org/SiteNavigationElement"';
        } ?>
            <nav id="site-navigation" class="main-navigation" <?php echo $schema_class; ?>>
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary',
                            'menu_id'         => 'primary-menu',
                            'container_class' => 'primary-menu-container',
                            'fallback_cb'     => 'elegant_shop_primary_menu_fallback',
                        )
                    );
                ?>
            </nav>
        <?php }
    }
endif;

if( ! function_exists( 'elegant_shop_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function elegant_shop_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<div class="menu-primary-container">';
        echo '<ul id="primary-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'elegant-shop' ) . '</a></li>';
        echo '</ul>';
        echo '</div>';
    }
}
endif;

if ( ! function_exists( 'elegant_shop_secondary_navigation' ) ) :
/**
* Site Branding
*/
function elegant_shop_secondary_navigation( $schema = true ){
    if ( current_user_can( 'manage_options' ) || has_nav_menu( 'secondary' ) ) {
    $schema_class = '';

    if( $schema ){
        $schema_class = ' itemscope itemtype="https://schema.org/SiteNavigationElement"';
    } ?>
        <nav id="site-navigation" class="secondary-navigation" <?php echo $schema_class; ?>>
            <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'secondary',
                        'menu_id'         => 'secondary-menu',
                        'container_class' => 'secondary-menu-container',
                        'fallback_cb'     => 'elegant_shop_secondary_menu_fallback',
                    )
                );
            ?>
        </nav>
    <?php }
}
endif;

if( ! function_exists( 'elegant_shop_secondary_menu_fallback' ) ) :
/**
 * Fallback for secondary menu
*/
function elegant_shop_secondary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<div class="menu-secondary-container">';
        echo '<ul id="secondary-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'elegant-shop' ) . '</a></li>';
        echo '</ul>';
        echo '</div>';
    }
}
endif;

if( ! function_exists( 'elegant_shop_mobile_navigation' ) ) :
/**
 * Mobile Navigation
*/
function elegant_shop_mobile_navigation(){
    $ed_cart   = get_theme_mod( 'ed_shopping_cart', true ); ?>
    <div class="mobile-header">
        <div class="header-main">
            <div class="container">
                <div class="mob-nav-site-branding-wrap header-wrapper">
                    <div class="nav-wrap">
                        <?php elegant_shop_site_branding(); ?>
                    </div>
                    <button id="menu-opener" class="toggle-btn toggle-main" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
                        <span class="toggle-bar"></span>
                        <span class="toggle-bar"></span>
                        <span class="toggle-bar"></span>
                        <span class="toggle-bar"></span>
                    </button>
                </div>
                <div class="mobile-header-wrap menu-container-wrapper">
                    <div class="mobile-menu-wrapper">
                        <nav id="mobile-site-navigation" class="main-navigation mobile-navigation">
                            <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
                                <button class="toggle-btn toggle-off close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal">
                                    <span class="toggle-bar"></span>
                                    <span class="toggle-bar"></span>
                                    <span class="toggle-bar"></span>
                                    <span class="toggle-bar"></span>
                                </button>
                                <?php
                                    elegant_shop_site_branding( true );
                                    elegant_shop_header_search();
                                ?>
                                <div class="header-left mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'elegant-shop' ); ?>">
                                    <?php
                                        elegant_shop_primary_navigation();
                                        elegant_shop_secondary_navigation();
                                        ?>
                                        <div class="right">
                                            <?php
                                            elegant_shop_user_block();
                                            elegant_shop_favourite_block();
                                            if( elegant_shop_is_woocommerce_activated() && $ed_cart ) elegant_shop_wc_cart_count();
                                            ?>
                                        </div>
                                </div>
                            </div>
                        </nav><!-- #mobile-site-navigation -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
endif;

if( ! function_exists( 'elegant_shop_get_products_sale' ) ) :
/**
 * Get sale for products
*/
function elegant_shop_get_products_sale( $product ){
    $stock = get_post_meta( get_the_ID(), '_stock_status', true );
    if( $stock == 'outofstock' ){
        echo '<span class="outofstock">' . esc_html__( 'Sold Out', 'elegant-shop' ) . '</span>';
    }elseif( $product->is_on_sale() ){
        $max_percentage ='';
        if ( $product->is_type( 'simple' ) ){
            $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
        }elseif( $product->is_type( 'variable' ) ){
            $max_percentage = 0;
            $prices = $product->get_variation_prices();
            // Loop through variation prices
            foreach( $prices['price'] as $key => $price ){
                // Only on sale variations
                if( $prices['regular_price'][$key] !== $price ){
                    // Calculate and set in the array the percentage for each variation on sale
                    $percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
                }
            }
            // We keep the highest value
			$max_percentage = max($percentages);
        }

        if ( $max_percentage > 0 ) echo '<div class="tag__wrap"><span class="tag">' . round( $max_percentage ) . '%</span></div>';
    }
}
endif;

if( ! function_exists( 'elegant_shop_overlay_content' ) ) :
/**
 * Products section overlay contents
*/
function elegant_shop_overlay_content(){ ?>
    <div class="overlay">
        <div class="overlay__content">
            <?php
                if( elegant_shop_is_yith_whislist_activated() ) echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                woocommerce_template_loop_add_to_cart();
                if( elegant_shop_is_yith_quickview_activated() ) echo '<span class="icon">' . do_shortcode( '[yith_quick_view]' ) . '</span>';
            ?>
        </div>
    </div>
<?php }
endif;

if( ! function_exists( 'elegant_shop_get_category_tabs' ) ) :
    /**
     * Query for Special Pricing Tabs
    */
    function  elegant_shop_get_category_tabs(){

        $show_category_tabs = get_theme_mod( 'cat_tab_custom' );
        if( taxonomy_exists( 'product_cat' ) && $show_category_tabs ){

            $terms_array = array();

            foreach ( $show_category_tabs  as $show_category_tab ) {
                $choose_cat  = ( isset( $show_category_tab['choose_cat'] ) && $show_category_tab['choose_cat'] ) ? $show_category_tab['choose_cat'] : '';
                $terms_array[] = $choose_cat;
            }

            if( $terms_array ){
                $index = 1;
                $first_category = '';
                echo '<div class="tab-btn-wrap">';
                foreach( $terms_array as $terms ){
                    $t = get_term_by( 'id', $terms, 'product_cat' );
                    $class_active = ( $index == 1 ) ? ' active' : '';
                    $class_add = ( $index != 1 ) ? ' ajax' : '';
                    if( $t ){
                        echo '<button data-id="'. esc_attr( $t->slug ) . '" class="tab-'. absint( $index ) .' tab-btn' . esc_attr( $class_add ) . esc_attr( $class_active )  . '">' . esc_html( $t->name ) . '</button>';
                        if( $index == 1 ) $first_category = $t->slug;
                    }
                    $index++;
                }
                echo '</div>';
                echo '<div class="tab-content-wrap">';
                elegant_shop_get_category_tab_contents( $first_category );
                echo '</div>';
            }
        }
    }
    endif;

    if( ! function_exists( 'elegant_shop_get_category_tab_contents' ) ) :
    /**
     * Query for Special Pricing Tabs
    */
    function elegant_shop_get_category_tab_contents( $cat = '' ){
        $no_of_cat_tab_products = get_theme_mod( 'no_of_cat_tab_products', 8 );
        $open_new_tab           = get_theme_mod( 'featured_prod_new_tab', false );
        $new_tab                = ( $open_new_tab ) ? 'target=_blank' : '';

        if( taxonomy_exists( 'product_cat' ) ){

            $image_size  = 'elegant-shop-product';

            if( isset( $_GET['shop_theme_nonce'] ) && wp_verify_nonce( $_GET['shop_theme_nonce'], 'elegant_shop_theme_nonce' ) ){
                $args['post_type']      = 'product';
                $args['posts_per_page'] = $no_of_cat_tab_products;
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $_GET['rre_theme_type'],
                    )
                );
                $id = $_GET['rre_theme_type'];
            }else{
                $args['post_type']      = 'product';
                $args['posts_per_page'] = $no_of_cat_tab_products;
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $cat,
                    )
                );
                $id = $cat;
            }

            $qry = new WP_Query( $args );

            if( $qry->have_posts() ) : ?>
                <div data-id="<?php echo esc_attr( $id ); ?>" class="tab-content <?php echo esc_attr( $id ); ?>">
                    <div class="tabs-product">
                        <?php
                        while( $qry->have_posts() ){
                            $qry->the_post(); global $product; ?>
                            <div class="item">
                                <div class="new-arrivals__item">
                                    <div class="new-arrivals__img">
                                        <?php elegant_shop_get_products_sale( $product ); ?>
                                        <a href="<?php the_permalink(); ?>" rel="bookmark" <?php echo esc_attr( $new_tab ); ?>>
                                            <?php
                                            if( has_post_thumbnail() ){
                                                the_post_thumbnail( $image_size );
                                            }else{
                                                elegant_shop_fallback_svg( $image_size );
                                            }
                                            ?>
                                        </a>
                                        <div class="overlay">
                                            <div class="overlay__content">
                                                <?php
                                                    if( elegant_shop_is_yith_whislist_activated() ) echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                                                    woocommerce_template_loop_add_to_cart();
                                                    if( elegant_shop_is_yith_quickview_activated() ) echo '<span class="icon">' . do_shortcode( '[yith_quick_view]' ) . '</span>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new-arrivals__content">
                                        <?php
                                            $average = $product->get_average_rating();
                                            if( $average ) echo '<div class="star-rating"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'elegant-shop' ).'</span></div>';
                                            the_title( '<h6><a href="' . esc_url( get_permalink() ) . '"' . esc_attr( $new_tab ) . '>', '</a></h6>' );
                                            woocommerce_template_single_price();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                wp_reset_postdata();
            endif;
        }
    }
    endif;

if ( ! function_exists( 'elegant_shop_apply_theme_shortcode' ) ) :
/**
 * Footer Shortcode
*/
function elegant_shop_apply_theme_shortcode( $string ) {
    if ( empty( $string ) ) {
        return $string;
    }
    $search = array( '[the-year]', '[the-site-link]' );
    $replace = array(
        date_i18n( esc_html__( 'Y', 'elegant-shop' ) ),
        '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>',
    );
    $string = str_replace( $search, $replace, $string );
    return $string;
}
endif;

if( ! function_exists( 'elegant_shop_get_banner' ) ) :
/**
 * Prints Banner Section
 *
*/
function elegant_shop_get_banner(){
    $ed_banner         = get_theme_mod( 'ed_banner_section', 'static_banner' );
    $btn_lbl           = get_theme_mod( 'banner_btn_lbl', __( 'Shop Now', 'elegant-shop' ) );
    $btn_link          = get_theme_mod( 'banner_btn_link', '#' );
    $slider_target     = get_theme_mod( 'slider_btn_new_tab', false ) ? 'target=_blank' : '';
    $banner_title      = get_theme_mod( 'banner_title', esc_html__( 'Find Your Best Holiday', 'elegant-shop' ) );
    $banner_subtitle   = get_theme_mod( 'banner_subtitle', __( 'Find great adventure holidays and activities around the planet.', 'elegant-shop' ) );
    $banner_content    = get_theme_mod( 'banner_content' );
    $banner_overlay    = get_theme_mod( 'banner_overlay', true );
    $image_size        = 'elegant-shop-slider';

    if( ( $ed_banner == 'static_banner' ) && has_custom_header() ){ ?>
        <div id="banner_section" class="banner left-align <?php if( has_header_video() ) echo esc_attr( ' banner-video ' ); ?> <?php if( $banner_overlay ) echo esc_attr( 'banner-overlay' ); ?>">
            <?php
            the_custom_header_markup();
            if( $ed_banner == 'static_banner' && ( $banner_title || $banner_subtitle || $banner_content || ( $btn_lbl && $btn_link ) ) ){ ?>
                <div class="banner__wrap">
                    <div class="container">
                        <div class="banner__text">
                            <?php
                                if( $banner_subtitle ) echo '<span class="banner__stitle">' . esc_html( $banner_subtitle ) . '</span>';
                                if( $banner_title ) echo '<h2 class="banner__title">' . esc_html( $banner_title ) . '</h2>';
                                if( $banner_content ) echo wp_kses_post( wpautop( $banner_content ) );
                                if( $btn_lbl && $btn_link ) { ?>
                                    <div class="btn-wrap">
                                        <?php
                                            if( $btn_lbl && $btn_link ) echo '<a href="' . esc_url( $btn_link ) . '" class="btn btn-lg btn-primary"' . esc_attr( $slider_target ) . '>' . esc_html( $btn_lbl ) . '</a>';
                                        ?>
                                    </div>
                                <?php }
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php
    }
}
endif;

if ( ! function_exists( 'elegant_shop_header_search' ) ) :
/**
* Header Search
*/
function elegant_shop_header_search(){
    $ed_search = get_theme_mod( 'ed_header_search', false );
    if( $ed_search ){ ?>
        <div class="header-search">
            <button class="search">
                <svg width="22" height="21" viewbox="0 0 22 21" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.9399 20L16.4539 15.506L20.9399 20ZM18.9399 9.5C18.9399 11.7543 18.0444 13.9163 16.4503 15.5104C14.8563 17.1045 12.6943 18 10.4399 18C8.1856 18 6.02359 17.1045 4.42953 15.5104C2.83547 13.9163 1.93994 11.7543 1.93994 9.5C1.93994 7.24566 2.83547 5.08365 4.42953 3.48959C6.02359 1.89553 8.1856 1 10.4399 1C12.6943 1 14.8563 1.89553 16.4503 3.48959C18.0444 5.08365 18.9399 7.24566 18.9399 9.5V9.5Z"
                        stroke="black" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
            <div class="header-search-wrap">
                <div class="header-search-inner">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
<?php }
}
endif;

if( ! function_exists( 'elegant_shop_sidebar' ) ) :
/**
 * Return sidebar layouts for pages/posts
*/
function elegant_shop_sidebar( $class = false ){
    global $post;
    $return       = $return = $class ? 'full-width' : false; //Fullwidth
    $layout       = get_theme_mod( 'layout_style', 'right-sidebar' ); //Default Layout Style for Styling Settings
    $page_layout  = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' ); //Global Layout/Position for Pages
    $post_layout  = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' ); //Global Layout/Position for Posts

    if ( is_404() ) return;

    if( is_singular() && ( elegant_shop_is_woocommerce_activated() && !( is_shop() || is_product_category() || is_product_tag() || is_search() ) ) ){
        if( is_singular() ){
            if( get_post_meta( $post->ID, '_elegant_shop_sidebar_layout', true ) ){
                $sidebar_layout = get_post_meta( $post->ID, '_elegant_shop_sidebar_layout', true );
            }else{
                $sidebar_layout = 'default-sidebar';
            }
            if( is_page() ){
                if( is_active_sidebar( 'sidebar' ) ){
                    if( $sidebar_layout == 'no-sidebar' ){
                        $return = 'full-width';
                    }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                        $return = 'rightsidebar';
                    }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                        $return = 'leftsidebar';
                    }elseif( $sidebar_layout == 'default-sidebar' && $page_layout == 'no-sidebar' ){
                        $return = 'full-width';
                    }
                }else{
                    $return = 'full-width';
                }
            }elseif( is_single() ){
                if( is_active_sidebar( 'sidebar' ) ){
                    if( $sidebar_layout == 'no-sidebar' ){
                        $return = 'full-width';
                    }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                        $return = 'rightsidebar';
                    }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                        $return = 'leftsidebar';
                    }elseif( $sidebar_layout == 'default-sidebar' && $post_layout == 'no-sidebar' ){
                        $return = 'full-width';
                    }
                }else{
                    $return = 'full-width';
                }
            }
        }
    }elseif( is_archive() || is_search() || !is_front_page() && is_home() ){
        //archive page
        if( is_active_sidebar( 'sidebar' ) ){
            if( $layout == 'no-sidebar' ){
                $return = 'full-width';
            }elseif( $layout == 'right-sidebar' ){
                $return = 'rightsidebar';
            }elseif( $layout == 'left-sidebar' ) {
                $return = 'leftsidebar';
            }
        }else{
            $return = 'full-width';
        }
    }elseif( elegant_shop_is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() ) ){
        if( is_active_sidebar( 'shop-sidebar' ) ){
            if( $layout == 'no-sidebar' ){
                $return = 'full-width';
            }elseif( $layout == 'right-sidebar' ){
                $return = 'rightsidebar';
            }elseif( $layout == 'left-sidebar' ) {
                $return = 'leftsidebar';
            }
        }else{
            $return = 'full-width';
        }
    }else{
        if( is_active_sidebar( 'sidebar' ) ){
            $return = 'rightsidebar';
        }else{
            $return = 'full-width';
        }
    }

    return $return;
}
endif;

if( ! function_exists( 'elegant_shop_breadcrumb' ) ) :
/**
 * Breadcrumbs
*/
function elegant_shop_breadcrumb(){
    global $post;
    $post_page  = get_option( 'page_for_posts' ); //The ID of the page that displays posts.
    $show_front = get_option( 'show_on_front' ); //What to show on the front page
    $home       = get_theme_mod( 'home_text', __( 'Home', 'elegant-shop' ) ); // text for the 'Home' link
    $delimiter  = '<span class="separator"><svg width="4" height="8" viewBox="0 0 4 8" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M4 3.99989L0.762289 0.571323L-2.645e-07 1.37741L2.47811 3.99989L-3.526e-08 6.62181L0.761751 7.42847L4 3.99989Z" fill="#74798A"/>
    </svg></span>';
    $before     = '<span class="current" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'; // tag before the current crumb
    $after      = '</span>'; // tag after the current crumb

    if( get_theme_mod( 'ed_breadcrumb', true ) ){
        $depth = 1;
        echo '<div id="crumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
                <span class="breadcrumb-home" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="' . esc_url( home_url() ) . '" itemprop="item"><span itemprop="name">' . esc_html( $home ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';

        if( is_home() ){
            $depth = 2;
            echo $before . '<a itemprop="item" href="'. esc_url( get_the_permalink() ) .'"><span itemprop="name">' . esc_html( single_post_title( '', false ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
        }elseif( is_category() ){
            $depth = 2;
            $thisCat = get_category( get_query_var( 'cat' ), false );
            if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                $p = get_post( $post_page );
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;
            }
            if( $thisCat->parent != 0 ){
                $parent_categories = get_category_parents( $thisCat->parent, false, ',' );
                $parent_categories = explode( ',', $parent_categories );
                foreach( $parent_categories as $parent_term ){
                    $parent_obj = get_term_by( 'name', $parent_term, 'category' );
                    if( is_object( $parent_obj ) ){
                        $term_url  = get_term_link( $parent_obj->term_id );
                        $term_name = $parent_obj->name;
                        echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                        $depth++;
                    }
                }
            }
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $thisCat->term_id) ) . '"><span itemprop="name">' .  esc_html( single_cat_title( '', false ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
        }elseif( elegant_shop_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
            $depth = 2;
            $current_term = $GLOBALS['wp_query']->get_queried_object();
            if( wc_get_page_id( 'shop' ) ){ //Displaying Shop link in woocommerce archive page
                $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                if ( ! $_name ) {
                    $product_post_type = get_post_type_object( 'product' );
                    $_name = $product_post_type->labels->singular_name;
                }
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;
            }
            if( is_product_category() ){
                $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                $ancestors = array_reverse( $ancestors );
                foreach ( $ancestors as $ancestor ) {
                    $ancestor = get_term( $ancestor, 'product_cat' );
                    if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                        echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                        $depth++;
                    }
                }
            }
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $current_term->term_id ) ) . '"><span itemprop="name">' . esc_html( $current_term->name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
        }elseif( elegant_shop_is_woocommerce_activated() && is_shop() ){ //Shop Archive page
            $depth = 2;
            if( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ){
                return;
            }
            $_name    = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
            $shop_url = ( wc_get_page_id( 'shop' ) && wc_get_page_id( 'shop' ) > 0 )  ? get_the_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' );
            if( ! $_name ){
                $product_post_type = get_post_type_object( 'product' );
                $_name             = $product_post_type->labels->singular_name;
            }
            echo $before . '<a itemprop="item" href="' . esc_url( $shop_url ) . '"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_tag() ){
            $depth          = 2;
            $queried_object = get_queried_object();
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $queried_object->term_id ) ) . '"><span itemprop="name">' . esc_html( single_tag_title( '', false ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />'. $after;
        }elseif( is_author() ){
            global $author;
            $depth    = 2;
            $userdata = get_userdata( $author );
            echo $before . '<a itemprop="item" href="' . esc_url( get_author_posts_url( $author ) ) . '"><span itemprop="name">' . esc_html( $userdata->display_name ) .'</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_search() ){
            $depth       = 2;
            $request_uri = $_SERVER['REQUEST_URI'];
            echo $before . '<a itemprop="item" href="'. esc_url( $request_uri ) . '"><span itemprop="name">' . sprintf( __( 'Search Results for "%s"', 'elegant-shop' ), esc_html( get_search_query() ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
        }elseif( is_day() ){
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'elegant-shop' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'elegant-shop' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'elegant-shop' ) ), get_the_time( __( 'm', 'elegant-shop' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'elegant-shop' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo $before . '<a itemprop="item" href="' . esc_url( get_day_link( get_the_time( __( 'Y', 'elegant-shop' ) ), get_the_time( __( 'm', 'elegant-shop' ) ), get_the_time( __( 'd', 'elegant-shop' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'd', 'elegant-shop' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
        }elseif( is_month() ){
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'elegant-shop' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'elegant-shop' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo $before . '<a itemprop="item" href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'elegant-shop' ) ), get_the_time( __( 'm', 'elegant-shop' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'elegant-shop' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
        }elseif( is_year() ){
            $depth = 2;
            echo $before .'<a itemprop="item" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'elegant-shop' ) ) ) ) . '"><span itemprop="name">'. esc_html( get_the_time( __( 'Y', 'elegant-shop' ) ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
        }elseif( is_single() && !is_attachment() ){
            $depth = 2;
            if( elegant_shop_is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
                if( wc_get_page_id( 'shop' ) ){ //Displaying Shop link in woocommerce archive page
                    $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                    if ( ! $_name ) {
                        $product_post_type = get_post_type_object( 'product' );
                        $_name = $product_post_type->labels->singular_name;
                    }
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                    $depth++;
                }
                if( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ){
                    $main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
                    $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, 'product_cat' );
                        if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                            $depth++;
                        }
                    }
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $main_term ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $main_term->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                    $depth++;
                }
                echo $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
            }elseif( get_post_type() != 'post' ){
                $post_type = get_post_type_object( get_post_type() );
                if( $post_type->has_archive == true ){// For CPT Archive Link
                    // Add support for a non-standard label of 'archive_title' (special use case).
                    $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>';
                    $depth++;
                }
                echo $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
            }else{ //For Post
                $cat_object       = get_the_category();
                $potential_parent = 0;

                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>';
                    $depth++;
                }

                if( $cat_object ){ //Getting category hierarchy if any
                    //Now try to find the deepest term of those that we know of
                    $use_term = key( $cat_object );
                    foreach( $cat_object as $key => $object ){
                        //Can't use the next($cat_object) trick since order is unknown
                        if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
                            $use_term         = $key;
                            $potential_parent = $object->term_id;
                        }
                    }
                    $cat  = $cat_object[$use_term];
                    $cats = get_category_parents( $cat, false, ',' );
                    $cats = explode( ',', $cats );
                    foreach ( $cats as $cat ) {
                        $cat_obj = get_term_by( 'name', $cat, 'category' );
                        if( is_object( $cat_obj ) ){
                            $term_url  = get_term_link( $cat_obj->term_id );
                            $term_name = $cat_obj->name;
                            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $delimiter . '</span>';
                            $depth++;
                        }
                    }
                }
                echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
            }
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){ //For Custom Post Archive
            $depth     = 2;
            $post_type = get_post_type_object( get_post_type() );
            if( get_query_var('paged') ){
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '/</span>';
                echo $before . sprintf( __('Page %s', 'elegant-shop'), get_query_var('paged') ) . $after; //@todo need to check this
            }else{
                echo $before . '<a itemprop="item" href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $after;
            }
        }elseif( is_attachment() ){
            $depth = 2;
            echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_page() && !$post->post_parent ){
            $depth = 2;
            echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_page() && $post->post_parent ){
            $depth       = 2;
            $parent_id   = $post->post_parent;
            $breadcrumbs = array();
            while( $parent_id ){
                $current_page  = get_post( $parent_id );
                $breadcrumbs[] = $current_page->ID;
                $parent_id     = $current_page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $breadcrumbs[$i] ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title( $breadcrumbs[$i] ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;
            }
            echo $before . '<a href="' . get_permalink() . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" /></span>' . $after;
        }elseif( is_404() ){
            $depth = 2;
            echo $before . '<a itemprop="item" href="' . esc_url( home_url() ) . '"><span itemprop="name">' . esc_html__( '404 Error - Page Not Found', 'elegant-shop' ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $after;
        }

        if( get_query_var('paged') ) printf( __( ' (Page %s)', 'elegant-shop' ), get_query_var('paged') );

        echo '</div><!-- .crumbs -->';

    }
}
endif;

if( ! function_exists( 'elegant_shop_get_posts_list' ) ) :
/**
 * Returns Latest, Related & Popular Posts
*/
function elegant_shop_get_posts_list( $status ){
    global $post;
    $label = get_theme_mod( 'read_more_text', __( 'Read More', 'elegant-shop' ) );

    $post_type = ( is_404() ? 'product' : 'post' );

    $args = array(
        'post_type'           => $post_type,
        'posts_status'        => 'publish',
        'ignore_sticky_posts' => true
    );

    switch( $status ){
        case 'latest':
        $args['posts_per_page'] = 3;
        $args_title             = __( 'Latest Posts', 'elegant-shop' );
        $class                  = 'recent-posts';
        break;

        case 'related':
        $args['posts_per_page'] = 2;
        $args['post__not_in']   = array( $post->ID );
        $args['orderby']        = 'rand';
        $args_title             = get_theme_mod( 'related_post_title', __( 'Related Posts', 'elegant-shop' ) );
        $class                  = 'related-post';
        $cats = get_the_category( $post->ID );
        if( $cats ){
            $c = array();
            foreach( $cats as $cat ){
                $c[] = $cat->term_id;
            }
            $args['category__in'] = $c;
        }
        break;
    }

    $qry = new WP_Query( $args );

    if( $qry->have_posts() ){ ?>
        <div class="<?php echo esc_attr( $class ); ?>">
            <?php
            if( $args_title ) echo '<div class="heading"><h2 class="heading__title heading__underlined">' . esc_html( $args_title ) . '</h2></div>'; ?>
            <div class="grid-layout-wrap">
                <div class="row">
                    <?php while( $qry->have_posts() ){ $qry->the_post(); global $product;
                        if( is_404() ){ ?>
                            <div class="item col">
                                <div class="new-arrivals__item blog-card card">
                                    <div class="new-arrivals__img">
                                        <?php elegant_shop_get_products_sale( $product ); ?>
                                        <a href="<?php the_permalink(); ?>" rel="bookmark" target="_blank">
                                            <?php
                                            if( has_post_thumbnail() ){
                                                the_post_thumbnail( 'elegant-shop-blog' );
                                            }else{
                                                elegant_shop_fallback_svg( 'elegant-shop-blog' );
                                            }
                                            ?>
                                        </a>
                                        <div class="overlay">
                                            <div class="overlay__content">
                                                <?php
                                                    if( elegant_shop_is_yith_whislist_activated() ) echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                                                    woocommerce_template_loop_add_to_cart();
                                                    if( elegant_shop_is_yith_quickview_activated() ) echo '<span class="icon">' . do_shortcode( '[yith_quick_view]' ) . '</span>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new-arrivals__content">
                                        <?php
                                            $average = $product->get_average_rating();
                                            if( $average ) echo '<div class="star-rating"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'elegant-shop' ).'</span></div>';
                                            the_title( '<h6><a href="' . esc_url( get_permalink() ) . '">', '</a></h6>' );
                                            woocommerce_template_single_price();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php } else {
                            echo '<article class="post">';
                                echo '<div class="blog-card card">';
                                    echo '<a href="' . esc_url( get_permalink() ) . '">';
                                        echo '<figure class="card__img">';
                                            if( has_post_thumbnail() ){
                                                the_post_thumbnail( 'elegant-shop-blog' );
                                            }else{
                                                elegant_shop_fallback_svg( 'elegant-shop-blog' );
                                            }
                                        echo '</figure>';
                                    echo '</a>';
                                    echo '<div class="card__content">';
                                        echo '<div class="category">';
                                            elegant_shop_category();
                                            echo '</div>';
                                        the_title('<a href="' . esc_url( get_permalink() ) . '"><h4>', '</h4></a>');
                                        if( $label ) echo '<a href="' . esc_url( get_permalink() ) . '" class="btn btn-underlined">' . esc_html( $label ) . '</a>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</article>';
                        }
                    } wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}
endif;

if( ! function_exists( 'elegant_shop_author_box' ) ) :
/**
 * Author Box for Single Post and Archive Page
 */
function elegant_shop_author_box(){
    if( is_single() ){
        $ed_post_author = get_theme_mod( 'ed_author', false );
    }else{
        $ed_post_author = false;
    }
    if( ! $ed_post_author ) { ?>
        <div class="author-section">
            <div class="author-wrapper">
                <figure class="author-img">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 135 ); ?>
                </figure>
                <div class="author-wrap">
                    <?php
                        echo '<h3 class="author-name">' . esc_html( get_the_author_meta( 'display_name' ) ) . '</h3>';
                        echo '<span class="author-count">';
                        printf( __( '%s Post', 'elegant-shop' ), count_user_posts( get_the_author_meta( 'ID' ) ) );
                        echo '</span>';
                    ?>
                    <div class="author-content">
                        <p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}
endif;

if( ! function_exists( 'elegant_shop_comment_callback' ) ) {
	/**
	 * Callback function for Comment List *
	 *
	 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments
	 */
	function elegant_shop_comment_callback( $comment, $args, $depth ){
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}?>
		<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">

		<?php if ( 'div' != $args['style'] ) : ?>
		<article id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
		<?php endif; ?>

			<footer class="comment-meta">
				<div class="comment-author vcard">
                    <div class="comment-author-image">
				        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                    </div>
				</div>
                <div class="author-details-wrap"><!-- .comment-author vcard -->
                    <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s <span class="says">says:</span></b>', 'elegant-shop' ), get_comment_author_link() ); ?>
                    <div class="comment-meta-data">
                        <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
                            <time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'elegant-shop' ), get_comment_date(),  get_comment_time() ); ?></time>
                        </a>
                    </div>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'elegant-shop' ); ?></em>
                        <br />
                    <?php endif; ?>
                    <div class="comment-content" itemprop="commentText">
                        <?php comment_text(); ?>
			        </div>
                    <div class="reply">
                        <div class="comments"><?php echo get_comments_number() . esc_html__( ' Comments', 'elegant-shop' ); ?></div>
                        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __('Reply', 'elegant-shop'), 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div>
                </div>
			</footer>
		<?php if ( 'div' != $args['style'] ) : ?>
		</article><!-- .comment-body -->
		<?php endif;
	}
}

if( ! function_exists( 'elegant_shop_google_fonts_url' ) ) :
    /**
     * Register google font.
     */
    function elegant_shop_google_fonts_url() {
        $fonts_url = '';

        /* Translators: If there are characters in your language that are not
        * supported by respective fonts, translate this to 'off'. Do not translate
        * into your own language.
        */
        $cardo_font = _x( 'on', 'Jost: on or off', 'elegant-shop' );

        if ( 'off' !== $cardo_font || 'off' !== $nunito_font ) {
            $font_families = array();

            if ( 'off' !== $cardo_font ) {
                $font_families[] = 'Jost:300,300i,400,400i,700,700i';
            }

            $query_args = array(
                'family'  => urlencode( implode( '|', $font_families ) ),
                'subset'  => urlencode( 'latin,latin-ext' ),
                'display' => urlencode( 'fallback' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url( $fonts_url );
    }
endif;

/**
 * Get font face styles.
 *
 * @since 1.0.6
 *
 * @return string
 */
if( ! function_exists( 'elegant_shop_get_font_face_styles' ) ) :
	function elegant_shop_get_font_face_styles() {

		return "
			@font-face{
				font-family: 'Jost';
				font-weight: 300 400 700;
				font-style: normal;
				font-stretch: normal;
				font-display: swap;
				src: url('" . get_theme_file_uri( 'fonts/Jost-Regular.ttf' ) . "');
			}

			@font-face{
				font-family: 'Jost';
				font-weight: 300 400 700;
				font-style: italic;
				font-stretch: normal;
				font-display: swap;
				src: url('" . get_theme_file_uri( 'fonts/Jost-italic.ttf' ) . "');
			}
			";

	}
endif;

if( ! function_exists( 'elegant_shop_scroll_to_top' ) ) :
/**
 * Scroll to top function
*/
function elegant_shop_scroll_to_top(){
    $ed_scroll_top = get_theme_mod( 'ed_scroll_top', true );
    if( $ed_scroll_top ) echo '<div id="esp-top">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve"><path id="XMLID_224_" d="M325.606,229.393l-150.004-150C172.79,76.58,168.974,75,164.996,75c-3.979,0-7.794,1.581-10.607,4.394l-149.996,150c-5.858,5.858-5.858,15.355,0,21.213c5.857,5.857,15.355,5.858,21.213,0l139.39-139.393l139.397,139.393C307.322,253.536,311.161,255,315,255c3.839,0,7.678-1.464,10.607-4.394C331.464,244.748,331.464,235.251,325.606,229.393z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
    </div>';
}
endif;

if( ! function_exists( 'elegant_shop_is_woocommerce_activated' ) ) :
/**
 * Query WooCommerce activation
 */
function elegant_shop_is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}
endif;

if( ! function_exists( 'elegant_shop_is_yith_whislist_activated' ) ) :
/**
 * Query Yith activation
 */
function elegant_shop_is_yith_whislist_activated() {
    return class_exists( 'YITH_WCWL' ) ? true : false;
}
endif;

if( ! function_exists( 'elegant_shop_is_yith_quickview_activated' ) ) :
/**
 * Query Yith activation
 */
function elegant_shop_is_yith_quickview_activated() {
    return class_exists( 'YITH_WCQV' ) ? true : false;
}
endif;

if( ! function_exists( 'elegant_shop_is_cf7_activated' ) ) :
/**
 * Check if Contact Form 7 Plugin is installed
*/
function elegant_shop_is_cf7_activated(){
    return class_exists( 'WPCF7' ) ? true : false;
}
endif;