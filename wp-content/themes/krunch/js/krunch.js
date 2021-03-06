// function reinitialiseGrid() {

// 	$('.mix:visible').each(function (i) {

// 		$this = $(this);
// 		$this.removeClass('clear');
// 		if (i === 3) {
// 			$this.addClass("clear");
// 			i = 0;
// 		}
// 	});
// }

function goBack() {
		window.history.back();
}

$(function() {

		$('.banner').unslider({
			speed: 600,
		delay: 6000,
		complete: function() {},
		keys: true,
		dots: true,
		fluid: true
		//fade: true  
		});

		var winHeight = $(window).height();
		//winHeight = winHeight * 0.8;

		$('.homeBanner, .homeBanner .banner, .homeBanner .banner .slide').height(winHeight);

		$('.socialIcons li.search a').on('click', function(e){
			e.preventDefault();
		$('.searchFormHeader').toggleClass('hide');
		});
		

		$('.responsiveMenuIcons li.respMenu a').on('click', function (e){
			e.preventDefault();
			$(".menu-main-menu-container").toggle(400);
		});

		$('#respClose').on('click', function (){
			$(".menu-main-menu-container").toggle(400);
		});

		$('.responsiveMenuIcons li.search img').on('click', function (e){
			e.preventDefault();
			//$(".header").css('position','relative');
			$(".responsiveSearch").slideToggle(400);
		});

		$('select#mobileSubNav').on('change', function() {
			var val = $(this).val();
			window.location = val;
		});

	// $('#newsWrapper').mixItUp({
	// 	layout: {
	// 		display: 'block'
	// 	},
	// 	callbacks: {
	// 		onMixEnd: function(state){
	// 			reinitialiseGrid();
	// 			//alert('Mix it up finished');
	// 		}
	// 	}
			
	// });

	$(".moreArrow a").on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: $("#more").offset().top
		}, 600);
	});


	function equalHeight(group) {
		tallest = 0;
		group.each(function() {
				thisHeight = $(this).height();
				if(thisHeight > tallest) {
						tallest = thisHeight;
				}
		});
		group.height(tallest);
	}
	
	equalHeight($(".region"));


	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};
});


$(function() {
	function initialize() {

		//if($.browser.msie){
			//var grayStyles = [];
		//} else {
			var greyStyles = [
				{
					stylers: [
						{saturation: -50},
						{gamma:0.91},
						{lightness: 6}
					]
				},
			];
		//}

		var mapOptions = {
			//center: kwmLatLng,
			styles: greyStyles
			//zoom: 8
		};

		var map = new google.maps.Map(document.getElementById("map-canvas"),
				mapOptions);

		//Description, Latitude, Longitude, Marker link
		var locations = [
			['<strong>Krunch West Midlands</strong>', 52.4877110,-2.0070540, 'http://chart.apis.google.com/chart?chst=d_map_pin_letter_withshadow&chld=K|5F5499|FFFFFF'],
			['<strong>Krunch South West</strong>', 51.606271,-2.523135, 'http://chart.apis.google.com/chart?chst=d_map_pin_letter_withshadow&chld=K|6db447|FFFFFF']
		];

		var bounds = new google.maps.LatLngBounds();
		var infowindow = new google.maps.InfoWindow();

		for (i = 0; i < locations.length; i++) {
					marker = new google.maps.Marker({
							position: new google.maps.LatLng(locations[i][1], locations[i][2]),
							icon: locations[i][3],
							map: map
					});

					bounds.extend(marker.position);

			google.maps.event.addListener(marker, 'click', (function (marker, i) {
				return function () {
					infowindow.setContent(locations[i][0]);
					infowindow.open(map, marker);
				}
			})(marker, i));
		}

		map.fitBounds(bounds);

		var kswImage = 'http://localhost/krunch/wp-content/themes/krunch/img/logo.png';
			
		// var kwmMarker = new google.maps.Marker({
		// 	position: kwmLatLng,
		// 	map: map,
		// 	//icon: kswImage
		// });

		// var kswMarker = new google.maps.Marker({
		// 	position: kswLatLng,
		// 	map: map,
		// 	//icon: kswImage
		// });
	}

	google.maps.event.addDomListener(window, 'load', initialize);

	// function kwmStreetView() {
	// 	var krunchWMLocation = new google.maps.LatLng('52.487425','-2.006763');
	// 	var panoramaOptions = {
	// 		position: krunchWMLocation,
	// 		pov: {
	// 			heading: 290.84,
	// 			pitch: 0
	// 		},
	// 		zoom: 1
	// 	};
	// 	var myPanoWM = new google.maps.StreetViewPanorama(
	// 	document.getElementById('kwm-map-canvas'),
	// 			panoramaOptionsWM);
	// 	myPanoWM.setVisible(true);

	// }

	// google.maps.event.addDomListener(window, 'load', kwmStreetView);



	// function initializeKSWStreetView() {
	// 	var krunchSWLocation = new google.maps.LatLng('51.606679','-2.523323');
	// 	var panoramaOptions = {
	// 		position: krunchSWLocation,
	// 		pov: {
	// 			heading: 179.45,
	// 			pitch: 0
	// 		},
	// 		zoom: 1
	// 	};
	// 	var myPano = new google.maps.StreetViewPanorama(
	// 	document.getElementById('ksw-map-canvas'),
	// 			panoramaOptions);
	// 	myPano.setVisible(true);

	// }

	// google.maps.event.addDomListener(window, 'load', initializeKSWStreetView);


	



});