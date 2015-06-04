<?php
// Set cookies for language
$lang = set_lang();
setcookie('citystay_lang', $lang, 0, '/');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php wp_title(''); ?></title>

    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" />

    <link rel="author" href="<?php echo bloginfo('template_url'); ?>/humans.txt">

    <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/style.css?v=20130709">
    <script src="<?php echo bloginfo('template_url'); ?>/js/vendor/modernizr.js"></script>
<?php wp_head(); ?>

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo bloginfo('template_url'); ?>/images/citystay-favicon.ico">

</head>

<body <?php body_class(); ?>>
<div class="hidden" id="set_language"><?php echo $lang; ?></div>
<div id="page" class="hfeed site">

	<!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->

<header class="clearfix" role="banner">
    <nav role="navigation">
    	<?php
		if ($lang == 'en') {
			wp_nav_menu( array(
            	'theme_location' => 'english',
            	'container' => false,
            	'fallback_cb' => 'wp_page_menu',
        	) );
		} elseif ($lang == 'es') {
			wp_nav_menu( array(
            	'theme_location' => 'spanish',
            	'container' => false,
            	'fallback_cb' => 'wp_page_menu',
        	) );
		} elseif ($lang == 'so') {
			wp_nav_menu( array(
            	'theme_location' => 'somali',
            	'container' => false,
            	'fallback_cb' => 'wp_page_menu',
        	) );
		} ?>
        <?php  ?>
    </nav>

    <div class="full-width clearfix">
    	<?php if (is_front_page()) { ?>
    	    <h1 id="site-title" class="visuallyhidden"><?php bloginfo('name'); ?></h1>
    	<?php } else { ?>
    	    <h3 id="site-title" class="visuallyhidden"><?php bloginfo('name'); ?></h3>
    	<?php } ?>

        <a class="z-100" href="<?php echo home_url(); ?>" rel="home" title="City Stay">
    	    <img src="<?php echo bloginfo('template_url'); ?>/images/logo.png" />
    	</a>

    	<div id="opener-container" class="z-1">
    		<div class="icon-menu">&nbsp;<?php if ($lang == 'es') { echo 'Men&uacute;'; } elseif ($lang == 'so') { echo 'Menu'; } else { echo 'Menu'; } ?></div>
    	</div>

        <ul class="languages z-1">
        	<?php
			$link = !is_home() ? get_permalink() : get_permalink( get_page_by_title('News') );
			if ($lang == 'en') { ?>
            	<li id="spanish"><a href="<?php echo $link; ?>?lang=es">Español</a></li>
                <li id="somali"><a href="<?php echo $link; ?>?lang=so">Somali</a></li>
            <?php } elseif ($lang == 'es') { ?>
                <li id="english"><a href="<?php echo $link; ?>?lang=en">English</a></li>
                <li id="somali"><a href="<?php echo $link; ?>?lang=so">Somali</a></li>
            <?php } elseif ($lang == 'so') { ?>
                <li id="spanish"><a href="<?php echo $link; ?>?lang=es">Español</a></li>
                <li id="english"><a href="<?php echo $link; ?>?lang=en">English</a></li>
            <?php } ?>
        </ul>
    </div>

</header>

<?php if (is_front_page()) { ?>
<div id="hero" class="hero">
    <div class="hero-background" style="opacity: 0;"></div>
    <div class="vcenter aligncenter">
        <h2 class="ekjsa">Lorem ipsum dolor sit amet</h2>
        <img class="play-video" src="<?php echo bloginfo('template_url'); ?>/images/play.png">
    </div>
</div>
<script>
(function() {
    var hero = document.getElementById('hero'),
        iframeID = 'iframe-video';
    function resizeHero() {
        hero.style.height = 0.36 * (+getComputedStyle(hero).width.replace('px', '')) + 'px';
    };
    resizeHero();
    window.addEventListener('resize', resizeHero);

    $(document).ready(function(){

        var modal = $('.modal-container');

        function hideModal() {
            modal.fadeOut();
            $('#' + iframeID).remove();
        }
        function showModal() { modal.fadeIn(); }

        $('.hero-background').animate({ opacity: 0.8 }, 1000);
        $('.play-video').click(function() {

            showModal();

            var iframe = document.createElement('iframe');
            iframe.style.border = 0;
            iframe.id = iframeID;
            iframe.src = 'https://drive.google.com/file/d/0B7U3EVz_kFTrc21RN3R1elNNbUE/preview?autoplay=1';
            iframe.classList.add('aligncenter', 'vcenter');
            iframe.width = '80%';
            iframe.height = '80%';

            document.getElementById('modal').appendChild(iframe);
        });

        $('#close-modal').click(hideModal);

        $('.modal-container').click(function(e){
            if ( e.target.id !== 'modal' ) hideModal();
        });

        window.addEventListener('keydown', function(e){
            if ( e.keyCode === 27 ) {
                hideModal();
            }
        })
    });
})();
</script>
<?php } ?>

<div id="main" role="main" class="full-width clearfix">
