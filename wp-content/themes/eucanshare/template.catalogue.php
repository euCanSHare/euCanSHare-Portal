<?php
/**
 *  Template Name: Catalogue
 */

?>

<?php get_header();?>

<section id="" class="page-default single">
	    <div class="item-img cover cover-center primary-image" style="height:100px;background-image:url(<?php echo  the_post_thumbnail_url('large');  ?>)"></div>
            <div class="content-overlap">
                    <div class="wrapper ">
                        <div class="container">
                            <h2 class="section-title"><?php the_title();?></h2>
                            <div class="row inner-box-col">
                                <div class="col-lg-4 inner-box-col-content">
                                    <div class="row">
                                        <p> <strong> euCanSHare Catalogue </strong> builds on the metadata provided by project’s data repositories. 
                                        These include the participating data cohorts, as EGA archive. Cohorts data could is managed by OBiBa software stack. 
                                        Basic access to the Data Catalogue would be public, but controlled access can be also enabled to provide more detailed information. </p>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <a aria-label="Access iPC VRE (opens in a new tab)" class="button-link" href="https://studies.eucanshare.bsc.es" target="_blank">Access euCanSHare catalogue</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="inner-box-col-img">
                                        <img src="<?php echo get_template_directory_uri() ?>/img/figure3.png" alt="">
                                    </div>
                                </div>

                                <?php get_template_part('includes/section', "content"); ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
</section>

<br>

<?php get_footer();?>