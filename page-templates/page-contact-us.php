<?php
/**
 * Template Name: Contact Us Page
 *
 * Team Page
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper" id="full-width-page-wrapper">

	<div id="content" tabindex="-1">
		<div  class="container content-area">

			<div class="row ">
				<div class="col-md-4 col-xl-6 ">
					<div class="page-deco"></div>
					<?php // do_action('contact-us-actions'); ?>
				</div>

				<div class="col-md-8 col-xl-6" id="primary">
					<header class="entry-header"  >
						
						<?php the_title( '<h1 class="entry-title" >', '</h1>' ); ?>
						

					</header><!-- .entry-header -->
		

					<main class="site-main" id="main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'loop-templates/content', 'titleless' ); ?>

							<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							?>

						<?php endwhile; // end of the loop. ?>

					</main><!-- #main -->

				</div><!-- #primary -->
				

			</div><!-- .row end -->
		
		</div><!--container -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
