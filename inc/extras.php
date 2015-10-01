<?php
/**
 * @package 
 */

/**
 * @param 
 * @return 
 */
function switch_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'switch_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * @param 
	 * @param 
	 * @return
	 */
	function switch_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		$title .= get_bloginfo( 'name', 'display' );

		
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

	
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'switch' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'switch_wp_title', 10, 2 );

	/**
	 * @link 
	 * @todo 
	 */
	function switch_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'switch_render_title' );
endif;
