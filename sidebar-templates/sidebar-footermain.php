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

<?php if ( is_active_sidebar( 'footermain' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="col" id="wrapper-footer-main">


				<?php dynamic_sidebar( 'footermain' ); ?>


	</div><!-- #wrapper-footer-main -->

<?php endif; ?>
