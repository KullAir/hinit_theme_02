<?php
/**
 * Template Name: Homepage
 *
 * Template for displaying Homepage.
 *
 * @package understrap
 */

get_header();

?>

<div class="wrapper" id="full-width-page-wrapper">
	<div  id="content">

		<div class="hebo grad-after" id="hebo">
			<div class="post-thumb-wrap" arie-hidden="true">
					<?php  echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
			</div>
			
			<?php do_action("homepage_hebo_actions"); ?>
			
			
		</div>
		<div class="content-area" id="primary" >
			<?php do_action("homepage_pre_content_actions"); ?>
		
			<div class="container-fluid main-container" >
				<div class="row "><!-- .row end -->
						
					<div class="col-lg-7" >

						<main class="site-main" id="main" role="main">
							
						
							<?php while ( have_posts() ) : the_post(); ?>

								<?php  get_template_part( 'loop-templates/content', 'home' ); ?>

								<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :

									comments_template();

								endif;
								?>

							<?php endwhile; // end of the loop. ?>
							
							

						</main><!-- #main -->
					</div><!-- col-md-12 end -->
					<div class="col-lg-5 content-deco-img-wrap"  >
						<?php do_action("homepage_content_deco_actions"); ?>
					</div>

				</div><!-- .row end -->
			
			</div><!-- Container end -->	
						
		<?php do_action("homepage_actions"); ?>
	</div><!--content end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>
<!--- /div><skrollr-wrapper end -->
