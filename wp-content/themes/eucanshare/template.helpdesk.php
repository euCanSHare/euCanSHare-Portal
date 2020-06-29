<?php
/**
 *  Template Name: Helpdesk
 */

?>

<?php get_header();?>
    <div class="container">
        <h2 class="section-title"><?php the_title();?></h2>   
            <?php if ( is_user_logged_in() ) : ?>
            <div class="row pl-3 pr-3 ml-2 inner-box-col-positioning">
                <div class="col-lg-4">
                    <h3 class="font-m-sm"> Use this form if you are having technical problems on euCanSHare platform, or if you would just like to send us some general comments. </h3>
                </div>
                <div class="col-lg-8 inner-box-col">
                    <?php echo do_shortcode('[contact-form-7 id="1482" title="Helpdesk"]'); ?>
                </div>
            </div>
            <?php endif;?>
            <?php if ( ! is_user_logged_in()) : ?>
                <h4 style="margin-top: 25px; margin-bottom: 25px;"> You are not allowed to see this content. Only authenticated users can access to this page. </h4>
                <a class="button-link" href="https://eucanshare.bsc.es/platform"> Return to Home page </a>
            <?php endif;?>
	</div>
<br>

<?php get_footer();?>
