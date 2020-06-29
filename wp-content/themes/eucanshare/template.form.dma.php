<?php
/**
 *  Template Name: Data Access Manager form
 */

?>

<?php get_header();?>

<div class="container">
    <h2 class="section-title"><?php the_title();?></h2> 
    <?php if ( is_user_logged_in() ) : ?>  
        <div class="row pl-3 pr-3 ml-2 mt-4 justify-content-center">
            <h5> Please, fill the form below for requesting right privileges on the data management and analysis tools </h5>  
        </div>
    <?php endif;?>
    <div class="row pl-3 pr-3 ml-2 mt-4 justify-content-center"> 
        <?php if ( is_user_logged_in() ) : ?>
        <div class="row">
            <div class="col-12-lg inner-box-col">
                <?php echo do_shortcode('[contact-form-7 id="1355" title="Untitled"]'); ?>
            </div>
        </div>
        <?php endif;?>
        <?php if ( ! is_user_logged_in()) : ?>
            <h4 style="margin-top: 25px; margin-bottom: 25px;"> You are not allowed to see this content. Only authenticated users can access to this page. </h4>
            <a class="button-link" href="https://eucanshare.bsc.es/platform"> Return to Home page </a>
        <?php endif;?>
    </div>
</div>

<br>

<?php get_footer();?>
