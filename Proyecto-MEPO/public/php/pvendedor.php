<?php if ($usuario): ?>


    <?php if ($usuario['rol_id'] == 1 && $usuario['estado'] == 'activo' || $usuario['rol_id'] == 3): ?>
        <!-- Vendedor aprobado: botón activo -->
        <a href="panel_vendedor.php" class="button" id="pvendedor">
            Panel Vendedor
        </a>

    <?php elseif ($usuario['rol_id'] == 1 && $usuario['estado'] == 'pendiente'): ?>
        <!-- Vendedor pendiente: botón visible pero deshabilitado -->
        <a href="#" class="button" style="opacity:0.5; pointer-events:none; cursor:not-allowed;" >
            Panel Vendedor (Pendiente aprobación)
        </a>

    <?php endif; ?>

<?php endif; ?>

<?php if ($usuario): ?>


    <?php if ($usuario['rol_id'] == 3): ?>
        <!-- Vendedor aprobado: botón activo -->
        <a href="panel_admin.php" class="button" id="padmin">
            Panel administrador
        </a>
    <?php endif; ?>

<?php endif; ?>