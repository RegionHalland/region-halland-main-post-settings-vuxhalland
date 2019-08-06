<?php

	/**
	 * @package Region Halland Main Post Settings Vuxhalland
	 */
	/*
	Plugin Name: Region Halland Main Post Settings Vuxhalland
	Description: ACF-fält för extra fält nederst på en page-sida
	Version: 1.1.0
	Author: Roland Hydén
	License: GPL-3.0
	Text Domain: regionhalland
	*/

	// Add action if ACF exist
	add_action('acf/init', 'my_acf_add_main_post_settings_vuxhalland_field_groups');

	// Function for adding field group
	function my_acf_add_main_post_settings_vuxhalland_field_groups() {

		if (function_exists('acf_add_local_field_group')):

			acf_add_local_field_group(array(
			    'key' => 'group_1000001',
			    'title' => ' ',
			    'fields' => array(
			        0 => array(
			        	'key' => 'field_1000002',
			            'label' => __('Text på första-sidan', 'regionhalland'),
			            'name' => 'name_1000002',
			            'type' => 'textarea',
			            'instructions' => __('Kort om sidans innehåll. Max 160 tecken.', 'regionhalland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'default_value' => '',
			            'placeholder' => __('', 'regionhalland'),
			            'maxlength' => 160,
			            'rows' => 2,
			            'new_lines' => '',
			        ),
			        1 => array(
				        'key' => 'field_1000003',
	            		'label' => __('Länk', 'regionhalland'),
	            		'name' => 'name_1000003',
	            		'type' => 'link',
	            		'instructions' => __('Länk till valfri sida. Kan vara en extern länk, en sida eller ett inlägg.', 'regionhalland'),
	            		'required' => 0,
	            		'conditional_logic' => 0,
	            		'wrapper' => array(
	                		'width' => '',
	                		'class' => '',
	                		'id' => '',
	            		),
	            		'return_format' => 'array',
        		  	),
			        2 => array(
			          	'key' => 'field_1000004',
			            'label' => __('Väl om denna sida ska visas på första-sidan', 'regionhalland'),
			            'name' => 'name_1000004',
			            'type' => 'checkbox',
			            'instructions' => '',
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'choices' => array(
			                'choice_1000004' => __('Visa på första-sidan', 'regionhalland'),
			            ),
			            'allow_custom' => 0,
			            'save_custom' => 0,
			            'default_value' => array(
			            ),
			            'layout' => 'vertical',
			            'toggle' => 0,
			            'return_format' => 'value',
			    	),
			    ),
			    'location' => array(
			        0 => array(
			            0 => array(
			                'param' => 'post_type',
			                'operator' => '==',
			                'value' => 'post',
			            ),
			        ),
			        1 => array(
			            0 => array(
			                'param' => 'post_type',
			                'operator' => '==',
			                'value' => 'page',
			            ),
			        ),
			    ),
			    'menu_order' => 0,
			    'position' => 'normal',
			    'style' => 'default',
			    'label_placement' => 'top',
			    'instruction_placement' => 'label',
			    'hide_on_screen' => '',
			    'active' => 1,
			    'description' => '',
			));


		endif;

	}

	// Hämta ut sidor för första-sidan
	function get_region_halland_main_post_settings_vuxhalland_front($postParent = 19) {
		
		// Preparerar array för att hämta ut sidor med ikryssad checkbox
		$args = array(
	        'post_parent' => $postParent,
			'post_type'		=> 'page',
			'sort_column' 	=> 'menu_order', 
			'sort_order' 	=> 'asc',
	        'meta_query' => array(
	            array(
	                'key' => 'name_1000004', 
	                'value' => 'choice_1000004', 
	                'compare' => 'LIKE'
	            )
	        )
	    );

		// Hämta sidor
		$pages = get_posts($args);

		// Loopa igenom sidorna
		foreach ($pages as $page) {

			$page->description 	= get_field('name_1000002', $page->ID);

			// Hämta ACF-objektet för link
			$field_link 		= get_field_object('field_1000003', $page->ID);
			
			// Spara ner ACF-data i page-arrayen
			if (isset($field_link['value']['title'])) {
				$page->link_title 	= $field_link['value']['title'];
				$page->link_url 	= $field_link['value']['url'];
				$page->link_target 	= $field_link['value']['target'];
			} else {
				$page->link_title 	= "";
				$page->link_url 	= "";
				$page->link_target 	= "";
			}

			// Lägg till sidans url 	
			$page->url = get_page_link($page->ID);
			
		}

		return $pages;
	}

	// Metod som anropas när pluginen aktiveras
	function region_halland_main_post_settings_vuxhalland_activate() {
		// Ingenting just nu...
	}

	// Metod som anropas när pluginen avaktiveras
	function region_halland_main_post_settings_vuxhalland_deactivate() {
		// Ingenting just nu...
	}

	// Vilken metod som ska anropas när pluginen aktiveras
	register_activation_hook( __FILE__, 'region_halland_main_post_settings_vuxhalland_activate');

	// Vilken metod som ska anropas när pluginen avaktiveras
	register_deactivation_hook( __FILE__, 'region_halland_main_post_settings_vuxhalland_deactivate');

?>