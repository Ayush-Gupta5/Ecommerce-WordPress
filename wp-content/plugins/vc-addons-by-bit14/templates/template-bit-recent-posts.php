<?php

function pbwb_bit_recent_post_func( $atts ) {

    extract(shortcode_atts( array(
        'id'                        => '',
        'class'                     => '',
        'theme_style'               => '',
        'post_category'             => '',
        'desktop_num_slides'        => '1',
        'tablet_num_slides'         => '1',
        'mobile_num_slides'         => '1',
        'primary_color'             => '',
        'secondary_color'           => '',
        'hide_featured'             => '',
        'is_pagination'             => '',
        'pagination_theme'          => '',
        'posts_per_page'            => '',
        'pagination_hover_bg'       => '',
        'pagination_hover_color'    => '',
        'google_text_font'          => '',
    ), $atts ));
    //******************//
    // MANAGE FONT DATA //
    //******************//

    // Build the data array
    $text_font_data = PBWB_bit14_helper::pbwb_getFontsData($google_text_font);

    // Build the inline style
    $text_font_inline_style = PBWB_bit14_helper::pbwb_googleFontsStyles($text_font_data);

    // Enqueue the right font
    PBWB_bit14_helper::pbwb_enqueueGoogleFonts($text_font_data);
    $id =
    ( $id    != '' ) ?
    'id="' . esc_attr( $id ) . '"' :
    '';

    $class =
    ( $class != '' ) ?
    esc_attr( $class ) :
    '';

    $theme_style =
    $theme_style != "" ?
    $theme_style :
    'post-grid-style-one';

    $post_category =
    $post_category != "" && $post_category != "all" ?
    $post_category :
    '';

    $primary_color =
    $primary_color != "" ?
    $primary_color :
    "";

    $secondary_color =
    $secondary_color != "" ?
    $secondary_color :
    "";

    $hide_featured =
    $hide_featured != "" ?
    $hide_featured :
    "";

    $is_pagination =
    $is_pagination != "" ?
    $is_pagination :
    "";

    $pagination_hover_bg =
    $pagination_hover_bg != "" ?
    $pagination_hover_bg :
    "";

    $pagination_hover_color =
    $pagination_hover_color != "" ?
    $pagination_hover_color :
    "";

    $posts_per_page =
    $posts_per_page != "" && is_numeric( $posts_per_page ) ?
    $posts_per_page :
    $desktop_num_slides;

    $pagination_theme =
    $pagination_theme != "" ?
    $pagination_theme :
    "post_pagination-style-one";

    $col = 'pb-col-md-'.(12/$desktop_num_slides).' pb-col-sm-'.(12/$tablet_num_slides).' pb-col-xs-'.(12/$mobile_num_slides);

    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $paged = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : $paged;

    $args   =    array(
        'post_type'      => 'post',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        'ignore_sticky_posts' => true
    );
    if( isset($post_category) && !empty($post_category) ) {
        $args['tax_query'] = array( 
            array(
                'taxonomy' => 'category',
                'field' => 'slug', 
                'terms' => $post_category
            ) 
        );
    }

    if ( $pagination_theme == "post_pagination-style-one" || $pagination_theme == "post_pagination-style-three" ) :
        $pagination_next_text   =   '&larr; Prev';
        $pagination_prev_text   =   'Next &rarr;';
    elseif( $pagination_theme == "post_pagination-style-two" ):
        $pagination_next_text   =   '<i class="fa fa-angle-left" aria-hidden="true"></i>';
        $pagination_prev_text   =   '<i class="fa fa-angle-right" aria-hidden="true"></i>';
    endif;


    global $post;
    
    $bit_recent_post = new WP_Query($args);

    if ( $bit_recent_post ) :


        $pagination_args = array(
            'mid_size'  =>  5,
            'prev_text' =>  __($pagination_next_text , 'bit14'),
            'next_text' =>  __($pagination_prev_text , 'bit14'),
            'total'     => $bit_recent_post->max_num_pages,
        );
        $rtl = get_option('bit14_rtl_language') === '1' ? 'dir="rtl"' : '';
        $output = '<div '. esc_attr($id) .' class="bit-recent-posts-container '. esc_attr($class) .'" data-primary-color="'. esc_attr($primary_color) .'" data-secondary-color="'. esc_attr($secondary_color) .'" data-pagination-hover-bg="'. esc_attr($pagination_hover_bg) .'" data-pagination-hover-color="'. esc_attr($pagination_hover_color) .'" >';
            $output .= '<div class="row '. esc_attr($theme_style) .'" >';

                
            while ( $bit_recent_post->have_posts() ) : $bit_recent_post->the_post();


                $title      = get_the_title();
                $excerpt    = get_the_excerpt();
                $content    = $post->post_content;
                $thumbnail  = get_the_post_thumbnail();
                $date       = get_the_date( 'd-m-Y');
                $author     = '<a href="'. esc_url(get_author_posts_url( get_the_author_meta('ID') )) .'">'. esc_html(get_the_author()) .'</a>';
                $comment    = get_comments_number();
                $permalink  = get_permalink();


                $output .= '<div class="bit-recent-posts '. esc_attr($col) .'" >';

                    //  // TITLE
                    // if( $theme_style == "post-grid-style-five" ) :
                    //     $output .= '<div class="bit-recent-posts-titlebar">';
                    //         $output .= '<span class="bit-recent-posts-titlebar-post-date" style="'.$text_font_inline_style.'">'. get_the_date( 'd' , $post->ID ) .'<span class="bit-recent-posts-titlebar-post-date-month" style="'.$text_font_inline_style.'">'. get_the_date( 'M' ) .'</span></span>';
                    //         $output .= '<a class="bit-recent-posts-titlebar-title" href="'. $permalink .'"><h2 style="'.$text_font_inline_style.'">'. esc_html($title) .'</h2></a>';
                    //     $output .= '</div>';
                    // endif;
                    
                    // THUMBNAIL
                    if(  $hide_featured == "" || $theme_style =="post-grid-style-one" ) :
                    $output .= '<div class="bit-recent-posts-thumbnail">';
                        $output .= '<a title="'. esc_attr($title) .'" href="'. esc_url($permalink) .'" style="'.esc_attr($text_font_inline_style).'">' . wp_kses($thumbnail, pbwb_get_allowed_tags()) . '</a>';
                    $output .= '</div>';
                    endif;


                    $output .= '<div class="bit-recent-posts-content-container">';
                        $output .= '<div class="bit-recent-posts-content-container-wrap">';
                            
                            // // TITLE
                            // if( $theme_style !== "post-grid-style-five" ) :
                            //     $output .= '<a href="'. $permalink .'"><h2 style="'.$text_font_inline_style.'">'. esc_html($title) .'</h2></a>';
                            // endif;

                            // // POST DATE - AUTHOR
                            // if( $theme_style !== "post-grid-style-five" ) :
                            //     $output .= '<span class="bit-recent-posts-date" style="'.$text_font_inline_style.'">'. $date .'</span>';
                            //     if( $theme_style == "post-grid-style-one" || $theme_style == "post-grid-style-two" || $theme_style == "post-grid-style-six" ) :
                            //         $output .= '<span class="bit-recent-posts-seprator"> . </span>';
                            //     else:
                            //         $output .= '<span class="bit-recent-posts-seprator"> | </span>';
                            //     endif;
                            //     $output .= '<span class="bit-recent-posts-author" style="'.$text_font_inline_style.'">'. $author .'</span>';
                            // endif;
                            
                            // EXCERPT
                            // if( $theme_style !== "post-grid-style-three" && $theme_style !== "post-grid-style-four" ) :
                                if( has_excerpt( $post->ID ) ) :
                                    $output .= '<p style="'.esc_attr($text_font_inline_style).'">'. esc_html($excerpt) .'</p>';
                                else :
                                    $output .= '<p style="'.esc_attr($text_font_inline_style).'">'. strip_tags(substr($content, 0, 150)) .'...</p>';
                                endif;
                            // endif;
                            
                            // // POST META
                            // if( $theme_style == "post-grid-style-one" ) :
                            //     $output .= '<div class="bit-recent-posts-meta">';
                            //         $output .= '<span class="bit-recent-posts-meta-comment" style="'.$text_font_inline_style.'">'. $comment .'</span>';
                            //         $output .= '<a title="'.__('Read More' , 'bit14').'" href="'. $permalink .'" class="bit-recent-posts-meta-read-more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>';
                            //     $output .= '</div>';
                            // elseif( $theme_style == "post-grid-style-one" || $theme_style == "post-grid-style-five" ) :
                            //     $output .= '<div class="bit-recent-posts-meta">';
                            //         $output .= '<span class="bit-recent-posts-author" style="'.$text_font_inline_style.'">'. __('By ' , 'bit14') . $author .'</span>';
                            //         $output .= '<span class="bit-recent-posts-meta-comment" style="'.$text_font_inline_style.'">'. $comment .'</span>';
                            //     $output .= '</div>';
                            
                            // // READ MORE BUTTON
                            // elseif( $theme_style == "post-grid-style-two" || $theme_style == "post-grid-style-six" ) :
                            //     $output .= '<a title="'.__('Read More' , 'bit14').'" href="'. $permalink .'" class="btn btn-flat bit-recent-posts-meta-read-more-button" style="'.$text_font_inline_style.'">'.__('Read More' , 'bit14').'</a>';
                            // elseif( $theme_style == "post-grid-style-four" ) :
                                // endif;
                            $output .= '<a title="'.__('View' , 'bit14').'" href="'. $permalink .'" class="btn btn-flat bit-recent-posts-meta-read-more-button" style="'.esc_attr($text_font_inline_style).'"><span>'.__('View' , 'bit14').'</span></a>';

                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            endwhile;

            if ( $is_pagination == true ) {
                $output .= '<div class="bit-recent-posts-pagination '. esc_attr($pagination_theme) .'"><div class="bit-recent-posts-pagination-wrap">';
                    $output .= paginate_links( $pagination_args );
                $output .= '</div></div>';
            }

            $output .= '</div>';
        $output .= '</div>';

        wp_reset_postdata();
    endif;
    
    $output .= wp_enqueue_style( 'pro-bit14-vc-addons-recent-posts', PBWB_ASSETS_URL.'css/recent-posts.css', false );
    $output .= wp_enqueue_script( 'pro-bit14-vc-addons-recent-posts', PBWB_ASSETS_URL.'js/recent-posts.js', array('jquery'), false, true );	  
    $output .= wp_enqueue_script( 'pro-masonry', PBWB_ASSETS_URL.'js/jquery.masonry.min.js', array('jquery'), false );
    

    return $output;

}

function pbwb_get_allowed_tags() {

    $allowed_tags = array(
        'a' => array(
            'class' => array(),
            'href'  => array(),
            'rel'   => array(),
            'title' => array(),
        ),
        'abbr' => array(
            'title' => array(),
        ),
        'b' => array(),
        'blockquote' => array(
            'cite'  => array(),
        ),
        'cite' => array(
            'title' => array(),
        ),
        'code' => array(),
        'del' => array(
            'datetime' => array(),
            'title' => array(),
        ),
        'dd' => array(),
        'div' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'dl' => array(),
        'dt' => array(),
        'em' => array(),
        'h1' => array(),
        'h2' => array(),
        'h3' => array(),
        'h4' => array(),
        'h5' => array(),
        'h6' => array(),
        'i' => array(),
        'img' => array(
            'alt'    => array(),
            'class'  => array(),
            'height' => array(),
            'src'    => array(),
            'width'  => array(),
        ),
        'li' => array(
            'class' => array(),
        ),
        'ol' => array(
            'class' => array(),
        ),
        'p' => array(
            'class' => array(),
        ),
        'q' => array(
            'cite' => array(),
            'title' => array(),
        ),
        'span' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'strike' => array(),
        'strong' => array(),
        'ul' => array(
            'class' => array(),
        ),
    );
    
    return $allowed_tags;
}
add_shortcode( 'bit_recent_post', 'pbwb_bit_recent_post_func' );
?>