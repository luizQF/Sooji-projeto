
document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('menu-button');
    const menu = document.getElementById('menu');

    menuButton.addEventListener('click', function() {
        menu.classList.toggle('hidden');
        const imgHamburger = document.getElementById('img-hamburger');
        const imgClose = document.getElementById('img-close');
        imgHamburger.classList.toggle('scale-0');
        imgHamburger.classList.toggle('opacity-0');
        imgHamburger.classList.toggle('rotate-90');

        
        imgClose.classList.toggle('scale-100');
        imgClose.classList.toggle('opacity-100');
        imgClose.classList.toggle('rotate-0');
    });
});