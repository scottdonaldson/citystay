<?php
/*
Template Name: Main
*/
get_header(); the_post();
$lang = set_lang();
?>

<section <?php post_class(); ?>>

	<h2><a href="<?php echo home_url(); ?>/students" title="Students">
    	<?php if ($lang == 'es') { echo 'El Programa'; } elseif ($lang == 'so') { echo 'The Program'; } else { echo 'The Program'; } ?>
    </a></h2>
   		<ul class="clearfix" id="program">
			<li class="one-third" id="homestay">
            	<?php
				if ($lang == 'es') { ?>
	            	<h3>Estad&iacute;a</h3>
    	            	<p><?php the_field('homestay_es'); ?></p>
       			<?php } elseif ($lang == 'so') { ?>
                	<h3>Homestay</h3>
    	            	<p><?php the_field('homestay_so'); ?></p>
                <?php } else { ?>
                	<h3>Homestay</h3>
    	            	<p><?php the_field('homestay'); ?></p>
                <?php } ?>
        	 </li>
             <li class="one-third" id="coursework">
             	<?php
				if ($lang == 'es') { ?>
	            	<h3>Estudio</h3>
                		<p><?php the_field('coursework_es'); ?></p>
       			<?php } elseif ($lang == 'so') { ?>
                	<h3>Coursework</h3>
                		<p><?php the_field('coursework_so'); ?></p>
                <?php } else { ?>
                	<h3>Coursework</h3>
                		<p><?php the_field('coursework'); ?></p>
                <?php } ?>
       		</li>
            <li class="one-third last" id="work">
             	<?php
				if ($lang == 'es') { ?>
	            	<h3>Trabajo</h3>
                		<p><?php the_field('work_es1'); ?></p>
       			<?php } elseif ($lang == 'so') { ?>
                	<h3>Work</h3>
                		<p><?php the_field('work_so'); ?></p>
                <?php } else { ?>
                	<h3>Work</h3>
                		<p><?php the_field('work'); ?></p>
                <?php } ?>
       		</li>

    </ul>


</section>

<?php get_footer(); ?>
