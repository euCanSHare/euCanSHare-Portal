<?php
/**
 *  Template Name: Cohorts MGT
 */

?>

<?php get_header();?>
    <section id="" class=" page-default single">
	    <div class="item-img cover cover-center primary-image " style="height:100px;background-image:url(<?php echo  the_post_thumbnail_url('large');  ?>)"></div>
            <div class="content-overlap">
                <div style="margin-left:100px; margin-right:50px">
                    <div class="wrapper ">
                        <h2 class="section-title"><?php the_title();?></h2>
                        <p> This section provides links for data management resources in the euCanSHare platform. </p>
                        <p> Users registered and logged in euCanSHare are allowed to ask for granted privileges in Opal and/or Mica. </p> 
                        <p> Either registered and non-registered users can access to the public cohorts viewer. (Studies) </p>
                        <br>
                        <div class="container">
                            <div class="row">
                                <!-- <div class="col-6 text-center">
                                    <a aria-label="Access Mica" class="button-link" href="https://mica.eucanshare.bsc.es/" target="_blank"> Access Mica</a>
                                </div> -->
                                <div class="col-12 text-center">
                                    <a aria-label="Request access to Opal" class="button-link" href="<?php echo get_page_link(1319) ?>" target="_blank"> Request data manager access </a>
                                </div>
                            </div>
                        </div>
                        <br>
	                </div>
                </div> 
            </div> 
        </div> 
    </section>

<?php get_footer();?>