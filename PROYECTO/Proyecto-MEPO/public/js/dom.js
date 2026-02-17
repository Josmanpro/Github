document.addEventListener("DOMContentLoaded", function () {
    actualizarVista();
    activarPanelPerfil();
});

/* ============================= */
/*         LOGIN / VISTA         */
/* ============================= */

function actualizarVista() {
    const usuario = localStorage.getItem("usuario");

    const btnLogin = document.getElementById("btnLogin");
    const perfilUsuario = document.getElementById("perfilUsuario");
    const nombreUsuario = document.getElementById("nombreUsuario");

    if (usuario) {
        if (btnLogin) btnLogin.classList.add("oculto");
        if (perfilUsuario) perfilUsuario.classList.remove("oculto");
        if (nombreUsuario) nombreUsuario.textContent = usuario;
    }
}

function iniciarSesion(nombre) {
    localStorage.setItem("usuario", nombre);
    actualizarVista();
}

function cerrarSesion() {
    localStorage.removeItem("usuario");
    location.reload();
}

/* ============================= */
/*      PANEL DESPLEGABLE       */
/* ============================= */

function activarPanelPerfil() {

    const foto = document.getElementById("imgPerfil");
    const panel = document.getElementById("panelPerfil");

    if (!foto || !panel) return;

    foto.addEventListener("click", function (e) {
        e.stopPropagation();
        panel.classList.toggle("activo");
    });

    document.addEventListener("click", function () {
        panel.classList.remove("activo");
    });
}

function Abrirmodal(){
    document.getElementById("miModal").style.display = "block"
}