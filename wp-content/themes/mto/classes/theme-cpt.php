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
        'name' => 'Is this a Home page section',
        'desc' => 'should this info appear on the Home page?',
        'id'   => $prefix.'page_home_checkbox',
        'type' => 'checkbox'
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

    $page_meta->add_field( array(
        'name'             => 'Contact Name',
        'id'               => $prefix.'contact_name',
        'type'             => 'text',
    ) );

    $page_meta->add_field( array(
        'name'             => 'Contact Email',
        'id'               => $prefix.'contact_email',
        'type'             => 'text',
    ) );

    $page_meta->add_field( array(
        'name'             => 'Contact Tel',
        'id'               => $prefix.'contact_tel',
        'type'             => 'text',
    ) );

    $page_meta->add_field( array(
        'name'             => '2nd Contact Name',
        'id'               => $prefix.'contact_name2',
        'type'             => 'text',
    ) );

    $page_meta->add_field( array(
        'name'             => '2nd  Contact Email',
        'id'               => $prefix.'contact_email2',
        'type'             => 'text',
    ) );

    $page_meta->add_field( array(
        'name'             => '2nd  Contact Tel',
        'id'               => $prefix.'contact_tel2',
        'type'             => 'text',
    ) );

	}


}
global $cpt; 
$cpt = new lkCustomPostTypes(); 
