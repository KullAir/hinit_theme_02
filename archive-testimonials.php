<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="" id="content" tabindex="-1">
	
		
			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="container page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						
						?>
					</header><!-- .page-header -->
					<section id="latest-pos-sections">
						<div class="container">
					
							<div class ="row">
								<div class ="col-md-12">
									<?php /* Start the Loop */ ?>
									<?php while ( have_posts() ) : the_post(); ?>

										<?php

											get_template_part( 'loop-templates/content', 'testemonial' );
										?>

									<?php endwhile; ?>
									
									<!-- The pagination component -->
									<?php understrap_pagination(); ?>
								</div>
							</div>
						</div>
				</section>
				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->
			
	<?php //do_action('position_archive_action'); ?>
	

<?php get_footer(); ?>
