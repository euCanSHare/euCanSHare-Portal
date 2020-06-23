<?php 
/***
Template Name: Registration
***/
?>

<?php get_header(); ?>
    <div class="container">

        <h2 class="section-title"><?php the_title();?></h2>

        <div class="row mt-2 inner-box-col-positioning">
            <div class="col-12">
            <p> <strong> Platform's registration is open to new users</strong>, who automatically are granted with basic privileges to sign-up into the different EuCanSHare services. </p>
            <p> Below is discussed how extra privileges are gained. </p>
            </div>
            <br/>
            <div class="col-12">
            <p> For registering, just click the <i>"Login"</i> button on the main navigation menu, at the top-right corner. </p>
            <div><img src="/platform/wp-content/uploads/2019/11/registration_1.png" style="width: 95%; height: 95%; border: 1px solid lightgrey;"></div>
            </div>
        </div>
        <div class="row mb-2 inner-box-col-positioning">
            <div class="col-12">
            <p> Then, following a simple two-steps authentication flow, just click the <i>"Register"</i> button and fill in the details for your new account. </p>
            <p> A verification code is going to be sent to your email account. Please, note that the code expires after 5 minutes. </p>
            <p> Given an expiration error, just <i>"Login"</i> the portal again and a message will appear offering you to re-send a new the verification code. </p>
            <p> If you do not receive the email, <a style="color: #005076" href="mailto:support_eucanshare@bsc.es"> contact us</a> - after checking your spam inbox.</p>
            <div>
            <img src="/platform/wp-content/uploads/2019/11/registration_2bis.png" style="width: 95%; height: 95%; border: 1px solid lightgrey;">
            </div>
        </div>
        <div class="row inner-box-col-positioning">  
            <div class="col-12">     
                <h5> oBiBa's services registration </h5>
                <br/>
                <p> <strong> For a first access to the Data Catalogue (or any other <a style="color: #005076" href="https://www.obiba.org/"> Obiba’s </a> application managing cohort’s datasets and studies), some user’s data needs to be explicitly confirmed. </strong> </p>
                <ul class="disc-list">
                    <li> Logging to the platform (https://eucanshare.bsc.es/platform) by clicking the "Login" button on the top navigation bar. Once in there, the "Log out" button will appear. </li>
                    <li> Go to <i>“Data Catalogue”</i> &rarr; <i> "Access euCanSHare catalogue”</i></li>
                    <li> Once on the catalogue, click <i>“Sign In”</i></li>
                        <img src="/platform/wp-content/uploads/2019/11/login_obiba_1.png" style="width: 90%; height: 90%; border: 0.5px solid lightgrey; margin: 10px;">
                    <li> Login using the “EuCanSHare" button, that will redirect to a pre-filled registration. Just check that the data is correct and click "Join" </li>
                        <img src="/platform/wp-content/uploads/2019/11/login_obiba_2.png" style="width: 40%; height: 90%; border: 0.5px solid lightgrey; margin: 10px;">
                        <img src="/platform/wp-content/uploads/2019/11/login_obiba_3.png" style="width: 40%; height: 90%; border: 0.5px solid lightgrey; margin: 10px;">
                </ul> 
                <p> <strong> In case of needing administrative privileges in oBiBa's stack services, please click <a style="color: #005076" href="/platform/?page_id=1426"> here </a> </strong> </p>
            </div>          
        </div>
    </div>

        <!-- <?php get_template_part('includes/section', "content"); ?> -->

<?php get_footer(); ?>