<?php
/**
 *  Template Name: Analysis
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
                                            <p>euCanSHare <strong>Virtual Research Environment (VRE) </strong>will be  the central workspace for authenticated users.&nbsp; For each user’s role, a specific workspace will be provided. </p>
                                            <p>The workspace will combine analysis tools, data visualization, management tools, and access to the granted data.</p>
                                            <p><strong>Programmatic Access</strong> to the infrastructure will allow to generate large scale analysis and eventually interface the infrastructure with external workflow managers.</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <a aria-label="Access iPC VRE (opens in a new tab)" class="button-link" href="https://vre.eucanshare.bsc.es/vre/login.php" target="_blank">Access euCanSHare VRE</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="inner-box-col-img">
                                        <img src="<?php echo get_template_directory_uri() ?>/img/figure2.png" alt="">
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