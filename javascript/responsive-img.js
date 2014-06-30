(function($, window, undefined) {

	var $win = $(window);

	var getDevicePixelRatio = function() {
		if(window.devicePixelRatio !== undefined) {
			return window.devicePixelRatio;
		}
		return 1;
	};

	var getImageVersion = function() {
		var devicePixelRatio = getDevicePixelRatio(); /* Function defined elsewhere.*/
		var width = window.innerWidth * devicePixelRatio;
		if (width > 640) {
					return "large";
		} else if (width > 320) {
					return "medium";
		} else {
					return "small"; // default version
		}
	};

	var lazyLoadImage = function(container) {
		var imageVersion = getImageVersion();

		if (!container || !container.children) {
			return;
		}
		var img = container.children[0];

		if (img) {
			var imgSRC = img.getAttribute("data-src-" + imageVersion);
			var altTxt = img.getAttribute("data-alt");
			if (imgSRC) {
				var imageElement = new Image();
				imageElement.src = imgSRC;
				imageElement.setAttribute("alt", altTxt ? altTxt : "");
				container.appendChild(imageElement);
				container.removeChild(container.children[0]);
			}
		}
	};

	$(function() {

		$('.r-image').each(function() {
			lazyLoadImage(this);
		});

	});

})(jQuery, window);