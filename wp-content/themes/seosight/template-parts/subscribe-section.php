<?php if ( ! defined( 'FW' ) ) {
    return;
}
/**
 * Template part for displaying Subscribe panel before footer.
 *
 * You free to customize widget contents in child theme.
 * Copy that file into 'template-parts' folder of your Child Theme.
 *
 * @package Seosight
 */
wp_enqueue_script( 'scrollmagic-velocity' );

global $allowedtags;
$enable_customization = fw_get_db_post_option( get_the_ID(), 'custom-subscribe/enable', 'no' );
$show_section         = fw_get_db_post_option( get_the_ID(), 'custom-subscribe/yes/subscribe-show/value', 'yes' );

if ( $show_section === 'no' ) {
    return;
}

$section_options = fw_get_db_customizer_option( 'section-subscribe-form', array() );
$animated_bg     = fw_get_db_customizer_option( 'subscribe_animated', false );
$section_bg      = fw_get_db_customizer_option( 'subscribe_bg_color', '' );
$section_color   = fw_get_db_customizer_option( 'subscribe_text_color', '' );
if ( 'yes' === $enable_customization ) {
    $panel_options   = fw_get_db_post_option( get_the_ID(), 'custom-subscribe/yes/subscribe-show', array() );
    $section_options = fw_akg( 'yes/section-subscribe-form', $panel_options, array() );
    $animated_bg     = fw_akg( 'yes/subscribe_animated', $panel_options, false );
}

$title            = fw_akg( 'title', $section_options, '' );
$text             = fw_akg( 'desc', $section_options, '' );
$custom_form      = fw_akg( 'custom-form/value', $section_options, 'no' );
$custom_form_html = fw_akg( 'custom-form/yes/html', $section_options, '' );
$name_field = fw_akg( 'custom-form/no/name_field', $section_options, false );

$section_class = 'subscribe-section';
if ( ! empty( $section_color ) ) {
    $section_class .= ' font-color-custom';
}
$subscribe_class = ( true === $name_field ) ? 'form-subscribe with-name subscribe-form es_shortcode_form' : 'form-subscribe subscribe-form es_shortcode_form';
$email_placeholder = ( true === $name_field ) ? __( 'Email', 'seosight' ) : __( 'Your Email Address', 'seosight' );

$section_class .= true === $animated_bg ? ' js-animated' : '';
?>
<!-- Subscribe Form -->
<section id="subscribe-section" class="<?php echo esc_attr( $section_class ) ?>">
    <div class="subscribe container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-5 col-md-12 col-md-offset-0 col-sm-12 col-xs-12">
                <?php if ( ! empty( $title ) ) {
                    echo '<h4 class="subscribe-title">' . esc_html( $title ) . '</h4>';
                }

                if ( 'yes' === $custom_form && ! empty( $custom_form_html ) ) {
                    echo( do_shortcode( $custom_form_html ) );
                } elseif ( function_exists( 'es_subbox' ) ) {
                    $home_url = "'" . home_url() . "'";

	                global $es_includes;
	                if (!isset($es_includes) || $es_includes !== true) {
		                $es_includes = true;
	                }

	                // Compatibility for GDPR
	                $active_plugins = get_option( 'active_plugins', array() );
	                if ( is_multisite() ) {
		                $active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
	                } ?>
	                <form class="<?php echo esc_attr( $subscribe_class ) ?>" data-es_form_id="es_shortcode_form">

                        <input type="email" id="es_txt_email_pg" class="es_textbox_class" name="es_txt_email_pg" maxlength="40" required
                        placeholder="<?php echo esc_html( $email_placeholder ) ?>" >

		                <?php if ( true === $name_field ) { ?>
                            <input type="text" id="es_txt_name_pg" class="es_textbox_class name input-standard-grey input-white" name="es_txt_name_pg" value="" maxlength="40"
                                   placeholder="<?php esc_html_e( 'Name', 'seosight' );?>" >
		                <?php } ?>

		                <?php if ( ( in_array( 'gdpr/gdpr.php', $active_plugins ) || array_key_exists( 'gdpr/gdpr.php', $active_plugins ) ) ) {
			                echo GDPR::consent_checkboxes();
		                } ?>

                        <button type="submit" class="subscr-btn" id="es_txt_button_pg"
                                name="es_txt_button_pg"><?php esc_html_e( 'Subscribe', 'seosight' ) ?><span class="semicircle--right"></span></button>


		                <?php if ( true !== $name_field ) { ?>
                            <input type="hidden" id="es_txt_name_pg" name="es_txt_name_pg" value="">
		                <?php }

		                $hp_style = "position:absolute;top:-99999px;" . ( is_rtl() ? 'right' : 'left' ) . ":-99999px;z-index:-99;";

		                ?>
		                <?php $nonce = wp_create_nonce( 'es-subscribe' ); ?>
                        <input type="hidden" name="es-subscribe" id="es-subscribe" value="<?php seosight_render( $nonce ); ?>"/>
                        <label style="<?php seosight_render( $hp_style ); ?>"><input type="text" name="es_hp_<?php echo wp_create_nonce('es_hp'); ?>" class="es_required_field" tabindex="-1" autocomplete="off"/></label>

                        <div class="flex-break"></div>
                        <div class="es_msg" id="es_shortcode_msg"><span id="es_msg_pg"></span></div>
                    </form>
                <?php }
                if ( ! empty( $text ) ) {
                    echo '<div class="sub-title">' . wp_kses( $text, $allowedtags ) . '</div>';
                } ?>
            </div>
            <?php if ( true === $animated_bg ) { ?>
                <div class="images-block">
                    <img src="<?php echo get_template_directory_uri() ?>/images/animated/subscr-gear.png" alt="gear"
                         class="gear">
                    <img src="<?php echo get_template_directory_uri() ?>/images/animated/subscr1.png" alt="mail"
                         class="mail">
                    <img src="<?php echo get_template_directory_uri() ?>/images/animated/subscr-mailopen.png" alt="mailopen"
                         class="mail-2">
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Subscribe Form -->