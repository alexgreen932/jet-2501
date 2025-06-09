

function createScrollMenu(){
        let headings = document.querySelectorAll('h3');
        let items = [];
        headings.forEach(e=>{
            let title = e.innerText;
            let hash = title.toLocaleLowerCase().trim().replace(/ /g, '-');//title to link, lowercase, no gap
            console.log('hash: ', hash);
            e.setAttribute('id', hash);
            // hash = inner.toLocaleLowerCase();
            e.innerHTML = `<a href="#${hash}">${title}</a>`;
            items.push({title: title, slug: `#${hash}` });
        });
        console.log('items: ', items);
        return items;
}

com({
    name: 'scroll-menu',
    data:{
        items: null,
        current: null,
    },
    tpl(){
        return html `
        <ul class="scroll-menu bs-2 p-1">
            <li j-for="items"><a href="[e.slug]">[e.title]</a></li>
        </ul>
        `
    },
    created(){
        this.items = createScrollMenu();
        //menu updates on content changing 
        document.addEventListener('updated-scroll-menu', () => {
            console.log('catch event');
            this.items = createScrollMenu();  
            this.render();          
        });
        // let headings = document.querySelectorAll('h3');
        // let items = [];
        // headings.forEach(e=>{
        //     let title = e.innerText;
        //     let hash = title.toLocaleLowerCase().trim().replace(/ /g, '-');//title to link, lowercase, no gap
        //     console.log('hash: ', hash);
        //     e.setAttribute('id', hash);
        //     // hash = inner.toLocaleLowerCase();
        //     e.innerHTML = `<a href="#${hash}">${title}</a>`;
        //     items.push({title: title, slug: `#${hash}` });
        // });
        // console.log('items: ', items);
        // this.items = items;
    }
})


