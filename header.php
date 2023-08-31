<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quickland
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<style>
		/* Optional: Style the logo and menu separately */
		.site-branding img {
			max-width: 100px; /* Adjust the maximum width of the logo */
			height: auto;
		}

		.primary-menu {
			display: flex;
			align-items: flex-end;
			flex-wrap: nowrap;
			flex-direction: row;
			align-content: center;
			justify-content: flex-end;
			list-style: none;
			margin: 0;
			padding: 0;
		}
	</style>
</head>

<body <?php body_class(); ?>>
	<div id="loader-wrapper">
		<h3>Loading</h3>
		<div id="loader-bar"></div>
	</div>
	<?php wp_body_open(); ?>
	<div>
		<div id="page" class="site">
			<header id="masthead" class="site-header">
				<div class="header-content">
					<div class="site-branding">
						<?php the_custom_logo(); ?>
					</div>
					
					<nav id="site-navigation" class="main-navigation">
						<div id="hamburger" class="pointer ham">
							<svg id="open" xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 38 26" fill="none">
								<rect width="38" height="6" fill="#272838"/>
								<path d="M0 20H38V26H0V20Z" fill="#272838"/>
								<rect y="10" width="38" height="6" fill="#272838"/>
							</svg>
							<svg id="close" xmlns="http://www.w3.org/2000/svg" width="26" height="22" viewBox="0 0 32 32" fill="none">
							<rect y="26.8701" width="38" height="6" transform="rotate(-45 0 26.8701)" fill="#272838"/>
							<path d="M4.24268 0L31.1127 26.8701L26.8701 31.1127L3.51667e-05 4.24264L4.24268 0Z" fill="#272838"/>
						</svg>
						</div>
						<?php
						class My_Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
							public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
								// Get the custom class added to the menu item
								$custom_classes = implode(' ', $item->classes);
						
								// Check if the custom class starts with 'menu-scroll-'
								if (strpos($custom_classes, 'menu-scroll-') === 0) {
									// Get the section ID from the custom class
									$section_id = str_replace('menu-scroll-', '', $custom_classes);
						
									// Add a link with smooth scrolling to the section
									$output .= '<a href="#' . esc_attr($section_id) . '">' . esc_html($item->title) . '</a>';
								} else {
									// If there's no custom class, treat it as a regular menu item
									$output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
								}
							}
						}
						?>
						<div>
						
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_class'     => 'primary-menu', // Add a custom class for styling
									'walker'         => new My_Custom_Walker_Nav_Menu(),
								)
							);
							?>
						</div>

					</nav><!-- #site-navigation -->
				</div>
			</header><!-- #masthead -->
