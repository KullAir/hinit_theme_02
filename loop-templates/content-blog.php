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
			
			<a href="<?php the_permalink(); ?>" class="img-link" aria-hidden="true" tabindex="-1" >
				<?php  if ( has_post_thumbnail() ) { ?>

						<?php echo get_the_post_thumbnail( $post->ID, 'medium_large' ); ?>
											
				<?php }else { ?>
						<img src="<?php  echo get_stylesheet_directory_uri(). '/img/placeholder.gif'; ?>"  alt="<?php echo get_the_title(); ?>" />
				<?php } ?>
			</a> 
		</div>
		<div class="col">
			<div class="entery-inner">
				<header class="entry-header">

					<?php
					the_title(
						sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
						'</a></h2>'
					);
					?>

					<?php if ( 'post' == get_post_type() ) : ?>

						<div class="entry-meta">
							<?php understrap_posted_on(); ?>
						</div><!-- .entry-meta -->

					<?php endif; ?>

				</header><!-- .entry-header -->
				<div class="entry-content">

					<?php the_excerpt(); ?>

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
