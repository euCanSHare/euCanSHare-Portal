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

<div id="home">
  <div class="container-fluid" style="padding: 0;">
    <div class="row home-col-content">
      <div class="d-lg-flex mx-auto">
        <div class="col-lg-8 pl-3 pr-3 pb-5 align-self-center">
          <h1> <span style="color: #b61f34"> Data </span> <span style="color: #005076"> Portal </span> </h1>
          <br/>
          <div class="fonts">
            <div class="sm-hide-text">
              <h4> euCanSHare computational environment for next-generation multi-Study Heart research. </h4>
              <br/>
            </div>
            <p> Data Portal integrates data management and analysis tools from several sources with both technological and geographical diversity. 
                It offers: 
            </p>
            <div class="content">
              <ul class="disc-list"> 
                <li> Access to cohort data and metadata (Data Catalogue module). </li>
                <li> Administration of data access policies and credentials to gain access to privileged data (Data Access module). </li>
                <li> A collection of bioimaging data analysis, cohort’s harmonization services and other tools (Data Analysis module). </li>
              </ul>   
            </div>
          </div>
        </div>
          <!-- <div class="col-4 home-col-content inner-box-home-img text-center"> -->
        <div class="col-lg-4 text-center inner-box-col-img pr-3 align-self-center">
          <img src="/dataportal/wp-content/uploads/2019/11/portal_home.png">
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row mt-5 pl-3 pr-3" style="background-color: #f9f9f9;">
        <div class="col-10"> 
          <div class="cards-header">
            <h3> <img src="/dataportal/wp-content/uploads/2019/11/portal-home_db_icon_transparent.png"> 
                  <span style="color: #005076"> Data Catalogue <span> </h3>
          </div>
          <p>Cohort Browser and Catalogue support data discovery, providing detailed information on data assets and 
              characteristics such as key variables, access policies and harmonisation status across cohorts. </p>  
          <a style="color: #005076;" href="<?= get_page_link(598)?>"> Read more...</a>
        </div> 
        <div class="col-2 text-center align-self-center">
          <a class="button-go" target="blank" href="https://studies.eucanshare.bsc.es"> GO </a>  
        </div>
      </div>

      <div class="row mt-2 pl-3 pr-3" style="background-color: #f9f9f9;">
        <div class="col-10">
          <div class="cards-header">
            <h3> <img src="/dataportal/wp-content/uploads/2019/11/portal-home_security_icon_transparent.png"> 
                  <span style="color: #005076"> Data Access <span> </h3>
          </div>
          <p> euCanSHare Access Manager will provide support for managing data access credentials. 
              The access manager should provide a working environment either for researchers applying for data access and data managers responsible for evaluating such applications.</p>
          <a style="color: #005076;" href="<?= get_page_link(603)?>">Read more...</a>
        </div>
        <div class="col-2 text-center align-self-center">
          <a class="button-go" target="blank" href=""> GO </a>
        </div>
      </div>

      <div class="row mt-2 pl-3 pr-3 pb-5" style="background-color: #f9f9f9;">
        <div class="col-10">
          <div class="cards-header">
            <h3> <img src="/dataportal/wp-content/uploads/2019/11/portal-home_analysis_icon.png"> 
                  <span style="color: #005076"> Data Analysis <span> </h3>
          </div>
          <p> euCanSHare Virtual Research Environment (VRE) will be the central workspace for authenticated users. For each user’s role, a specific workspace will be provided.</p>
          <a style="color: #005076;" href="<?= get_page_link(1044)?>"> Read more...</a>
        </div>
        <div class="col-2 text-center align-self-center">
          <a class="button-go" target="blank" href="https://vre.eucanshare.bsc.es"> GO </a>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid" style="padding:0">
    <div class="breakpage quick-contact">
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
			    <div class="content"> <a href="mailto:support_eucanshare@bsc.es">support_eucanshare@bsc.es</a></div>
		    </div>	
	    </div>
    </div>	

    <?php  include("inc/slider_clienti.php"); ?>
	
    <div class="breakpage rss-container">
  	  <div class="wrapper cf">
	  	  <div class="title">EC EUROPA</div>
		      <?php echo t5_feed_shortcode($attrs); ?>
	    </div>
    </div>	

    <div class="breakpage">
	    <div class="wrapper">
		    <div class="banner europe"><p>This project has received funding from the European Union's Horizon 2020 research and innovation programme under grant agreement No 825903</p></div>
		    <div class="banner canada"><p>All Canadian project partners have been funded by the Canadian Institutes of Health Research and the Fonds de recherche du Québec- Santé</p></div>
	    </div>
    </div>
  </div>	
</div>

<?php get_footer(); ?>
      

