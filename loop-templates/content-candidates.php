<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content">


		<?php		
		the_content();
		do_action("candidates_post_content_actions");
		?>
		
	</div><!-- .entry-content -->
			
</article><!-- #post-## -->
