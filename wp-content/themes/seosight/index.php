<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Seosight
 */

get_header();
$layout = seosight_sidebar_conf();
$main_class = 'full' !== $layout['position'] ? 'site-main content-main-sidebar' : 'site-main content-main-full';
set_query_var( 'post_excerpt', get_option( 'rss_use_excerpt' ) );
set_query_var('post_layout', $layout['position']);
?>
	<div id="primary" class="container">
		<div class="row medium-padding120">
			<div class="<?php echo esc_attr( $layout['content-classes'] ) ?>">
				<main id="main" class="<?php echo esc_attr( $main_class ) ?>" >

					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							$format = get_post_format();
							if ( false === $format ) {
								$format = 'standard';
							}

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'post-format/post', $format );

						endwhile;

						seosight_paging_nav();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

				</main><!-- #main -->
			</div>
			<?php if ( 'full' !== $layout['position'] ) { ?>
				<div class="<?php echo esc_attr( $layout['sidebar-classes'] ) ?>">
					<?php get_sidebar(); ?>
				</div>
			<?php } ?>
		</div><!-- #row -->
	</div><!-- #primary -->

<?php get_footer();
