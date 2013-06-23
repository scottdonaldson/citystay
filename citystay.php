<?php 
/*
Template Name: Main
*/
get_header(); the_post(); 
$lang = $_GET['lang'] ? $_GET['lang'] : $_COOKIE['citystay_lang'];
if (!isset($lang)) { $lang = 'en'; }
?>


    
<section <?php post_class(); ?>>
	
	
	<h2><a href="<?php echo home_url(); ?>/students" title="Students">
    	<?php if ($lang == 'es') { echo 'El Programa'; } elseif ($lang == 'so') { echo 'The Program'; } else { echo 'The Program'; } ?>
    </a></h2>
   		<ul class="clearfix" id="program">
			<li class="one-third" id="homestay">
            	<?php 
				if ($lang == 'es') { ?>
	            	<h3>Estancia</h3>
    	            	<p>Estudiantes de la preparatoria en las Ciudades Gemelas viven con familias locales que han sido cuidadosamente seleccionadas en la comunidad latina o somal&iacute; durante m&aacute;s que 			tres semanas.</p>
       			<?php } elseif ($lang == 'so') { ?>
                	<h3>Homestay</h3>
    	            	<p>Participants live with carefully-matched local host families of a different culture for one week.</p>
                <?php } else { ?>
                	<h3>Homestay</h3>
    	            	<p>Participants live with carefully-matched local host families of a different culture for one week.</p>
                <?php } ?>
        	 </li>
             <li class="one-third" id="coursework">
             	<?php 
				if ($lang == 'es') { ?>
	            	<h3>Estudio</h3>
                		<p>Los estudiantes toman cursos de estudios urbanos, la cultura latina o somal&iacute;, e idioma extranjero.</p>
       			<?php } elseif ($lang == 'so') { ?>
                	<h3>Coursework</h3>
                		<p>Participants engage in coursework on urban studies, immigration and culture in Minnesota.</p>
                <?php } else { ?>
                	<h3>Coursework</h3>
                		<p>Participants engage in coursework on urban studies, immigration and culture in Minnesota.</p>
                <?php } ?>
       		 </li>
             <li class="one-third last" id="work">
             	<?php 
				if ($lang == 'es') { ?>
	            	<h3>Trabajo</h3>
                		<p>Los estudiantes participan en una pasant&iacute;a o proyecto independiente en su nueva comunidad.</p>
       			<?php } elseif ($lang == 'so') { ?>
                	<h3>Work</h3>
                		<p>City Stay offers participants the option to begin an internship in their new community when the program ends.</p>
                <?php } else { ?>
                	<h3>Work</h3>
                		<p>City Stay offers participants the option to begin an internship in their new community when the program ends.</p>
                <?php } ?>
       		 </li>  
        
    </ul>
	

</section>

<?php get_footer(); ?>