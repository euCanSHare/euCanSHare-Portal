<?php 
/***
Template Name: Feedback doc
***/
?>

<?php get_header(); ?>

    <div class="container">
                    
        <h2 class="section-title"><?php the_title();?></h2>

        <div class="row inner-box-col-positioning">
            <div class="col-12 mt-2">         
                <p> <strong> Give us your feedback section is the entry point for engaging with euCanSHare community. </strong> </p>
                <p> An Slack workspace it has been setup which will serve as a discussion forum for general aspects of the platform. </p>
                <p> Unlike <a style="color: #005076" href="<?php echo get_page_link(1480) ?>">Helpdesk</a> section which is designed for solving more specific questions related to technical issues, this
                section will allow open discussions on how to improve euCanSHare platform. </p>
                <p> Here below are depicted the necessary steps for getting into euCanSHare Slack: </p>
            </div>
        </div>
        <h5 class="inner-box-col-positioning"> Registration </h5>
        <div class="row pl-3 pr-3 ml-2"> 
            <div class="col-lg-5 mt-3">          
                <ul class="disc-list">
                    <li> In the navigation bar: Go to “Support” and select "Give us your feedback" from the dropdown menu. </li>
                    <li> Click "Get my invite" button and choose an email for registering an account on euCanSHare Slack workspace </li>
                    <li> You will receive an email invitation. Click the activation link for setting up your password and complete your registration. </li>
                </ul>
            </div>

            <div class="col-md-7 col-lg-4 my-auto">
                <div class="text-center">
                    <img src="<?php echo get_template_directory_uri() ?>/img/getmyinvite0c.png" alt="">
                </div>
            </div>
            <div class="col-md-5 col-lg-3 my-auto">
                <div class="text-center">
                    <img src="<?php echo get_template_directory_uri() ?>/img/getmyinvite1c.png" alt="">
                </div>
            </div>
        </div>
        <br/>
        <h5 class="inner-box-col-positioning"> Sign In </h5>
        <div class="row pl-3 pr-3 ml-2"> 
            <!-- <div class="col-md-7 col-lg-4 my-auto">
                <div class="text-center">
                    <img src="<?php echo get_template_directory_uri() ?>/img/getmyinvite0c.png" alt="">
                </div>
            </div> -->
            <div class="col-md-5 col-lg-4 my-auto">
                <div class="text-center">
                    <img src="<?php echo get_template_directory_uri() ?>/img/signinSlack.png" alt="">
                </div>
            </div>
            <div class="col-lg-8 mt-3 my-auto">
                <br/>
                <ul class="disc-list">
                    <li> In the navigation bar: Go to “Support” and select "Give us your feedback" from the dropdown menu. </li>
                    <li> Click "Sign In" button and use the credentials setup in the registration step in order to login into euCanSHare Slack. </li>
                    <li> Click <strong> <a style="color: #005076" href="https://slack.com/intl/en-es/help/categories/200111606-Using-Slack"> here </a> </strong> in case you want to learn about Slack usage. </li>
                </ul>
            </div>
        </div>
    </div>

    <br>

    <!-- <?php get_template_part('includes/section', "content"); ?> -->

<?php get_footer(); ?>