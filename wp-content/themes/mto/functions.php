<?php

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

require('classes/theme-cpt.php');


add_action( 'wp_enqueue_scripts', 'ppm_scripts_and_styles', 999 );

function ppm_scripts_and_styles() {
    global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    if (!is_admin()) {
        
     
        wp_register_script( 'third-party', get_stylesheet_directory_uri() . '/library/js/third-party.js', array('jquery'), '1.0.8',true);
        
        wp_register_script( 'ppm', get_stylesheet_directory_uri() . '/library/js/ppm.js', array('third-party','jquery'), '1.0.49',true);    

        wp_enqueue_script('ppm');

      
    }
}

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'leandrikers' ),
        'id' => 'sidebar1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'leandrikers' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="section_widget--heading"><h3 class="section_widget--title">',
    'after_title'   => '</h3></div>',
    ) );

}

add_filter('redux/options/tpb_options/sections', 'child_sections');
function child_sections($sections){
    //$sections = array();
    $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-gears',
        'title'         => __('Theme Options', 'peadig-framework'),
        'desc'          => __('<p class="description">Theme modifications</p>', 'ppm'),
        'fields' => array(
            array(
                'id'=>'site_logo',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Site Logo', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select main logo from media gallery', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
            array(
                'id'=>'site_word_logo',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Wordmark Logo', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select main logo from media gallery', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
            array(
                'id'=>'footer_logo',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Site Footer Logo', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select main logo from media gallery', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
        )
    );


     $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-heart',
        'title'         => __('Social Profiles', 'ppm-framework'),
        'desc'          => __('<p class="description">Social Network URLS</p>', 'ppm'),
        'fields' => array(
            array(
                        'id'=>'twitter_url',
                        'type' => 'text',
                        'title' => __('Twitter', 'redux-framework-demo'),
                        'desc' => __('Enter your twitter url', 'redux-framework-demo'),
                        ),  
            array(
                        'id'=>'facebook_url',
                        'type' => 'text',
                        'title' => __('Facebook', 'redux-framework-demo'),
                        'desc' => __('Enter your Facebook URL', 'redux-framework-demo'),
                        ),  
            array(
                        'id'=>'pinterest_url',
                        'type' => 'text',
                        'title' => __('pinterest', 'redux-framework-demo'),
                        'desc' => __('Enter your pinterest URL', 'redux-framework-demo'),
                        ),  
            array(
                        'id'=>'instagram_url',
                        'type' => 'text',
                        'title' => __('Instagram', 'redux-framework-demo'),
                        'desc' => __('Enter your Instagram URL', 'redux-framework-demo'),
                        ),  
        )
    );



    

    return $sections;
}

function sergio($str) {
    echo '<pre>';
    print_r($str);
    echo '</pre>';
}

register_nav_menus(
    array(
        'secondary-nav' => __( 'Secondary Navigation', 'bonestheme' ),   // main nav in header
        'footer-nav' => __( 'Footer Nav', 'bonestheme' ),   // main nav in header
    )
);

function secondary_nav($nav = 'secondary-nav',$class='nav_secondary') {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'container' => false,                                       // remove nav container
        'container_class' => 'menu clearfix',                       // class of container (should you choose to use it)
        'menu' => __( 'The Secondary Menu', 'bonestheme' ),              // nav name
        'menu_class' => $class,              // adding custom nav class
        'theme_location' => $nav,                             // where it's located in the theme
        'before' => '',                                             // before the menu
        'after' => '',                                            // after the menu
        'link_before' => '',                                      // before each link
        'link_after' => '',                                       // after each link
        'depth' => 2,                                             // limit the depth of the nav
        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',  // fallback
        'walker' => new wp_bootstrap_navwalker()                    // for bootstrap nav
    ));
} /* end bones main nav */

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


if ( ! function_exists( 'page_menu' ) ) {
    function page_menu ( $menu_name ) {
        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
            $count = 0;
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
            $menu_items = wp_get_nav_menu_items($menu->term_id);

            $menu_list = '<div class="portfolio_blocks">';
            
            foreach ( (array) $menu_items as $key => $menu_item ) {
                $count++;
                $menu_list .=   '<div class="blocks_block">
                                    <div class="block_content">
                                        <figure class="block_content--image">
                                            '.get_the_post_thumbnail($menu_item->object_id,'full').'
                                        </figure>
                                        <div class="block_content--heading">
                                            <h4 class="block_content--title">'.$menu_item->title.'</h4>
                                        </div>
                                        <a href="'.get_permalink($menu_item->object_id).'" class="block_content--link"></a>
                                    </div>
                                </div>';
            }

            $menu_list .= '</div>';
        } else {
            $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
        }
        // $menu_list now ready to output
        echo $menu_list;
    }
}


add_action( 'cmb2_init', 'mto_register_metabox');

function mto_register_metabox() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_ppm_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    
    $home_meta = new_cmb2_box( array(
        'id'            => $prefix . 'home_metabox',
        'title'         => __( 'Home Page Meta', 'cmb2' ),
        'object_types'  => array( 'page' ), // Post type
        'show_on' => array('key'=>'template','value'=>'template-home.php'),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
    ) );


    $home_meta->add_field( array(
        'name'             => 'Home Heading',
        'desc'             => 'Enter top section heading...',
        'id'               => $prefix.'home_heading',
        'type'             => 'text',
    ) );

    $hv_meta = new_cmb2_box( array(
        'id'            => $prefix . 'hv_metabox',
        'title'         => __( 'Header Video Meta', 'cmb2' ),
        'object_types'  => array( 'page' ), // Post type
        'show_on' => array('key'=>'template','value'=>'template-header-video.php'),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
    ) );

    $hv_meta->add_field( array(
        'name' => 'oEmbed',
        'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
        'id'   => $prefix.'header_video',
        'type' => 'oembed',
    ) );

    


}


?>