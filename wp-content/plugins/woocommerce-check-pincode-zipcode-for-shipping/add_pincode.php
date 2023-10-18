<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function add_pincodes_f()
{
	
	?>
	
	<div class="wrap">
	
	<?php
	
	global $table_prefix, $wpdb;
	
	$plugin_dir_url =  plugin_dir_url( __FILE__ );
	
	if( !empty( $_POST['submit'] ) && sanitize_text_field( $_POST['submit'] ) && current_user_can( 'manage_options' ) )
	{
		
		$nonce_check = sanitize_text_field( $_POST['_wpnonce_add_pincode_form'] );
	
		if ( ! wp_verify_nonce( $nonce_check, 'add_pincode_form' ) ) 
		{
			
			die(  'Security check failed'  ); 
			
		}
		
		$pincode = sanitize_text_field( $_POST['pincode'] );
		
		$city = sanitize_text_field( $_POST['city'] );
		
		$state = sanitize_text_field( $_POST['state'] );
		
		$dod = sanitize_text_field( $_POST['dod'] );
		
		$safe_zipcode =  sanitize_text_field($pincode);
		
		$safe_dod = intval( $dod );
		
		if (  $safe_zipcode && $safe_dod )
		{	
	
			$num_rows = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM `".$table_prefix."check_pincode_p` where `pincode` = %s", $pincode ) );

			if($num_rows == 0)

			{

				$result = $wpdb->query( $wpdb->prepare( "INSERT INTO `".$table_prefix."check_pincode_p` SET `pincode` = %s , `city` = %s , `state` = %s , `dod` = %d ", $pincode, $city, $state, $dod ) );
				
				if($result == 1)
				{
				?>

					<div class="updated below-h2" id="message"><p><?php esc_html_e('Added Successfully.','pho-pincode-zipcode-cod'); ?></p></div>

				<?php
				}
				else
				{
					?>
						<div class="error below-h2" id="message"><p> <?php esc_html_e('Something Went Wrong Please Try Again With Valid Data.','pho-pincode-zipcode-cod'); ?></p></div>
					<?php
					
				}
			}
			else
			{
				?>

					<div class="error below-h2" id="message"><p> <?php esc_html_e('This Pincode Already Exists.','pho-pincode-zipcode-cod'); ?></p></div>

				<?php
			}
		}
		else
		{
			?>

				<div class="error below-h2" id="message"><p> <?php esc_html_e('Please Fill Valid Data.','pho-pincode-zipcode-cod'); ?></p></div>

			<?php
		}
	}
	?>
			<div id="icon-users" class="icon32"><br/></div>
<?php
if( isset( $_GET['tab'] ) ) {
	
	$tab = sanitize_text_field( $_GET['tab'] );
	
}
else
{
	$tab = '';
}
?>
			<!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
			<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
					<a class="nav-tab <?php if($tab == 'add' || $tab == ''){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=add_pincode&amp;tab=add"><?php esc_html_e('Add Zip Code','pho-pincode-zipcode-cod'); ?></a>
					<a class="nav-tab <?php if($tab == 'premium'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=add_pincode&amp;tab=premium"><?php esc_html_e('Premium Version','pho-pincode-zipcode-cod'); ?></a>
			</h2>				
<?php
if($tab == 'add' || $tab == '')
{
?>
			<div class="meta-box-sortables" id="normal-sortables">
				<div class="postbox " id="pho_wcpc_box">
					<h3><span class="upgrade-heading"><?php esc_html_e('Upgrade to the PREMIUM VERSION','pho-pincode-zipcode-cod'); ?></span></h3>
					<div class="inside">
						<div class="pho_premium_box">

							<div class="column two">
								<!-----<h2>Get access to Pro Features</h2>----->

								<p><?php esc_html_e('Switch to the premium version of Woocommerce Check Pincode/Zipcode for Shipping and COD to get the benefit of all features!','pho-pincode-zipcode-cod'); ?></p>

									<div class="pho-upgrade-btn">
										<a href="<?php echo esc_url('https://www.phoeniixx.com/product/woocommerce-check-pincodezipcode-for-shipping-and-cod/');?>" target="_blank"><img src="<?php echo $plugin_dir_url; ?>assets/img/premium-btn.png" /></a>
											<a target="blank" href="<?php echo esc_url('http://checkpincode.phoeniixxdemo.com/');?>"><img src="<?php echo $plugin_dir_url; ?>assets/img/button2.png" /></a>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<h2><?php esc_html_e('Add Zip Code','pho-pincode-zipcode-cod'); ?></h2>
			
				<form action="" method="post" id="azip_form" name="azip_form">
				
				<?php $nonce = wp_create_nonce( 'add_pincode_form' ); ?>
							
				<input type="hidden" value="<?php echo $nonce; ?>" name="_wpnonce_add_pincode_form" id="_wpnonce_add_pincode_form" />

					<table class="form-table">

					<tbody>

						<tr class="user-user-login-wrap">

							<th><label for="user_login"><?php esc_html_e('Pincode','pho-pincode-zipcode-cod'); ?></label></th>

							<td><input type="text"  pattern="[a-zA-Z0-9\s]+" required="required" class="regular-text" id="pincode" name="pincode"></td>

						</tr>

						<tr class="user-first-name-wrap">

							<th><label for="first_name"><?php esc_html_e('City','pho-pincode-zipcode-cod'); ?></label></th>

							<td><input type="text" required="required" class="regular-text" id="city" name="city"></td>

						</tr>

						<tr class="user-last-name-wrap">

							<th><label for="last_name"><?php esc_html_e('State','pho-pincode-zipcode-cod'); ?></label></th>

							<td><input type="text" required="required" class="regular-text" id="state" name="state"></td>

						</tr>

						<tr class="user-nickname-wrap">

							<th><label for="nickname"><?php esc_html_e('Delivery within days','pho-pincode-zipcode-cod'); ?></label></th>

							<td><input type="number" min="1" max="365" step="1" value="1" class="regular-text" id="dod" name="dod"></td>

						</tr>

					</tbody>

				</table>

					<p class="submit"><input type="submit" value="Add" class="button button-primary" id="submit" name="submit"></p>

			</form>
			
			<style>
						.pho-upgrade-btn > a:focus {
							box-shadow: none !important;
						}
			</style>
<?php
}
if($tab == 'premium')
{
	require_once(dirname(__FILE__).'/premium-setting.php');
}
?>			
</div>


<script>

	function alphaOnly(event) {
	  var key = event.keyCode;
	  // alert(key);
	  return ((key >= 65 && key <= 90) || key == 8 || key==32);
	};

	jQuery('.id-select-all-1').click(function() {

		if (jQuery(this).is(':checked')) {

			jQuery('div input').attr('checked', true);

		} else {

			jQuery('div input').attr('checked', false);

		}

	});

</script>
<?php
}
?>