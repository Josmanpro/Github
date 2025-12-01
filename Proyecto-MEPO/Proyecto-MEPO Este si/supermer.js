

function mostrarSupermercados() {
    const gridContainer = document.getElementById('supermercados-grid');
    gridContainer.innerHTML = ''; // Limpiar resultados anteriores

    supermercados.forEach(supermercado => {
        const card = document.createElement('div');
        card.className = 'supermarket-card';

        // Usamos .replace(/\n/g, '<br>') para convertir los saltos de línea del horario en <br> de HTML
        const horarioFormateado = supermercado.horario.replace(/\n/g, '<br>');

        card.innerHTML = `
            <div class="card-logo-container">
                <img src="${supermercado.logo}" alt="${supermercado.nombre}" class="card-logo">
            </div>
            <div class="card-info">
                <h3>${supermercado.nombre}</h3>
                <div class="card-detail">
                    <span class="icon">📍</span>
                    <p>${supermercado.direccion}</p>
                </div>
                <div class="card-detail">
                    <span class="icon">🕒</span>
                    <p>${horarioFormateado}</p>
                </div>
            </div>
            <div class="card-actions">
                <a href="${supermercado.mapaUrl}" target="_blank" class="btn btn-primary">Ver en Mapa</a>
                <a href="${supermercado.web}" target="_blank" class="btn btn-secondary">Ir a su Web</a>
            </div>
        `;

        gridContainer.appendChild(card);
    });
}


// se cargan los supermercados cuando la pagina termine de cargas
window.onload = mostrarSupermercados;