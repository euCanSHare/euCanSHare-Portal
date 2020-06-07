<?php
/**
 *  Template Name: Cohorts MGT
 */

?>

<?php get_header();?>
    <div class="container">
        <h2 class="section-title"><?php the_title();?></h2>     
        <div class="row pl-3 pr-3 ml-2 mt-4">    
            <?php if ( is_user_logged_in() ) : ?> 
                <div class="row">
                    <p> These are the main data management tools of the euCanSHare's platform: </p>
                    <div class="col-12 mt-3 pl-3 pr-3" style="background-color: #f9f9f9;">
                        <div class="row" style="background-color: #f9f9f9;">
                            <div class="col-10"> 
                                <div class="cards-header">
                                    <h5> <span style="color: #005076"> euCanSHare Mica <span> </h5>
                                </div>
                                <p> Portal to control published content of the euCanSHare Catalogue. </p>  
                            </div> 
                            <div class="col-2 text-center align-self-center">
                                <a class="button-go" target="blank" href="https://mica.eucanshare.bsc.es"> GO </a>  
                            </div>
                        </div>
                        <div class="row mt-5 mb-5" style="background-color: #f9f9f9;">
                            <div class="col-10"> 
                                <div class="cards-header">
                                    <h5> <span style="color: #005076"> Central Opal <span> </h5>
                                </div>
                                <p> Data warehouse where to import, transform and describe cohorts data. </p>  
                            </div> 
                            <div class="col-2 text-center align-self-center">
                                <a class="button-go" target="blank" href="https://opal.eucanshare.bsc.es"> GO </a>  
                            </div>
                        </div>
                    </div>
                    <p> If you require extra privileges to update the content of the data catalogue, request here the right permissions for the management tools: </p>
                    <div class="col-12 mt-3 mb-4 text-center">
                        <a aria-label="Request access to Opal" class="button-link" href="<?php echo get_page_link(1319) ?>" target="_blank"> Request data manager access </a>
                    </div>
                </div>
            <?php endif;?>

            <?php if ( ! is_user_logged_in()) : ?>
                <h5 style="color: #445258"> Please, bear in mind that only registered euCanSHare users are allowed to manage euCanSHare datasets and cohort studies. </h5>
                <div style="margin-top: 25px; margin-bottom: 25px;">
                    <p> You can always access to the <span> <a style="color: #005076;" href='https://eucanshare.bsc.es/platform/?page_id=598'> public cohorts viewer. </a> </span> </p>
                </div>
            <?php endif;?>

        </div>
	</div>

<?php get_footer();?>