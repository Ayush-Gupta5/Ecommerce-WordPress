<?php 
	$electronics_store_custom_css ='';

	/*----------------Width Layout -------------------*/
	$electronics_store_theme_lay = get_theme_mod( 'electronics_store_width_options','Full Layout');
    if($electronics_store_theme_lay == 'Full Layout'){
		$electronics_store_custom_css .='body{';
			$electronics_store_custom_css .='max-width: 100%;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_theme_lay == 'Contained Layout'){
		$electronics_store_custom_css .='body{';
			$electronics_store_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_theme_lay == 'Boxed Layout'){
		$electronics_store_custom_css .='body{';
			$electronics_store_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$electronics_store_custom_css .='}';
	}

	/*------ Button Style -------*/
	$electronics_store_top_buttom_padding = get_theme_mod('electronics_store_top_button_padding');
	$electronics_store_left_right_padding = get_theme_mod('electronics_store_left_button_padding');
	if($electronics_store_top_buttom_padding != false || $electronics_store_left_right_padding != false ){
		$electronics_store_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
			$electronics_store_custom_css .='padding-top: '.esc_attr($electronics_store_top_buttom_padding).'px; padding-bottom: '.esc_attr($electronics_store_top_buttom_padding).'px; padding-left: '.esc_attr($electronics_store_left_right_padding).'px; padding-right: '.esc_attr($electronics_store_left_right_padding).'px;';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_button_border_radius = get_theme_mod('electronics_store_button_border_radius');
	$electronics_store_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
		$electronics_store_custom_css .='border-radius: '.esc_attr($electronics_store_button_border_radius).'px;';
	$electronics_store_custom_css .='}';

	/*-------------- Woocommerce Button  -------------------*/

	$electronics_store_woocommerce_button_padding_top = get_theme_mod('electronics_store_woocommerce_button_padding_top');
	if($electronics_store_woocommerce_button_padding_top != false){
		$electronics_store_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$electronics_store_custom_css .='padding-top: '.esc_attr($electronics_store_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($electronics_store_woocommerce_button_padding_top).'px;';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_woocommerce_button_padding_right = get_theme_mod('electronics_store_woocommerce_button_padding_right');
	if($electronics_store_woocommerce_button_padding_right != false){
		$electronics_store_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$electronics_store_custom_css .='padding-left: '.esc_attr($electronics_store_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($electronics_store_woocommerce_button_padding_right).'px;';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_woocommerce_button_border_radius = get_theme_mod('electronics_store_woocommerce_button_border_radius');
	if($electronics_store_woocommerce_button_border_radius != false){
		$electronics_store_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$electronics_store_custom_css .='border-radius: '.esc_attr($electronics_store_woocommerce_button_border_radius).'px;';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_related_product = get_theme_mod('electronics_store_related_product',true);

	if($electronics_store_related_product == false){
		$electronics_store_custom_css .='.related.products{';
			$electronics_store_custom_css .='display: none;';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_woocommerce_product_border = get_theme_mod('electronics_store_woocommerce_product_border',true);

	if($electronics_store_woocommerce_product_border == false){
		$electronics_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$electronics_store_custom_css .='border: none;';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_woocommerce_product_padding_top = get_theme_mod('electronics_store_woocommerce_product_padding_top',0);
		$electronics_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$electronics_store_custom_css .='padding-top: '.esc_attr($electronics_store_woocommerce_product_padding_top).'px; padding-bottom: '.esc_attr($electronics_store_woocommerce_product_padding_top).'px;';
		$electronics_store_custom_css .='}';

	$electronics_store_woocommerce_product_padding_right = get_theme_mod('electronics_store_woocommerce_product_padding_right',0);
		$electronics_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$electronics_store_custom_css .='padding-left: '.esc_attr($electronics_store_woocommerce_product_padding_right).'px; padding-right: '.esc_attr($electronics_store_woocommerce_product_padding_right).'px;';
		$electronics_store_custom_css .='}';

	$electronics_store_woocommerce_product_border_radius = get_theme_mod('electronics_store_woocommerce_product_border_radius');
	if($electronics_store_woocommerce_product_border_radius != false){
		$electronics_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$electronics_store_custom_css .='border-radius: '.esc_attr($electronics_store_woocommerce_product_border_radius).'px;';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_woocommerce_product_box_shadow = get_theme_mod('electronics_store_woocommerce_product_box_shadow');
	if($electronics_store_woocommerce_product_box_shadow != false){
		$electronics_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$electronics_store_custom_css .='box-shadow: '.esc_attr($electronics_store_woocommerce_product_box_shadow).'px '.esc_attr($electronics_store_woocommerce_product_box_shadow).'px '.esc_attr($electronics_store_woocommerce_product_box_shadow).'px #aaa;';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_product_sale_font_size = get_theme_mod('electronics_store_product_sale_font_size');
	$electronics_store_custom_css .='.woocommerce span.onsale {';
		$electronics_store_custom_css .='font-size: '.esc_attr($electronics_store_product_sale_font_size).'px;';
	$electronics_store_custom_css .='}';

	/*---- Preloader Color ----*/
	$electronics_store_preloader_color = get_theme_mod('electronics_store_preloader_color');
	$electronics_store_preloader_bg_color = get_theme_mod('electronics_store_preloader_bg_color');

	if($electronics_store_preloader_color != false){
		$electronics_store_custom_css .='.preloader-squares .square, .preloader-chasing-squares .square{';
			$electronics_store_custom_css .='background-color: '.esc_attr($electronics_store_preloader_color).';';
		$electronics_store_custom_css .='}';
	}
	if($electronics_store_preloader_bg_color != false){
		$electronics_store_custom_css .='.preloader{';
			$electronics_store_custom_css .='background-color: '.esc_attr($electronics_store_preloader_bg_color).';';
		$electronics_store_custom_css .='}';
	}

	// menu color
	$electronics_store_menu_color = get_theme_mod('electronics_store_menu_color');

	$electronics_store_custom_css .='.primary-navigation a,.primary-navigation .current_page_item > a, .primary-navigation .current-menu-item > a, .primary-navigation .current_page_ancestor > a{';
			$electronics_store_custom_css .='color: '.esc_attr($electronics_store_menu_color).'!important;';
	$electronics_store_custom_css .='}';

	// menu hover color
	$electronics_store_menu_hover_color = get_theme_mod('electronics_store_menu_hover_color');
	$electronics_store_custom_css .='.primary-navigation a:hover, .primary-navigation ul li a:hover, .primary-navigation ul.sub-menu a:hover, .primary-navigation ul.sub-menu li a:hover{';
			$electronics_store_custom_css .='color: '.esc_attr($electronics_store_menu_hover_color).' !important;';
	$electronics_store_custom_css .='}';

	// Submenu color
	$electronics_store_submenu_menu_color = get_theme_mod('electronics_store_submenu_menu_color');
	$electronics_store_custom_css .='.primary-navigation ul.sub-menu a, .primary-navigation ul.sub-menu li a{';
			$electronics_store_custom_css .='color: '.esc_attr($electronics_store_submenu_menu_color).' !important;';
	$electronics_store_custom_css .='}';

	/*---- Copyright css ----*/
	$electronics_store_copyright_fontsize = get_theme_mod('electronics_store_copyright_fontsize',16);
	if($electronics_store_copyright_fontsize != false){
		$electronics_store_custom_css .='#footer p{';
			$electronics_store_custom_css .='font-size: '.esc_attr($electronics_store_copyright_fontsize).'px; ';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_copyright_top_bottom_padding = get_theme_mod('electronics_store_copyright_top_bottom_padding',15);
	if($electronics_store_copyright_top_bottom_padding != false){
		$electronics_store_custom_css .='#footer {';
			$electronics_store_custom_css .='padding-top:'.esc_attr($electronics_store_copyright_top_bottom_padding).'px; padding-bottom: '.esc_attr($electronics_store_copyright_top_bottom_padding).'px; ';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_copyright_alignment = get_theme_mod( 'electronics_store_copyright_alignment','Center');
    if($electronics_store_copyright_alignment == 'Left'){
		$electronics_store_custom_css .='#footer p{';
			$electronics_store_custom_css .='text-align:start;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_copyright_alignment == 'Center'){
		$electronics_store_custom_css .='#footer p{';
			$electronics_store_custom_css .='text-align:center;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_copyright_alignment == 'Right'){
		$electronics_store_custom_css .='#footer p{';
			$electronics_store_custom_css .='text-align:end;';
		$electronics_store_custom_css .='}';
	}

	/*------- Wocommerce sale css -----*/
	$electronics_store_woocommerce_sale_top_padding = get_theme_mod('electronics_store_woocommerce_sale_top_padding');
	$electronics_store_woocommerce_sale_left_padding = get_theme_mod('electronics_store_woocommerce_sale_left_padding');
	$electronics_store_custom_css .=' .woocommerce span.onsale{';
		$electronics_store_custom_css .='padding-top: '.esc_attr($electronics_store_woocommerce_sale_top_padding).'px; padding-bottom: '.esc_attr($electronics_store_woocommerce_sale_top_padding).'px; padding-left: '.esc_attr($electronics_store_woocommerce_sale_left_padding).'px; padding-right: '.esc_attr($electronics_store_woocommerce_sale_left_padding).'px;';
	$electronics_store_custom_css .='}';

	$electronics_store_woocommerce_sale_border_radius = get_theme_mod('electronics_store_woocommerce_sale_border_radius', 0);
	$electronics_store_custom_css .='.woocommerce span.onsale{';
		$electronics_store_custom_css .='border-radius: '.esc_attr($electronics_store_woocommerce_sale_border_radius).'px;';
	$electronics_store_custom_css .='}';

	$electronics_store_sale_position = get_theme_mod( 'electronics_store_sale_position','right');
    if($electronics_store_sale_position == 'left'){
		$electronics_store_custom_css .='.woocommerce ul.products li.product .onsale{';
			$electronics_store_custom_css .='left: -10px; right: auto;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_sale_position == 'right'){
		$electronics_store_custom_css .='.woocommerce ul.products li.product .onsale{';
			$electronics_store_custom_css .='left: auto; right: 0;';
		$electronics_store_custom_css .='}';
	}

	/*-------- footer background css -------*/
	$electronics_store_footer_background_color = get_theme_mod('electronics_store_footer_background_color');
	$electronics_store_custom_css .='.footertown{';
		$electronics_store_custom_css .='background-color: '.esc_attr($electronics_store_footer_background_color).';';
	$electronics_store_custom_css .='}';

	$electronics_store_footer_background_img = get_theme_mod('electronics_store_footer_background_img');
	if($electronics_store_footer_background_img != false){
		$electronics_store_custom_css .='.footertown{';
			$electronics_store_custom_css .='background: url('.esc_attr($electronics_store_footer_background_img).') no-repeat; background-size: cover; background-attachment: fixed;';
		$electronics_store_custom_css .='}';
	}

	/*---- Comment form ----*/
	$electronics_store_comment_width = get_theme_mod('electronics_store_comment_width', '100');
	$electronics_store_custom_css .='#comments textarea{';
		$electronics_store_custom_css .=' width:'.esc_attr($electronics_store_comment_width).'%;';
	$electronics_store_custom_css .='}';

	$electronics_store_comment_submit_text = get_theme_mod('electronics_store_comment_submit_text', 'Post Comment');
	if($electronics_store_comment_submit_text == ''){
		$electronics_store_custom_css .='#comments p.form-submit {';
			$electronics_store_custom_css .='display: none;';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_comment_title = get_theme_mod('electronics_store_comment_title', 'Leave a Reply');
	if($electronics_store_comment_title == ''){
		$electronics_store_custom_css .='#comments h2#reply-title {';
			$electronics_store_custom_css .='display: none;';
		$electronics_store_custom_css .='}';
	}

	// Sticky Header padding
	$electronics_store_sticky_header_padding = get_theme_mod('electronics_store_sticky_header_padding');
	$electronics_store_custom_css .='.fixed-header{';
		$electronics_store_custom_css .=' padding-top:'.esc_attr($electronics_store_sticky_header_padding).'px; padding-bottom:'.esc_attr($electronics_store_sticky_header_padding).'px;';
	$electronics_store_custom_css .='}';

	// Navigation Font Size 
	$electronics_store_nav_font_size = get_theme_mod('electronics_store_nav_font_size');
	if($electronics_store_nav_font_size != false){
		$electronics_store_custom_css .='.primary-navigation ul li a{';
			$electronics_store_custom_css .='font-size: '.esc_attr($electronics_store_nav_font_size).'px;';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_navigation_case = get_theme_mod('electronics_store_navigation_case', 'uppercase');
	if($electronics_store_navigation_case == 'uppercase' ){
		$electronics_store_custom_css .='.primary-navigation ul li a{';
			$electronics_store_custom_css .=' text-transform: uppercase;';
		$electronics_store_custom_css .='}';
	}elseif($electronics_store_navigation_case == 'capitalize' ){
		$electronics_store_custom_css .='.primary-navigation ul li a{';
			$electronics_store_custom_css .=' text-transform: capitalize;';
		$electronics_store_custom_css .='}';
	}
    
     // site title color option
	$electronics_store_site_title_color_setting = get_theme_mod('electronics_store_site_title_color_setting');
	$electronics_store_custom_css .='.logo h1 a, .logo p a{';
		$electronics_store_custom_css .='color: '.esc_attr($electronics_store_site_title_color_setting).';';
	$electronics_store_custom_css .='} ';

	$electronics_store_tagline_color_setting = get_theme_mod('electronics_store_tagline_color_setting');
	$electronics_store_custom_css .=' .logo p.site-description{';
		$electronics_store_custom_css .='color: '.esc_attr($electronics_store_tagline_color_setting).';';
	$electronics_store_custom_css .='} ';

	//Site title Font size
	$electronics_store_site_title_fontsize = get_theme_mod('electronics_store_site_title_fontsize');
	$electronics_store_custom_css .='.logo h1, .logo p.site-title{';
		$electronics_store_custom_css .='font-size: '.esc_attr($electronics_store_site_title_fontsize).'px;';
	$electronics_store_custom_css .='}';

	$electronics_store_site_description_fontsize = get_theme_mod('electronics_store_site_description_fontsize');
	$electronics_store_custom_css .='.logo p.site-description{';
		$electronics_store_custom_css .='font-size: '.esc_attr($electronics_store_site_description_fontsize).'px;';
	$electronics_store_custom_css .='}';

	/*----- Featured image css -----*/
	$electronics_store_featured_image_border_radius = get_theme_mod('electronics_store_featured_image_border_radius');
	if($electronics_store_featured_image_border_radius != false){
		$electronics_store_custom_css .='.inner-service .service-image img{';
			$electronics_store_custom_css .='border-radius: '.esc_attr($electronics_store_featured_image_border_radius).'px;';
		$electronics_store_custom_css .='}';
	}

	$electronics_store_featured_image_box_shadow = get_theme_mod('electronics_store_featured_image_box_shadow');
	if($electronics_store_featured_image_box_shadow != false){
		$electronics_store_custom_css .='.inner-service .service-image img{';
			$electronics_store_custom_css .='box-shadow: 8px 8px '.esc_attr($electronics_store_featured_image_box_shadow).'px #aaa;';
		$electronics_store_custom_css .='}';
	} 

	/*------Shop page pagination ---------*/
	$electronics_store_shop_page_pagination = get_theme_mod('electronics_store_shop_page_pagination', true);
	if($electronics_store_shop_page_pagination == false){
		$electronics_store_custom_css .= '.woocommerce nav.woocommerce-pagination {';
			$electronics_store_custom_css .='display: none;';
		$electronics_store_custom_css .='}';
	}

	/*------- Post into blocks ------*/
	$electronics_store_post_blocks = get_theme_mod('electronics_store_post_blocks', 'Without box');
	if($electronics_store_post_blocks == 'Within box' ){
		$electronics_store_custom_css .='.services-box{';
			$electronics_store_custom_css .=' border: 1px solid #222;';
		$electronics_store_custom_css .='}';
	}

	//  ------------ Mobile Media Options ----------
	$electronics_store_responsive_show_back_to_top = get_theme_mod('electronics_store_responsive_show_back_to_top',true);
	if($electronics_store_responsive_show_back_to_top == true && get_theme_mod('electronics_store_show_back_to_top',true) == false){
		$electronics_store_custom_css .='@media screen and (min-width:575px){
			.scrollup{';
			$electronics_store_custom_css .='visibility:hidden;';
		$electronics_store_custom_css .='} }';
	}

	if($electronics_store_responsive_show_back_to_top == false){
		$electronics_store_custom_css .='@media screen and (max-width:575px){
			.scrollup{';
			$electronics_store_custom_css .='visibility:hidden;';
		$electronics_store_custom_css .='} }';
	}

	$electronics_store_responsive_sticky_header = get_theme_mod('electronics_store_responsive_sticky_header',false);
	if($electronics_store_responsive_sticky_header == true && get_theme_mod('electronics_store_sticky_header',false) == false){
		$electronics_store_custom_css .='@media screen and (min-width:575px){
			.fixed-header{';
			$electronics_store_custom_css .='position:static !important; box-shadow: none;';
		$electronics_store_custom_css .='} }';
	}

	if($electronics_store_responsive_sticky_header == false){
		$electronics_store_custom_css .='@media screen and (max-width:575px){
			.fixed-header{';
			$electronics_store_custom_css .='position:static !important; box-shadow: none;';
		$electronics_store_custom_css .='} }';
	}

	$electronics_store_responsive_preloader_hide = get_theme_mod('electronics_store_responsive_preloader_hide',false);
	if($electronics_store_responsive_preloader_hide == true && get_theme_mod('electronics_store_preloader_hide',false) == false){
		$electronics_store_custom_css .='@media screen and (min-width:575px){
			.preloader{';
			$electronics_store_custom_css .='display:none !important;';
		$electronics_store_custom_css .='} }';
	}

	if($electronics_store_responsive_preloader_hide == false){
		$electronics_store_custom_css .='@media screen and (max-width:575px){
			.preloader{';
			$electronics_store_custom_css .='display:none !important;';
		$electronics_store_custom_css .='} }';
	}

	// menu font weight
	$electronics_store_theme_lay = get_theme_mod( 'electronics_store_font_weight_menu_option','600');
    if($electronics_store_theme_lay == '100'){
		$electronics_store_custom_css .='.primary-navigation ul li a{';
			$electronics_store_custom_css .='font-weight:100;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_theme_lay == '200'){
		$electronics_store_custom_css .='.primary-navigation ul li a{';
			$electronics_store_custom_css .='font-weight: 200;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_theme_lay == '300'){
		$electronics_store_custom_css .='.primary-navigation ul li a{';
			$electronics_store_custom_css .='font-weight: 300;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_theme_lay == '400'){
		$electronics_store_custom_css .='.primary-navigation ul li a{';
			$electronics_store_custom_css .='font-weight: 400;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_theme_lay == '500'){
		$electronics_store_custom_css .='.primary-navigation ul li a{';
			$electronics_store_custom_css .='font-weight: 500;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_theme_lay == '600'){
		$electronics_store_custom_css .='.primary-navigation ul li a{';
			$electronics_store_custom_css .='font-weight: 600;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_theme_lay == '700'){
		$electronics_store_custom_css .='.primary-navigation ul li a{';
			$electronics_store_custom_css .='font-weight: 700;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_theme_lay == '800'){
		$electronics_store_custom_css .='.primary-navigation ul li a{';
			$electronics_store_custom_css .='font-weight: 800;';
		$electronics_store_custom_css .='}';
	}else if($electronics_store_theme_lay == '900'){
		$electronics_store_custom_css .='.primary-navigation ul li a{';
			$electronics_store_custom_css .='font-weight: 900;';
		$electronics_store_custom_css .='}';
	}

	// Logo padding
	$electronics_store_logo_padding = get_theme_mod('electronics_store_logo_padding');
	$electronics_store_custom_css .='.logo{';
		$electronics_store_custom_css .=' padding:'.esc_attr($electronics_store_logo_padding).'px;';
	$electronics_store_custom_css .='}';

	// Logo margin
	$electronics_store_logo_margin = get_theme_mod('electronics_store_logo_margin');
	$electronics_store_custom_css .='.logo{';
		$electronics_store_custom_css .=' margin:'.esc_attr($electronics_store_logo_margin).'px;';
	$electronics_store_custom_css .='}';
	
	// menu color option
	$electronics_store_menu_color_setting = get_theme_mod('electronics_store_menu_color_setting');
	$electronics_store_custom_css .='.toggle-menu i{';
		$electronics_store_custom_css .='color: '.esc_attr($electronics_store_menu_color_setting).';';
	$electronics_store_custom_css .='} '; 

	// Single post image border radious
	$electronics_store_single_post_img_border_radius = get_theme_mod('electronics_store_single_post_img_border_radius', 0);
	$electronics_store_custom_css .='.feature-box img{';
		$electronics_store_custom_css .='border-radius: '.esc_attr($electronics_store_single_post_img_border_radius).'px;';
	$electronics_store_custom_css .='}';

	// Single post image box shadow
	$electronics_store_single_post_img_box_shadow = get_theme_mod('electronics_store_single_post_img_box_shadow',0);
	$electronics_store_custom_css .='.feature-box img{';
		$electronics_store_custom_css .='box-shadow: '.esc_attr($electronics_store_single_post_img_box_shadow).'px '.esc_attr($electronics_store_single_post_img_box_shadow).'px '.esc_attr($electronics_store_single_post_img_box_shadow).'px #ccc;';
	$electronics_store_custom_css .='}';

	