<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['loggedin'])) {
    header("Location: login_empresa.php");
    exit;
}

// Obtener el rol del usuario desde la sesión
$rol = $_SESSION['rol'];

// Definir la página por defecto
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Alpine.js CDN -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>

<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
    <!-- Sidebar -->
    <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 bg-black opacity-50 lg:hidden"></div>
    <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 transition transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex items-center justify-center mt-8">
            <div class="flex items-center">
                <svg class="w-12 h-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white"></path>
                </svg>
                <span class="mx-2 text-2xl font-semibold text-white">Dashboard</span>
            </div>
        </div>

        <!-- Sidebar navigation -->
        <nav class="mt-10">
            <!-- Enlace al Dashboard para todos los roles -->
            <?php if ($rol == 1): ?>
                <a href="dashboard_empresa.php?page=home" class="flex items-center px-6 py-2 mt-4 text-gray-100 bg-gray-700 bg-opacity-25 <?php echo ($page == 'home') ? 'text-white' : 'text-gray-500'; ?>">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                    <span class="mx-3">Dashboard</span>
                    
                </a>

                <!-- Enlace a Productos solo para el rol 1 -->
                <a href="dashboard_empresa.php?page=productos" class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 <?php echo ($page == 'productos') ? 'text-white' : 'text-gray-500'; ?>">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path>
                    </svg>
                    <span class="mx-3">Productos</span>
                </a>
            <?php endif; ?>

            <!-- Enlace al Perfil, disponible para todos los roles -->
            <a href="dashboard_empresa.php?page=perfil" class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 <?php echo ($page == 'perfil') ? 'text-white' : 'text-gray-500'; ?>">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11c0 3.866 3.134 7 7 7 3.866 0 7-3.134 7-7 0-3.866-3.134-7-7-7-3.866 0-7 3.134-7 7zM7 21a2 2 0 012 2h4a2 2 0 012-2"></path>
                </svg>
                <span class="mx-3">Perfil</span>
            </a>

            <!-- Botón de Cerrar Sesión disponible para todos los roles -->
            <a href="/chino/source/users/logout.php" class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-red-700 hover:bg-opacity-25 hover:text-red-100">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m0 0l6-6M3 12l6 6"></path>
                </svg>
                <span class="mx-3">Cerrar Sesión</span>
            </a>
        </nav>
    </div>

    <!-- Main content -->
    <div class="flex flex-col flex-1 overflow-hidden">
        <!-- Include Header -->
        <?php include __DIR__ . '/dashboard/header.php'; ?>

        <!-- Dynamic Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container px-6 py-8 mx-auto">
                <?php
                if ($page == 'home' && $rol == 1) {
                    include __DIR__ . '/dashboard/home.php'; // Contenido del Dashboard para rol 1
                } elseif ($page == 'productos' && $rol == 1) {
                    include __DIR__ . '/dashboard/productos.php'; // Contenido de Productos para rol 1
                } elseif ($page == 'perfil') {
                    include __DIR__ . '/dashboard/perfil.php'; // Perfil disponible para todos los roles
                } else {
                    echo "<h3 class='text-2xl font-bold'>Página no encontrada</h3>";
                }
                ?>
            </div>
        </main>
    </div>
</div>

</body>
</html>
