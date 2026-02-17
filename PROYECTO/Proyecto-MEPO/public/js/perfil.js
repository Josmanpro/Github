// script.js

document.addEventListener('DOMContentLoaded', () => {
    const btnPerfil = document.getElementById('btnPerfil');
    const panelPerfil = document.getElementById('panelPerfil');

    // 1. Abrir/Cerrar al hacer clic en la foto
    btnPerfil.addEventListener('click', (e) => {
        e.stopPropagation(); // Evita que el clic se propague al documento
        panelPerfil.classList.toggle('activo');
    });

    // 2. Cerrar el panel si se hace clic fuera de él
    document.addEventListener('click', (e) => {
        // Si el clic fue fuera del panel Y fuera del botón
        if (!panelPerfil.contains(e.target) && !btnPerfil.contains(e.target)) {
            panelPerfil.classList.remove('activo');
        }
    });
});