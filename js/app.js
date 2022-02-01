
console.log('init child theme scripts');

function twentytwentyoneExpandSubMenu() {
    console.log('expand menu clicked...');
}


const observerOptions = {
    root: null,
    threshold: 0,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

window.addEventListener('DOMContentLoaded', (event) => {

    const sections = Array.from(document.getElementsByClassName('to-fade'));

    for (let section of sections) {
        observer.observe(section);
    }

});