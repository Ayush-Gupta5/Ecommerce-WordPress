<?php
//about theme info
add_action( 'admin_menu', 'electronics_store_gettingstarted' );
function electronics_store_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'electronics-store'), esc_html__('Get Started', 'electronics-store'), 'edit_theme_options', 'electronics_store_guide', 'electronics_store_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function electronics_store_admin_theme_style() {
   wp_enqueue_style('electronics-store-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'electronics_store_admin_theme_style');

//guidline for about theme
function electronics_store_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'electronics-store' );
?>

<div class="wrapper-info">  
    <div class="tab-sec">
		<div class="tab">
			<div class="logo">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</div>
			<button role="tab" class="tablinks home" onclick="electronics_store_openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'electronics-store' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="electronics_store_openCity(event, 'tc_pro')"><?php esc_html_e( 'Premium Theme Information', 'electronics-store' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="electronics_store_openCity(event, 'tc_create')"><?php esc_html_e( 'Theme Support', 'electronics-store' ); ?></button>				
		</div>

		<div  id="tc_index" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to Electronic Store Theme', 'electronics-store' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a href="<?php echo esc_url( ELECTRONICS_STORE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'electronics-store' ); ?></a>
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'electronics-store'); ?></a>
				<a class="get-pro" href="<?php echo esc_url( ELECTRONICS_STORE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'electronics-store'); ?></a>
			</div>
			<div class="col-tc-6">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/screenshot.png" alt="" />
			</div>
			<div class="col-tc-6">
				<P><?php esc_html_e( 'Electronics Store is a fine WordPress theme designed for electronics stores, tech stores, electronics markets, mobile shops and gadgets stores, technical marketplace and multivendor shops, digital stores, and any kind of shops that sells electrical appliances. This sophisticated theme is great for any online shopping store or eCommerce store as well. It acts as a multipurpose theme with a clean and user-friendly interface that anyone can easily use for creating a website. Along with beautiful visuals and imagery, it has a responsive layout adjusting the website to every screen. Professional developers have crafted this website with stores and eCommerce in mind. It includes Call to Action Button (CTA) that proves handy in making your website interactive and also plays a significant role in converting your visitors into valued customers. There are stunning CSS animations included in the theme along with clean and secure code. These optimized codes are also made SEO-friendly for obtaining organic traffic for your website. It also results in a faster page load time. With a strong Bootstrap framework being used for creating this theme, it allows easy modifications through personalization options available with the theme options panel. Along with plenty of social media icons, you will also get a mobile-friendly design that runs smoothly on smartphones.', 'electronics-store' ); ?></P>
			</div>
    	</div>

		<div id="tc_pro" class="tabcontent">
			<h3><?php esc_html_e( 'Electronics Store Theme Information', 'electronics-store' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( ELECTRONICS_STORE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'electronics-store' ); ?></a></p>
				<p><a href="<?php echo esc_url( ELECTRONICS_STORE_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'electronics-store' ); ?></a></p>
				<p><a href="<?php echo esc_url( ELECTRONICS_STORE_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'electronics-store' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Electronic Store Pro Theme', 'electronics-store' ); ?></h4>
				<P><?php esc_html_e( 'If you are searching for a creative and innovative design to bring your electronics store online, you have landed at the right place as this Electronics WordPress Theme gives you exactly what you are searching for. With a layout that perfectly complements electronics stores, smartphone shops, digital and electronic appliances shops, etc. obtaining a professional and appealing website will take only a few minutes. It comes with a powerful demo that you can import in a single click and start your online journey. The intuitive and user-friendly theme options panel allows making desired changes by completely skipping the coding part. This Electronics Store WordPress Theme comes with the live theme customizer making you see all the changes live. Apart from that, it brings you layout choices as well as pre-built templates to pick from. The visitors will get highly impressed by your website’s look since it comes with a wonderful slider that effectively projects glimpses of your products. Not only that, its Woocommerce compatibility makes your website ready for eCommerce and provides you with all the online shopping tools. With a responsive design, this Free Electronics Store WordPress Theme also comes with a translation feature thanks to its WPML and RTL compliance. What are you waiting for? Explore this theme further to get the best out of it!', 'electronics-store' ); ?></P>		
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Theme Features', 'electronics-store' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title and tagline customization', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Simple Menu Option', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Additional section for products', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with unlimited slides', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Partner Section', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Promotional Banner Section for Products', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Seperate Newsletter Section', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Text and call to action button for each slides', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Banner & Post Type Plugin Functionality', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Product Sliders', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Slider', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Posttype', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Contact page template', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Contact Widget', 'electronics-store' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'electronics-store' ); ?></li>
				</ul>				
			</div>
		</div>	

		<div id="tc_create" class="tabcontent">
			<h3><?php esc_html_e( 'Support', 'electronics-store' ); ?></h3>
			<hr>
			<div class="tab-cont">
		  		<h4><?php esc_html_e( 'Need Support?', 'electronics-store' ); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'electronics-store' ); ?></P>
					<a href="<?php echo esc_url( ELECTRONICS_STORE_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'electronics-store' ); ?></a>
				</div>
			</div>
			<div class="tab-cont">	
				<h4><?php esc_html_e('Reviews', 'electronics-store'); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'electronics-store' ); ?></P>
					<a href="<?php echo esc_url( ELECTRONICS_STORE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'electronics-store'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>