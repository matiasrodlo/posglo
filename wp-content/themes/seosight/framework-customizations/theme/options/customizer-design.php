<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'website_preloader' => array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__( 'Enable website pre-loader', 'seosight' ),
	),

	'primary_color'   => array(
		'type'     => 'rgba-color-picker',
		'palettes' => array( '#f6f8f7', '#4cc2c0', '#f15b26', '#fcb03b', '#3cb878', '#8dc63f', '#6739b6' ),
		'label'    => esc_html__( 'Main accent color', 'seosight' ),
		'help'     => esc_html__( 'Click on field to choose color or clear field for default value', 'seosight' ),
	),
	'secondary_color' => array(
		'type'     => 'rgba-color-picker',
		'palettes' => array( '#f6f8f7', '#4cc2c0', '#f15b26', '#fcb03b', '#3cb878', '#8dc63f', '#6739b6' ),
		'label'    => esc_html__( 'Secondary accent color', 'seosight' ),
		'help'     => esc_html__( 'Click on field to choose color or clear field for default value', 'seosight' ),

	),
	'sidebar_width' => array(
		'type'  => 'select',
		'value' => 'narrow',
		'label' => esc_html__('Sidebar width', 'seosight'),
		'desc'  => esc_html__('Choose between wide and narrow sidebar on your pages', 'seosight'),
		'choices' => array(
			'narrow' => esc_html__('Narrow', 'seosight'),
			'wide' => esc_html__('Wide', 'seosight'),
		),
	)

);




