<?php
/**
 * Template Name: page-home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fdg
 */
 
get_header(); ?>

<!-- **************** SLIDER **************** -->
<div id="home">

  <?php//  include("inc/slideshow.php");  ?>
  <?php//  include("inc/slideshowMobile.php");  ?>
	<?php// get_template_part("inc/news"); ?>
	<?php//  include("inc/social.php"); ?>	
  <div class="page-content">
    <div style="width:45%;margin:50px; float:right"><img src="/dataportal/wp-content/uploads/2019/11/figure1.png" style="width:100%"></div> 
    <div style="padding-left:150px; padding-top:50px">
      <h1>Welcome to euCanSHare Data portal</h1>
      <p>&nbsp;</p>
      <p>euCanSHare data portal provides access to data catalogues, data access policies, analysis
results, and a virtual environment to perform analysis on the data under the appropriate security conditions.</p>
      <p>euCanSHare
 computational environment integrates data, tools and solutions from several sources
with both technological and geographical diversity. The portal
offers access to the different aspects of the project: i) access to cohort data, and metadata (Data
Catalogue module), ii) access to data access policies, and facilitation of the procedures for gaining access privileges
(Data Access module), and iii) access to a data analysis layer honouring the appropriate security regulations, and
data access privileges (Data Analysis module).
</p>
      <div style="clear:both"></div>
      <div class="homeblock">
      <div class="homeblock-inner">
      <h2 class="section-title">Data Catalogue</h2>
      <p>Cohort Browser and Catalogue support data discovery, providing detailed information on data assets and characteristics such as key variables, access policies and harmonisation status across cohorts. <br> <a href="<?= get_page_link(598)?>">Read more...</a></p>
      </div>
      <p><a class="button-link" target="blank" href="https://studies.eucanshare.bsc.es">Enter Data Catalogue</a></p>
      </div>
      <div class="homeblock">
      <div class="homeblock-inner">
      <h2 class="section-title">Data Access</h2>
      <p>euCanSHare Access Manager will provide support for managing data access credentials. The access manager should provide a working environment for i) researchers applying for data access and ii) data managers responsible for evaluating such applications.<br> <a href="<?= get_page_link(603)?>">Read more...</a></p>
      
<h4>My data access applications</h4>
<form name="access" action="https://eucanshare.bsc.es/dataportal">
<input type="hidden" name="page_id" value="1184">
<select name="dataset_id">
<option value="#">Select dataset ...</option>
<option value="EGAD0001000309">EGAD0001000309</option>
</select>
</div>
<p><input type="submit" class="button-link" value="Enter Access Manager"></p>
</form>
<!--      <p><a class="button-link" target="blank" href="<?= get_page_link(603)?>">Enter Access Manager</a></p>-->
      </div>
      <div class="homeblock">
      <div class="homeblock-inner">
      <h2 class="section-title">Data analysis</h2>
      <p>euCanSHare Virtual Research Environment (VRE) will be the central workspace for authenticated users.  For each user’s role, a specific workspace will be provided.
<br> <a href="<?= get_page_link(1044)?>">Read more...</a></p>
      </div>
      <p><a class="button-link" target="blank" href="https://vre.eucanshare.bsc.es">Enter VRE</a></p>
      </div>
      <div style="clear:both"></div>
    </div>
  </div>
  <section class="breakpage quick-contact">
	<div class="wrapper cf">
		
		<div class="item">
			<i class="far fa-address-card "></i>
			<div class="content"><b>Universitat de Barcelona</b><br>Gran Via de les Corts Catalanes, 585<br>08007 Barcelona, Spain</div>
		</div>

		<div class="item">
			<i class="fas fa-phone"></i>
			<div class="content">+34 93402</div>
		</div>

		<div class="item">
			<i class="fas fa-envelope-open-text"></i>
			<div class="content"> <a href="mailto:info@eucanshare.eu">info@eucanshare.eu</a></div>
		</div>
		
	</div>
</section>	

<?php  include("inc/slider_clienti.php"); ?>
	

<section class="breakpage rss-container">
	<div class="wrapper cf">
		<div class="title">EC EUROPA</div>
		<?php echo t5_feed_shortcode($attrs); ?>
	</div>
</section>	



<section class="breakpage">
	<div class="wrapper">
		<div class="banner europe"><p>This project has received funding from the European Union's Horizon 2020 research and innovation programme under grant agreement No 825903</p></div>
		<div class="banner canada"><p>All Canadian project partners have been funded by the Canadian Institutes of Health Research and the Fonds de recherche du Québec- Santé</p></div>
	</div>
</section>	

</div>

<?php get_footer(); ?>
