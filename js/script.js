$(document).ready(function(){

	// Declare variables
	var html = $('html'),
		body = $('body'),
		opener = $('#opener-container div'),
		menu = $('nav ul'),
		scrolltop;

	// Open/close menu on mobile
	var menuHeight = menu.height();   // grab current height of the menu when it's transparent
	menu.height(0).addClass('shown'); // set height of menu to 0 and "show" it (remove transparency)
	var i = 0;
	opener.click(function(){
		if (i%2 === 0) {
			menu.animate({
				'height': 233
			});
		} else {
			menu.animate({
				'height': 0
			});
		}
		i++;
	});

	// In-page navigation. First, declare what we're moving
	if (body.hasClass('page') && !body.hasClass('home')) {
		var header = $('header'),
			sidenav = $('.sidenav ol'),
			section = $('.content section'),
			index,
			isScrolling = false;
		
		sidenav.find('li').click(function(){
			isScrolling = true;

			$this = $(this);
			index = $this.index();
			$this.addClass('active').siblings().removeClass('active');

			// scroll to the appropriate section...
			var target = section.eq(index);
			$('html, body').animate({
				'scrollTop': target.offset().top - 15
			}, 1200);

			setTimeout(function(){
				isScrolling = false;
			}, 1250);
		});

		// Declare some variables to prevent menu dropping behind footer
		var footer = $('footer.primary'),
			fromFooter;

		// If we start scrolling without clicking on any sections,
		// we still want the menu to fix position and highlight
		var setSidenav = function(){
			scrolltop = $(window).scrollTop();
			header = $('header');
			if (scrolltop > header.height() + 60) {
				if (!sidenav.hasClass('scrolled')) {
					sidenav.css({
						'position': 'fixed',
						'top': sidenav.offset().top - $('header').height() - 60,
						'width': sidenav.closest('.sidenav').width()
					});
				}
				sidenav.addClass('scrolled');
			} else {
				sidenav.removeClass('scrolled').removeAttr('style').css('display', 'block');
			}
		}
		setSidenav();
		
		$(window).scroll(function(){
			setSidenav();
			if (!isScrolling) {
				scrolltop = $(window).scrollTop();
				section.each(function(){
					$this = $(this);
					if ($this.offset().top - 40 < scrolltop && 
						$this.offset().top + $this.height() - 40 > scrolltop) {
						sidenav.find('li').eq($this.index()).addClass('active');
					} else {
						sidenav.find('li').eq($this.index()).removeClass('active');
					}
				});
			}

			// If we're below the footer, fade out.
			fromFooter = footer.offset().top - sidenav.offset().top - sidenav.height();
			if (fromFooter <= parseInt(sidenav.css('top'))) {
				sidenav.fadeOut();
			} else {
				sidenav.fadeIn();
			}	
		});

		if (!html.hasClass('lt-ie9')) {
			$(window).resize(function(){
				setsideNav();

				// Keep appropriate width for sidenav
				sidenav.css({
					'width': sidenav.closest('.sidenav').width()
				});			
			});
		}
	}
	
	// Scroll back up to the top
	var up = $('.up');
	up.click(function(){
		$('html, body').animate({
			'scrollTop': 0
		}, 600);
	});
	
	// Months in Spanish and Somali
	var months = [
		['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
		['Enero', 'Febrero', 'Marzo', 'Abril', 'Maio', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		['Jeenawery', 'Feebarwery', 'Maarij', 'Abriil', 'Meey', 'Juun', 'Juulaay', 'Ogos', 'Sibtambar', 'Oktoobar', 'Noofembar', 'Diisembar']	
	];
	var language = $('#set_language').html();
	if (body.hasClass('blog') || body.hasClass('single')) {
		var date = $('.date'),
			set;
		if (language == 'es') {
			set = 1;
		} else if (language == 'so') {
			set = 2;
		} else {
			set = 0;
		}
		date.each(function(){
			for (i = 0; i <= 11; i++) {
				$this = $(this);
				if ($this.html().indexOf(months[0][i]) >= 0) {
					$this.html(months[set][i]+' '+$this.html().substr(months[0][i].length));
				}
			}
		});
	}

	// IE7-specific stuff
	if (html.hasClass('lt-ie8')) {
		
		// Fix z-index problems
		var zIndexNumber = 1000;
        // Put your target element(s) in the selector below!
        $("div").each(function() {
               $(this).css('zIndex', zIndexNumber);
               zIndexNumber -= 10;
        });
		
		// Icomoon
		window.onload = function() {
			function addIcon(el, entity) {
				var html = el.innerHTML;
				el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
			}
			var icons = {
					'icon-menu' : '&#xe000;',
					'icon-facebook' : '&#xe001;',
					'icon-twitter' : '&#xe002;',
					'icon-google-plus' : '&#xe003;',
					'icon-pinterest' : '&#xe004;'
				},
				els = document.getElementsByTagName('*'),
				i, attr, html, c, el;
			for (i = 0; i < els.length; i += 1) {
				el = els[i];
				attr = el.getAttribute('data-icon');
				if (attr) {
					addIcon(el, attr);
				}
				c = el.className;
				c = c.match(/icon-[^\s'"]+/);
				if (c && icons[c[0]]) {
					addIcon(el, icons[c[0]]);
				}
			}
		};
	}

});