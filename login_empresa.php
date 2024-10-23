<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión Empresa - Vet Bridge 360</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="login_empresa_styles.css">

    <style>
        /* Posicionar el botón en la esquina superior izquierda */
        .btn-volver {
            position: absolute;
            top: 20px;
            left: 20px;
            
        }
    </style>
</head>
<body>

<!-- Botón para volver a la página principal en la esquina superior izquierda -->
<a href="index.php" class="btn btn-secondary btn-volver">Volver a la Página Principal</a>

<!-- Contenedor del login -->
<div class="login-container d-flex justify-content-center align-items-center" >
    <div class="login-form">
        <h2 class="text-center mb-4">Iniciar Sesión Empresa</h2>

        <!-- Mostrar alerta si hay algún error -->
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            // Limpiar el error después de mostrarlo
            unset($_SESSION['error']);
        }
        ?>

        <!-- Formulario de inicio de sesión -->
        <!-- IMPORTANTE: Modifica el 'action' para apuntar a la carpeta donde está login_backend.php -->
        <form action="source/users/login_backend.php" method="post">
            <div class="form-group">
                <label for="email">Correo Electrónico Corporativo</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Ingresa tu correo corporativo" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" id="rememberMe" class="form-check-input">
                <label for="rememberMe" class="form-check-label">Recordarme</label>
            </div>
            <button type="submit" class="btn btn-danger btn-block">Iniciar Sesión</button>
        </form>
        
        <hr>
        
        <!-- Enlaces adicionales -->
        <p class="text-center">¿No tienes una cuenta? <a href="registro.php" class="inline-block py-2 px-7 bg-blue-500 text-white font-medium rounded-full hover:bg-blue-600 transition">Registrarse</a></p>
        <p class="text-center"><a href="#">¿Olvidaste tu contraseña?</a></p>
    </div>
</div>

<!-- Bootstrap JS y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
