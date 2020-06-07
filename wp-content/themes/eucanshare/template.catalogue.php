<?php
/**
 *  Template Name: Catalogue
 */

?>

<?php get_header();?>

    <div class="container">
        <h2 class="section-title"><?php the_title();?></h2>
            <!-- <p> <img src="/dataportal/wp-content/uploads/2019/11/development.png" style="width: 275px; float: right;"> </p> -->
            <div class="row pl-3 pr-3 ml-2 inner-box-col-positioning">
                <h5 style="color: #445258;"> euCanSHare Catalogue is a discovery tool for cardiovascular research data. </h5>
                <p> It contains multi-level information about heart-related studies aggregating data from cohort-based studies with omics and bioimaging 
                    data repositories. </p>
                <p> Currently, euCanSHare data source include: </p>       
            </div>

            <div class="card mb-3 ml-3" style="max-width: 1200px; border: 1px solid #005076;">
                <div class="row no-gutters">
                    <div class="col-md-4 mt-1 align-self-center text-center">
                        <img src="/dataportal/wp-content/uploads/2019/11/COHORTS-ICON_resized.png">
                    </div>
                    <div class="col-md-8 text-sm-left text-center">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #b61f34; "> Cardiovascular Cohorts </h5>
                            <p class="card-text"> Data from EU and Canada. <a href="http://www.eucanshare.eu/platform/" target="_blank"> <span> <strong style="color: #005076;"> View the full list </strong></span> </a> </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 ml-3" style="max-width: 1200px; border: 1px solid #005076;">
                <div class="row no-gutters">
                    <div class="col-md-4 mt-1 align-self-center text-center">
                        <img src="/dataportal/wp-content/uploads/2019/11/ega_logo_resized.jpg">
                    </div>
                    <div class="col-md-8 text-sm-left text-center">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #b61f34"> European Genome Phenome Archive </h5>
                            <p class="card-text"> Omics data, including genomics (DNA), transcriptomics (RNA) and metabolomics. </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 ml-3" style="max-width: 1200px; border: 1px solid #005076;">
                <div class="row no-gutters">
                    <div class="col-md-4 mt-1 align-self-center text-center">
                        <img src="/dataportal/wp-content/uploads/2019/11/Euro-BioImaging_RZ_small_resized.jpg">
                    </div>
                    <div class="col-md-8 text-sm-left text-center">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #b61f34"> Euro-Bioimaging </h5>
                            <p class="card-text"> Cardiac imaging data from computed tomography (CT), echocardiography, magnetic resonance imaging (MRI), etc. </p>
                        </div>
                    </div>
                </div>
            </div>

            <br/>

            <div class="row">
                <div class="col-12 text-center">
                    <a aria-label="Access EUSH VRE (opens in a new tab)" class="button-link" href="https://studies.eucanshare.bsc.es/user/login?destination=node" target="_blank">Access euCanSHare catalogue</a>
                </div>
            </div>

            <?php get_template_part('includes/section', "content"); ?>
    </div>
<br>

<?php get_footer();?>



