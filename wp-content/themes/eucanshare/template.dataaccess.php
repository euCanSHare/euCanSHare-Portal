<?php
/**
 *  Template Name: Data Access
 */

?>

<?php get_header();?>
    <div class="container">
        <h2 class="section-title"><?php the_title();?></h2>
        <div class="row pl-3 pr-3 ml-2 mt-4">
            <div class="col-12-sm-md-lg">
                <p> euCanSHare <strong>Access Manager </strong> is going to be the central euCanSHare service to administrate data access credentials. 
                    The access manager will provide a working environment where: </p>

                <ul class="disc-list">
                    <li> Researchers will apply for dataset access.</li>
                    <li> Data providers will evaluate researcher’s petitions and administrate their authorization profile. </li>
                </ul>

                <p> Researchers should have access to their applications for data access, follow their state, communicate with the Data Access Committees, 
                    and eventually obtain the access credentials and data.</p>
                <p> Data managers will manage the received applications, and eventually grant or revoke credentials as desired.</p>
                <p> euCanSHare Access Manager will implement the necessary infrastructure for automatic granting procedures, and interface with the Smart 
                    Contracts prototype.</p>

                <!--
                <h3> My data access applications </h3> 

                <p> For a new data access application select desired datasets from the <a href="https://studies.eucanshare.bsc.es/"> Data Catalogue </a> </p>

                <form name="access" action="https://eucanshare.bsc.es/dataportal">

                    <input type="hidden" name="page_id" value="1184">

                    <div class="row">

                        <div class="col-12-sm-md-lg">

                            <select name="dataset_id" style="height: 105%;">

                                <option value="#"> Select dataset... </option>

                                <option value="EGAD0001000309"> EGAD0001000309 </option>

                            </select>

                            <input type="submit" class="button-link" value="Enter Access Manager">

                        </div>

                    </div>
                                    
                </form>  
                                -->  
            </div>

            <?php get_template_part('includes/section', "content"); ?> 
        </div>
    </div>

<br>

<?php get_footer();?>
