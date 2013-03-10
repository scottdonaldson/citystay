<?php get_header(); 
$lang = $_GET['lang'] ? $_GET['lang'] : $_COOKIE['citystay_lang']; 
if (!isset($lang)) { $lang = 'en'; }
?>

<article <?php post_class(); ?>>
	<h1 class="visuallyhidden">News</h1>
    
    <?php while (have_posts()) : the_post(); ?>
    
    <section <?php post_class('clearfix'); ?>>
    	<div class="sidenav">
            <?php if ($lang == 'es' && get_field('title_es')) { ?>
                <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_field('title_es'); ?>"><?php the_field('title_es'); ?></a></h2>
            <?php
            } elseif ($lang == 'so' && get_field('title_so')) { ?>
                <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_field('title_so'); ?>"><?php the_field('title_so'); ?></a></h2>
            <?php 
            } else { ?>
                <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <?php } ?>
            
            <div class="date"><?php $date = get_the_date('F j, Y'); echo $date; ?></div>
            <div class="social">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="icon-facebook" target="_blank"></a>
                <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" class="icon-twitter" target="_blank"></a>
                <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="icon-google-plus" target="_blank"></a>
                <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" class="icon-pinterest" target="_blank"></a>
            </div>
        </div>
        <div class="content">
        	<?php 
			the_post_thumbnail(); 
			
			if ($lang == 'es' && get_field('body_es')) { ?>
				<p><?php short_excerpt(get_field('body_es'), 55); ?></p>
                <a class="more" href="<?php the_permalink(); ?>">LEER MAS</a>
			<?php } elseif ($lang == 'so' && get_field('body_so')) { ?>
				<p><?php short_excerpt(get_field('body_so'), 55); ?></p>
                <a class="more" href="<?php the_permalink(); ?>">READ MORE</a>
			<?php } else { ?>
	            <p><?php short_excerpt(get_the_content(), 55); ?></p>
                <a class="more" href="<?php the_permalink(); ?>">READ MORE</a>
			<?php } ?>
        </div>
    </section>
    
	<?php endwhile; ?>
    
    <div class="pagination">
        <?php 
        if ($lang == 'es') { 
            $older = 'Older'; 
            $newer = 'Newer';
        } elseif ($lang == 'so') {
            $older = 'Older';
            $newer = 'Newer';
        } else {
            $older = 'Older';
            $newer = 'Newer';
        }
        ?>
	    <span class="older"><?php next_posts_link($older); ?></span>
        <?php if ( get_next_posts_link() && get_previous_posts_link() ) { ?>
        	<span>/</span>
        <?php } ?>
    	<span class="newer"><?php previous_posts_link($newer); ?></span>
	</div>

</article>

<?php get_footer(); ?>