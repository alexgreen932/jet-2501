function createScrollMenu(offset = 60) {
    const headings = document.querySelectorAll('h3');
    const main = document.querySelector('.jet-main');

    if (!headings.length) {
        main?.classList.remove('hasRightMargin');
        return null;
    }

    main?.classList.add('hasRightMargin');

    const items = [];

    headings.forEach(h => {
        const title = h.innerText;
        const hash = title.toLowerCase().trim().replace(/\s+/g, '-');

        h.setAttribute('id', hash);
        h.innerHTML = `<a href="#${hash}">${title}</a>`;

        items.push({ title, slug: `#${hash}` });
    });

    // Add smooth scroll behavior with offset
    document.querySelectorAll('.scroll-menu a').forEach(link => {
        link.addEventListener('click', e => {
            const hash = link.getAttribute('href');
            const target = document.querySelector(hash);
            if (target) {
                e.preventDefault();
                const top = target.getBoundingClientRect().top + window.scrollY - offset;
                window.scrollTo({ top, behavior: 'smooth' });
            }
        });
    });

    // Scrollspy (active item highlighting)
    function updateActiveLink() {
        let closest = null;
        let closestOffset = Number.POSITIVE_INFINITY;

        headings.forEach(h => {
            const box = h.getBoundingClientRect();
            const distance = Math.abs(box.top - offset);
            if (box.top - offset <= 0 && distance < closestOffset) {
                closest = h.getAttribute('id');
                closestOffset = distance;
            }
        });

        document.querySelectorAll('.scroll-menu a').forEach(link => {
            link.classList.toggle('isActive', link.getAttribute('href') === `#${closest}`);
        });
    }

    // Setup scroll listener
    window.removeEventListener('scroll', updateActiveLink);
    window.addEventListener('scroll', updateActiveLink, { passive: true });
    updateActiveLink();

    return items;
}


// Jet component for the scroll menu
com({
    name: 'scroll-menu',
    props: ['offset'],
    data: {
        items: null
    },
    tpl() {
        // this.addEventListener('updated-scroll-menu', () => {
        //     this.items = createScrollMenu(this.offset);
        //     this.render();
        // });

        return html`
        <ul j-if="items" class="scroll-menu">
            <li j-for="items">
                <a href="[e.slug]">[e.title]</a>
            </li>
        </ul>
        `;
    },
    created() {
        this.items = createScrollMenu(this.offset);
        this.render();
    },
    mount() {
        document.addEventListener('updated-scroll-menu', () => {
            this.items = createScrollMenu(this.offset);
            this.render();
        });
    }
});

