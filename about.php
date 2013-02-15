<?php 
/*
Template Name: About
*/
get_header(); the_post(); 
$lang = $_GET['lang'] ? $_GET['lang'] : $_COOKIE['citystay_lang']; 
if (!isset($lang)) { $lang = 'en'; }
?>

<article <?php post_class('clearfix'); ?>>
	<h1 class="visuallyhidden"><?php the_title(); ?></h1>

	<div class="sidenav">
    <?php 
	if (get_field('content')) { ?>
    	<ol>
		<?php 
        while (has_sub_field('content')) { 
            if ($lang == 'es' && get_sub_field('title_es')) { ?>
                <li><?php the_sub_field('title_es'); ?></li>
            <?php
            } elseif ($lang == 'so' && get_sub_field('title_so')) { ?>
                <li><?php the_sub_field('title_so'); ?></li>
            <?php 
            } else { ?>
                <li><?php the_sub_field('title'); ?></li>
            <?php 
            }
        } 
		if ($lang == 'es') { ?>
        	<li>Liderazgo</li>
        <?php } elseif ($lang == 'so') { ?>
        	<li>Leadership</li>
        <?php } else { ?>
        	<li>Leadership</li>
        <?php } ?>
        </ol>
	<?php } ?>
        <p>&nbsp;</p>
    </div>
    
    <div class="content">
	<?php 
	if (get_field('content')) { 
		while (has_sub_field('content')) { ?>
        <section>
            <?php
            if ($lang == 'es' && get_sub_field('title_es')) { ?>
                <h2><?php the_sub_field('title_es'); ?></h2>
            <?php 
            } elseif ($lang == 'so' && get_sub_field('title_so')) { ?>
                <h2><?php the_sub_field('title_so'); ?></h2>
            <?php 
            } else { ?>
                <h2><?php the_sub_field('title'); ?></h2>
            <?php
            }
            if ($lang == 'es' && get_sub_field('text_es')) { ?>
                <?php the_sub_field('text_es'); ?>
            <?php 
            } elseif ($lang == 'so' && get_sub_field('text_so')) { ?>
                <?php the_sub_field('text_so'); ?>
            <?php 
            } else { ?>
                <?php the_sub_field('text'); ?>
            <?php } ?>
            
        </section>
        <?php }
	} 
    if (get_field('leaders')) { ?>
    	<section>
        	<h2><?php if ($lang == 'es') { echo 'Liderazgo'; } elseif ($lang == 'so') { echo 'Leadership'; } else { echo 'Leadership'; } ?></h2>
		<?php while (has_sub_field('leaders')) { ?>
			<div class="leader clearfix">
                <?php if (get_sub_field('photo')) { ?>
            	<img class="alignright" src="<?php the_sub_field('photo'); ?>" />
                <?php } ?>
                <h4>
					<?php 
					the_sub_field('name').' '; 
					if ($lang == 'es' && get_sub_field('title_es')) { 
						echo ' ('.get_sub_field('title_es').')'; 
					} elseif ($lang == 'so' && get_sub_field('title_so')) {
						echo ' ('.get_sub_field('title_so').')';
					} else {
						echo ' ('.get_sub_field('title').')';
					} ?>
				</h4>
                    <?php 
                    if ($lang == 'es' && get_sub_field('bio_es')) { 
                        the_sub_field('bio_es'); 
                    } elseif ($lang == 'so' && get_sub_field('bio_so')) {
                        the_sub_field('bio_so');
                    } else {
                        the_sub_field('bio');
                    } ?>
                <p><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></p>
            </div>
        <?php } ?>
        </section>
	<?php } ?>
	
    </div>

</article>

<?php get_footer(); ?>