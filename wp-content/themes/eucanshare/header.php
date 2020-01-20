<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fdg
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	
	<!-- 	favicon 	-->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri() ?>/img/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/img/favicon/safari-pinned-tab.svg" color="#00738c">
	<meta name="msapplication-TileColor" content="#00738c">
	<meta name="theme-color" content="#ffffff">
	<!-- 	favicon 	-->
	
	<!-- 	Open Graph 	-->
	<meta property="og:title" content="euCanSHare">
	<meta property="og:image" content="<?php echo get_template_directory_uri() ?>/img/og-eucanshare-logo.png">
	<meta property="og:site_name" content="euCanSHare data portal">
	<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>" />
	<meta property="og:description" content="An EU-Canada joint infrastructure for next-generation multi-Study Heart research">
	<!-- 	Open Graph 	-->
		
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="breakpage">
		<div class="top-gradient"></div>

		<div class="wrapper cf">
			<div class="site-branding">
				<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
			</div>

			<!-- Login/Logout section -->

			<div style="margin: 1em 0;">

				<?php if (! is_user_logged_in()) : ?>
					<?php echo do_shortcode("[openid_connect_generic_login_button]"); ?>
					<!-- <a class="oidc-button" style="margin: 1em 0;" href="https://inb.bsc.es/auth/realms/euCanSHare/protocol/openid-connect/logout?redirect_uri=https://eucanshare.bsc.es" rel="home"> Register - Login </a> --> 
				<?php endif;?>

				<?php if (is_user_logged_in()) : ?>
					<div style="display: inline-block; margin: 1em 0;">
						<?php global $current_user; get_currentuserinfo(); ?>
							<strong> <span style="color: #005076;">	Welcome, <?php echo $current_user->user_firstname; ?> ! </span> </strong>
							<a class="oidc-button" href="<?php echo wp_logout_url(get_permalink()); ?>">Logout</a>
					</div>
				<?php endif;?>

				<!--<a class="oidc-button" href="https://inb.bsc.es/auth/realms/euCanSHare/protocol/openid-connect/logout?redirect_uri=https://eucanshare.bsc.es" rel="home"> Logout </a> -->

				<!-- <a class="oidc-button" style="margin: 1em 0;" href="https://inb.bsc.es/auth/realms/euCanSHare/protocol/openid-connect/logout?redirect_uri=https://eucanshare.bsc.es" rel="home"> Register </a> -->

			</div>

			<nav id="site-navigation" class="main-navigation"> 
			<!--<?php echo wp_nav_menu('eucanshare' )?>-->
				<a class="menu-news" href="<?php echo home_url('/')?>">HOME</a>
				<a class="menu-news" target="blank" href="http://eucanshare.eu">EUCANSHARE PROJECT</a>
				<a class="menu-news <?php if (is_page('598')) {echo 'selected';}?> " href="<?php echo get_page_link(598) ?>">DATA CATALOGUE</a>
				<a class="menu-news <?php if (is_page('603')) {echo 'selected';}?> " href="<?php echo get_page_link(603) ?>">DATA ACCESS</a>
				<a class="menu-news <?php if (is_page('1044')) {echo 'selected';}?> " href="<?php echo get_page_link(1044) ?>">DATA ANALYSIS</a>
				<a class="menu-news <?php if (is_page('1307')) {echo 'selected';}?> " href="<?php echo get_page_link(1307) ?>"> COHORTS MGT.</a>
				<a class="menu-news <?php if (is_page('1268')) {echo 'selected';}?> " href="<?php echo get_page_link(1268) ?>">My Workspace</a>			
				<a class="menu-news <?php if (is_page('629')) {echo 'selected';}?> " href="<?php echo get_page_link(629) ?>">DOCUMENTATION</a>
				<!--<a clhss="menu-contatti last <?php if (is_page('608')){ echo 'selected';}?>"  href="<?php echo get_page_link(608) ?>" >SUPPORT</a>-->
			</nav>
			<div id="menu"></div>
		</div>			
</header><!-- #head -->

	<?php if(is_page('Project')) { ?>
		<?php get_template_part("inc/submenu"); ?>
	<?php } ?>



	<div id="main-content">
		
<div class="social-bar cf">
	<ul class='social'>
	  <li style="margin:0">
	    <a href="https://twitter.com/euCanSHare" target="_blank" class="fab fa-twitter">    
	      <span>Twitter</span>
	    </a> 
	  </li>
	  
	  <li style="margin:0">
	    <a href="https://www.facebook.com/euCanSHare" target="_blank" class="fab fa-facebook-f">
	      <span>Facebook</span>
	    </a>
	  </li>
	  
	    <li style="margin:0">
	    <a href="https://www.linkedin.com/company/eucanshare/about/" target="_blank" class="fab fa-linkedin">
	      <span>Linkedin</span>
	    </a>
	  </li>
	  
	  <li style="margin:0">
	    <a href="https://www.researchgate.net/project/euCanSHare" target="_blank" class="fab rg">
	      <span>ResearchGate</span>
	    </a>
	  </li>
	  
	  <li style="margin:0">
	    <a href="https://zenodo.org/communities/eucanshare" target="_blank" class="fab zenodo">
	    <span>Zenodo</span>
	    </a> 
	  </li>
	  
	</ul>
</div>
