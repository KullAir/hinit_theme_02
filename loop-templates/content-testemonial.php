<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('container'); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<div class="col-lg-4 ">
			
			<div class="img-link" aria-hidden="true" tabindex="-1" >
				<?php  if ( has_post_thumbnail() ) { ?>

						<?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>
											
				<?php }else { ?>
						<img src="<?php  echo get_stylesheet_directory_uri(). '/img/placeholder-testi.gif'; ?>"  alt="<?php echo get_the_title(); ?>" />
				<?php } ?>
				</div> 
		</div>
		<div class="col">
			<div class="entery-inner">
				<header class="entry-header">

					<?php
					the_title('<h2 class="sr-only">','</h2>');
					?>

				</header><!-- .entry-header -->
				<div class="entry-content">

					<?php the_content(); ?>
					<?php
						the_title('<div class="testi-name" aria-hidden="true">','</div>');
						
					?>

					<?php
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'hinit' ),
							'after'  => '</div>',
						)
					);
					?>

				</div><!-- .entry-content -->


			</div><!-- entery-inner -->
		
		</div>
	</div>	
</article><!-- #post-## -->
