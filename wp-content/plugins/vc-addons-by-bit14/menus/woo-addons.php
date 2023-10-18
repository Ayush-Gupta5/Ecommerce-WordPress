<?php
function pbwb_woo_addons_list_page(){
    do_action('pb_admin_pages_before_content');
    ?>
    <div id="container"  class="bit14-admin-addons">
        <div class="heading">
            <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/images/pb-logo.png'); ?>" />
            <h1 class="title">PB WooCommerce Addons for WPBakery Page Builder</h1>
            <p>Build your online store with premium quality WooCommerce elements for WPBakery Page Builder.</p>
        </div>
            <div id="web-addons" class="pagebuilder-addons">
                
                <div class="addons-list only-builder">
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/add-to-cart.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Add To Cart</h3>
                                <p>Connect your products with the shopping cart with the Add to Cart button element</p>
                                <a href="https://pagebuilderaddons.com/add-to-cart/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/product-category.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Product Category</h3>
                                <p>Display all your product categories to help your users make choice hassle-free</p>
                                <a href="https://pagebuilderaddons.com/product-category" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/single-product.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Single Product</h3>
                                <p>Showcase multiple products in beautiful layouts on your WooCommerce online store</p>
                                <a href="https://pagebuilderaddons.com/single-product" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/grid-single-product.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Grid Single Product</h3>
                                <p>Easily embed mailchimp into your webite</p>
                                <a href="https://pagebuilderaddons.com/grid-single-product" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/grid-product-category.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Grid Product Category</h3>
                                <p>Display your product categories in grid layouts to give your users an overview of the store</p>
                                <a href="https://pagebuilderaddons.com/grid-product-category" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/banner-product-category.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Banner Product Category</h3>
                                <p>Showcase your product categories in a Banner and grab your user’s attention</p>
                                <a href="https://pagebuilderaddons.com/banner-product-category" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div> 
                </div>
                <?php do_shortcode('[send_in_blue]')?>
                <p class="more-elements">More elements coming soon</p>
                <?php do_shortcode('[woo_addons_banner]')?>

            </div>
        </div>
        <?php
        }
