<?php
get_header(); the_post();
$lang = set_lang();
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
       	} ?>
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
	} ?>
    </div>

</article>

<?php get_footer(); ?>
