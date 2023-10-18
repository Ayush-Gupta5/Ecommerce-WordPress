<?php
function pbwb_addons_list_page(){
    do_action('pb_admin_pages_before_content');
    ?>
    <div id="container"  class="bit14-admin-addons">
        <div class="heading">
            <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/images/pb-logo.png'); ?>" />
            <h1 class="title">PB All-in-One Web Addons for WPBakery Page Builder</h1>
            <p>Build your website with premium quality All-in-One Web elements for WPBakery Page Builder. This includes Web Addons, Library templates and Custom post type.</p>
        </div>
        <div id="tabs">
            <ul>
                <li><a href="#web-addons">Web Addons</a></li>
                <li><a href="#custom-post-type">Custom Post Type</a></li>
                <li><a href="#library-templates">Library Templates</a></li>
            </ul>
            <div id="web-addons" class="pagebuilder-addons">
                
                <div class="addons-list only-builder">
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/single-post.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Single Post</h3>
                                <p>List your blog post in different styles</p>
                                <a href="https://pagebuilderaddons.com/singlepost" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/single-page-navigator.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Single Page Navigator</h3>
                                <p>Use the navigator to scroll through sections on parallax website</p>
                                <a href="https://pagebuilderaddons.com/singlepagenavigator" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/pullquote.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Pull Quote</h3>
                                <p>Show an eye-catching quotation taken from the main text of an article</p>
                                <a href="https://pagebuilderaddons.com/pullquote" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/mailchimp.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Mailchimp</h3>
                                <p>Easily embed mailchimp into your webite</p>
                                <a href="https://pagebuilderaddons.com/mailchimp/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/flip-1.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Flip Box</h3>
                                <p>Show a content box with two sides</p>
                                <a href="https://pagebuilderaddons.com/flipbox/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/advance-pricing-table.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Pricing Table (Advance)</h3>
                                <p>Enable you to create a great advance pricing table with the least amount of effort.</p>
                                <a href="https://pagebuilderaddons.com/advance-pricing-table/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/Accordions.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Accordions</h3>
                                <p>Great way to communicate text-heavy information in an elegant and condensed fashion while saving valuable space on your WordPress site</p>
                                <a href="https://pagebuilderaddons.com/accordions-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/button.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Buttons</h3>
                                <p>Provides unique and useful buttons designs</p>
                                <a href="https://pagebuilderaddons.com/buttons-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/count-down.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Countdown</h3>
                                <p>Easy to create countdown timers for Coming soon, Website Maintenance, Limited time offer, Event Announcement and Product launch</p>
                                <a href="https://pagebuilderaddons.com/countdown-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/clients.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Clients</h3>
                                <p>Displays your client’s logo on a page with their social profile links</p>
                                <a href="https://pagebuilderaddons.com/clients-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/com-table.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Compact Pricing Table</h3>
                                <p>Enable you to create a great pricing table with the least amount of effort</p>
                                <a href="https://pagebuilderaddons.com/compact-pricing-table-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/faq.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>FAQ</h3>
                                <p>Lets you create FAQs (frequently asked questions), organize FAQs and publicize your FAQ in no time</p>
                                <a href="https://pagebuilderaddons.com/faq-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/info-list.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Info List</h3>
                                <p>List company information, Important steps by using info list element</p>
                                <a href="https://pagebuilderaddons.com/info-list-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/iconic-box.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Icon Box</h3>
                                <p>Unleash your creativity with Icon Box</p>
                                <a href="https://pagebuilderaddons.com/icon-box/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/static-counter.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Business Hours</h3>
                                <p>Show your business hours, office opening hours table via business hours element</p>
                                <a href="https://pagebuilderaddons.com/opening-time-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/carousel.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Image Carousel</h3>
                                <p>Easily create beautiful & fancy image carousel just in minutes</p>
                                <a href="https://pagebuilderaddons.com/image-carousel-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/parallax.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Parallax Background</h3>
                                <p>Build attractive landing pages with parallax animations</p>
                                <a href="https://pagebuilderaddons.com/parallax-background-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/post-caroousel.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Post Carousel</h3>
                                <p>Showcase your post content in a nice looking slider to impress your visitors and make them reach your platform</p>
                                <a href="https://pagebuilderaddons.com/post-carousel-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/post-grid.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Posts Grid</h3>
                                <p>Beautiful grid and list of posts will make your WordPress site stand out and keep visitors engaged</p>
                                <a href="https://pagebuilderaddons.com/post-grid-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/services-02.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Services</h3>
                                <p>Show your website services in a creative way</p>
                                <a href="https://pagebuilderaddons.com/services-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/timeline.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Timeline</h3>
                                <p>Display your company timeline, Historical event, sales steps, and lots other with using elegant simple responsive Timeline element</p>
                                <a href="https://pagebuilderaddons.com/timeline-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/tab-single.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Tabs</h3>
                                <p>Easy and lightweight way to show content in tabs format</p>
                                <a href="https://pagebuilderaddons.com/tabs-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/team-members.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Team Members</h3>
                                <p>Display your team members details with their social profile links</p>
                                <a href="https://pagebuilderaddons.com/members-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/testimonials.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Testimonials</h3>
                                <p>Display Unlimited testimonials, reviews or quotes in multiple ways</p>
                                <a href="https://pagebuilderaddons.com/testimonials-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/services-02.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Video Gallery</h3>
                                <p>Easily upload and show videos of different formats (mp4, webM, ogv) and sizes in a grid form</p>
                                <a href="https://pagebuilderaddons.com/video-gallery-demo/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/dropcaps.jpg'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Drop Caps</h3>
                                <p>Increase the readability and enhance the styles of your content, making the first letter of the paragraph capital with the PB addons Drop Caps element.</p>
                                <a href="https://pagebuilderaddons.com/drop-caps/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/text-block.jpg'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Text Block</h3>
                                <p>Display and design the Text Content on your website with multiple styling options using the Text Block element.</p>
                                    <a href="https://pagebuilderaddons.com/text-block/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                    <div class="addon-container same-height">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/popup.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Popup Modals</h3>
                                <p>Display user notifications, pop-ups and prompts in a beautiful layout on your webpage using the Pop-up Modal element.</p>
                                <a href="https://pagebuilderaddons.com/popup-modals/" target="_blank" title="View Demo">View Demo</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php do_shortcode('[send_in_blue]')?>
                <?php do_shortcode('[web_addons_banner]')?>
            </div>
            <div id="custom-post-type"  class="bit14-admin-addons">
                <div class="addons-list only-builder">
                    <div class="addon-container">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/client-cutsom.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Clients</h3>
                                <p>Displays your client’s logo on a page with their social profile links</p>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/faq-cutsom.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>FAQs</h3>
                                <p>Use the navigator to scroll through sections on parallax website</p>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/team-members-cutsom.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Team Members</h3>
                                <p>Display your team members details with their social profile links</p>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/services-cutsom.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Services</h3>
                                <p>Show your website services in a creative way</p>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/testimonials-cutsom.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Testimonials</h3>
                                <p>Display Unlimited testimonials, reviews or quotes in multiple ways</p>
                            </div>
                        </div>
                    </div> 
                    <div class="addon-container">
                        <div class="addon-container-bg">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/video-gallery-cutsom.png'); ?>"/>
                            </div>
                            <div class="addon-content">
                                <h3>Video Gallery</h3>
                                <p>Easily upload and show videos of different formats (mp4, webM, ogv) and sizes in a grid form</p>
                            </div>
                        </div>
                    </div> 
                </div>
                <?php do_shortcode('[send_in_blue]')?>
                <?php do_shortcode('[web_addons_banner]')?>
            </div>
            <div id="library-templates">
                <div class="addons-list only-builder">
                    <div class="addon-container">
                        <div class="addon-container-templates">
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/about-us-v1.png'); ?>"/>
                                <h3>About Us - V1</h3>
                            </div>
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/about-us-v2.png'); ?>"/>
                                <h3>About Us - V2</h3>
                            </div>
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/grid-post-v1.png'); ?>"/>
                                <h3>Grid Post - V1</h3>
                            </div>
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/grid-post-v2.png'); ?>"/>
                                <h3>Grid Post - V2</h3>
                            </div>
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/services-v1.png'); ?>"/>
                                <h3>Service- V1</h3>
                            </div>
                            <div class="addon-img">
                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'../assets/addons-img/services-v2.png'); ?>"/>
                                <h3>Service- V2</h3>
                            </div>
                        </div>
                    </div> 
                </div> 
                <?php do_shortcode('[send_in_blue]')?>
                <?php do_shortcode('[web_addons_banner]')?>
            </div>
        </div>
        <?php
        }
