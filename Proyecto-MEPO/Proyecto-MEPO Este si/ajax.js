// Simulación de una base de datos de productos.
// En una aplicación real, esta información vendría de un servidor.
const productos = {
    lacteos: [
        {
            nombre: "Leche Entera 1L",
            imagen: "https://placehold.co/300x200/E3F2FD/333?text=Leche+Entera",
            precios: {
                "Éxito": 3200,
                "D1": 2950,
                "Justo y Bueno": 3100,
                "Surtiplaza": 3300
            }
        },
        {
            nombre: "Queso Campesino 500g",
            imagen: "https://placehold.co/300x200/E3F2FD/333?text=Queso+Campesino",
            precios: {
                "Éxito": 12500,
                "D1": 11900,
                "Justo y Bueno": 13000,
                "Surtiplaza": 12800
            }
        },
        {
            nombre: "Yogurt Natural 1L",
            imagen: "https://placehold.co/300x200/E3F2FD/333?text=Yogurt+Natural",
            precios: {
                "Éxito": 5500,
                "D1": 5200,
                "Justo y Bueno": 5390,
                "Surtiplaza": 5600
            }
        }
    ],
    granos: [
        {
            nombre: "Arroz Diana 500g",
            imagen: "https://placehold.co/300x200/FFF3E0/333?text=Arroz+Diana",
            precios: {
                "Éxito": 2200,
                "D1": 1990,
                "Justo y Bueno": 2100,
                "Surtiplaza": 2300
            }
        },
        {
            nombre: "Lentejas Rojas 500g",
            imagen: "https://placehold.co/300x200/FFF3E0/333?text=Lentejas+Rojas",
            precios: {
                "Éxito": 3500,
                "D1": 3200,
                "Justo y Bueno": 3600,
                "Surtiplaza": 3700
            }
        }
    ],
    aseo: [
        {
            nombre: "Jabón en Polvo Fab 500g",
            imagen: "https://placehold.co/300x200/E0F2F1/333?text=Jabón+Fab",
            precios: {
                "Éxito": 4800,
                "D1": 4500,
                "Justo y Bueno": 4900,
                "Surtiplaza": 5100
            }
        },
        {
            nombre: "Limpiavidrios 750ml",
            imagen: "https://placehold.co/300x200/E0F2F1/333?text=Limpiavidrios",
            precios: {
                "Éxito": 6500,
                "D1": 6200,
                "Justo y Bueno": 6800,
                "Surtiplaza": 6900
            }
        }
    ]
};

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
                <li class="price-item ${esMejorPrecio ? 'best-price' : ''}">
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