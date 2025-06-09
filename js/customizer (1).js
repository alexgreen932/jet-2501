/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function () {

	// Utility function: remove all classes with a prefix and add the new one
	function jetCustomizer(prop, selector, prefix) {
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

	jetCustomizer('m2_col', '#menu-2', 'tx-');
	// jetCustomizer('', '', '');
	// jetCustomizer('', '', '');
	// jetCustomizer('', '', '');

	//top bar
	jetCustomizer('topbar_justify', '.topbar-inner', 'jc-');
	jetCustomizer('topbar_bg', '.jet-topbar', 'bg-');
	// jetCustomizer('', '', '');
	// jetCustomizer('', '', '');



	// Header background
	wp.customize('header_bg_color', function (value) {
		value.bind(function (newval) {
			document.querySelector('header').style.backgroundColor = newval;
		});
	});

	// Header text color class
	// wp.customize('header_text_color_class', function (value) {
	// 	value.bind(function (newval) {
	// 		changeClass('header', 'c-', newval);
	// 	});
	// });

	//add extra

	//temp color picker  simple
	// let ops = document.querySelectorAll('.customize-control-select');
	// console.log('ops: ', ops);
	// ops.forEach(e => {
	// 	let v = e.getAttribute('value');
	// 	e.classList.add(v);
	// })


})();



