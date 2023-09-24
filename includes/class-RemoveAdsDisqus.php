<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class RemoveAdsDisqus {

	private static $_instance = null;

	public $_version;

	public $_token;

	public $file;

	public $dir;

	public $assets_dir;

	public $assets_url;

	public function __construct ( $file = '', $version = '1.0.0' ) {
		$this->_version = $version;
		$this->_token = 'RemoveAdsDisqus';

		$this->file = $file;
		$this->dir = dirname( $this->file );
		$this->assets_dir = trailingslashit( $this->dir ) . 'assets';
		$this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $this->file ) ) );

		register_activation_hook( $this->file, array( $this, 'install' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 10 );
	} 

	public function enqueue_scripts () {
		wp_register_script( $this->_token . '-frontend', esc_url( $this->assets_url ) . 'js/frontend.js', array( 'jquery' ), $this->_version );
		wp_enqueue_script( $this->_token . '-frontend' );
	} 

	public static function instance ( $file = '', $version = '1.0.0' ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $file, $version );
		}
		return self::$_instance;
	} 

	public function __clone () {
		_doing_it_wrong( __FUNCTION__, __( 'Guardian' ), $this->_version );
	} 

	public function __wakeup () {
		_doing_it_wrong( __FUNCTION__, __( 'Guardian' ), $this->_version );
	} 

	public function install () {
		$this->_log_version_number();
	} 

	private function _log_version_number () {
		update_option( $this->_token . '_version', $this->_version );
	} 

}