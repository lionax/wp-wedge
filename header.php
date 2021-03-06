<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Wedge
 */
	$wedge_color = get_theme_mod( 'wedge_customizer_sidebar_color' );
	$wedge_featured_cat = get_theme_mod( 'wedge_featured_cat' );
	$logo_bg = get_theme_mod( 'wedge_customizer_logo_bg' );
	$logo = get_theme_mod( 'wedge_customizer_logo' );
	$hide_title = get_theme_mod( 'wedge_customizer_hide_title' );
	$hide_desc = get_theme_mod( 'wedge_customizer_hide_desc' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site container <?php echo $wedge_color ?>">

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wedge' ); ?></a>

	<!-- Get sidebar color option (Appearance -> Customize -> Theme Options) -->
	<?php
		
	?>
	<header id="masthead" class="site-header" role="banner">
		<!-- Tab navigation -->
		<ul class="toggle-bar" role="tablist">
			<!-- Main navigation -->
			<li id="panel-1" class="current" role="presentation">
				<a href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true" class="current nav-toggle" data-tab="tab-1"><i class="fa fa-bars"></i><span class="screen-reader-text"><?php _e( 'View menu', 'wedge' ); ?></span></a>
			</li>

			<!-- Featured Posts navigation -->
			<?php if( $wedge_featured_cat && $wedge_featured_cat !== '0' ) { ?>
				<li id="panel-2" role="presentation">
					<a href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false" data-tab="tab-2"><i class="fa fa-thumb-tack"></i><span class="screen-reader-text"><?php _e( 'View featured posts', 'wedge' ); ?></span></a>
				</li>
			<?php } ?>

			<!-- Sidebar widgets navigation -->
			<li id="panel-3" role="presentation">
				<a href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false" class="folder-toggle" data-tab="tab-3"><i class="fa fa-folder"></i><i class="fa fa-folder-open"></i><span class="screen-reader-text"><?php _e( 'View sidebar', 'wedge' ); ?></span></a>
			</li>

			<!-- Searchform -->
			<li id="panel-3" role="presentation">
				<a href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false" class="folder-toggle" data-tab="tab-4"><i class="fa fa-search"></i><span class="screen-reader-text"><?php _e( 'View Searchform', 'wedge' ); ?></span></a>
			</li>
		</ul>

		<div id="tabs" class="toggle-tabs">
			<div class="site-header-inside">
				<!-- Logo, description and main navigation -->
				<div id="tab-1" class="tab-content current fadeIn">
					
					<?php if ( ! empty( $logo_bg ) ) { ?>
						<div class="logo-bg" style="background: url(<?php echo esc_url( $logo_bg ); ?>)"></div>
					<?php } ?>
					
					<?php if ( ! empty( $logo ) ) {	?>
						<img class="site-logo" src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
					<?php } ?>
					
					<?php if ( !$hide_title || !$hide_desc ) { ?>
					<div class="site-branding">
						<!-- Get the site branding -->

						<?php if ( !$hide_title ) { ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php } ?>

						<?php if ( !$hide_desc ) { ?>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php } ?>

					</div>
					<?php } ?>

					<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #site-navigation -->

					<?php if ( has_nav_menu ( 'social' ) ) : ?>
						<?php wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) ); ?>
					<?php endif; ?>
				</div><!-- #tab-1 -->

				<?php
					$searchbar = get_theme_mod( 'wedge_customizer_sidebar_search' );
					if ( $searchbar ) 
					{
				?>
						<div id="tab-4" class="tab-content fadeIn">
							<div class="widget-area">
								<?php the_widget( 'WP_Widget_Search' ); ?>
							</div>
						</div>
				<?php
					} 
				?>

				<!-- Featured Posts template (template-featured-posts.php) -->
				<?php get_template_part( 'template-featured-posts' ); ?>

				<!-- Sidebar widgets -->
				<div id="tab-3" class="tab-content animated fadeIn" role="tabpanel" aria-labelledby="panel-3" aria-hidden="true">
					<?php get_sidebar(); ?>
				</div><!-- #tab-3 -->
			</div><!-- .site-header-inside -->
		</div><!-- #tabs -->
	</header><!-- #masthead -->

	<div id="content" class="site-content fadeInFast">
