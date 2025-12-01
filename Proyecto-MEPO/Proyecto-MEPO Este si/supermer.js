const supermercados = [
    {
        nombre: "Éxito",
        logo: "imagenes/exito.png",
        descripcion: "Tu tienda, tu vida. Siempre con los mejores precios.",
        direccion: "Cra. 24 # 40-53, Ibagué, Tolima",
        horario: "Lunes a Sábado: 8:00 AM - 9:00 PM\nDomingo y Festivos: 9:00 AM - 8:00 PM",
        web: "https://www.exito.com",
        mapaUrl: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.5647149396435!2d-75.23176108523302!3d4.43897079669923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e38e6b7c5b5b5b5%3A0x5b5b5b5b5b5b5b5b!2sExito!5e0!3m2!1ses!2sco!4v1620000000000!5m2!1ses!2sco" // URL de ejemplo
    },
    {
        nombre: "D1",
        logo: "imagenes/d1.png",
        descripcion: "Los precios más bajos, siempre.",
        direccion: "Calle 50 # 4-45, Ibagué, Tolima",
        horario: "Lunes a Sábado: 8:00 AM - 8:00 PM\nDomingo: 9:00 AM - 6:00 PM",
        web: "https://www.d1.com.co",
        mapaUrl: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.5647149396435!2d-75.23176108523302!3d4.43897079669923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e38e6b7c5b5b5b5%3A0x5b5b5b5b5b5b5b5b!2sD1!5e0!3m2!1ses!2sco!4v1620000000001!5m2!1ses!2sco" // URL de ejemplo
    },
    {
        nombre: "Surtiplaza",
        logo: "imagenes/surti.png",
        descripcion: "La plaza de tu hogar.",
        direccion: "Cra. 3 # 5-70, Ibagué, Tolima",
        horario: "Lunes a Sábado: 8:00 AM - 8:00 PM\nDomingo: 9:00 AM - 1:00 PM",
        web: "https://www.surtiplaza.com.co",
        mapaUrl: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.5647149396435!2d-75.23176108523302!3d4.43897079669923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e38e6b7c5b5b5b5%3A0x5b5b5b5b5b5b5b5b!2sSurtiplaza!5e0!3m2!1ses!2sco!4v1620000000003!5m2!1ses!2sco" // URL de ejemplo
    }
];

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