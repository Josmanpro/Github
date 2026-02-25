
const ofertas = [
     {
        nombre: "Aceite de Girasol 900ml",
        imagen: "../imagenes/ofertas/aceite.png",
        precioOriginal: 15500,
        precioDescuento: 11990,
        supermercado: "D1",
        url: "#"
    },
    {
        nombre: "Aceite de Girasol 900ml",
        imagen: "../imagenes/ofertas/aceite.png",
        precioOriginal: 16000,
        precioDescuento: 12500,
        supermercado: "Éxito",
        url: "#"
    },
    {
        nombre: "Jabón de Tocador Palmolive 3x110g",
        imagen: "../imagenes/ofertas/jabon.webp",
        precioOriginal: 8500,
        precioDescuento: 6990,
        supermercado: "Éxito",
        url: "#"
    },
    {
        nombre: "Cereal Zucaritas 190g",
        imagen: "../imagenes/ofertas/cereal.png",
        precioOriginal: 9800,
        precioDescuento: 7500,
        supermercado: "Surtiplaza",
        url: "#"
    },
    {
        nombre: "Papel Higiénico Familia 12 rollos",
        imagen: "../imagenes/ofertas/papel.webp",
        precioOriginal: 22000,
        precioDescuento: 18900,
        supermercado: "Justo y Bueno",
        url: "#"
    },
    {
        nombre: "Gaseosa Coca-Cola 2.5L",
        imagen: "../imagenes/ofertas/gaseosa.webp",
        precioOriginal: 6500,
        precioDescuento: 5500,
        supermercado: "D1",
        url: "#"
    }
];
function obtenerMejoresPrecios(ofertas) {

    const agrupados = {};

    ofertas.forEach(oferta => {

        // Si el producto no existe en el grupo lo creamos
        if (!agrupados[oferta.nombre]) {
            agrupados[oferta.nombre] = oferta;
        } 
        // Si ya existe, comparamos precios
        else {
            if (oferta.precioDescuento < agrupados[oferta.nombre].precioDescuento) {
                agrupados[oferta.nombre] = oferta;
            }
        }
    });

    return Object.values(agrupados);
}

function mostrarOfertas() {

    const gridContainer = document.getElementById('ofertas-grid');
    gridContainer.innerHTML = '';

    const mejoresOfertas = obtenerMejoresPrecios(ofertas);

    mejoresOfertas.forEach(oferta => {

        const porcentajeDescuento =
            Math.round(((oferta.precioOriginal - oferta.precioDescuento)
                / oferta.precioOriginal) * 100);

        const card = document.createElement('div');
        card.className = 'offer-card';

        card.innerHTML = `
            <img src="${oferta.imagen}" alt="${oferta.nombre}">
            <span class="discount-badge">-${porcentajeDescuento}%</span>
            <div class="offer-info">
                <h3>${oferta.nombre}</h3>
                <span class="supermarket-tag">
                    Mejor precio en ${oferta.supermercado}
                </span>
                <div class="price-container">
                    <span class="original-price">
                        $${oferta.precioOriginal.toLocaleString('es-CO')}
                    </span>
                    <span class="discount-price">
                        $${oferta.precioDescuento.toLocaleString('es-CO')}
                    </span>
                </div>
            </div>
        `;

        gridContainer.appendChild(card);
    });
}

document.addEventListener("DOMContentLoaded", mostrarOfertas);