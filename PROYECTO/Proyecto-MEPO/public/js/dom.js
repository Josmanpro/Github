document.addEventListener("DOMContentLoaded", function () {
    actualizarVista();
});

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