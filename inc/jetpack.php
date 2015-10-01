<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package 
 */

/**
 * Añade scroll infinito
 * Fuente: http://jetpack.me/support/infinite-scroll/
 */
function switch_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'switch_jetpack_setup' );
