<?php

/*
Template Name: Docs
*/

?>


<?php get_header(); ?>

    <div class="container">
        <h2 class="section-title"><?php the_title();?></h2>

        <div class="row inner-box-col">
            <div class="col-lg-12">
                <p class="inner-box-title"> Data analysis: openVRE </p>
            </div>

            <div class="col-lg-12">
                <p><a class="inner-box-link" href="/platform/?page_id=740"> 1) Why bringing your tool to openVRE? </a></p>
            </div>

            <div class="col-lg-12">
                <p><a class="inner-box-link" href="/platform/?page_id=730"> 2) Instructions </a></p>
            </div>

            <div class="col-lg-12">
                <p><a class="inner-box-link" href="/platform/?page_id=697"> 3) Integration of tools </a></p>
            </div>
        </div>
        <div class="row inner-box-col">
            <div class="col-lg-12">
                <p class="inner-box-title"> Join the platform </p>
            </div>

            <div class="col-lg-12">
                <p><a class="inner-box-link" href="/platform/?page_id=1406"> 1) Registration </a></p>
            </div>

            <div class="col-lg-12">
                <p><a class="inner-box-link" href="/platform/?page_id=1383"> 2) Login </a></p>
            </div>

            <div class="col-lg-12">
                <p><a class="inner-box-link" href="/platform/?page_id=1426"> 3) Request administrative privileges </a></p>
            </div>

        </div>
        <div class="row inner-box-col">
            <div class="col-lg-12">
                <p class="inner-box-title"> Support </p>
            </div>
            <div class="col-lg-12">
                <p><a class="inner-box-link" href="/platform/?page_id=1497"> 1) Helpdesk: Technical questions </a></p>
            </div>
            <div class="col-lg-12">
                <p><a class="inner-box-link" href="/platform/?page_id=1501"> 2) Feedback: General aspects </a></p>
            </div>
        </div>
        <br>

        <?php get_template_part('includes/section', "content"); ?>

    </div>

<?php get_footer(); ?>