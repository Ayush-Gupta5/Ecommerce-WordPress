<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Electronics Store
 */

get_header(); ?>

<main id="main" role="main" class="theme-main-box pt-5">
    <div class="container">
        <?php
        $electronics_store_left_right = get_theme_mod( 'electronics_store_theme_options','Right Sidebar');
        if($electronics_store_left_right == 'Left Sidebar'){ ?>
            <div class="row">
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                <div class="col-lg-8 col-md-8">
                    <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','electronics-store'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                    <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'top' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php electronics_store_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if ( have_posts() ) :
                    /* Start the Loop */
                      
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                      
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php electronics_store_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
            </div>
            <div class="clearfix"></div>
        <?php }else if($electronics_store_left_right == 'Right Sidebar'){ ?>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','electronics-store'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                    <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'top' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php electronics_store_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php electronics_store_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
            </div>
        <?php }else if($electronics_store_left_right == 'One Column'){ ?>
            <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','electronics-store'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
            <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'top' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                    <div class="navigation my-3">
                        <?php electronics_store_post_navigation();?>
                        <div class="clearfix"></div>
                    </div>
                <?php }?>
            <?php }?>
            <?php if ( have_posts() ) :
                /* Start the Loop */
                  
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content' ); 
                  
                endwhile;
                wp_reset_postdata();
                else :

                    get_template_part( 'no-results' ); 

                endif; 
            ?>
            <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                    <div class="navigation my-3">
                        <?php electronics_store_post_navigation();?>
                        <div class="clearfix"></div>
                    </div>
                <?php }?>
            <?php }?>
        <?php }else if($electronics_store_left_right == 'Three Columns'){ ?>
            <div class="row">
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                <div class="col-lg-4 col-md-4">
                    <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','electronics-store'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                    <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'top' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php electronics_store_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php electronics_store_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
            </div>
        <?php }else if($electronics_store_left_right == 'Four Columns'){ ?>
            <div class="row">
                <div class="col-lg-3 col-md-6"><?php get_sidebar(); ?></div>
                <div class="col-lg-3 col-md-6">
                    <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','electronics-store'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                    <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'top' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php electronics_store_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php electronics_store_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <div class="col-lg-3 col-md-6"><?php get_sidebar(); ?></div>
                <div class="col-lg-3 col-md-6"><?php get_sidebar(); ?></div>
            </div>
        <?php }else if($electronics_store_left_right == 'Grid Layout'){ ?>
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','electronics-store'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                    <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'top' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php electronics_store_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <div class="row">
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/grid-layout' ); 
                              
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                    </div>
                    <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php electronics_store_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
            </div>
        <?php }else {?>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','electronics-store'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                    <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'top' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php electronics_store_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'electronics_store_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'electronics_store_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php electronics_store_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
            </div>
        <?php } ?>
    </div>
</main>

<?php get_footer(); ?>