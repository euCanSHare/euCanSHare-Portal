<?php 
/***
Template Name: Login
***/
?>

<?php get_header(); ?>

    <div class="container">
                    
        <h2 class="section-title"><?php the_title();?></h2>

        <div class="row inner-box-col-positioning">
            <div class="col-12 mt-2">         
                <p> <strong> After registration, you are able to sign-in to all EuCanSHare services with your new credentials. </strong> </p>
                <p> Logging to the data portal by clicking  the <i>"Login"</i> button on the top navigation bar. 
                    Once in there, the <i>"Log out"</i> button will appear. </p>
                <div>
                    <img src="/platform/wp-content/uploads/2019/11/login_1.png" style="width: 90%; height: 90%; border: 1px solid lightgrey;">
                </div>
                <br/>
            </div>
        </div>

        <div class="row inner-box-col-positioning">  
            <div class="col-12">        
                <h5>Login to the Analysis platform</h5>
                <br/>
                <p> <strong> Although EuCanSHare services automatically authenticate you, on a <i>first login</i> each application might require extra information on the new account - like acceptance of terms of use, 
                    membership joining, extra personal data details. </strong> <p>
                <p>For instance, when first accessing to the analysis platform at <i>"Data Analysis"</i> &rarr; <i>"Access"</i>, 
                   the Virtual Research Environment will demand the following information: </p>
                <div>
                    <img src="/platform/wp-content/uploads/2019/11/login_vre_1.png" style="width: 90%; height: 90%; border: 0.5px solid lightgrey; margin: 10px;">
                </div>
                <br/>
                <h5> Login to oBiBa's services </h5>
                <br/>
                <h6> a. Login in Central Opal: </h5>
                    <ul class="disc-list">
                        <li> Go to the “Cohorts Mgt.” tab </li>
                        <li> Click "GO" in “Central Opal” section </li>
                        <li> Click “Sign in with Agate” </li>
                        <li> Click “Sign in with euCanSHare” → Click “Accept” </li>
                    </ul>
                <br/>
                <h6> b. Login in euCanSHare Mica: </h5>
                    <ul class="disc-list">
                        <li> Go to the “Cohorts Mgt.” tab </li>
                        <li> Click "GO" in “euCanSHare Mica” section </li>
                        <li> Click “Sign in with EuCanSHare” button </li>
                    </ul>
                <br/>
                <h6> c. Login in Data Catalogue: </h5>
                    <ul class="disc-list">
                        <li> Go to <i>“Data Catalogue”</i> &rarr; <i> "Access euCanSHare catalogue”</i></li>
                        <li> Click “EuCanSHare” button </li>
                    </ul>
                </ul>
                <p> <strong> Username's and pasword's fields into oBiBa's login pages must be left empty as they are only for application internal users and not for euCanSHare users. 
                             User-friendly interfaces will be developed in the next future.
            </div> 
        </div>
    </div>

    <br>

    <!-- <?php get_template_part('includes/section', "content"); ?> -->

<?php get_footer(); ?>