// Main component function to activate dynamic content loading
export default function dynamicUpdate(contentType) {
    const currentUrl = window.location.href;

    // Exit if the current page doesn't match the expected content type
    if (!matchType(currentUrl, contentType)) return;

    const links = document.querySelectorAll('a');

    links.forEach(link => {
        link.addEventListener('click', event => {
            const targetUrl = link.getAttribute('href');

            // Only intercept links with matching post type
            if (matchType(targetUrl, contentType)) {
                event.preventDefault();
                toggleLoader(true);
                pushUrl(targetUrl);
                doRequest(targetUrl, contentType);
            }
        });
    });
}

// Check if a given URL includes the specified post type
function matchType(url, type) {
    return url.includes(`/${type}/`);
}

// Update browser history
function pushUrl(url) {
    history.pushState({ path: url }, '', url);
}

// Build API URL and fetch content by slug
function doRequest(fullUrl, contentType) {
    const domain = window.location.origin;
    const slug = fullUrl.replace(domain, '').replace(`/${contentType}/`, '').replaceAll('/', '');
    const apiUrl = `${domain}/wp-json/wp/v2/${contentType}?slug=${slug}`;
    loadContent(apiUrl);
}

// Load and render post content
async function loadContent(url) {
    try {
        const res = await fetch(url);
        const json = await res.json();

        const item = json[0];
        document.title = item.title.rendered;

        document.querySelector('.entry-title').textContent = item.title.rendered;
        document.querySelector('.entry-content').innerHTML = item.content.rendered;

        // Trigger scroll menu update
        document.dispatchEvent(new Event('updated-scroll-menu', { bubbles: true }));
    } catch (err) {
        console.error('Failed to load content:', err);
    } finally {
        toggleLoader(false);
    }
}

// Show or hide the preloader
function toggleLoader(show) {
    const loader = document.querySelector('.jet-preloader');
    if (!loader) return;

    loader.classList.toggle('isActive', show);
}
