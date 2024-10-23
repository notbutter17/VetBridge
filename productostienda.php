<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// Conexión a la base de datos
$conexion = new mysqli('127.0.0.1:3308', 'root', '', 'chino');

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener los productos
$sql = "SELECT p.nombre, p.descripcion, p.precio, p.imagen_url, c.nombre AS categoria 
        FROM productos_veterinaria p
        LEFT JOIN categorias c ON p.categoria_id = c.id";
$resultado = $conexion->query($sql);
?>

<!-- Navbar Sticky -->
<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="logo.png" alt="Logo" style="width: 45px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
                    <a class="nav-link" href="productostienda.php">Productos</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="searchIcon">
                        <i class="fas fa-search"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="cartIcon" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="cartIcon">
                        <a class="dropdown-item" href="#">Ver carrito</a>
                        <a class="dropdown-item" href="#">Finalizar compra</a>
                        <p class="dropdown-item">Tu carrito está vacío.</p>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userIcon" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu" id="userDropdown" aria-labelledby="userIcon">
                        <a class="dropdown-item" href="login_empresa.php">Login</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Título centrado -->
<section class="pt-12 lg:pt-[120px] pb-10 lg:pb-20 bg-[#F3F4F6]">
   <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-center mb-20">Nuestros productos</h2>

      <!-- Galería de productos -->
      <div class="flex flex-wrap -mx-4">
         <?php if ($resultado->num_rows > 0): ?>
            <?php while ($producto = $resultado->fetch_assoc()): ?>
            <div class="w-full md:w-1/2 xl:w-1/3 px-4">
               <div class="bg-white rounded-lg overflow-hidden mb-10 shadow-lg">
                  <img
                     src="<?php echo $producto['imagen_url']; ?>"
                     alt="<?php echo $producto['nombre']; ?>"
                     class="w-full h-48 object-cover"
                  />
                  <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                     <h3>
                        <a
                           href="javascript:void(0)"
                           class="
                           font-semibold
                           text-dark text-xl
                           sm:text-[22px]
                           md:text-xl
                           lg:text-[22px]
                           xl:text-xl
                           2xl:text-[22px]
                           mb-4
                           block
                           hover:text-primary
                           "
                           >
                        <?php echo $producto['nombre']; ?>
                        </a>
                     </h3>
                     <p class="text-base text-body-color leading-relaxed mb-7">
                        <?php echo $producto['descripcion']; ?>
                     </p>
                     <p class="text-lg text-gray-600 mb-4">
                        Precio: $<?php echo number_format($producto['precio'], 2); ?>
                     </p>
                     <p class="text-base text-gray-500 mb-4">
                        Categoría: <?php echo $producto['categoria']; ?>
                     </p>
                     <a
                        href="javascript:void(0)"
                        class="
                        inline-block
                        py-2
                        px-7
                        border border-[#E5E7EB]
                        rounded-full
                        text-base text-body-color
                        font-medium
                        hover:border-primary hover:bg-primary hover:text-white
                        transition
                        "
                        >
                     Ver detalles
                     </a>
                  </div>
               </div>
            </div>
            <?php endwhile; ?>
         <?php else: ?>
            <p class="text-center w-full">No hay productos disponibles.</p>
         <?php endif; ?>
      </div>
   </div>
</section>

<footer class="bg-dark text-white text-center py-3 w-100">
    <div class="container-fluid">
        <p class="mb-2">&copy; 2023 Vet-Connection - Todos los derechos reservados.</p>
        <div class="d-flex justify-content-center">
            <a href="#" class="text-white mx-3">POLÍTICA DE PRIVACIDAD</a>
            <a href="#" class="text-white mx-3">TÉRMINOS Y CONDICIONES</a>
        </div>
    </div>
</footer>

<?php
// Cerrar la conexión
$conexion->close();
?>

</body>
</html>
