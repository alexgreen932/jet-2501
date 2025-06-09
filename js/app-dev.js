

import './src/scroll-menu.js';
import dynamicUpdate from  './src/dynamicUpdate.js';
import jetPicker from  './src/jetPicker.js';


//todo adding dynamically in footer.php
dynamicUpdate('docs');


(function () {
	wp.customize.bind('ready', function () {
		console.log('[Customizer Ready]');

		wp.customize.control.bind('add', function (control) {
			// Only act on controls that render a <select>
			if (
				control &&
				control.container &&
				control.container[0] &&
				control.container[0].classList.contains('customize-control-select')
			) {
				// Only target unprocessed selects
				const el = control.container[0];
				if (!el.classList.contains('jet-enhanced')) {
					el.classList.add('jet-enhanced');
					console.log('[jetPicker] Initialized on control:', control.id);

					// Run the picker for this specific element
					jetPicker(['bg-', 'tx-', 'dashicons-']);
				}
			}
		});
	});
})();






//picker ----

let pickerLoaded = false;

wp.customize.bind('ready', function () {
	wp.customize.section.each(function (section) {
		section.expanded.bind(function (isActive) {
			if (isActive && !window.jetPickerLoaded) {
				window.jetPickerLoaded = true;
				console.log('jetPicker initialized');
				jetPicker(['bg-', 'tx-', 'dashicons-']);
			}
		});
	});
});



// Close on outside click
document.addEventListener('click', () => {
	document.querySelectorAll('.jet-picker').forEach(p => p.style.display = 'none');
});