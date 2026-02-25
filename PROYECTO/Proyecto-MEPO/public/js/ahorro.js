document.addEventListener("DOMContentLoaded", function () {

    const montoVisible = document.getElementById("montoVisible");
    const montoReal = document.getElementById("montoReal");
    const formulario = document.querySelector("form");

    const MONTO_MINIMO = 10000; // Puedes cambiar este valor

    function formatearNumero(valor) {
        return new Intl.NumberFormat("es-CO").format(valor);
    }

    function limpiarNumero(valor) {
        return valor.replace(/\D/g, "");
    }

    if (montoVisible) {

        montoVisible.addEventListener("input", function () {

            let valorLimpio = limpiarNumero(this.value);

            if (valorLimpio === "") {
                this.value = "";
                montoReal.value = "";
                return;
            }

            this.value = formatearNumero(valorLimpio);
            montoReal.value = valorLimpio;
        });

        montoVisible.addEventListener("keypress", function (e) {
            if (!/[0-9]/.test(e.key)) {
                e.preventDefault();
            }
        });
    }

    if (formulario) {
        formulario.addEventListener("submit", function (e) {

            let valor = parseInt(montoReal.value);

            if (!valor || valor < MONTO_MINIMO) {
                e.preventDefault();
                alert("El monto mínimo permitido es $" + formatearNumero(MONTO_MINIMO));
                montoVisible.focus();
                return;
            }
        });
    }

});