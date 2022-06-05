<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper grad-before" id="wrapper-footer-widgets">
	<div class="container container-wide" >
		<div class="row">
			<?php get_template_part( 'sidebar-templates/sidebar', 'footerside' ); ?>

			<?php get_template_part( 'sidebar-templates/sidebar', 'footermain' ); ?>
			
		</div>
	</div>
</div>

<div class="wrapper" id="wrapper-footer">


	<div class="<?php echo esc_attr( $container ); ?>">
		

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					
					<div class="site-footer-acc-link-wrap">
								<a class="site-footer-acc-link" href="<?php echo home_url(); ?>/accessibility" ><?php esc_html_e( 'הצהרת נגישות',
					'hinit' ); ?></a>
					</div>
					<div class="site-info">

												
						<span class="link-wrap">
							<?php echo 	esc_html__( 'בניית האתר', 'hinit' ); ?>:
							
							<a href="<?php  echo esc_url( __( 'http://kull-air.com','hinit' ) ); ?>"><?php echo 	esc_html__( 'Kull-Air Studio', 'hinit' ); ?></a></span>
							<span class="sep"> | </span>
							<span class="link-wrap">
							<?php echo 	esc_html__( 'עיצוב האתר', 'hinit' ); ?>:
							<a href="<?php  echo esc_url( __( 'https://www.studio-ronit.co.il/','hinit' ) ); ?>">
								<?php  echo 	 esc_html__( 'סטודיו רונית', 'hinit' ); ?></a></span>
							

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

