import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const loginTile = document.getElementById('logintile');
    const registerTile = document.getElementById('registertile');
    const overlay = document.getElementById('overlay');

    const loginButton = document.querySelector('.header-button button');
    const closeLogin = document.getElementById('closelogin');
    const closeRegister = document.getElementById('closeregister');
    const showRegister = document.getElementById('showregister');
    const showLogin = document.getElementById('showlogin');

    if (loginButton) {
        loginButton.addEventListener('click', () => {
            loginTile.style.display = 'block';
            overlay.style.display = 'block';
        });
    }

    if (closeLogin) {
        closeLogin.addEventListener('click', () => {
            loginTile.style.display = 'none';
            overlay.style.display = 'none';
        });
    }

    if (closeRegister) {
        closeRegister.addEventListener('click', () => {
            registerTile.style.display = 'none';
            overlay.style.display = 'none';
        });
    }

    if (showRegister) {
        showRegister.addEventListener('click', (e) => {
            e.preventDefault();
            loginTile.style.display = 'none';
            registerTile.style.display = 'block';
            overlay.style.display = 'block';
        });
    }

    if (showLogin) {
        showLogin.addEventListener('click', (e) => {
            e.preventDefault();
            registerTile.style.display = 'none';
            loginTile.style.display = 'block';
            overlay.style.display = 'block';
        });
    }

    if (overlay) {
        overlay.addEventListener('click', () => {
            loginTile.style.display = 'none';
            registerTile.style.display = 'none';
            overlay.style.display = 'none';
        });
    }
});

