<?php
/*
 * Plugin Name: Remove Ads Disqus
 * Version: 1.0.0
 * Plugin URI: #
 * Description: Remove annoying ads from Disqus Comments.
 * Author: Guardian
 * Author URI: #
 * Requires at least: 4.0
 * Tested up to: 5.1
 *
 * @package WordPress
 * @author Guardian
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;
require_once( 'includes/class-RemoveAdsDisqus.php' );

function RemoveAdsDisqus () {
	$instance = RemoveAdsDisqus::instance( __FILE__, '1.0.0' );
	return $instance;
}

RemoveAdsDisqus();