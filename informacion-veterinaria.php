<?php
// Conexión a la base de datos
$conexion = new mysqli('127.0.0.1:3306', 'root', '', 'chino');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener los usuarios con rol 2 (Especialistas)
$sql = "SELECT nombre, apellidos, especialista, anios_servicio, edad, universidad, descripcion 
        FROM usuarios 
        WHERE rol = 2";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Información/Veterinarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .team-section {
            padding: 50px 0;
            text-align: center;
        }
        .team-member img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }
        .team-member h4 {
            margin-top: 15px;
            font-weight: bold;
        }
        .team-member p {
            margin-bottom: 0;
        }
        .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .footer a {
            color: #ffffff;
            margin: 0 10px;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="index.html">
                <img src="logo.png" alt="Logo" style="width: 45px;">
            </a>
            <!-- Botón para móvil -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Enlaces del Navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="tienda.html">TIENDA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="servicios.html">SERVICIOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="informacion-veterinaria.php">INFORMACIÓN/VETERINARIOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productostienda.php">PRODUCTOS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección Nuestro Equipo -->
    <section class="team-section">
        <h2 class="text-dark">NUESTRO EQUIPO</h2>
        <div class="container">
            <div class="row">
                <?php if ($resultado->num_rows > 0): ?>
                    <?php while ($usuario = $resultado->fetch_assoc()): ?>
                        <div class="col-md-4 team-member">
                            <img src="marcosu.jpeg" alt="<?php echo $usuario['nombre'] . ' ' . $usuario['apellidos']; ?>">
                            <h4><?php echo $usuario['nombre'] . ' ' . $usuario['apellidos']; ?></h4>
                            <p>Especialista en <?php echo $usuario['especialista']; ?>.</p>
                            <p>Años de Servicio: <?php echo $usuario['anios_servicio']; ?></p>
                            <p>Edad: <?php echo $usuario['edad']; ?> años</p>
                            <p>Universidad de egreso: <?php echo $usuario['universidad']; ?></p>
                            <p><?php echo $usuario['descripcion']; ?></p>
                            <a href="#" class="btn btn-light">Conóceme</a>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-center w-100">No hay especialistas registrados.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2023 Vet-Connection - Todos los derechos reservados.</p>
        <div>
            <a href="#">POLÍTICA DE PRIVACIDAD</a>
            <a href="#">TÉRMINOS Y CONDICIONES</a>
        </div>
    </footer>

    <!-- jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
