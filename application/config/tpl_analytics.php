<?php
/*
 * Analytics configuration.
 * Keys and parameters
 *
 */
	
	/**
	 * enable Google Analytics tracking
	 */
	$config['GA_enable'] = true;
	
	/**
	 * Your Google Analytics id
	 */
  $config['GA_property_id'] = '';

	/**
	 * If we want to enable Google Analytics Custom Variables
	 * and have them segment our visitors as per their auth status
	 * 
	 * @see https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingCustomVariables
	 */
	$config['GA_enable_CV_auth'] = true;
	
	/**
	 * If you enable custom vars for authentication you will also need
	 * these parameters. Unless you know what you are doing it's better
	 * to leave them as they are
	 */
	$config['GA_enable_CV_auth_params'] = array(
		// This custom var is set to slot #1.  Required parameter.
		'slot' => 1,
		// The name acts as a kind of category for the user activity.  Required parameter.
		'var_name' => 'userAuthed',
		// This value of the custom variable.  Required parameter.
		'var_value' => 'true',
		// Sets the scope to session-level.  Optional parameter.
		'scope_level' =>  2
	); 


	/**
	 * Enable mixpanel
	 */
	$config['MP_enable'] = true;
	