<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fdg
 */

?>

	</div><!-- #content -->

	<footer class="site-footer">
		<div class="wrapper">
			<div class="copyright"><p>© 2020 EUCANSHARE. All rights reserved</p></div>
			<div class="privacy"><a href="#">Privacy Policy</a></div>
		</div>
	</footer>

<?php wp_footer(); ?>

<script>


//--------  https://codepen.io/desandro/pen/aEmkl


function stickyEl() {
	      var nav = jQuery('header');
          if (nav.length) {
              var stickyNavTop = nav.outerHeight() / 3 ;
              jQuery(window).on('scroll',function() {
                  if (jQuery(window).scrollTop() > stickyNavTop) {
                     jQuery('body').addClass('menu-fixed');
  
                  } else {
                      jQuery('body').removeClass('menu-fixed');
     
                  }
              });
          }
}
stickyEl()	
</script>



<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-29728612-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136295074-1');
</script>
<!-- Google Analytics -->

<!-- Cookies -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/cookies.js"></script>

<script>
jQuery( document ).ready(function() {

	jQuery.cookieBar();
		policyButton: true;
		
		  var $rows = $("#cookie-bar");
		  var $overlay = $(".c-overlay");
		   setTimeout(function() {
		       $rows.removeClass("hide_c");
		       $overlay.addClass("show_c");
		       $('body').addClass("hide_c")
		
		   }, 200);
		   
		$('#cookie-bar a.cb-enable').click(function(){
		   $(".c-overlay.show_c").addClass("hide_c");
		   $(".c-overlay.show_c").removeClass("show_c");
		   setTimeout(function() {
		   $(".c-overlay.hide_c").addClass("close");
		   }, 500);   
		});
	});	
	

	
</script> 
<!-- Cookies -->


</body>
</html>
