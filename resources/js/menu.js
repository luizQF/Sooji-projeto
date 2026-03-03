document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');

    menuBtn.addEventListener('click', () => {
        // Abre/Fecha o menu
        menu.classList.toggle('hidden');
        menu.classList.toggle('flex');
    });
});