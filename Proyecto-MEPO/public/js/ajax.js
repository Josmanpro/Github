
const productos = {
    lacteos: [
        {
            nombre: "Leche Entera 1L",
            imagen: "../imagenes/comparar/leche.webp",
            precios: {
                "Éxito": 3200,
                "D1": 2950,
                "Mercacentro": 3100,
                "Surtiplaza": 3300
            }
        },
        {
            nombre: "Queso Campesino 500g",
            imagen: "../imagenes/comparar/Quesocampesino.jpg",
            precios: {
                "Éxito": 12500,
                "D1": 11900,
                "Mercacentro": 13000,
                "Surtiplaza": 12800
            }
        },
        {
            nombre: "Yogurt Natural 1L",
            imagen: "../imagenes/comparar/yogurt.png",
            precios: {
                "Éxito": 5500,
                "D1": 5200,
                "Mercacentro": 5390,
                "Surtiplaza": 5600
            }
        }
    ],
    granos: [
        {
            nombre: "Arroz Diana 500g",
            imagen: "../imagenes/comparar/Arrozdiana.webp",
            precios: {
                "Éxito": 2200,
                "D1": 1990,
                "Mercacentro": 2100,
                "Surtiplaza": 2300
            }
        },
        {
            nombre: "Lentejas Rojas 500g",
            imagen: "../imagenes/comparar/lentejas.avif",
            precios: {
                "Éxito": 3500,
                "D1": 3200,
                "Mercacentro": 3600,
                "Surtiplaza": 3700
            }
        }
    ],
    aseo: [
        {
            nombre: "Jabón en Polvo Fab 500g",
            imagen: "../imagenes/comparar/fab.jpeg",
            precios: {
                "Éxito": 4800,
                "D1": 4500,
                "Mercacentro": 4900,
                "Surtiplaza": 5100
            }
        },
        {
            nombre: "Limpiavidrios 750ml",
            imagen: "../imagenes/comparar/limpiavidrios.jpg",
            precios: {
                "Éxito": 6500,
                "D1": 6200,
                "Mercacentro": 6800,
                "Surtiplaza": 6900
            }
        }
    ]
};
/*const buscador = document.getElementById("buscador");
const boton = document.getElementById("btnBuscar");
const resultados = document.getElementById("resultados");

boton.addEventListener("click", buscarProducto);

function buscarProducto(){

let texto = buscador.value.toLowerCase();
resultados.innerHTML = "";

for(let categoria in productos){

productos[categoria].forEach(producto => {

if(producto.nombre.toLowerCase().includes(texto)){

let html = `
<div class="producto">
<img src="${producto.imagen}" width="100">
<h3>${producto.nombre}</h3>
<p>Éxito: $${producto.precios["Éxito"]}</p>
<p>D1: $${producto.precios["D1"]}</p>
<p>Mercacentro: $${producto.precios["Mercacentro"]}</p>
<p>Surtiplaza: $${producto.precios["Surtiplaza"]}</p>
</div>
`;

resultados.innerHTML += html;

}

});

}

}*/
function cargarCategoria() {
    // 1. Obtener la categoría seleccionada del <select>
    const categoriaSeleccionada = document.getElementById('categoria').value;
    const resultadoDiv = document.getElementById('resultado');

    // 2. Limpiar resultados anteriores
    resultadoDiv.innerHTML = '';

    // 3. Obtener los productos de la categoría seleccionada
    const productosDeCategoria = productos[categoriaSeleccionada];

    if (!productosDeCategoria || productosDeCategoria.length === 0) {
        resultadoDiv.innerHTML = '<p>No se encontraron productos para esta categoría.</p>';
        return;
    }

    // 4. Crear el HTML para cada producto y añadirlo al div de resultados
    productosDeCategoria.forEach(producto => {
        // Encontrar el precio más bajo para destacarlo
        let preciosArray = Object.entries(producto.precios);
        let mejorPrecio = Math.min(...preciosArray.map(p => p[1]));
        let peorPrecio = Math.max(...preciosArray.map(p => p [1]));
        let supermercadoMejorPrecio = preciosArray.find(p => p[1] === mejorPrecio)[0];

        // Crear la tarjeta del producto
        const card = document.createElement('div');
        card.className = 'product-card';

        // Generar la lista de precios
        let listaDePreciosHTML = '';
        for (const supermercado in producto.precios) {
            const precio = producto.precios[supermercado];
            const esMejorPrecio = supermercado === supermercadoMejorPrecio;
            listaDePreciosHTML += `
                <li 
                class="price-item ${esMejorPrecio ? 'best-price' : ''}"
                    onclick="abrirModalConfirmacion('${producto.nombre}',${precio}, ${peorPrecio})">
                    <span class="supermarket-name">${supermercado}</span>
                    <span class="price-value">$${precio.toLocaleString('es-CO')}</span>
                </li>
            `;
        }

        // Inyectar todo el HTML en la tarjeta
        card.innerHTML = `
            <img src="${producto.imagen}" alt="${producto.nombre}">
            <div class="product-info">
                <h3>${producto.nombre}</h3>
                <ul class="price-list">
                    ${listaDePreciosHTML}
                </ul>
            </div>
        `;

        // Añadir la tarjeta al contenedor de resultados
        resultadoDiv.appendChild(card);
    });
}

// Cargar la primera categoría (Lácteos) por defecto al cargar la página
window.onload = () => {
    cargarCategoria();
};
let totalAhorro = 0;
let productoSeleccionadoNombre = "";
let precioSeleccionado = null;
let precioMasCaroSeleccionado = null;

function abrirModalConfirmacion(nombre ,precio, peorPrecio) {
    productoSeleccionadoNombre = nombre;
    precioSeleccionado = precio;
    precioMasCaroSeleccionado = peorPrecio;

    document.getElementById("modalConfirmacion").style.display = "flex";
}

function cerrarModal() {
    document.getElementById("modalConfirmacion").style.display = "none";
}

/*document.addEventListener("DOMContentLoaded", function () {*/
    document.getElementById("btnConfirmar").addEventListener("click", function () {
        seleccionarPrecio(precioSeleccionado, precioMasCaroSeleccionado);
        cerrarModal();
    });

    document.getElementById("btnCancelar").addEventListener("click", cerrarModal);



function seleccionarPrecio(precio, peorPrecio){

    let ahorro = peorPrecio - precio;

    totalAhorro += ahorro;

    const tabla = document.getElementById("listaCompras");
    const fila = document.createElement("tr");
    fila.innerHTML = `
    <td>${productoSeleccionadoNombre}</td>
    <td>${precio.toLocaleString('es-CO')}</td>
    <td>${peorPrecio.toLocaleString('es-CO')}</td>
    <td>${ahorro.toLocaleString('es-CO')}</td>
    `;
    tabla.appendChild(fila);
    document.getElementById("totalAhorro").textContent =
        totalAhorro.toLocaleString('es-CO');
};
document.addEventListener("DOMContentLoaded", function(){

const buscadorIndex = document.getElementById("buscadorIndex");
const resultadosIndex = document.getElementById("resultadosIndex");

if(buscadorIndex){

buscadorIndex.addEventListener("input", function(){

let texto = buscadorIndex.value.toLowerCase();
resultadosIndex.innerHTML = "";

if(texto === "") return;

for(let categoria in productos){

productos[categoria].forEach(producto => {

if(producto.nombre.toLowerCase().includes(texto)){

let html = `
<div class="producto" onclick="irAComparar('${producto.nombre}')">
<img src="${producto.imagen}" width="70">
<h3>${producto.nombre}</h3>
<p>Ver comparación de precios</p>
</div>
`;

resultadosIndex.innerHTML += html;

}

});

}

});

}

});
function irAComparar(nombreProducto){

window.location.href = "comparar.php?producto=" + encodeURIComponent(nombreProducto);

}