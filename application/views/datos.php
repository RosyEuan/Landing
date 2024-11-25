<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos usuario</title>
</head>
<body>
    
    <h1>Datos de usuario</h1>
    <?php if (!empty($usuarios)): ?>
    <ul>
        <?php foreach ($usuarios as $usuario): ?>
            <li>
                <strong>Id:</strong> <?php echo $usuario['id_usuario'];?><br>
                <strong>Usuario:</strong> <?php echo $usuario['usuario']; ?><br>
                <strong>Nombre:</strong> <?php echo $usuario['nombre']; ?> <?php echo $usuario['apellido']; ?><br>
                <strong>Correo:</strong> <?php echo $usuario['Correo']; ?><br>
                <strong>Teléfono:</strong> <?php echo $usuario['Telefono']; ?>
            </li>
            <br>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No hay usuarios registrados.</p>
<?php endif; ?>
</body>
</html>