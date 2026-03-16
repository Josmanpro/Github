<?php if ($usuario): ?>

    <?php if (($usuario['rol_id'] == 1 && $usuario['estado'] == 'activo') || $usuario['rol_id'] == 3): ?>
        <!-- Vendedor aprobado: botón activo -->
        <a href="panel_vendedor.php" class="button" id="pvendedor">
            Panel Vendedor
        </a>

    <?php elseif ($usuario['rol_id'] == 1 && $usuario['estado'] == 'pendiente'): ?>
        <!-- Vendedor pendiente -->
        <a href="#" class="button"
            style="
            background:#ffffff;
            color:#2e7d32;
            border:2px solid #c8e6c9;
            border-radius:20px;
            padding:8px 16px;
            font-weight:600;
            box-shadow:0 0 10px rgba(76,175,80,0.5);
            opacity:0.6;
            pointer-events:none;
            cursor:not-allowed;
            ">
            🔒 Vendedor
            (Pendiente aprobación)
        </a>

    <?php elseif ($usuario['rol_id'] == 1 && $usuario['estado'] == 'bloqueado'): ?>
        <!-- Vendedor bloqueado -->
        <a href="#" class="button"
            style="
            background:#ffffff;
            color:#b71c1c;
            border:2px solid #ffcdd2;
            border-radius:20px;
            padding:8px 16px;
            font-weight:600;
            box-shadow:0 0 10px rgba(244,67,54,0.5);
            opacity:0.7;
            pointer-events:none;
            cursor:not-allowed;
            ">
            ⛔ Vendedor
            (Cuenta bloqueada)
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