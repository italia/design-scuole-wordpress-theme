<?php

class CMB2_conditional_logic {
	/**
	 * This plugin's version number. Used for busting caches.
	 *
	 * @var string
	 */
	public $version = '1.0.0';
	/**
	 * Construct the plugin object
	 */
	public function __construct() {}
	/**
	 * Activate the plugin
	 */
	public function activate() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueues' ) );
	}
	public function enqueues() {
		wp_enqueue_script('cmb2_conditional_logic',  get_template_directory_uri(). '/inc/vendor/CMB2-conditional-logic/cmb2-conditional-logic.min.js',
			array('jquery'),
			$this->version,
			true
		);
	}
}
if( class_exists('CMB2_conditional_logic') ) {
	$CMB2_conditional_logic = new CMB2_conditional_logic();
	$CMB2_conditional_logic->activate();
}