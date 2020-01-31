<?php

/*
Template Name: Docs
*/

?>


<?php get_header(); ?>

<section id="" class="page-default single">
	<div class="item-img cover cover-center primary-image" style="height:100px;background-image:url(<?php echo  the_post_thumbnail_url('large');  ?>)"></div>
        <div class="content-overlap">
            <div class="wrapper ">
                <div class="container">
                    <h2 class="section-title"><?php the_title();?></h2>

        <div class="row inner-box-col">
            <div class="col-lg-12">
                <p class="inner-box-title"> Data analysis: openVRE </p>
            </div>

            <div class="col-lg-12">
                <p><a class="inner-box-link" href="/dataportal/?page_id=740"> 1) Why bringing your tool to openVRE? </a></p>
            </div>

            <div class="col-lg-12">
                <p><a class="inner-box-link" href="/dataportal/?page_id=730"> 2) Instructions </a></p>
            </div>

            <div class="col-lg-12">
                <p><a class="inner-box-link" href="/dataportal/?page_id=697"> 3) Integration of tools </a></p>
            </div>
        </div>
        <br>

        <?php get_template_part('includes/section', "content"); ?>

        </div>
                </div>
            </div>
        </div>
</section>

<?php get_footer(); ?>