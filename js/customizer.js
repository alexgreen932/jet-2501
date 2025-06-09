/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function () {
	// Utility functions:
	//change classes
	function jetClasses(prop, selector, prefix) {
		wp.customize(prop, function (value) {
			value.bind(function (newval) {
				document.querySelectorAll(selector).forEach(el => {
					el.classList.forEach(cls => {
						if (cls.startsWith(prefix)) el.classList.remove(cls);
					});
					el.classList.add(newval);
				});
			});
		});
	}
	//change colors
	function jetColors(prop, selector, styleProp) {
		wp.customize(prop, function (value) {
			value.bind(function (newval) {
				document.querySelectorAll(selector).forEach(el => {
					el.style[styleProp] = newval;
				});
			});
		});
	}

	//header 
	//style
	jetColors('header_bg', '.jet-header', 'backgroundColor');
	jetColors('header_col', '.jet-header', 'color');
	//classes


})();



