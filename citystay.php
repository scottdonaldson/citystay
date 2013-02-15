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
    	            	<p>Students live with carefully-matched local host families in the Latino or Somali community for over three weeks.</p>
                <?php } else { ?>
                	<h3>Homestay</h3>
    	            	<p>Twin Cities high school students live with carefully-matched local host families in the Latino or Somali community for over three weeks.</p>
                <?php } ?>
        	 </li>
             <li class="one-third" id="coursework">
             	<?php 
				if ($lang == 'es') { ?>
	            	<h3>Estudio</h3>
                		<p>Los estudiantes toman cursos de estudios urbanos, la cultura latina o somal&iacute;, e idioma extranjero.</p>
       			<?php } elseif ($lang == 'so') { ?>
                	<h3>Coursework</h3>
                		<p>Students take courses on urban studies, Latino or Somali culture, and foreign language.</p>
                <?php } else { ?>
                	<h3>Coursework</h3>
                		<p>Students take courses on urban studies, Latino or Somali culture, and foreign language.</p>
                <?php } ?>
       		 </li>
             <li class="one-third last" id="work">
             	<?php 
				if ($lang == 'es') { ?>
	            	<h3>Trabajo</h3>
                		<p>Los estudiantes participan en una pasant&iacute;a o proyecto independiente en su nueva comunidad.</p>
       			<?php } elseif ($lang == 'so') { ?>
                	<h3>Work</h3>
                		<p>Students engage in an individually-designed internship or project in their new community.</p>
                <?php } else { ?>
                	<h3>Work</h3>
                		<p>Students engage in an individually-designed internship or project in their new community.</p>
                <?php } ?>
       		 </li>  
        
    </ul>
	

</section>

<?php get_footer(); ?>