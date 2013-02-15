<?php get_header(); the_post(); 
$lang = $_GET['lang'] ? $_GET['lang'] : $_COOKIE['citystay_lang'];
if (!isset($lang)) { $lang = 'en'; } 
?>

<article <?php post_class(); ?>>
    
    <section <?php post_class('clearfix'); ?>>
    	<div class="sidenav">
        	<h1>
				<?php 
				if ($lang == 'es' && get_field('title_es')) {
					the_field('title_es');
				} elseif ($lang == 'so' && get_field('title_so')) {
					the_field('title_so');
				} else {
					the_title();
				} ?>
            </h1>
            <div class="date"><?php $date = get_the_date('F j, Y'); echo $date; ?></div>
            <div class="social">
            	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="icon-facebook" target="_blank"></a>
                <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" class="icon-twitter" target="_blank"></a>
                <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="icon-google-plus" target="_blank"></a>
                <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" class="icon-pinterest" target="_blank"></a>
            </div>
        </div>
        <div class="content">
        	<?php the_post_thumbnail();
			if ($lang == 'es' && get_field('body_es')) { ?>
				<p><?php the_field('body_es'); ?></p>
			<?php } elseif ($lang == 'so' && get_field('body_so')) { ?>
				<p><?php the_field('body_so'); ?></p>
            <?php     
			} else {
				the_content(); 
			} ?>
    
  	    </div>
    </section>


</article>

<?php get_footer(); ?>