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

<?php if ( is_active_sidebar( 'footerside' ) ) : ?>

	<!-- ******************* The Footer Side Widget Area ******************* -->

	<div class="col-lg-4" id="wrapper-footer-side">

		

				<?php dynamic_sidebar( 'footerside' ); ?>


	</div><!-- #wrapper-footer-side -->

<?php endif; ?>
