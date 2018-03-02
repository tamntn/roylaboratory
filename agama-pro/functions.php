<?php
/**
 * Do not customize functions.php file in Agama Pro theme.
 * Use Agama Pro Child theme for customizations:
 * http://docs.theme-vision.com/article/child-theme/
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

load_theme_textdomain( 'agama-pro', get_template_directory() . '/languages' );

get_template_part( 'framework/class-agama-framework' );
new Agama_Framework();
 
/* Omit closing PHP tag to avoid "Headers already sent" issues. */ 
