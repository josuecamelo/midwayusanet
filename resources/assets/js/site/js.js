$(function () {

	/* Popover: */

	$('[data-toggle="popover"]').popover();


	/* Menu Normal */

	var mnOpen = true;

	$('#menu > a').on('click', function () {

		$('#menu nav').toggle('blind');
		$(this).find('svg').toggleClass('fa-times fa-bars');

		if (mnOpen) {
			$('#menu > a > svg').attr('data-icon', 'times');
		} else {
			$('#menu > a > svg').attr('data-icon', 'bars');
		}
		mnOpen = !mnOpen;
	});


	/* Menu Mobile: */

	var mmOpen = true;

	$('#menu-mobile > a').on('click', function (event) {
		if (mmOpen) {
			$('#menu-mobile nav').show('slide', {direction: 'left'});
			$('#menu-mobile > a > svg').removeClass('fa-bars').addClass('fa-times').attr('data-icon', 'times');
		} else {
			$('#menu-mobile nav').hide('slide', {direction: 'left'});
			$('#menu-mobile > a > svg').removeClass('fa-times').addClass('fa-bars').attr('data-icon', 'bars');
			setTimeout(function () {
				$('#menu-mobile nav').removeAttr('style');
			}, 500);
		}
		mmOpen = !mmOpen;
		event.stopPropagation();
	});

	$('#menu-mobile nav ul li a').on('click', function (event) {

		$(this).siblings('ul').toggle('blind');
		$(this).find('svg').toggleClass('fa-minus fa-plus');

		let icon = $(this).find('svg').data('icon');

		if (icon == 'plus') {
			$(this).find('svg').attr('data-icon', 'minus');
		} else {
			$(this).find('svg').attr('data-icon', 'plus');
		}

		event.preventDefault();
		event.stopPropagation();
	});

	$('body').on('click', function () {
		if (!mmOpen) {
			$('#menu-mobile nav').hide('slide', {direction: 'left'});
			$('#menu-mobile > a > svg').removeClass('fa-times').addClass('fa-bars').attr('data-icon', 'bars');
			mmOpen = true;
		}
	});


	window.setTimeout(function () {
		$('div.alert').addClass('bounceOutRight');
	}, 3000);
	window.setTimeout(function () {
		$('div.alert').remove();
	}, 4000);


	/* Botão fechar menu mobile: */

	var bool = true;

	$('#bt-menu').on('click', function () {

		if (bool) {
			$('#nav').fadeIn();
			$(this).find('i').removeClass('fa-bars').addClass('fa-times');
		} else {
			$('#nav').fadeOut();
			$(this).find('i').removeClass('fa-times').addClass('fa-bars');
			setTimeout(function () {
				$('#nav').removeAttr('style');
			}, 500);
		}
		bool = !bool;
	});


	/* Show Hide Pesquisa: */

	$('#pesquisa').on('click', function (e) {
		$('#search-overlay').fadeIn();
		$('#search-overlay').css('display', 'flex');
		$('#search-overlay form').show().removeClass('animated zoomOut').addClass('animated zoomIn');
		$('#search').focus();
		e.preventDefault();
	});

	hideOverlayPesquisa = function () {
		$('#search-overlay form').removeClass('animated zoomIn').addClass('animated zoomOut');
		$('#search-overlay').fadeOut();
	}

	$('#search-overlay').on('click', hideOverlayPesquisa);

	$(document).keyup(function (e) {
		if (e.keyCode == 27) {
			hideOverlayPesquisa();
		}
	});

	/* Count Numbers: */
	$('.count').each(function () {
		$(this).prop('Counter', 0).animate({
			Counter: $(this).text()
		}, {
			duration: 4000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});

});
