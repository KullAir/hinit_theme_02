<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="search-wrapper">

	
	<div class="" id="content" tabindex="-1">

		<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">

							<h1 class="page-title">
								<?php

								$search_title=get_search_query();

								if( $search_title){
									printf(
										/* translators: %s: query term */
										esc_html__( 'Search Results for: %s', 'hinit' ),
										'<span>' . get_search_query() . '</span>'
									);

								}else{
									echo __('Search Results', 'hinit');
								}

							
								?>
							</h1>
							
					</header><!-- .page-header -->
					<section id="">
						<div class="container">
					
							<div class ="row">

								<?php /* Start the Loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>

									<?php
									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */

									if( get_post_type() == "position"){
										get_template_part( 'loop-templates/content', 'position' );
									}else{
										get_template_part( 'loop-templates/content', 'blog' );
									}

									//get_template_part( 'loop-templates/content', 'search' );
									?>

								<?php endwhile; ?>

							

						

								<!-- The pagination component -->
								<?php understrap_pagination(); ?>

			
							</div><!-- .row -->

						</div>
					</section>
				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

		</main><!-- #main -->

	</div><!-- #content -->

</div><!-- #search-wrapper -->
<?php do_action('position_archive_action'); ?>

<?php get_footer(); ?>
