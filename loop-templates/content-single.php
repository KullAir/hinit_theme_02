<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
	
	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	

	</header><!-- .entry-header -->



	<div class="entry-content">

		<?php /* if ( has_post_thumbnail() ): ?>
			<div class="iamge-wrap">
		
				<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

			</div>
		
		<?php endif;*/ ?>
		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->	

		<?php the_content(); ?>

		<?php social_div()?>

		<?php
		
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'hinit' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
