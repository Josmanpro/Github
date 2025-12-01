
const ofertas = [
    {
        nombre: "Aceite de Girasol 900ml",
        imagen: "imagenes/ofertas/aceite.png",
        precioOriginal: 15500,
        precioDescuento: 11990,
        supermercado: "D1",
        url: "#"
    },
    {
        nombre: "Jabón de Tocador Palmolive 3x90g",
        imagen: "imagenes/ofertas/jabon.webp",
        precioOriginal: 8500,
        precioDescuento: 6990,
        supermercado: "Éxito",
        url: "#"
    },
    {
        nombre: "Cereal Zucaritas 250g",
        imagen: "imagenes/ofertas/cereal.png",
        precioOriginal: 9800,
        precioDescuento: 7500,
        supermercado: "Surtiplaza",
        url: "#"
    },
    {
        nombre: "Papel Higiénico Familia 10 rollos",
        imagen: "imagenes/ofertas/papel.webp",
        precioOriginal: 22000,
        precioDescuento: 18900,
        supermercado: "Justo y Bueno",
        url: "#"
    },
    {
        nombre: "Gaseosa Coca-Cola 2.5L",
        imagen: "imagenes/ofertas/gaseosa.webp",
        precioOriginal: 6500,
        precioDescuento: 5500,
        supermercado: "D1",
        url: "#"
    }
];

function mostrarOfertas() {
    const gridContainer = document.getElementById('ofertas-grid');
    gridContainer.innerHTML = '';

    ofertas.forEach(oferta => {
        const porcentajeDescuento = Math.round(((oferta.precioOriginal - oferta.precioDescuento) / oferta.precioOriginal) * 100);
        const card = document.createElement('div');
        card.className = 'offer-card';
        card.innerHTML = `
            <img src="${oferta.imagen}" alt="${oferta.nombre}">
            <span class="discount-badge">-${porcentajeDescuento}%</span>
            <div class="offer-info">
                <h3>${oferta.nombre}</h3>
                <span class="supermarket-tag">Oferta en ${oferta.supermercado}</span>
                <div class="price-container">
                    <span class="original-price">$${oferta.precioOriginal.toLocaleString('es-CO')}</span>
                    <span class="discount-price">$${oferta.precioDescuento.toLocaleString('es-CO')}</span>
                </div>
                <div class="card-actions">
                    <a href="${oferta.url}" class="btn">Ver Oferta</a>
                </div>
            </div>
        `;

        gridContainer.appendChild(card);
    });
}
window.onload = mostrarOfertas;