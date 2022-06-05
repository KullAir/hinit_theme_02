<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="error-404-wrapper">

	<div class="" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found">

						<header class="page-header">

							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'hinit' ); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">
							<div class="container">
						
								<div class ="row">

									<div class="col-md-12">

										<p class="h3"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'hinit' ); ?></p>
									</div>
								</div>
							</div>

							<?php do_action("error_page_actions"); ?>


						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php get_footer(); ?>
