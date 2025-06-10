
//mobile login box
let mobileIcon = document.querySelector('.isMobile');
let isActive = false;
mobileIcon.addEventListener('click', () => {
    let loginBox = document.querySelector('.right-hand');
    if ( !isActive ) {
        isActive = true;
        loginBox.classList.add('isActive');
    } else {
        isActive = false;
        loginBox.classList.remove('isActive');
    }

})


//faq 
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.f-question').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.f-question').forEach(q => q !== btn && q.classList.remove('open'));
            document.querySelectorAll('.f-answer').forEach(a => a !== btn.nextElementSibling && a.classList.remove('open'));

            btn.classList.toggle('open');
            btn.nextElementSibling.classList.toggle('open');
        });
    });
});


//scroll menu

document.addEventListener("DOMContentLoaded", function () {
    const offset = 60;
    const links = document.querySelectorAll('a[href^="#"]');
    const sections = [...document.querySelectorAll('section[id]')];

    links.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            const target = document.querySelector(link.getAttribute('href'));
            if (target) {
                const y = target.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo({ top: y, behavior: 'smooth' });
            }
        });
    });

    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY + offset + 1;
        for (const section of sections) {
            if (
                scrollY >= section.offsetTop &&
                scrollY < section.offsetTop + section.offsetHeight
            ) {
                links.forEach(link => link.classList.remove('active'));
                const activeLink = document.querySelector(`a[href="#${section.id}"]`);
                if (activeLink) activeLink.classList.add('active');
                break;
            }
        }
    });
});




