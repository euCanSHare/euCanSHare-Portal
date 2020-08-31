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

<header class="breakpage bottom-line">
		<div class="top-gradient"></div>

		<div class="wrapper cf">
			<div class="site-branding">
				<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
			</div>

			<div id="menu"> </div>

		</div>	

		<div class="main-navigation">
			<a href="<?php echo home_url('/')?>">HOME</a>
			<a target="blank" href="http://eucanshare.eu">PROJECT</a>
			<a <?php if (is_page('598')) {echo 'selected';}?> " href="<?php echo get_page_link(598) ?>">DATA CATALOGUE</a>
			<a <?php if (is_page('603')) {echo 'selected';}?> " href="<?php echo get_page_link(603) ?>">DATA ACCESS</a>
			<a <?php if (is_page('1044')) {echo 'selected';}?> " href="<?php echo get_page_link(1044) ?>">DATA ANALYSIS</a>
			<a <?php if (is_page('1307')) {echo 'selected';}?> " href="<?php echo get_page_link(1307) ?>">COHORTS MGT.</a>		
  			<div class="dropdown">
    			<div class="dropbtn"> SUPPORT 
      				<i class="fa fa-caret-down"></i>
    			</div>
    			<div class="dropdown-content">
					<a <?php if (is_page('629')) {echo 'selected';}?> " href="<?php echo get_page_link(629) ?>">DOCUMENTATION</a> 
					<a <?php if (is_page('1480')) {echo 'selected';}?> " href="<?php echo get_page_link(1480) ?>">HELPDESK</a> 
					<a <?php if (is_page('1476')) {echo 'selected';}?> " href="<?php echo get_page_link(1476) ?>">GIVE US FEEDBACK </a> 
    			</div>
			</div> 
			<?php if (! is_user_logged_in()) : ?>
					<?php echo do_shortcode("[openid_connect_generic_login_button]"); ?>
			<?php endif;?>
			<?php if (is_user_logged_in()) : ?>
				<div class="dropdown">
    				<div class="dropbtn"> 
						<?php
							$current_user = wp_get_current_user();
							echo $current_user->display_name ?>
      					<i class="fa fa-caret-down"></i>
    				</div>
    				<div class="dropdown-content">
						<a class="logout-positioning" href="<?php echo wp_logout_url(get_permalink()); ?>">Logout</a>
    				</div>
				</div> 
			<?php endif;?>	
		</div>
	
</header>

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
