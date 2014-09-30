<?php
/**
 * sparcwp Theme Customizer
 *
 * @package sparcwp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sparcwp_customize_register( $wp_customize ) {
	$wp_customize->remove_section('title_tagline');
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');
}
add_action( 'customize_register', 'sparcwp_customize_register' );

