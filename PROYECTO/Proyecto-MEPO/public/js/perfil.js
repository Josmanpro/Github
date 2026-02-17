// script.js

document.addEventListener('DOMContentLoaded', () => {
    const btnPerfil = document.getElementById('btnPerfil');
    const panelPerfil = document.getElementById('panelPerfil');

    // Abrir/Cerrar al hacer clic en la foto
    btnPerfil.addEventListener('click', (e) => {
        e.stopPropagation(); 
        panelPerfil.classList.toggle('activo');
    });

    // Cerrar si se hace clic fuera
    document.addEventListener('click', (e) => {
        if (!panelPerfil.contains(e.target) && !btnPerfil.contains(e.target)) {
            panelPerfil.classList.remove('activo');
        }
    });
});