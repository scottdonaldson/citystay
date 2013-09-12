<?php
$lang = $_GET['lang'] ? $_GET['lang'] : $_COOKIE['citystay_lang']; 
if (!isset($lang)) { $lang = 'en'; }
?>
</div><!-- #main -->   

<footer class="full-width primary clearfix">
	<article class="two-thirds" id="newsfeed">
  		<?php 
		if ($lang == 'es') { ?>
	        <h2>Las Noticias Recientes</h2>
    	<?php 
		} elseif ($lang == 'so') { ?>
        	<h2>Latest Story</h2>
        <?php 
		} else { ?>
        	<h2>Latest Story</h2>
        <?php 
		}
		
        $news = new WP_query('posts_per_page=1');
        while ($news->have_posts()) : $news->the_post(); ?>
            <h3>
				<?php 
				if ($lang == 'es' && get_field('title_es')) {
					the_field('title_es');
				} elseif ($lang == 'so' && get_field('title_so')) {
					the_field('title_so'); 
				} else {
					the_title();
				} ?>
            </h3>
        	<p>
				<?php 
				if ($lang == 'es' && get_field('body_es')) {
					short_excerpt(get_field('body_es'), 22); ?>
                    </p>
                    <a class="more" href="<?php the_permalink(); ?>">LEER MAS</a>
				<?php } elseif ($lang == 'so' && get_field('body_so')) {
					short_excerpt(get_field('body_so'), 22); ?>
                    </p>
                    <a class="more" href="<?php the_permalink(); ?>">READ MORE</a>
				<?php } else {	
					short_excerpt(get_the_excerpt(), 22); ?>
                    </p>
                    <a class="more" href="<?php the_permalink(); ?>">READ MORE</a>
				<?php } ?>
        <?php endwhile; wp_reset_postdata(); ?>
    </article>
    
    <ul class="one-third last eksja" id="connect">
		<li id="donate"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XRDFK4XLDZUTN" target="_blank">
        	<?php if ($lang == 'es') { echo 'Done Ahora'; } elseif ($lang == 'so') { echo 'DONATE'; } else { echo 'DONATE'; } ?>
            </a></li>
        <li id="facebook"><a href="http://www.facebook.com/citystay" target="_blank">
        	<?php if ($lang == 'es') { echo '"Me Gusta"'; } elseif ($lang == 'so') { echo 'LIKE US'; } else { echo 'LIKE US'; } ?>
        	</a></li>
        <li id="email"><a href="mailto:info@mycitystay.org" target="_blank">
        	<?php if ($lang == 'es') { echo 'Email'; } elseif ($lang == 'so') { echo 'EMAIL US'; } else { echo 'EMAIL US'; } ?>
        	</a></li>
    </ul>
</footer>

<footer class="full-width secondary clearfix">
	<div class="alignright up"></div>
	<div class="alignleft">
		<p class="alignleft">&copy; <?php echo date('Y').'&nbsp;'; bloginfo('name'); ?></p>
    	<p class="alignleft">ph. 651.238.7736</p>
        <p class="alignleft">e. <a href="mailto:info@mycitystay.org">info@mycitystay.org</a></p>
    </div>
    <div class="alignleft credits">
    	<p class="alignleft">design + code by <a href="http://www.parsleyandsprouts.com" target="_blank">Parsley &amp; Sprouts</a></p>
        <p class="alignleft">logo by <a href="mailto: sisoyuriel@gmail.com">Uriel Ernesto Saenz Saenz</a></p>
        <br/>
        <p class="alignleft">Spanish translation by <a href="mailto: maidaca85@gmail.com">Marco Dávila</a></p>
        <p class="alignleft">Somali translation by <a href="mailto: maham008@umn.edu">Bahjo Mahamud</a></p>
    </div>
    
	
</footer> 

</div><!-- #page -->

<script src="<?php echo bloginfo('template_url'); ?>/js/plugins.js?v=20130709"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/script.js?v=20130709"></script>

<script>
	jQuery(document).ready(function($){
		if (!$('html').hasClass('lt-ie8')) {
			$('#video').fitVids();
		}
	});
</script>

<?php wp_footer(); 

if (!is_user_logged_in()) { ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38315946-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php } ?>
</body>
</html>