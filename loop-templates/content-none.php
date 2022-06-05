<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="no-results not-found">

	<header class="page-header">

		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'hinit' ); ?></h1>

	</header><!-- .page-header -->

	<div class="page-content">

		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'hinit' ), array(
	'a' => array(
		'href' => array(),
	),
) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>
			
			<div class="container">
					
				<div class ="row">

					<div class="col-md-12">
							<p  class="h3"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'hinit' ); ?></p>
							<?php
								//get_search_form();


						//else : ?>
					</div>
				</div>
			</div>
			<?php do_action("error_page_actions"); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hinit' ); ?></p>
			<?php
				get_search_form();
		endif; ?>
	</div><!-- .page-content -->

</section><!-- .no-results -->
