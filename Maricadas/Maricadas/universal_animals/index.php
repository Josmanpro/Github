<?php
// ===============================
// Datos del producto PHP
// ===============================
$producto = [
    "id"     => 1,
    "nombre" => "Alimento Seco Monello Cat, Salmón Atún y Pollo",
    "img"    => "img/monello.png",

    "presentaciones" => [
        "1.5 lb" => 32000,
        "7 kg"   => 125000
    ]
];

$pesoSeleccionado = $_GET['peso'] ?? "1.5 lb";
$cantidad = intval($_GET['cantidad'] ?? 1);
$cantidad = max(1, $cantidad); // Prevenir cantidades menores a 1
$precio = $producto["presentaciones"][$pesoSeleccionado];
$subtotal = $precio * $cantidad;
?>

<!-- ===========================================================
     MODAL SUPERPUESTO ENCIMA DE TODA LA PÁGINA
=========================================================== -->
<style>
.overlay-modal-producto {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;

    /* DEGRADADO MEJORADO - Similar a tu imagen */
    background: linear-gradient(135deg, 
        rgba(111, 191, 70, 0.3) 0%,
        rgba(74, 163, 255, 0.25) 50%,
        rgba(255, 166, 70, 0.2) 100%
    );
    backdrop-filter: blur(3px);

    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999999;
}

.modal-producto {
    background: white;
    width: 90%;
    max-width: 850px;
    border-radius: 18px;
    padding: 40px;
    display: flex;
    gap: 40px;
    position: relative;
    border: 3px solid #6fbf46;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
}

.cerrar-modal {
    position: absolute;
    top: 12px;
    right: 12px;
    background: #ff5252;
    color: white;
    border: none;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    font-size: 18px;
    cursor: pointer;
    transition: background 0.3s;
}

.cerrar-modal:hover {
    background: #ff1744;
}

.modal-imagen {
    flex-shrink: 0;
}

.modal-producto img {
    width: 100%;
    max-width: 380px;
    height: auto;
}

.modal-contenido {
    flex: 1;
}

.titulo {
    font-size: 26px;
    font-weight: bold;
    border: 3px solid #4aa3ff;
    padding: 10px;
    width: fit-content;
    margin-bottom: 15px;
}

.precio {
    font-size: 28px;
    color: #ff5e00;
    font-weight: bold;
    margin: 15px 0;
}

.subtotal {
    font-size: 18px;
    color: #666;
    margin-bottom: 10px;
}

.peso-label {
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
}

.peso-buttons {
    display: flex;
    gap: 15px;
    margin: 10px 0 20px 0;
}

.peso-btn {
    padding: 8px 18px;
    border: 2px solid #333;
    border-radius: 50px;
    cursor: pointer;
    background: white;
    font-weight: bold;
    transition: all 0.3s;
}

.peso-btn:hover {
    background: #f5f5f5;
}

.peso-btn.active {
    background: #333;
    color: white;
}

.cantidad-label {
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
}

.cantidad-controles {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.cantidad-btn {
    width: 35px;
    height: 35px;
    border-radius: 8px;
    font-size: 22px;
    cursor: pointer;
    border: 1px solid #333;
    background: white;
    transition: background 0.3s;
}

.cantidad-btn:hover {
    background: #f5f5f5;
}

.cantidad-btn:active {
    background: #e0e0e0;
}

.cantidad-input {
    width: 50px;
    text-align: center;
    font-size: 18px;
    padding: 8px;
    border: 1px solid #333;
    border-radius: 6px;
}

.boton-carrito {
    margin-top: 25px;
    background: #ffa646;
    border: none;
    color: white;
    font-size: 20px;
    font-weight: bold;
    padding: 15px 20px;
    border-radius: 10px;
    width: 100%;
    cursor: pointer;
    transition: background 0.3s;
}

.boton-carrito:hover {
    background: #ff9030;
}

/* Responsive */
@media (max-width: 768px) {
    .modal-producto {
        flex-direction: column;
        width: 95%;
        padding: 30px 20px;
        gap: 20px;
    }
    
    .modal-producto img {
        max-width: 280px;
        margin: 0 auto;
    }
}
</style>

<script>
function cerrarModalProducto(){
    document.getElementById("overlayProducto").style.display = "none";
}

function cambiarCantidad(delta) {
    const input = document.getElementById('cantidad');
    let valor = parseInt(input.value) || 1;
    valor = Math.max(1, valor + delta);
    input.value = valor;
    actualizarSubtotal();
}

function actualizarSubtotal() {
    const cantidad = parseInt(document.getElementById('cantidad').value) || 1;
    const precio = <?php echo $precio; ?>;
    const subtotal = cantidad * precio;
    document.getElementById('subtotal').textContent = '$' + subtotal.toLocaleString('es-CO');
}

// Cerrar al hacer clic fuera del modal
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('overlayProducto').addEventListener('click', function(e) {
        if (e.target === this) {
            cerrarModalProducto();
        }
    });
});
</script>

<!-- =============== MODAL =============== -->
<div id="overlayProducto" class="overlay-modal-producto">

    <div class="modal-producto">

        <button class="cerrar-modal" onclick="cerrarModalProducto()">✖</button>

        <div class="modal-imagen">
            <img src="<?php echo $producto['img']; ?>" alt="<?php echo $producto['nombre']; ?>">
        </div>

        <div class="modal-contenido">
            <div class="titulo"><?php echo $producto['nombre']; ?></div>

            <div class="precio">$<?php echo number_format($precio, 0, ',', '.'); ?></div>
            <div class="subtotal">Subtotal: <strong id="subtotal">$<?php echo number_format($subtotal, 0, ',', '.'); ?></strong></div>

            <form method="GET">

                <label class="peso-label">Tamaño</label>
                <div class="peso-buttons">
                    <?php foreach($producto["presentaciones"] as $peso => $valor): ?>
                        <button type="submit"
                                name="peso"
                                value="<?php echo $peso; ?>"
                                class="peso-btn <?php echo ($pesoSeleccionado == $peso ? 'active' : ''); ?>">
                                <?php echo $peso; ?>
                        </button>
                    <?php endforeach; ?>
                </div>

                <label class="cantidad-label">Cantidad</label>
                <div class="cantidad-controles">
                    <button type="button" class="cantidad-btn" onclick="cambiarCantidad(-1)">-</button>

                    <input type="number"
                        id="cantidad"
                        name="cantidad"
                        class="cantidad-input"
                        value="<?php echo $cantidad; ?>"
                        min="1"
                        onchange="actualizarSubtotal()">

                    <button type="button" class="cantidad-btn" onclick="cambiarCantidad(1)">+</button>
                </div>

                <button class="boton-carrito" type="submit">🛒 Agregar al carrito</button>

            </form>

        </div>

    </div>

</div>