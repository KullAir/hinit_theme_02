<?php
/**
 * Template Name: About page
 *
 * Template for displaying Homepage.
 *
 * @package understrap
 */

get_header();

?>

<div class="wrapper" id="full-width-page-wrapper">
	<div  id="content">
		<div class="content-area" id="primary" >
			<?php// do_action("candidates_pre_content_actions"); ?>
			<div class="container main-container" >
				<div class="row"><!-- .row end -->
						
					<div class="col-md-8" >
						<div class="page-title-wrap">
							<?php  the_title( '<h1 class="entry-title ">', '</h1>' ); ?>
						</div>

						<main class="site-main" id="main" role="main">
							
						
							<?php while ( have_posts() ) : the_post(); ?>

								<?php  get_template_part( 'loop-templates/content', 'about' ); ?>

								<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :

									comments_template();

								endif;
								?>

							<?php endwhile; // end of the loop. ?>
							
							

						</main><!-- #main -->
					</div><!-- col-md-12 end -->

				</div><!-- .row end -->
			
			</div><!-- Container end -->	
						
		<?php do_action("about_page_actions"); ?>
	</div><!--content end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>
<!--- /div><skrollr-wrapper end -->
