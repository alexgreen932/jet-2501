export default function jetPicker(prefixes = ['bg-', 'tx-', 'dashicons-']) {
    console.log('picker loaded');    
	const controls = document.querySelectorAll('.customize-control-select');

	controls.forEach(control => {
		const select = control.querySelector('select');
		const options = Array.from(select.options);
		const matchPrefix = prefixes.find(pre => options.some(opt => opt.value.startsWith(pre)));

		if (!matchPrefix) return;

		// Prepare picker
		const type = matchPrefix.replace(/-$/, ''); // 'bg-' → 'bg'
		const picker = document.createElement('div');
		picker.className = `jet-picker jet-picker-${type}`;
		picker.style.display = 'none';

		// Build list
		const ul = document.createElement('ul');
		options.forEach(opt => {
			if (!opt.value.startsWith(matchPrefix)) return;

			const li = document.createElement('li');
			li.dataset.value = opt.value;
			li.title = opt.text;

			if (type === 'bg' || type === 'tx') {
				li.style.background = `var(--${opt.value})`;
				li.className = opt.value;
			} else if (type === 'dashicons') {
				li.innerHTML = `<span class="${opt.value}"></span>`;
			} else {
				li.textContent = opt.text;
			}

			if (opt.value === select.value) {
				li.classList.add('selected');
			}

			li.addEventListener('click', () => {
				select.value = opt.value;
				select.dispatchEvent(new Event('change'));
				select.dispatchEvent(new Event('input'));

				ul.querySelectorAll('li').forEach(el => el.classList.remove('selected'));
				li.classList.add('selected');
			});

			ul.appendChild(li);
		});

		// Toggle button
		const toggle = document.createElement('div');
		toggle.className = 'jet-select-toggle';
		toggle.innerHTML = `<span>${select.options[select.selectedIndex].text}</span>`;
		toggle.addEventListener('click', e => {
			e.stopPropagation();
			picker.style.display = picker.style.display === 'block' ? 'none' : 'block';
		});

		// Assemble picker
		picker.appendChild(ul);
		control.appendChild(picker);
		control.appendChild(toggle);
		select.style.display = 'none';
	});
}

// Close on outside click
document.addEventListener('click', () => {
	document.querySelectorAll('.jet-picker').forEach(p => p.style.display = 'none');
});
