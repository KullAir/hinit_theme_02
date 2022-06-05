<?php
/**
 * Sidebar setup for footer full.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>

<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper" id="wrapper-footer-full">
		<div class="<?php echo esc_attr( $container ); ?>" id="" tabindex="-1">
		<div class="row" id="footer-menu-logo">

			<?php dynamic_sidebar( 'footermenu_sidebar' ); ?>
			<?php dynamic_sidebar( 'footerlogo_sidebar' ); ?>

		</div>

		</div>
		<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

			<div class="row">

				<?php dynamic_sidebar( 'footerfull' ); ?>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

<?php endif; ?>
