<?php
/**
 * The header for our theme
 *
 * @package bladmineerders-fngl
 * @since version 0.75
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bladmineerders-fngl' ); ?></a>

	<div class="header-area-full"></div>
	<header id="masthead" class="header-area">

	<div class="site-branding">
			<img class="header-area-full-image" src="<?php echo get_template_directory_uri() ?>/assets/images/bladmineerders-header-image-v3c.png">
			<?php
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$bladmineerders_fngl_description = get_bloginfo( 'description', 'display' );
			if ( $bladmineerders_fngl_description || is_customize_preview() ) :
				?>
				<p class="site-description"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $bladmineerders_fngl_description; /* WPCS: xss ok. */ ?></a></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	</header><!-- .header-area -->
	<div class="header-area-full"></div>



	<?php 
		/* language switcher from plugin qTranslate and search field */
		get_template_part( "inc/language-search" ); 
	?>


	<div class="nav-area-full"></div>
	<div class="nav-area">

		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Main Menu', 'bladmineerders-fngl' ); ?>">
			<?php 
				/* actual WordPress menu navigation */
				wp_nav_menu( 
					array( 
						'theme_location' => 'primary',
						'container'      => '',
						'items_wrap' 	 => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
					) 
				); 
			?>
		</nav>

	</div><!-- nav-area -->

	<div class="nav-area-full"></div>


	<?php 
		/* breadcrumb navigation from plugin Breadcrumb NavXT */
		get_template_part( "inc/breadcrumb" ); 
	?>
