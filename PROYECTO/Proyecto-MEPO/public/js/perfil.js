document.addEventListener("DOMContentLoaded", function () {

    const foto = document.getElementById("imgPerfil");
    const panel = document.getElementById("panelPerfil");

    foto.addEventListener("click", function (e) {
        e.stopPropagation();
        panel.classList.toggle("activo");
    });

    document.addEventListener("click", function () {
        panel.classList.remove("activo");
    });

});