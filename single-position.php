<?php
/**
 * The template for displaying all position (Job) custom post type.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="container "id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12">

			<!-- Do the left sidebar check -->
				<main class="site-main" id="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'single-position' ); ?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			<!-- Do the right sidebar check -->
			</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->
<?php do_action('position_archive_action'); ?>

<?php get_footer(); ?>
