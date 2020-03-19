<?php
/**
 *  Template Name: Cohorts MGT
 */

?>

<?php get_header();?>
    <div style="margin-left:100px; margin-right:50px">
        <h2 class="section-title"><?php the_title();?></h2>
        <p> This section provides links for data management resources in euCanSHare's platform. </p>
        <p> Users registered and logged in euCanSHare are allowed to ask for granted privileges in Opal and/or Mica. </p> 
        <p> Either registered and non-registered users can access to the public cohorts viewer. (Studies) </p>
        <div class="container">
            <div class="row">
                <?php if ( is_user_logged_in() ) : ?> 
                    <div class="col-12 text-left mt-3 mb-4">
                        <a aria-label="Request access to Opal" class="button-link" href="<?php echo get_page_link(1319) ?>" target="_blank"> Request data manager access </a>
                    </div>
                <?php endif;?>

                <?php if ( ! is_user_logged_in()) : ?>
                    <p> <strong> You need to be logged in to ask for Data Manager Access privileges </strong> </p>
                <?php endif;?>
            </div>
        </div>
	</div>

<?php get_footer();?>