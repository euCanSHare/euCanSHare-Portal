<?php 
/***
Template Name: Helpdesk doc
***/
?>

<?php get_header(); ?>

    <div class="container">
                    
        <h2 class="section-title"><?php the_title();?></h2>

        <div class="row pl-3 pr-3 ml-2 mt-4">
            <div class="col-12 mt-2 mb-2">         
                <p> <strong> Helpdesk section is meant for giving users support on specific technical questions. </strong> </p>
                <p> Users have to fill a predefined form that will provide information to support team about their problem. </p>
                <p> Here below are depicted the necessary steps to ask for technical support: </p>
            </div>
        </div>
        <div class="row pl-3 pr-3 ml-2"> 
            <div class="col-lg-5 mt-3">
                <ul class="disc-list">
                    <li> Login into euCanSHare platform as described in <a style="color: #005076; margin-left: 5px;" href="<?php echo get_page_link(1383) ?>"> 
                    Join the platform </a> documentation section. </li> 
                    <li> In the navigation bar: Go to “Support”  and select "Helpdesk" from the dropdown menu. </li>
                    <li> <strong> Username and Email </strong>fields will be automatically filled for already logged in users. </li>
                    <li> Choose a <strong> Topic </strong> from the predefined list. </li>
                    <li> Write a <strong> Subject </strong>summarizing your specific problem (max. 50 characters) </li>
                    <li> Describe your problem at <strong> Your message </strong>field </li>
                    <li> Click <strong> SEND </strong>button. An email will be sent to euCanSHare support team and they will back to you as soon as possible. </li>
                </ul>
            </div>

            <div class="col-lg-7">
                <div class="text-center">
                    <img style="width: 100%; max-width: 500px; height: auto;" src="<?php echo get_template_directory_uri() ?>/img/helpds.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- <?php get_template_part('includes/section', "content"); ?> -->

<?php get_footer(); ?>