<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Agama_Partial_Refresh {
    
    ###################################
    # TOP NAVIGATION AREA
    ###################################
    public static function preview_top_navigation() {
        $output = '';
        if( get_theme_mod( 'agama_top_navigation', true ) ) {
            $output = Agama::menu( 'agama_nav_top', 'top-nav-menu' );
        }
        return $output;
    }
    public static function preview_top_nav_social_icons() {
        if( get_theme_mod( 'agama_top_nav_social', true ) ) {
            Agama::sociali( false, 'animated' );
        }
    }
    ##################################################
    # PRIMARY NAVIGATION AREA
    ##################################################
    public static function preview_nav_search_icon() {
        $output = '';
        $search = esc_attr( get_theme_mod( 'agama_header_search', true ) );
        if( $search ) {
            $output = '<i id="vision-search-open-icon" class="fa fa-search">';
        }
        return $output;
    }
    
    #########################
    # PREVIEW LOGO
    #########################
    public static function preview_logo() {
        if( get_theme_mod( 'agama_logo' ) ) {
            $output = '<a href="'. esc_url( home_url('/') ) .'" title="'. esc_attr( get_bloginfo( 'name', 'display' ) ) .'">';
                $output .= '<img src="'. esc_url( get_theme_mod( 'agama_logo', '' ) ) .'" class="logo">';
            $output .= '</a>';
        } else {
            $output = '<h1 class="site-title"><a href="'. esc_url( home_url('/') ) .'">'. get_bloginfo( 'name' ) .'</a></h1>';
        }
        return $output;
    }
    
    ##################################
    # AGAMA SLIDES TITLES
    ##################################
    public static function preview_slide_1_title() {
        return esc_html( get_theme_mod( 'agama_slider_title_1', __( 'Welcome to Agama', 'agama-pro' ) ) );
    }
    public static function preview_slide_2_title() {
        return esc_html( get_theme_mod( 'agama_slider_title_2', __( 'Welcome to Agama', 'agama-pro' ) ) );
    }
    public static function preview_slide_3_title() {
        return esc_html( get_theme_mod( 'agama_slider_title_3', __( 'Welcome to Agama', 'agama-pro' ) ) );
    }
    public static function preview_slide_4_title() {
        return esc_html( get_theme_mod( 'agama_slider_title_4', __( 'Welcome to Agama', 'agama-pro' ) ) );
    }
    public static function preview_slide_5_title() {
        return esc_html( get_theme_mod( 'agama_slider_title_5', __( 'Welcome to Agama', 'agama-pro' ) ) );
    }
    public static function preview_slide_6_title() {
        return esc_html( get_theme_mod( 'agama_slider_title_6', __( 'Welcome to Agama', 'agama-pro' ) ) );
    }
    public static function preview_slide_7_title() {
        return esc_html( get_theme_mod( 'agama_slider_title_7', __( 'Welcome to Agama', 'agama-pro' ) ) );
    }
    public static function preview_slide_8_title() {
        return esc_html( get_theme_mod( 'agama_slider_title_8', __( 'Welcome to Agama', 'agama-pro' ) ) );
    }
    public static function preview_slide_9_title() {
        return esc_html( get_theme_mod( 'agama_slider_title_9', __( 'Welcome to Agama', 'agama-pro' ) ) );
    }
    public static function preview_slide_10_title() {
        return esc_html( get_theme_mod( 'agama_slider_title_10', __( 'Welcome to Agama', 'agama-pro' ) ) );
    }
    #################################################
    # AGAMA SLIDER BUTTONS
    #################################################
    public static function preview_slide_1_button() {
        return esc_html( get_theme_mod( 'agama_slider_button_title_1', __( 'Learn More', 'agama-pro' ) ) );
    }
    public static function preview_slide_2_button() {
        return esc_html( get_theme_mod( 'agama_slider_button_title_2', __( 'Learn More', 'agama-pro' ) ) );
    }
    public static function preview_slide_3_button() {
        return esc_html( get_theme_mod( 'agama_slider_button_title_3', __( 'Learn More', 'agama-pro' ) ) );
    }
    public static function preview_slide_4_button() {
        return esc_html( get_theme_mod( 'agama_slider_button_title_4', __( 'Learn More', 'agama-pro' ) ) );
    }
    public static function preview_slide_5_button() {
        return esc_html( get_theme_mod( 'agama_slider_button_title_5', __( 'Learn More', 'agama-pro' ) ) );
    }
    public static function preview_slide_6_button() {
        return esc_html( get_theme_mod( 'agama_slider_button_title_6', __( 'Learn More', 'agama-pro' ) ) );
    }
    public static function preview_slide_7_button() {
        return esc_html( get_theme_mod( 'agama_slider_button_title_7', __( 'Learn More', 'agama-pro' ) ) );
    }
    public static function preview_slide_8_button() {
        return esc_html( get_theme_mod( 'agama_slider_button_title_8', __( 'Learn More', 'agama-pro' ) ) );
    }
    public static function preview_slide_9_button() {
        return esc_html( get_theme_mod( 'agama_slider_button_title_9', __( 'Learn More', 'agama-pro' ) ) );
    }
    public static function preview_slide_10_button() {
        return esc_html( get_theme_mod( 'agama_slider_button_title_10', __( 'Learn More', 'agama-pro' ) ) );
    }
    ####################################################
    # FRONT PAGE BOXES IMAGE OR ICO
    ####################################################
    public static function preview_fbox_1_ico_or_img() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_1_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_1_img', '' ) );
        if( $switch == 'icon' ) {
            $class  = esc_attr( get_theme_mod( 'agama_frontpage_box_1_icon', 'fa-tablet' ) );
            $output = '<i class="fa '. $class .'"></i>';
        } else {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_2_ico_or_img() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_2_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_2_img', '' ) );
        if( $switch == 'icon' ) {
            $class  = esc_attr( get_theme_mod( 'agama_frontpage_box_2_icon', 'fa-tablet' ) );
            $output = '<i class="fa '. $class .'"></i>';
        } else {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_3_ico_or_img() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_3_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_3_img', '' ) );
        if( $switch == 'icon' ) {
            $class  = esc_attr( get_theme_mod( 'agama_frontpage_box_3_icon', 'fa-tablet' ) );
            $output = '<i class="fa '. $class .'"></i>';
        } else {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_4_ico_or_img() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_4_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_4_img', '' ) );
        if( $switch == 'icon' ) {
            $class  = esc_attr( get_theme_mod( 'agama_frontpage_box_4_icon', 'fa-tablet' ) );
            $output = '<i class="fa '. $class .'"></i>';
        } else {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_5_ico_or_img() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_5_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_5_img', '' ) );
        if( $switch == 'icon' ) {
            $class  = esc_attr( get_theme_mod( 'agama_frontpage_box_5_icon', 'fa-tablet' ) );
            $output = '<i class="fa '. $class .'"></i>';
        } else {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_6_ico_or_img() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_6_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_6_img', '' ) );
        if( $switch == 'icon' ) {
            $class  = esc_attr( get_theme_mod( 'agama_frontpage_box_6_icon', 'fa-tablet' ) );
            $output = '<i class="fa '. $class .'"></i>';
        } else {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_7_ico_or_img() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_7_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_7_img', '' ) );
        if( $switch == 'icon' ) {
            $class  = esc_attr( get_theme_mod( 'agama_frontpage_box_7_icon', 'fa-tablet' ) );
            $output = '<i class="fa '. $class .'"></i>';
        } else {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_8_ico_or_img() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_8_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_8_img', '' ) );
        if( $switch == 'icon' ) {
            $class  = esc_attr( get_theme_mod( 'agama_frontpage_box_8_icon', 'fa-tablet' ) );
            $output = '<i class="fa '. $class .'"></i>';
        } else {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    ##############################################
    # FRONT PAGE BOXES ICONS
    ##############################################
    public static function preview_fbox_1_icon() {
        $class = esc_attr( get_theme_mod( 'agama_frontpage_box_1_icon', 'fa-tablet' ) );
        return '<i class="fa '. $class .'"></i>';
    }
    public static function preview_fbox_2_icon() {
        $class = esc_attr( get_theme_mod( 'agama_frontpage_box_2_icon', 'fa-cogs' ) );
        return '<i class="fa '. $class .'"></i>';
    }
    public static function preview_fbox_3_icon() {
        $class = esc_attr( get_theme_mod( 'agama_frontpage_box_3_icon', 'fa-cogs' ) );
        return '<i class="fa '. $class .'"></i>';
    }
    public static function preview_fbox_4_icon() {
        $class = esc_attr( get_theme_mod( 'agama_frontpage_box_4_icon', 'fa-cogs' ) );
        return '<i class="fa '. $class .'"></i>';
    }
    public static function preview_fbox_5_icon() {
        $class = esc_attr( get_theme_mod( 'agama_frontpage_box_5_icon', 'fa-cogs' ) );
        return '<i class="fa '. $class .'"></i>';
    }
    public static function preview_fbox_6_icon() {
        $class = esc_attr( get_theme_mod( 'agama_frontpage_box_6_icon', 'fa-cogs' ) );
        return '<i class="fa '. $class .'"></i>';
    }
    public static function preview_fbox_7_icon() {
        $class = esc_attr( get_theme_mod( 'agama_frontpage_box_7_icon', 'fa-cogs' ) );
        return '<i class="fa '. $class .'"></i>';
    }
    public static function preview_fbox_8_icon() {
        $class = esc_attr( get_theme_mod( 'agama_frontpage_box_8_icon', 'fa-cogs' ) );
        return '<i class="fa '. $class .'"></i>';
    }
    ###############################################
    # FRONTPAGE BOXES IMAGE
    ###############################################
    public static function preview_fbox_1_image() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_1_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_1_img', '' ) );
        if( $switch == 'image' ) {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_2_image() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_2_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_2_img', '' ) );
        if( $switch == 'image' ) {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_3_image() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_3_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_3_img', '' ) );
        if( $switch == 'image' ) {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_4_image() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_4_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_4_img', '' ) );
        if( $switch == 'image' ) {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_5_image() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_5_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_5_img', '' ) );
        if( $switch == 'image' ) {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_6_image() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_6_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_6_img', '' ) );
        if( $switch == 'image' ) {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_7_image() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_7_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_7_img', '' ) );
        if( $switch == 'image' ) {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    public static function preview_fbox_8_image() {
        $output = '';
        $switch = esc_attr( get_theme_mod( 'agama_frontpage_box_8_ico_or_img', 'icon' ) );
        $url    = esc_url( get_theme_mod( 'agama_frontpage_8_img', '' ) );
        if( $switch == 'image' ) {
            $output = '<img src="'. $url .'">';
        }
        return $output;
    }
    #################################
    # FRONT PAGE BOXES TITLES
    #################################
    public static function preview_fbox_1_title() {
        $title = esc_html( get_theme_mod( 'agama_frontpage_box_1_title', __( 'Responsive Layout', 'agama-pro' ) ) );
        return $title;
    }
    public static function preview_fbox_2_title() {
        $title = esc_html( get_theme_mod( 'agama_frontpage_box_2_title', __( 'Endless Possibilities', 'agama-pro' ) ) );
        return $title;
    }
    public static function preview_fbox_3_title() {
        $title = esc_html( get_theme_mod( 'agama_frontpage_box_3_title', __( 'Boxed & Wide Layouts', 'agama-pro' ) ) );
        return $title;
    }
    public static function preview_fbox_4_title() {
        $title = esc_html( get_theme_mod( 'agama_frontpage_box_4_title', __( 'Powerful Performance', 'agama-pro' ) ) );
        return $title;
    }
    public static function preview_fbox_5_title() {
        $title = esc_html( get_theme_mod( 'agama_frontpage_box_5_title', __( 'Powerful Performance', 'agama-pro' ) ) );
        return $title;
    }
    public static function preview_fbox_6_title() {
        $title = esc_html( get_theme_mod( 'agama_frontpage_box_6_title', __( 'Boxed & Wide Layouts', 'agama-pro' ) ) );
        return $title;
    }
    public static function preview_fbox_7_title() {
        $title = esc_html( get_theme_mod( 'agama_frontpage_box_7_title', __( 'Endless Possibilities', 'agama-pro' ) ) );
        return $title;
    }
    public static function preview_fbox_8_title() {
        $title = esc_html( get_theme_mod( 'agama_frontpage_box_8_title', __( 'Responsive Layout', 'agama-pro' ) ) );
        return $title;
    }
    ################################
    # FRONT PAGE BOXES DESCRIPTION
    ################################
    public static function preview_fbox_1_desc() {
        $desc = esc_html( get_theme_mod( 'agama_frontpage_box_1_text', __( 'Powerful Layout with Responsive functionality that can be adapted to any screen size.', 'agama-pro' ) ) );
        return $desc;
    }
    public static function preview_fbox_2_desc() {
        $desc = esc_html( get_theme_mod( 'agama_frontpage_box_2_text', __( 'Complete control on each & every element that provides endless customization possibilities.', 'agama-pro' ) ) );
        return $desc;
    }
    public static function preview_fbox_3_desc() {
        $desc = esc_html( get_theme_mod( 'agama_frontpage_box_3_text', __( 'Stretch your Website to the Full Width or make it boxed to surprise your visitors.', 'agama-pro' ) ) );
        return $desc;
    }
    public static function preview_fbox_4_desc() {
        $desc = esc_html( get_theme_mod( 'agama_frontpage_box_4_text', __( 'Optimized code that are completely customizable and deliver unmatched fast performance.', 'agama-pro' ) ) );
        return $desc;
    }
    public static function preview_fbox_5_desc() {
        $desc = esc_html( get_theme_mod( 'agama_frontpage_box_5_text', __( 'Optimized code that are completely customizable and deliver unmatched fast performance.', 'agama-pro' ) ) );
        return $desc;
    }
    public static function preview_fbox_6_desc() {
        $desc = esc_html( get_theme_mod( 'agama_frontpage_box_6_text', __( 'Stretch your Website to the Full Width or make it boxed to surprise your visitors.', 'agama-pro' ) ) );
        return $desc;
    }
    public static function preview_fbox_7_desc() {
        $desc = esc_html( get_theme_mod( 'agama_frontpage_box_7_text', __( 'Complete control on each & every element that provides endless customization possibilities.', 'agama-pro' ) ) );
        return $desc;
    }
    public static function preview_fbox_8_desc() {
        $desc = esc_html( get_theme_mod( 'agama_frontpage_box_8_text', __( 'Powerful Layout with Responsive functionality that can be adapted to any screen size.', 'agama-pro' ) ) );
        return $desc;
    }
    #####################################
    # FRONT PAGE BOXES READ MORE BUTTONS
    #####################################
    public static function preview_fbox_1_read_more() {
        $output  = '';
        $enabled = esc_attr( get_theme_mod( 'agama_frontpage_box_1_readmore', true ) );
        if( $enabled ) {
            $url   = esc_url( get_theme_mod( 'agama_frontpage_box_1_readmore_url', '#' ) );
            $title = esc_html( get_theme_mod( 'agama_frontpage_box_1_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
            $output = '<a href="'. $url .'" class="button button-small button-rounded button-reveal button-border tright">';
                $output .= '<i class="fa fa-link"></i> ';
                $output .= '<span>'. $title .'</span>';
            $output .= '</a>';
        }
        return $output;
    }
    public static function preview_fbox_2_read_more() {
        $output  = '';
        $enabled = esc_attr( get_theme_mod( 'agama_frontpage_box_2_readmore', true ) );
        if( $enabled ) {
            $url   = esc_url( get_theme_mod( 'agama_frontpage_box_2_readmore_url', '#' ) );
            $title = esc_html( get_theme_mod( 'agama_frontpage_box_2_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
            $output = '<a href="'. $url .'" class="button button-small button-rounded button-reveal button-border tright">';
                $output .= '<i class="fa fa-link"></i> ';
                $output .= '<span>'. $title .'</span>';
            $output .= '</a>';
        }
        return $output;
    }
    public static function preview_fbox_3_read_more() {
        $output  = '';
        $enabled = esc_attr( get_theme_mod( 'agama_frontpage_box_3_readmore', true ) );
        if( $enabled ) {
            $url   = esc_url( get_theme_mod( 'agama_frontpage_box_3_readmore_url', '#' ) );
            $title = esc_html( get_theme_mod( 'agama_frontpage_box_3_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
            $output = '<a href="'. $url .'" class="button button-small button-rounded button-reveal button-border tright">';
                $output .= '<i class="fa fa-link"></i> ';
                $output .= '<span>'. $title .'</span>';
            $output .= '</a>';
        }
        return $output;
    }
    public static function preview_fbox_4_read_more() {
        $output  = '';
        $enabled = esc_attr( get_theme_mod( 'agama_frontpage_box_4_readmore', true ) );
        if( $enabled ) {
            $url   = esc_url( get_theme_mod( 'agama_frontpage_box_4_readmore_url', '#' ) );
            $title = esc_html( get_theme_mod( 'agama_frontpage_box_4_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
            $output = '<a href="'. $url .'" class="button button-small button-rounded button-reveal button-border tright">';
                $output .= '<i class="fa fa-link"></i> ';
                $output .= '<span>'. $title .'</span>';
            $output .= '</a>';
        }
        return $output;
    }
    public static function preview_fbox_5_read_more() {
        $output  = '';
        $enabled = esc_attr( get_theme_mod( 'agama_frontpage_box_5_readmore', true ) );
        if( $enabled ) {
            $url   = esc_url( get_theme_mod( 'agama_frontpage_box_5_readmore_url', '#' ) );
            $title = esc_html( get_theme_mod( 'agama_frontpage_box_5_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
            $output = '<a href="'. $url .'" class="button button-small button-rounded button-reveal button-border tright">';
                $output .= '<i class="fa fa-link"></i> ';
                $output .= '<span>'. $title .'</span>';
            $output .= '</a>';
        }
        return $output;
    }
    public static function preview_fbox_6_read_more() {
        $output  = '';
        $enabled = esc_attr( get_theme_mod( 'agama_frontpage_box_6_readmore', true ) );
        if( $enabled ) {
            $url   = esc_url( get_theme_mod( 'agama_frontpage_box_6_readmore_url', '#' ) );
            $title = esc_html( get_theme_mod( 'agama_frontpage_box_6_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
            $output = '<a href="'. $url .'" class="button button-small button-rounded button-reveal button-border tright">';
                $output .= '<i class="fa fa-link"></i> ';
                $output .= '<span>'. $title .'</span>';
            $output .= '</a>';
        }
        return $output;
    }
    public static function preview_fbox_7_read_more() {
        $output  = '';
        $enabled = esc_attr( get_theme_mod( 'agama_frontpage_box_7_readmore', true ) );
        if( $enabled ) {
            $url   = esc_url( get_theme_mod( 'agama_frontpage_box_7_readmore_url', '#' ) );
            $title = esc_html( get_theme_mod( 'agama_frontpage_box_7_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
            $output = '<a href="'. $url .'" class="button button-small button-rounded button-reveal button-border tright">';
                $output .= '<i class="fa fa-link"></i> ';
                $output .= '<span>'. $title .'</span>';
            $output .= '</a>';
        }
        return $output;
    }
    public static function preview_fbox_8_read_more() {
        $output  = '';
        $enabled = esc_attr( get_theme_mod( 'agama_frontpage_box_8_readmore', true ) );
        if( $enabled ) {
            $url   = esc_url( get_theme_mod( 'agama_frontpage_box_8_readmore_url', '#' ) );
            $title = esc_html( get_theme_mod( 'agama_frontpage_box_8_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
            $output = '<a href="'. $url .'" class="button button-small button-rounded button-reveal button-border tright">';
                $output .= '<i class="fa fa-link"></i> ';
                $output .= '<span>'. $title .'</span>';
            $output .= '</a>';
        }
        return $output;
    }
    #########################################
    # FRONT PAGE BOXES READ MORE BUTTONS TXT
    #########################################
    public static function preview_fbox_1_read_more_txt() {
        $txt = esc_html( get_theme_mod( 'agama_frontpage_box_1_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
        return $txt;
    }
    public static function preview_fbox_2_read_more_txt() {
        $txt = esc_html( get_theme_mod( 'agama_frontpage_box_2_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
        return $txt;
    }
    public static function preview_fbox_3_read_more_txt() {
        $txt = esc_html( get_theme_mod( 'agama_frontpage_box_3_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
        return $txt;
    }
    public static function preview_fbox_4_read_more_txt() {
        $txt = esc_html( get_theme_mod( 'agama_frontpage_box_4_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
        return $txt;
    }
    public static function preview_fbox_5_read_more_txt() {
        $txt = esc_html( get_theme_mod( 'agama_frontpage_box_5_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
        return $txt;
    }
    public static function preview_fbox_6_read_more_txt() {
        $txt = esc_html( get_theme_mod( 'agama_frontpage_box_6_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
        return $txt;
    }
    public static function preview_fbox_7_read_more_txt() {
        $txt = esc_html( get_theme_mod( 'agama_frontpage_box_7_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
        return $txt;
    }
    public static function preview_fbox_8_read_more_txt() {
        $txt = esc_html( get_theme_mod( 'agama_frontpage_box_8_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
        return $txt;
    }
    ###############################
    # BREADCRUMB
    ###############################
    public static function preview_breadcrumb() {
        if( get_them_mod( 'agama_breadcrumb', true ) ) {
            get_template_part( 'templates/title-bar' );
        }
    }
    ###############################################
    # BLOG AREA
    ###############################################
    public static function preview_blog_read_more() {
        $output  = '';
        $enabled = esc_attr( get_theme_mod( 'agama_blog_readmore_url', true ) );
        if( $enabled ) {
            $output = '<a class="more-link" href="'. get_permalink() .'">'. __( 'Read More', 'agama-pro' ) .'</a>';
        }
        return $output;
    }
    #################################
    # WOCOMMERCE
    #################################
    public static function preview_wc_cart_icon() {
        $cart = esc_attr( get_theme_mod( 'agama_header_cart_icon', true ) );
        if( $cart ) {
            $output = '<a href="'. wc_get_cart_url() .'" class="shopping_cart"></a><span class="cart_count"></span>';
            return $output;
        }
    }
    ##################################
    # CONTACT PAGE TEMPLATE
    ##################################
    public static function preview_contact_title() {
        $output = '';
        $title  = esc_html( get_theme_mod( 'agama_contact_title', __( 'Send us an Email', 'agama-pro' ) ) );
        if( $title ) {
            $output = '<h3>'. $title .'</h3>';
        }
        return $output;
    }
    public static function preview_contact_phone() {
        $output  = '';
        $phone   = esc_attr( get_theme_mod( 'agama_contact_phone', '(381) 000 111 22' ) );
        if( $phone ) {
            $output  = '<i class="fa fa-phone"></i> ';
            $output .= '<abbr title="'. __( 'Phone Number', 'agama-pro' ) .'"><strong>'. __( 'Phone', 'agama-pro' ) .':</strong></abbr> ';
            $output .= $phone;
        }
        return $output;
    }
    public static function preview_contact_fax() {
        $output = '';
        $fax    = esc_attr( get_theme_mod( 'agama_contact_fax', '(381) 000 111 23' ) );
        if( $fax ) {
            $output  = '<i class="fa fa-fax"></i> ';
            $output .= '<abbr title="'. __( 'Fax', 'agama-pro' ) .'"><strong>'. __( 'Fax', 'agama-pro' ) .':</strong></abbr> ';
            $output .= $fax;
        }
        return $output;
    }
    public static function preview_contact_email() {
        $output  = '';
        $email   = esc_attr( get_theme_mod( 'agama_contact_email', get_option('admin_email') ) );
        if( $email ) {
            $output  = '<i class="fa fa-paper-plane"></i> ';
            $output .= '<abbr title="'. __( 'Email Address', 'agama-pro' ) .'"><strong>'. __( 'Email', 'agama-pro' ) .':</strong></abbr> ';
            $output .= $email;
        }
        return $output;
    }
    public static function preview_contact_address() {
        $output  = '';
        $message = get_theme_mod( 'agama_contact_address', 'Test Address' );
        if( $message ) {
            $output = '<i class="fa fa-home"></i> <address style="position:relative; top:-25px; left: 20px;">'. $message .'</address>';
        }
        return $output;
    }
    public static function preview_contact_submit() {
        $output = '';
        $title  = esc_html( get_theme_mod( 'agama_contact_btn_txt', __( 'Send Message', 'agama-pro' ) ) );
        if( $title ) {
            $output = '<button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="formsubmit" value="submit">'. $title .'</button>';
        }
        return $output;
    }
    #####################################
    # FOOTER AREA
    #####################################
    public static function preview_footer_copyright() {
        do_action('agama_credits');
    }
    public static function preview_footer_social_icons() {
        if( get_theme_mod( 'agama_footer_social', true ) ) {
            Agama::sociali('top');
        }
    }
    public static function preview_to_top() {
        $output  = '';
        $enabled = esc_attr( get_theme_mod( 'agama_to_top', true ) );
        if( $enabled ) {
            $output = sprintf( '<a id="%s"><i class="%s"></i></a>', 'toTop', 'fa fa-angle-up' );
        }
        return $output;
    }
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
