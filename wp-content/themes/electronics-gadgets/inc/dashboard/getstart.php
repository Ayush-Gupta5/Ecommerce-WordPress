<?php
//about theme info
add_action( 'admin_menu', 'electronics_gadgets_gettingstarted' );
function electronics_gadgets_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'electronics-gadgets'), esc_html__('Get Started', 'electronics-gadgets'), 'edit_theme_options', 'electronics_gadgets_guide', 'electronics_gadgets_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function electronics_gadgets_admin_theme_style() {
   wp_enqueue_style('electronics-gadgets-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', esc_url(get_theme_file_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'electronics_gadgets_admin_theme_style');

//guidline for about theme
function electronics_gadgets_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'electronics-gadgets' );
?>

<div class="wrapper-info">  
    <div class="tab-sec">
		<div class="tab">
			<div class="logo">
				<img role="img" src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</div>
			<button role="tab" class="tablinks home" onclick="electronics_gadgets_openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'electronics-gadgets' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="electronics_gadgets_openCity(event, 'tc_pro')"><?php esc_html_e( 'Premium Theme Information', 'electronics-gadgets' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="electronics_gadgets_openCity(event, 'tc_create')"><?php esc_html_e( 'Theme Support', 'electronics-gadgets' ); ?></button>				
		</div>

		<div  id="tc_index" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to Electronics Gadgets Theme', 'electronics-gadgets' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'electronics-gadgets'); ?></a>
				<a class="get-pro" href="<?php echo esc_url( ELECTRONICS_GADGETS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'electronics-gadgets'); ?></a>
			</div>
			<div class="col-tc-6">
				<img role="img" src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/dashboard/images/screenshot.png" alt="" />
			</div>
			<div class="col-tc-6">
				<P><?php esc_html_e( 'Electronics Gadgets is a wonderful theme created with the Bootstrap framework and best represents the gadgets shops, electronic appliances stores, electrical markets and products, and eCommerce shops. This is such an incredible theme that doesn’t need you to write the codes and brings you a customizable design using which, you can create a website for any kind of eCommerce store. This is a Woocommerce integrated theme to deliver the best user experience to the buyers while shopping online and provides the sellers with the freedom to start selling products online and accepting online payments for them. It is made WPML and RTL compatible for making your website support multiple languages such as Arabic, Hebrew, and other international languages as well. There is a user-friendly interface which is great for beginners as they do not need to play with the coding part. Its responsive and retina-ready design will make the website look awesome on all the screens including mobile phones and tablets. Along with personalization options, there are SEO-friendly codes in the core for ensuring better traffic flows, and these codes are also optimized to give better performance. Many Call to Action Buttons (CTAs) are also included that will help in conversions. Social media icons also find a place in this theme.', 'electronics-gadgets' ); ?></P>
			</div>
    	</div>

		<div id="tc_pro" class="tabcontent">
			<h3><?php esc_html_e( 'Electronics Gadgets Theme Information', 'electronics-gadgets' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img role="img" src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( ELECTRONICS_GADGETS_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'electronics-gadgets' ); ?></a></p>
				<p><a href="<?php echo esc_url( ELECTRONICS_GADGETS_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'electronics-gadgets' ); ?></a></p>
				<p><a href="<?php echo esc_url( ELECTRONICS_GADGETS_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'electronics-gadgets' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Electronics Gadgets Pro Theme', 'electronics-gadgets' ); ?></h4>
				<P><?php esc_html_e( 'Getting an electronics gadget shop to function online is no more a daunting task as we have many themes available that will help you do so and this Electronics Gadgets WordPress Theme is one of the best among them. It is an extremely reliable and advanced theme crafted by WordPress experts using the powerful Bootstrap framework for a robust design. This layout is catchy and the core is securely designed using some top-notch coding practices to deliver a brilliant output. Basically, it has all the features that you are looking for your website to have. This Electronics Gadgets WordPress Theme includes skillfully crafted sections that also have separate sections for your products. With such sections, you can put forward your products in a nice and attractive manner. To have all the attention of your potential clients, this theme brings a super attractive slider along with slider settings. With its plugin compatibility feature, you can easily add more features to the existing design. You get an entirely customizable design along with many easy customization options and apart from that, there are plenty of shortcodes using which, adding content elements and contact forms becomes very easy. This Electronics Gadgets WordPress Theme includes a newsletter as well that can generate leads for you and make your business more successful.', 'electronics-gadgets' ); ?></P>		
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Theme Features', 'electronics-gadgets' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title and tagline customization', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Simple Menu Option', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Additional section for products', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with unlimited slides', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Partner Section', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Promotional Banner Section for Products', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Seperate Newsletter Section', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Text and call to action button for each slides', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Banner & Post Type Plugin Functionality', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Product Sliders', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Slider', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Posttype', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Contact page template', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Contact Widget', 'electronics-gadgets' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'electronics-gadgets' ); ?></li>
				</ul>				
			</div>
		</div>	

		<div id="tc_create" class="tabcontent">
			<h3><?php esc_html_e( 'Support', 'electronics-gadgets' ); ?></h3>
			<hr>
			<div class="tab-cont">
		  		<h4><?php esc_html_e( 'Need Support?', 'electronics-gadgets' ); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'electronics-gadgets' ); ?></P>
					<a href="<?php echo esc_url( ELECTRONICS_GADGETS_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'electronics-gadgets' ); ?></a>
				</div>
			</div>
			<div class="tab-cont">	
				<h4><?php esc_html_e('Reviews', 'electronics-gadgets'); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'electronics-gadgets' ); ?></P>
					<a href="<?php echo esc_url( ELECTRONICS_GADGETS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'electronics-gadgets'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>