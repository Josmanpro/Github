let slideIndex = 0;
const slides = document.querySelectorAll(".slide");
const dots = document.querySelectorAll(".dot");
const slideContainer = document.querySelector(".slides");

function showSlide(index) {
    if (index >= slides.length) slideIndex = 0;
    if (index < 0) slideIndex = slides.length - 1;

    slides.forEach(slide => slide.classList.remove("active"));
    dots.forEach(dot => dot.classList.remove("active"));

    slides[slideIndex].classList.add("active");
    dots[slideIndex].classList.add("active");

    slideContainer.style.transform = `translateX(${-slideIndex * 100}%)`;
}

function nextSlide() {
    slideIndex++;
    showSlide(slideIndex);
}

function prevSlide() {
    slideIndex--;
    showSlide(slideIndex);
}

document.querySelector(".next").addEventListener("click", () => {
    nextSlide();
    resetAutoSlide();
});

document.querySelector(".prev").addEventListener("click", () => {
    prevSlide();
    resetAutoSlide();
});

dots.forEach((dot, i) => {
    dot.addEventListener("click", () => {
        slideIndex = i;
        showSlide(slideIndex);
        resetAutoSlide();
    });
});

// Auto slide cada 5 segundos
let autoSlide = setInterval(nextSlide, 5000);

function resetAutoSlide() {
    clearInterval(autoSlide);
    autoSlide = setInterval(nextSlide, 5000);
}

showSlide(slideIndex);


const buttons = document.querySelectorAll(".tab-btn");
const contents = document.querySelectorAll(".tab-content");

buttons.forEach(btn => {
  btn.addEventListener("click", () => {
    buttons.forEach(b => b.classList.remove("active"));
    contents.forEach(c => c.classList.remove("active"));


    btn.classList.add("active");
    document.getElementById(btn.dataset.target).classList.add("active");
  });
});

function toggleMenu() {
    const menu = document.querySelector('nav');
    menu.classList.toggle('active');
}

//----------------------------------------------------------------------------------------------------


        function abrirBuscador() {
    document.getElementById("searchModal").style.display = "flex";
    document.getElementById("modalSearchInput").focus();
}

function cerrarBuscador() {
    document.getElementById("searchModal").style.display = "none";
}

/* EJECUTA LA BÚSQUEDA DIRECTA */
function ejecutarBusqueda() {
    const texto = document.getElementById("modalSearchInput").value.trim().toLowerCase();
    if (texto === "") return;

    const productos = {
        // TOP PERRO
        "top perro": "TopPerro.html",
        "hills science diet adult 7": "TopPerro.html",
        "adult 7+": "TopPerro.html",
        "light small bites": "TopPerro.html",
        "sensitive stomach": "TopPerro.html",
        "sensitive skin": "TopPerro.html",
        "perfect digestion": "TopPerro.html",
        "healthy mobility": "TopPerro.html",

        // TOP GATO
        "top gato": "TopGato.html",
        "monello select super premium piel y pelaje": "TopGato.html",
        "monello cat castrados": "TopGato.html",
        "monello salmon atun pollo": "TopGato.html",
        "monello bolas de pelo": "TopGato.html",
        "monello gatitos madres": "TopGato.html",

        // Páginas generales
        "perro": "Perro.html",
        "gato": "Gato.html",
        "pez": "Pez.html",
        "hamster": "Hamster.html",
        "conejo": "Conejo.html",
        "ave": "Aves_Ornamentales.html",
        "pajaro": "Aves_Ornamentales.html",
        "aves": "Aves_Ornamentales.html"
    };

    // Coincidencia exacta
    if (productos[texto]) {
        window.location.href = productos[texto];
        return;
    }

    // Coincidencia parcial
    for (const key in productos) {
        if (texto.includes(key)) {
            window.location.href = productos[key];
            return;
        }
    }

    // vaciar el campo de busqueda al cerrar el modal al darle al boton buscar
    document.getElementById("modalSearchInput").value = " ";



    alert("No se encontró el producto");
}



        // ------ CARRITO ------
let cart = JSON.parse(localStorage.getItem("cart")) || [];

// Guardar carrito
function saveCart() {
    localStorage.setItem("cart", JSON.stringify(cart));
}

// Actualizar contador del carrito en el header
function updateCartCount() {
    const count = cart.reduce((total, item) => total + item.cantidad, 0);

    let badge = document.getElementById("cart-count");

    if (badge) {
        badge.textContent = count;
    }
}

let cartOpen = false;

// Abrir carrito
function openCart() {
    document.getElementById("cart").style.right = "0";
}

// Cerrar carrito
function closeCart() {
    document.getElementById("cart").style.right = "-450px";
}

// Añadir producto al carrito
function addToCart(nombre, precio, imagen) {

    let product = cart.find(item => item.nombre === nombre);

    if (product) {
        product.cantidad++;
    } else {
        cart.push({
            nombre,
            precio,
            imagen,
            cantidad: 1
        });
    }

    saveCart();
    renderCart();
    updateCartCount();
    openCart();
}


// Renderizar carrito
function renderCart() {
    let itemsContainer = document.getElementById("cart-items");
    if (!itemsContainer) return;

    let itemsHTML = "";
    let subtotal = 0;

    cart.forEach((item, index) => {
        subtotal += item.precio * item.cantidad;
        itemsHTML += `
        <div class="item">
            <img src="${item.imagen}">
            <div class="item-info">
                <div class="item-title">${item.nombre}</div>
                <div class="item-price">$${item.precio}</div>

                <div class="qty">
                    <button onclick="changeQty(${index}, -1)">-</button>
                    <span>${item.cantidad}</span>
                    <button onclick="changeQty(${index}, 1)">+</button>
                </div>
            </div>
            <div class="delete" onclick="removeItem(${index})">🗑️</div>
        </div>
        `;
    });

    itemsContainer.innerHTML = itemsHTML;

    document.getElementById("subtotal").textContent = `$${subtotal}`;
    document.getElementById("envio").textContent = cart.length > 0 ? "$11000" : "$0";
    let total = cart.length > 0 ? subtotal + 11000 : 0;
    document.getElementById("total").textContent = `$${total}`;

    document.querySelector(".cart-header").innerHTML = `
        Tu Carrito - ${cart.length}
        <span class="close-cart" onclick="closeCart()">✖</span>
    `;
}


// Cambiar cantidad
function changeQty(index, amount) {
    cart[index].cantidad += amount;

    if (cart[index].cantidad <= 0) {
        cart.splice(index, 1);
    }

    renderCart();
}

// Eliminar item
function removeItem(index) {
    cart.splice(index, 1);
    renderCart();
}

fetch("TopPerro.html")
  .then(res => res.text())
  .then(html => {
    document.getElementById("perros").innerHTML = html;
  });

fetch("TopGato.html")
    .then(res => res.text())    
    .then(html => {
        document.getElementById("gatos").innerHTML = html;
    });

// Inicializar carrito al cargar la página 
document.addEventListener("DOMContentLoaded", () => {
    renderCart();
    updateCartCount();
}); 

function abrirModal(ruta) {
    const modal = document.getElementById("modal");
    const iframe = document.getElementById("iframeModal");

    iframe.src = ruta; 
    modal.style.display = "flex";
}

function cerrarModal() {
    const modal = document.getElementById("modal");
    const iframe = document.getElementById("iframeModal");

    modal.style.display = "none";
    iframe.src = ""; // limpia para que no quede cargado
}
