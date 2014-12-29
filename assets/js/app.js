var ParutoApp = {
	base: $('.base-url').val(),
	navStickStatus: false,

	/* Parameters for creating stories */
	storyCreateParams: {
		type: null,
	},

	/* Base 64 encoded image */
	uploadImage: null,

	toBeDelete: null,

	/* Latitude and Longitude of Device */
	deviceLocation: null,

	/* Application initialization */
	initializeApp: function() {
		$('textarea#story').ckeditor();
		$('select').selectric();
		ParutoApp.navStick();
		ParutoApp.bindEvents();
		// ParutoApp.locationFinder();
	},
	initializeAppAction: function() {
		$(document).on('click', '.dyn-action', ParutoApp.dynamicAction);
		$(document).on('click', '.vote-post-trigger', ParutoApp.votePost);
		// $('.downvote-story').click(deleteStory);
	},
	bindEvents: function() {
		$('.media-buttons').click(ParutoApp.switchMediaTab);
		$('#create-story-form').submit(ParutoApp.storyCreateProcess);
		$(document).on('click', '.display-stats', ParutoApp.displayStats);
		$('#image-content').change(ParutoApp.selectImage);
	},
	navStick: function() {
		$(window).scroll(function() {
			if(ParutoApp.navStickStatus === false) {
				if( $(window).scrollTop() > 30 ) {
					$('#header').addClass('shadow-nav');
					ParutoApp.navStickStatus = true;
				}
			} else {
				if($(window).scrollTop() === 0) {
					$('#header').removeClass('shadow-nav');
					ParutoApp.navStickStatus = false;
				}
			}
		});
	},
	switchMediaTab: function() {
		if($(this).hasClass('selected')) {
			$('.media-selection:visible').hide();
			$(this).removeClass('selected');
			ParutoApp.storyCreateParams.type = null;
		} else {
			$('.media-selection:hidden').show();
			$(this).siblings().removeClass('selected');
			$(this).addClass('selected');
			var link = $(this).prop('href');
			var id = link.substr(link.indexOf('#')); 
			if(id === "#image-upload") {
				ParutoApp.storyCreateParams.type = 'image';
			} else if(id === "#link-input") {
				ParutoApp.storyCreateParams.type = 'link';
			}
			$(id).show().siblings().hide();
		}
		
		return false;
	},
	/* Change event for Image Upload action */
	selectImage: function() {
    $('media-error').hide();
		var $files = $(this).context.files;
		if($files && $files[0]) {
    	if($files[0].type === "image/jpeg" || $files[0].type === "image/png") {
		    var reader = new FileReader();
	        reader.onload = function (e) {
	            ParutoApp.uploadImage = e.target.result;
	        };
	        reader.readAsDataURL($files[0]);
	    } else {
	    	// Show image error message
	    	$('media-error').show();
	    }
    }
	},

	/* Code for getting longitute and latitude of device */
	locationFinder: function() {
		$('#find-location').click(function() {
			$('.location-loader').show();
		    if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(function(position) {
		        	ParutoApp.deviceLocation = {
		        		lat: position.coords.latitude,
		        		lng: position.coords.longitude
		        	};
		        	// Stop loading
	    			$('.location-loader').children('.txt').text('Getting location data');
		        	// Parse location using Google Reverse Geocoding
		        	$.ajax({
		        		url: 'https://maps.googleapis.com/maps/api/geocode/json',
		        		data: {
		        			latlng: position.coords.latitude + ',' + position.coords.longitude,
		        			key: 'AIzaSyDWz0w-tYVP7iFwQ4qt2xR18UMuhm80mwk'
		        		},
		        		dataType: 'json'
		        	}).success(function(data) {
		    			$('.location-loader').hide();
		    			$('#find-location').hide();
		    			$('.location-information').show().html('<p>' + data.results[1].formatted_address + '</p>');
		    			console.log(data);
		        	});
		        	// Say successfully found location
		        });
		    } else {
		    	// Say not supported
	    		$('location-loader').hide();
		        // exit gracefully
		    }
		    return false;
		});
	},

	storyCreateProcess: function() {
		var errors = 0;
		var fields = ['headline','state','story'];
		
		/* Field Validation */
		for(var i in fields) {
			$('.' + fields[i] + '-error ul').empty();
			var cleaned_input =  $('#' + fields[i]).val().trim();
			if( cleaned_input === "" || cleaned_input.length < 3 ) {
				$('.' + fields[i] + '-error ul').append('<li>You need to enter something valid for ' + fields[i] + '</li>');
				$('.' + fields[i] + '-error').removeClass('hide');
				errors++;
			} else {
				$('.' + fields[i] + '-error').addClass('hide');
				ParutoApp.storyCreateParams[fields[i]] = cleaned_input;
			}
		}

		/* Ensure that the story length is more than 300 characters long. */
		if($('#story').val().length < 30) {
			$('.story-error ul').append('<li>Your story needs to be at least 300 characters long</li>');
			$('.story-error').removeClass('hide');
			errors++;
		}

		/* Check additional Media */
		if(ParutoApp.storyCreateParams.type === 'image' && ParutoApp.uploadImage !== null) {
			ParutoApp.storyCreateParams.image = ParutoApp.uploadImage;
			ParutoApp.storyCreateParams.media = null;
		} else if(ParutoApp.storyCreateParams.type === 'link') {
			if($('#link-content').val().trim() !== "") {
				ParutoApp.storyCreateParams.media = $('#link-content').val();
			}
			ParutoApp.storyCreateParams.image = null;
		}

		// Check for origin
		/*
		if(ParutoApp.deviceLocation !== null) {
			ParutoApp.storyCreateParams.origin = ParutoApp.deviceLocation.lat + ',' + ParutoApp.deviceLocation.lng;
		}
		*/

		/* Check for anonymous entry */
		if($('#anonymous').is(':checked')) {
			ParutoApp.storyCreateParams.anonymous = 1;
		} else {
			ParutoApp.storyCreateParams.anonymous = 0;
		}

		if(errors > 0) {
			var firstErrorPosition = $('.error-field:visible').first().offset().top - 200;
			$('body').animate({ scrollTop:firstErrorPosition }, 500);
			// setTimeout(function() {
			// 	$('.error-field').addClass('hide');
			// }, 6000);
		} else {
			// Show loading dialog
			ParutoApp.startLoading();
			$.ajax({
				url: ParutoApp.base + '/stories/create',
				dataType: 'json',
				method: 'POST',
				data: ParutoApp.storyCreateParams
			}).success(function(data) {
				// Update Div with success/error message
				ParutoApp.stopLoading();
				var msg;
				if(data._success !== undefined) {
					msg = data._success[data._success.length - 1];
					ParutoApp.displayMessage(msg, 'success');
					window.location = ParutoApp.base + '/users/dashboard/';
				} else if(data._error !== undefined) {
					msg = data._error[data._error.length - 1];
					ParutoApp.displayMessage(msg, 'error');
				}
			}).error(function(data) {
				ParutoApp.stopLoading();
				console.log(data);
			});
		}
		return false;
	},
	startLoading: function() {
		$('.overlay').show();
		$('.modal-overlay').show();
	},
	stopLoading: function() {
		$('.overlay').hide();
		$('.modal-overlay').hide();
	},
	displayStats: function() {
		if($(this).hasClass('active'))
			$(this).removeClass('active');
		else
			$(this).addClass('active');

		$(this).parents('h3').next('.stats').slideToggle();
		return false;
	},
	displayMessage: function(msg, type) {
		/* Remove error and success classes if they exist */
		$('#application-message-parser').removeClass('error');
		$('#application-message-parser').removeClass('success');
		/* Add the required class */
		$('#application-message-parser').addClass(type);
		$('#application-message-parser').removeClass('hidden');
		$('#application-message-parser').html(msg);
		setTimeout(function() {
			$('#application-message-parser').addClass('hidden');
		}, 3000);

	},
	ajaxNav: function(location) {
		// ParutoApp.startTransitionLoad();
		$('#ajax-content').load(location, function() {
			// ParutoApp.stopTransitionLoad();
			$(document).foundation();
		});
	},
	dynamicAction: function() {
		$('#confirm-modal').foundation('reveal', 'close');
		var link = $(this).prop('href');
		ParutoApp.startLoading();
		$.ajax({
			url: link,
			dataType: 'json',
			method: 'GET'
		}).success(function(data) {
			ParutoApp.stopLoading();
			var msg;
			if(data._success !== undefined) {
				msg = data._success[data._success.length - 1];
				ParutoApp.displayMessage(msg, 'success');
				ParutoApp.ajaxNav(window.location.href);
			} else if(data._error !== undefined) {
				msg = data._error[data._error.length - 1];
				ParutoApp.displayMessage(msg, 'error');
			}
		});
		return false;
	},
	votePost: function() {
		// ParutoApp.startLoading();
		$.getJSON($(this).prop('href'))
		.success(function(data) {
			// ParutoApp.stopLoading();
			var msg;
			if(data._success !== undefined) {
				msg = data._success[data._success.length - 1];
				ParutoApp.displayMessage(msg, 'success');
				ParutoApp.ajaxNav(window.location.href);
			} else if(data._error !== undefined) {
				msg = data._error[data._error.length - 1];
				ParutoApp.displayMessage(msg, 'error');
			}
		})
		.error(function(data) {
			// ParutoApp.stopLoading();
			console.log(data);
		});
		return false;
	}
	/*
	createStories: function() {
		// Add change listener to select menu
		$('#story_type').on('change', function() {
			if($(this).val() === '')
		})
	}
	*/
};
$(function() {
	$(document).foundation();
	ParutoApp.initializeApp();
	ParutoApp.initializeAppAction();
});