<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$extensions = array(
    'update-checker' => array(
        'display'     => true,
        'parent'      => null,
        'name'        => __( 'Update checker', 'seosight' ),
        'description' => __( 'Update checker.', 'seosight' ),
        'thumbnail'   => get_template_directory_uri() . '/images/update-checker-extension-thumb.png',
        'download'    => array(
            'source' => 'custom',
            'opts'   => array(
                'remote' => 'https://up.crumina.net/extensions/versions/',
            ),
        ),
    ),
    'ajax-portfolio' => array(
        'name'         => esc_html__( 'Ajax portfolio', 'seosight' ),
        'description'  => esc_html__( 'Ajax portfolio.', 'seosight' ),
        'thumbnail'    => get_template_directory_uri() . '/images/ajax-portfolio-extension-thumb.png',
        'display'      => true,
        'standalone'   => false,
        'download'     => array(
            'source' => 'custom',
            'opts'   => array(
                'remote' => 'https://up.crumina.net/extensions/versions/',
            ),
        ),
        'requirements' => array(
            'extensions' => array(
                'portfolio' => array(),
            )
        ),
    ),
);