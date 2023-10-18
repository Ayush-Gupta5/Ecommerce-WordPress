<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $wpdb,$table_prefix;

$plugin_dir_url =  plugin_dir_url( __FILE__ );

wp_enqueue_script('wp-color-picker'); //for color picker scripts

wp_enqueue_style( 'wp-color-picker' );

wp_enqueue_media();  //for upload media scripts

/* Form Post Data */

if( isset( $_POST['submit'] ) ) {
		
	$submit =sanitize_text_field( $_POST['submit'] );
	
}else
{
	$submit = '';
}

if( sanitize_text_field( $submit ) == 'Save'  && current_user_can( 'manage_options' ) ) {
	
	$nonce_check = sanitize_text_field( $_POST['_wpnonce_check_pincode_setting'] );
	
	if ( ! wp_verify_nonce( $nonce_check, 'check_pincode_setting' ) ) 
	{
		
		die( 'Security check failed' ); 
		
	}
	else 
	{
		
		$del_help_text = sanitize_text_field( $_POST['del_help_text'] );

		$del_date = sanitize_text_field( $_POST['del_date'] );

		$bgcolor = sanitize_text_field( $_POST['bgcolor'] );

		$textcolor = sanitize_text_field( $_POST['textcolor'] );

		$buttoncolor = sanitize_text_field( $_POST['buttoncolor'] );

		$buttontcolor = sanitize_text_field( $_POST['buttontcolor'] );

		/* Database Queries */
		
		$adddate = date('Y-m-d H:i:s');
		
		//echo "SELECT COUNT(*) FROM `".$table_prefix."pincode_setting_p`";
		
		$num_rows = $wpdb->get_var( "SELECT COUNT(*) FROM `".$table_prefix."pincode_setting_p`" );

		//echo $num_rows;
		
		if($num_rows == 0)

		{
		
			$result = $wpdb->query( $wpdb->prepare( "INSERT INTO `".$table_prefix."pincode_setting_p` SET `del_help_text` = %s, `del_date` = %s, `bgcolor` = %s, `textcolor` = %s, `buttoncolor` = %s, `buttontcolor` = %s,`date_time` = %s" , $del_help_text, $del_date, $bgcolor, $textcolor, $buttoncolor, $buttontcolor,$adddate ) );
		
		}
		
		else
		{
			$result = $wpdb->query( $wpdb->prepare( "UPDATE `".$table_prefix."pincode_setting_p` SET `del_help_text` = %s, `del_date` = %s, `bgcolor` = %s, `textcolor` = %s, `buttoncolor` = %s, `buttontcolor` = %s,`date_time` = %s" , $del_help_text, $del_date, $bgcolor, $textcolor, $buttoncolor, $buttontcolor,$adddate ) );
		
		}
			
		if( $result > 0 )
		{
		?>

			<div class="updated" id="message">

				<p><strong><?php esc_html_e('Setting updated.','pho-pincode-zipcode-cod'); ?></strong></p>

			</div>

		<?php
		}
		else
		{
			?>
				<div class="error below-h2" id="message"><p> <?php esc_html_e('Something Went Wrong Please Try Again With Valid Data.','pho-pincode-zipcode-cod'); ?></p></div>
			<?php
		}
		
	}

}

/* Fetching Data From DB */

$qry22 = $wpdb->get_results( "SELECT * FROM `".$table_prefix."pincode_setting_p` ORDER BY `id` ASC  limit 1",ARRAY_A );	

foreach($qry22 as $qry) {

}

?>

<div id="profile-page" class="wrap">
<?php

if( isset( $_GET['tab'] ) ) {
	
	$tab = sanitize_text_field( $_GET['tab'] );
	
}
else
{
	$tab = '';
}

?>
<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
		<a class="nav-tab <?php if($tab == 'set' || $tab == ''){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=pincodes_setting&amp;tab=set"><?php esc_html_e('Settings','pho-pincode-zipcode-cod'); ?></a>
		<a class="nav-tab <?php if($tab == 'premium'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=pincodes_setting&amp;tab=premium"><?php esc_html_e('Premium Version','pho-pincode-zipcode-cod'); ?></a>
		
</h2>
<?php
if($tab == 'set' || $tab == '')
{
?>
<div class="meta-box-sortables" id="normal-sortables">
				<div class="postbox " id="pho_wcpc_box">
					<h3><span class="upgrade-setting"><?php esc_html_e('Upgrade to the PREMIUM VERSION','pho-pincode-zipcode-cod'); ?></span></h3>
					<div class="inside">
						<div class="pho_check_pin">

							<div class="column two">
								<!----<h2>Get access to Pro Features</h2>----->

								<p><?php esc_html_e('Switch to the premium version of Woocommerce Check Pincode/Zipcode for Shipping and COD to get the benefit of all features!','pho-pincode-zipcode-cod'); ?></p>

									<div class="pho-upgrade-btn">
										<a href="<?php echo  esc_url("https://www.phoeniixx.com/product/woocommerce-check-pincodezipcode-for-shipping-and-cod/"); ?>" target="_blank"><img src="<?php echo $plugin_dir_url; ?>assets/img/premium-btn.png" /></a>
										<a target="blank" href="<?php echo  esc_url("http://checkpincode.phoeniixxdemo.com/"); ?>"><img src="<?php echo $plugin_dir_url; ?>assets/img/button2.png" /></a>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>	

<div class="phoe_video_main">
		<h3><?php esc_html_e('How to set up plugin','pho-pincode-zipcode-cod'); ?></h3>
	
		<iframe width="800" height="360"
			src="<?php echo  esc_url("https://www.youtube.com/embed/Vj6XB9abqxE"); ?>">
		</iframe> 
</div>			
			
<h2><?php esc_html_e('WooCommerce Pincode Check - Plugin Options','pho-pincode-zipcode-cod'); ?></h2>

<form novalidate="novalidate" method="post" action="" >

<h3><?php esc_html_e('Manual Settings','pho-pincode-zipcode-cod'); ?></h3>

<?php $nonce = wp_create_nonce( 'check_pincode_setting' ); ?>
							
<input type="hidden" value="<?php echo $nonce; ?>" name="_wpnonce_check_pincode_setting" id="_wpnonce_check_pincode_setting" />


<table class="form-table">

	<tbody>

		<tr class="user-user-login-wrap">

			<th><label for="del_help_text"><?php esc_html_e('Delivery Date Help Text','pho-pincode-zipcode-cod'); ?></label></th>
			
			<td><textarea class="regular-text" id="del_help_text" name="del_help_text"><?php echo $qry['del_help_text']; ?></textarea></td>

		</tr>

		

	</tbody>

</table>

<table class="form-table">

	<tbody>

		<h3><?php esc_html_e('Enable Help Text','pho-pincode-zipcode-cod'); ?></h3>

		<tr class="user-nickname-wrap">

			<th><label for="del_date"><?php esc_html_e('Delivery Date','pho-pincode-zipcode-cod'); ?></label></th>

			<td><label for="del_date"><input type="radio" <?php if($qry['del_date'] == 1) { ?> checked <?php } ?> name="del_date" value="1"><?php esc_html_e('ON','pho-pincode-zipcode-cod'); ?></label>

			<label for="del_date"><input type="radio" <?php if($qry['del_date'] == 0) { ?> checked <?php } ?> name="del_date" value="0"><?php esc_html_e('OFF','pho-pincode-zipcode-cod'); ?></label></td>

		</tr>

	</tbody>

</table>

<table class="form-table">

<tbody>

<h3><?php esc_html_e('Styling of Check Pincode Functionality on Product Page','pho-pincode-zipcode-cod'); ?></h3>


	<tr class="user-user-login-wrap">

			<th><label for="bgcolor"><?php esc_html_e('Box Background color','pho-pincode-zipcode-cod'); ?></label></th>

			<td><input type="text" class="regular-text" value="<?php echo $qry['bgcolor']; ?>" id="bgcolor" name="bgcolor"></td>

		</tr>


		<tr class="user-first-name-wrap">

			<th><label for="textcolor"><?php esc_html_e('Check Pincode Label Text Color','pho-pincode-zipcode-cod'); ?></label></th>

			<td><input type="text" class="regular-text" value="<?php echo $qry['textcolor']; ?>" id="textcolor" name="textcolor"></td>

		</tr>


		<tr class="user-last-name-wrap">

			<th><label for="buttoncolor"><?php esc_html_e('"Check" Button Color','pho-pincode-zipcode-cod'); ?></label></th>

			<td><input type="text" class="regular-text" value="<?php echo $qry['buttoncolor']; ?>" id="buttoncolor" name="buttoncolor"></td>

		</tr>
		
		
		<tr class="user-last-name-wrap">

			<th><label for="buttontcolor"><?php esc_html_e('"Check" Button Text Color','pho-pincode-zipcode-cod'); ?></label></th>

			<td><input type="text" class="regular-text" value="<?php echo $qry['buttontcolor']; ?>" id="buttontcolor" name="buttontcolor"></td>

		</tr>
		

</tbody>

</table>		

<p class="submit"><input type="submit" value="Save" class="button button-primary" id="submit" name="submit"></p>

</form>

<style>
.phoe_video_main h3 {
	color: #02c277;
	font-size: 28px;
	font-weight: bolder;
	margin: 20px 0;
	text-transform: capitalize
	display: inline-block;
}
.phoe_video_main {
	padding: 20px;
	text-align: center;
}
</style>

<?php
}else if($tab == 'premium')
{
	require_once(dirname(__FILE__).'/premium-setting.php');
	
}

?>			
</div>

<script>

jQuery(document).ready(function($) {

	jQuery("#bgcolor").wpColorPicker();

	jQuery("#textcolor").wpColorPicker();

	jQuery("#buttoncolor").wpColorPicker();
	
	jQuery("#buttontcolor").wpColorPicker();
	
});

</script>
<style>
.form-table th {
    width: 270px;
	padding: 25px;
}
.form-table td {
	
    padding: 20px 10px;
}
.form-table {
	background-color: #fff;
}
h3 {
    padding: 10px;
}

.pho-upgrade-btn > a:focus {
							box-shadow: none !important;
						}
</style>