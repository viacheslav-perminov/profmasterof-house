jQuery(document).ready(function($) { 
	
	$('img.img-svg').each(function(){
		var $img = $(this);
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');
		$.get(imgURL, function(data) {
			var $svg = $(data).find('svg');
			if(typeof imgClass !== 'undefined') {
				$svg = $svg.attr('class', imgClass+' replaced-svg');
			}
			$svg = $svg.removeAttr('xmlns:a');
			if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
				$svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
			}
			$img.replaceWith($svg);
		}, 'xml');
	});


	$('label.checkbox input[type="checkbox"]').change(function() {
		var isChecked = $(this).prop('checked');
		var $submitButton = $(this).closest('form').find('button[type="submit"]');
		$submitButton.prop('disabled', !isChecked);
	});


	document.addEventListener('wpcf7mailsent', function(event) {
		if ('110' == event.detail.contactFormId) {
			$('.gratitude-1').addClass('active');
		}
		/*if ('273' == event.detail.contactFormId) {
			$('.gratitude-2').addClass('active');
		}
		if ('10' == event.detail.contactFormId) {
			$('.gratitude-3').addClass('active');
		}
		if ('705' == event.detail.contactFormId) {
			$('.gratitude-4').addClass('active');
		}*/
	}, false );


	function filter_objects() {
		const filter = $("#filter_objects");
		var url = filter.attr("action");
		var query = filter.attr("action");
		newurl = query;
		query = filter.serialize();
		newurl = url + "?" + query;
		window.history.pushState({ path: url }, "?", newurl);

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: query,
			type: filter.attr("method"),
			beforeSend: function(){
				if($('.pages-navigation').length > 0) $('.pages-navigation').empty();
			},
			success: function (data) {
				$("#response_objects").html(data);
			},
		});
		return false;
	}

	$(document).on('submit', '#filter_objects', function(e){
		e.preventDefault();
		filter_objects();
	});

	$(document).on('change', 'input[name=order]', function(e){
		$('input[name=sorting]').val($(this).val());
		filter_objects();
	});

	$(document).on('click', '.reset_form', function(e){
		e.preventDefault();
		$('input[type=checkbox], input[type=radio]').removeAttr('checked');
		$('input[type=number]').val('');
		$('.filter__text.active, .categories__slider-item.active').removeClass('active');
		filter_objects();
	});


	function link_to_catalog() {
		const filter = $("#link_to_catalog");
		const url = php_vars_add.catalog_link;
		const query = filter.serialize();
		newurl = url + "?" + query;
		window.location.href = newurl;
	}

	$(document).on('submit', '#link_to_catalog', function(e){
		e.preventDefault();
		link_to_catalog();
	});



	/*if(window.location.href.includes(php_vars_add.catalog_link)) filter_objects();*/

});


window.onload = () => {
	let buttons_service = document.getElementsByClassName("get_service");
	let buttons_sale = document.getElementsByClassName("get_sale");
	let buttons_object = document.getElementsByClassName("get_object");
	let titles_service = document.querySelectorAll(".single-service .label__title h3");
	let titles_sale = document.querySelectorAll(".single-sale .label__title h3");
	let titles_object = document.querySelectorAll(".single .house-card__info h5");
	let hiddenField_service = document.getElementById("current_service");
	let hiddenField_sale = document.getElementById("current_sale");
	let hiddenField_object = document.getElementById("current_object");
	if (buttons_service.length > 0) {
		for (let i = 0; i < buttons_service.length; i++) {
			buttons_service[i].onclick = function(){
				hiddenField_service.value = titles_service[0].innerHTML;
			};
		}
	}
	if (buttons_sale.length > 0) {
		for (let i = 0; i < buttons_sale.length; i++) {
			buttons_sale[i].onclick = function(){
				hiddenField_sale.value = titles_sale[0].innerHTML;
			};
		}
	}
	if (buttons_object.length > 0) {
		for (let i = 0; i < buttons_object.length; i++) {
			buttons_object[i].onclick = function(){
				hiddenField_object.value = titles_object[0].innerHTML;
			};
		}
	}
};
