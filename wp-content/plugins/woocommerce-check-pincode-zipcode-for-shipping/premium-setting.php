<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$plugin_dir_url =  plugin_dir_url( __FILE__ );
?>
<style>

.pho-upgrade-btn > a:focus {
	box-shadow: none !important;
}
.premium-box {width: 100%;}
.premium-box-head {background: #eae8e7; width: 100%; height:500px; text-align: center;}
.pho-upgrade-btn {display: block; text-align: center;}
.pho-upgrade-btn a{display: inline-block;  margin-top: 75px;}
.pho-upgrade-btn a:focus {outline: none; box-shadow: none; }
.main-heading  {text-align: center; background: #fff; margin-bottom: -70px;}
.main-heading img {margin-top: -200px;}

.premium-box-container {margin: 0 auto;}
.premium-box-container .description {text-align: center; display: block; padding: 35px 0;}
.premium-box-container .description:nth-child(odd) {background: #fff;}
.premium-box-container .description:nth-child(even) {background: #eae8e7;}

.premium-box-container .pho-desc-head {width: 768px; margin: 0 auto; position: relative;}
.premium-box-container .pho-desc-head:after {background:url(<?php echo $plugin_dir_url; ?>assets/img/head-arrow.png) no-repeat;
 position: absolute; right: -30px; top: -6px; width: 69px; height: 98px; content: "";} 

.premium-box-container .pho-desc-head h2 {color: #02c277; font-weight: bolder; font-size: 28px; text-transform: capitalize;margin: 0; line-height:35px;}
.pho-plugin-content {margin: 0 auto; width: 768px; overflow: hidden;}
.pho-plugin-content p {line-height: 32px; font-size: 18px; color: #212121; }
.pho-plugin-content img {width: auto; max-width: 100%;}
.description .pho-plugin-content ol { margin: 0; padding-left: 25px; text-align: left;}
.description .pho-plugin-content ol li {font-size: 16px; line-height: 28px; color: #212121; padding-left: 5px;}
.description .pho-plugin-content .pho-img-bg { width: 750px; margin: 0 auto; border-radius: 5px 5px 0 0; 
padding: 70px 0 40px; height: auto;}
.premium-box-container .description:nth-child(odd) .pho-img-bg {background: #f1f1f1 url(<?php echo $plugin_dir_url; ?>assets/img/image-frame-odd.png) no-repeat 100% top;}
.premium-box-container .description:nth-child(even) .pho-img-bg {background: #f1f1f1 url(<?php echo $plugin_dir_url; ?>assets/img/image-frame-even.png) no-repeat 100% top;}

</style>

<div class="premium-box">

    <div class="premium-box-head">
        <div class="pho-upgrade-btn">
        <a href="https://www.phoeniixx.com/product/woocommerce-check-pincodezipcode-for-shipping-and-cod/" target="_blank"><img src="<?php echo $plugin_dir_url; ?>assets/img/premium-btn.png" /></a>
		<a target="blank" href="http://checkpincode.phoeniixxdemo.com/"><img src="<?php echo $plugin_dir_url; ?>assets/img/button2.png" /></a>
        </div>
    </div>
    <div class="main-heading"><h1><img src="<?php echo $plugin_dir_url; ?>assets/img/premium-head.png" /></h1></div>

        <div class="premium-box-container">
				<div class="description">
                <div class="pho-desc-head"><h2><?php esc_html_e('Admin can add product based pincodes in','pho-pincode-zipcode-cod'); ?></br> <?php esc_html_e('the backend','pho-pincode-zipcode-cod'); ?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php esc_html_e('You have Option to add/import CSV to the product in the backend of any particular product.','pho-pincode-zipcode-cod'); ?></p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/img/option-to-add.jpg" />
                        </div>
                    </div>
				</div> <!-- description end -->
				
				<div class="description">
                <div class="pho-desc-head"><h2><?php esc_html_e('Pincode check popup','pho-pincode-zipcode-cod'); ?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php esc_html_e('Autoload popup of check pincode on Home page.','pho-pincode-zipcode-cod'); ?><br><?php esc_html_e('Admin can enable and disable the autoload popup on home page.<br>Pincode can be verified by user on catogry page or shop page.','pho-pincode-zipcode-cod'); ?></p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/img/pincode-check-popup.jpg" />
                        </div>
                    </div>
				</div> <!-- description end -->
			
            <div class="description">
                <div class="pho-desc-head"><h2><?php esc_html_e('Add to Cart Activation based on Pincodes','pho-pincode-zipcode-cod'); ?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php esc_html_e('The Add to Cart Button won´t work unless the Pincode that the user has entered is available for delivery as per your list of available pin codes.','pho-pincode-zipcode-cod'); ?></p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/img/change-img.jpg" />
                        </div>
                    </div>
            </div> <!-- description end -->
            
            <div class="description">
                <div class="pho-desc-head"><h2><?php esc_html_e('Saturday/Sunday Off Option','pho-pincode-zipcode-cod'); ?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php esc_html_e('You have the option to activate or deactivate the Saturday/Sunday off option to ensure that no delivery dates are set for Saturdays or Sundays.','pho-pincode-zipcode-cod'); ?></p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/img/saturday-sunday-off.jpg" />
                        </div>
                    </div>
            </div> <!-- description end -->
            
            <div class="description">
                <div class="pho-desc-head"><h2><?php esc_html_e('Bulk CSV Uploads','pho-pincode-zipcode-cod'); ?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php esc_html_e('With bulk CSV uploads option you can enter as many pin codes as you want into the system in one go. There will be no need to manually add each Pin Code.Admin can use wildcard character ( * ) to support multiple values in a range. eg 110*','pho-pincode-zipcode-cod'); ?></p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/img/bulk-csv-uploads.jpg" />
                        </div>
                    </div>
            </div> <!-- description end -->
			
			<div class="description">
                <div class="pho-desc-head"><h2><?php esc_html_e('Admin can delete all the pincodes from the','pho-pincode-zipcode-cod'); ?></br> <?php esc_html_e('backend by bulk delete option','pho-pincode-zipcode-cod'); ?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php esc_html_e('Delete all pincodes:User can delete pincode list,just by clicking on delete all button.','pho-pincode-zipcode-cod'); ?></p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/img/delete-all-pincode.jpg" />
                        </div>
                    </div>
            </div> <!-- description end -->
            
            <div class="description">
                <div class="pho-desc-head"><h2><?php esc_html_e('COD Verification','pho-pincode-zipcode-cod'); ?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php esc_html_e('You have the option to choose which pin codes will support the COD option and which pin codes won´t.','pho-pincode-zipcode-cod'); ?></p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/img/cod-check.jpg" />
                        </div>
                    </div>
            </div> <!-- description end -->
            
            <div class="description">
                <div class="pho-desc-head"><h2><?php esc_html_e('Delivery Dates Preview','pho-pincode-zipcode-cod'); ?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php esc_html_e('The delivery date for the pincodes chosen by the user will appear on the Product Page, Cart Page and even the Checkout Page.','pho-pincode-zipcode-cod'); ?></p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/img/delivery-date.jpg" />
                        </div>
                    </div>
            </div> <!-- description end -->
            
            <div class="description">
                <div class="pho-desc-head"><h2><?php esc_html_e('Advanced Styling Options','pho-pincode-zipcode-cod'); ?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php esc_html_e('You will get access to many advanced styling options to create a Check Pin Code format that will gel completely with your website.','pho-pincode-zipcode-cod'); ?></p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/img/style-check.jpg" />
                        </div>
                    </div>
            </div> <!-- description end -->
            
            <div class="description">
                <div class="pho-desc-head"><h2><?php esc_html_e('Checkout Page Pincode Check','pho-pincode-zipcode-cod'); ?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php esc_html_e('Usually customers enter a different pincode on Checkout page and process their order. But with this feature the Customer cannot enter a different Pincode in the checkout step of the order process as the Pincodes will be checked on Checkout Page also.','pho-pincode-zipcode-cod'); ?></p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/img/Checkout-Page-Pincode-Check.jpg" />
                        </div>
                    </div>
            </div> <!-- description end -->
        </div> <!-- premium-box-container end -->
        
        <div class="pho-upgrade-btn">
        <a href="https://www.phoeniixx.com/product/woocommerce-check-pincodezipcode-for-shipping-and-cod/" target="_blank"><img src="<?php echo $plugin_dir_url; ?>assets/img/premium-btn.png" /></a>
		<a target="blank" href="http://checkpincode.phoeniixxdemo.com/"><img src="<?php echo $plugin_dir_url; ?>assets/img/button2.png" /></a>
        </div>

</div> <!-- premium-box end -->