<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * Add metabox with page content for YOAST SEO Analysis
 */
if (! function_exists('crumina_yoast_kc_compitablity')){
function crumina_yoast_kc_compitablity() {

	$active = defined( 'WPSEO_VERSION' ) ? true : false;

	if ( true === $active ) {
		global $pagenow, $typenow;
		if ( empty( $typenow ) && ! empty( $_GET['post'] ) ) {
			$post    = get_post( $_GET['post'] );
			$typenow = $post->post_type;
		}
		if ( ( $pagenow == 'post.php' && $typenow == 'page' ) || ( $pagenow == 'post-new.php' && $typenow == 'page' ) ) {
			wp_enqueue_script( 'crum-yoast-seo', get_template_directory_uri() . '/js/king-yoast.js', array( 'jquery' ), '1', true );
		}
	}
}
}
add_action( 'admin_enqueue_scripts', 'crumina_yoast_kc_compitablity' );

if (! function_exists('crumina_add_yoast_meta_box')){
function crumina_add_yoast_meta_box() {
	$active = false;
	if ( function_exists( 'wpseo_auto_load' ) ) {
		$active = true;
	} elseif ( defined( 'WPSEO_VERSION' ) ) {
		$active = true;
	}

	if ( true === $active ) {
		add_meta_box(
			'utouch-yoast-metabox',
			'Yoast analize content',
			'crumina_render_yoast_meta_box_content',
			'page',
			'advanced',
			'low'
		);
	}
}}

add_action( 'add_meta_boxes', 'crumina_add_yoast_meta_box' );

/**
 * Render Meta Box content
 */
 if (! function_exists('crumina_render_yoast_meta_box_content')){
function crumina_render_yoast_meta_box_content( $post ) {
	global $allowedposttags;
	$content = get_post_field( 'post_content', $post->ID );
	$content           = preg_replace( "/<style.+<\/style>/", "", $content );
	$content           = preg_replace( "/<script.+<\/script>/", "", $content );
	$content           = preg_replace( "/<svg\\b[^>]*>(.*?)<\\/svg>/s", "", $content );
	$content           = preg_replace('/\<[\/]{0,1}div[^\>]*\>/i', '', $content);
	$content           = preg_replace('/\<[\/]{0,1}section[^\>]*\>/i', '', $content);
	$content           = preg_replace('/\<[\/]{0,1}header[^\>]*\>/i', '', $content);
	$content           = apply_filters( 'the_content', $content );
	$content           = wp_kses( $content, $allowedposttags );
	echo '<textarea id="crumina-yoast-text">' . $content . '</textarea>';
}
 }