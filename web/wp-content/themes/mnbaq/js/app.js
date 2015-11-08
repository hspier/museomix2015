var init = false;
$(document).foundation();

$(document).ready(function() {		


	$('img.img-icon').each(function(){
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    jQuery.get(imgURL, function(data) {
	        // Get the SVG tag, ignore the rest
	        var $svg = jQuery(data).find('svg');

	        // Add replaced image's ID to the new SVG
	        if(typeof imgID !== 'undefined') {
	            $svg = $svg.attr('id', imgID);
	        }
	        // Add replaced image's classes to the new SVG
	        if(typeof imgClass !== 'undefined') {
	            $svg = $svg.attr('class', imgClass+' replaced-svg');
	        }

	        // Remove any invalid XML tags as per http://validator.w3.org
	        $svg = $svg.removeAttr('xmlns:a');

	        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
	        if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
	            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
	        }

	        // Replace image with new SVG
	        $img.replaceWith($svg);

	    }, 'xml');

	});

	if($("#login-form").length > 0) {
		$("#login-form").find("input").focus(function() {
			if(!init) {
				jsKeyboard.init("keyboard");			
				init = true;
			}			
			$("#keyboard").show();
		});
	}


	if($("#btn-comments").length > 0) {
		$("#btn-comments").click(function(ev) {
			$("#comments_row").removeClass("hidden");
			ev.preventDefault();
			ev.stopPropagation();
			return false;
		})
	}
	if($("#btn-back").length > 0) {
		$("#btn-back").click(function(ev) {			
			ev.preventDefault();
			ev.stopPropagation();
			goTo("create-feedback", "list");			
			return false;
		})
	}
	if($("#btn-share").length > 0) {
		$("#btn-share").click(function(ev) {			
			if($("input[type='checkbox']:checked").length == 0) {
				ev.preventDefault();
				ev.stopPropagation();			
				alert("Qu'est-ce que cette oeuvre évoque pour vous ?");
				return false;
			}
		})
	}

	if($("#btn-cancel").length > 0) {
		$("#btn-cancel").click(function(ev) {			
			ev.preventDefault();
			ev.stopPropagation();
			goTo("log", "list");			
			return false;
		})
	}

	if($("#btn-list").length > 0) {
		$("#btn-list").click(function(ev) {			
			var location = window.location.search.replace(/\&exclude_category=[0-9]*/gi, "");
			location = location.replace(/\&emotions=([0-9]*_){1,}[0-9]*/gi, "");			
			window.location.search=location;
		})
	}

	if($("#btn-enter").length > 0) {
		$("#btn-enter").click(function(ev) {		
			if(window.location.search.indexOf("profile=") === -1) {
				goTo("list", "log");				
			} else {
				goTo("list", "create-feedback");
			}			
		})
	}

	if($("#btn-quit").length > 0) {
		$("#btn-quit").click(function(ev) {		
			window.location.search = window.location.search.replace(/\&profile=[0-9]*/gi, "");			
		})
	}

	if($("#btn-main").length > 0) {
		$("#btn-main").click(function(ev) {		
			goTo("qr", "create-profile");
		})
	}


});

function goTo(from, action) {
	window.location.search=window.location.search.replace("action=" + from, "action=" + action);
}