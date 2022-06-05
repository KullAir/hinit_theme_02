<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
		<header>
			<a class="skip-link sr-only sr-only-focusable" href="#main-menu"><?php esc_html_e( 'Skip to main menu', 'hinit' ); ?></a>
			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'hinit' ); ?></a>
			<a class="skip-link sr-only sr-only-focusable" href="<?php echo home_url(); ?>/accessibility" ><?php esc_html_e(  'הצהרת נגישות', 'hinit' ); ?></a>
		

			<?php if ( 'container' == $container ) : ?>
				<div class="container">
			<?php endif; ?>

					<div class="header-top">

						<!-- Your site title as branding in the menu -->
						<div class = "navbar-brand-wrap">
							<?php if ( ! has_custom_logo() ) { ?>

								<?php if ( is_front_page() && is_home() ) : ?>

									<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

								<?php else : ?>

									<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

								<?php endif; ?>


							<?php } else {
								the_custom_logo();
							} ?><!-- end custom logo -->
						</div>

						<div class="call-us-div">
							<div id="header-text-wrap">
									<a href="tel:+972-52-3689661">
										<span class="pre-number"> <?php  echo __('התקשרו אלי, אשמח לעזור','hinit' ); ?></span>
										<span class="number">052-3689661</span>
									</a>
							</div>
						</div>

					</div>
				<?php if ( 'container' == $container ) : ?>
				</div><!-- .container -->
				<?php endif; ?>
				<nav class="navbar navbar-expand-md navbar-light ">
				<?php if ( 'container' == $container ) : ?>
						<div class="container">
					<?php endif; ?>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'hinit' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
					
				<?php if ( 'container' == $container ) : ?>
				</div><!-- .container -->
				<?php endif; ?>
				</nav><!-- .site-navigation -->

		
		</header>
	</div><!-- #wrapper-navbar end -->
