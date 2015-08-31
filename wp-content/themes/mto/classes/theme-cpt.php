<?php
class lkCustomPostTypes {

	public function __construct() {
		add_action( 'cmb2_init', array($this,'ck_custom_meta'));
	}


	public function ck_custom_meta() {

	    // Start with an underscore to hide fields from custom fields list
	    $prefix = '_ppm_';

	    
	    $page_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'page_metabox',
	        'title'         => __( 'Page Meta', 'cmb2' ),
	        'object_types'  => array( 'page', ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );


    $page_meta->add_field( array(
        'name'             => 'Page Excerpt',
        'desc'             => 'Enter excerpt for the page',
        'id'               => $prefix.'page_excerpt',
        'type'             => 'textarea',
    ) );

    $page_meta->add_field( array(
        'name'             => 'Page Logo',
        'desc'             => 'Add page image',
        'id'               => $prefix.'page_logo',
        'type'             => 'file',
    ) );

	}


}
global $cpt; 
$cpt = new lkCustomPostTypes(); 
