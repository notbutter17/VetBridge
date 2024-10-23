<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<style>
    /* Posicionar el botón en la esquina superior izquierda */
    .btn-volverlogin {
        position: absolute;
        top: 20px;
        left: 20px;
    }
</style>

<body>

    <div class="mt-4 text-center">
        <a href="login_empresa.php" class="btn-volverlogin text-blue-500 hover:underline">Volver al login</a>
    </div>
    <div class=" flex items-center justify-center bg-gray-100">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Formulario de Registro de Usuario</h2>
            <form action="source/users/procesar_registro.php" method="POST">
                <!-- Nombre -->
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="nombre" id="nombre" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Apellidos -->
                <div class="mb-4">
                    <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Contraseña -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Especialista de qué -->
                <div class="mb-4">
                    <label for="especialista" class="block text-sm font-medium text-gray-700">Especialista en</label>
                    <input type="text" name="especialista" id="especialista" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Años de servicio -->
                <div class="mb-4">
                    <label for="anios_servicio" class="block text-sm font-medium text-gray-700">Años de servicio</label>
                    <input type="number" name="anios_servicio" id="anios_servicio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Edad -->
                <div class="mb-4">
                    <label for="edad" class="block text-sm font-medium text-gray-700">Edad</label>
                    <input type="number" name="edad" id="edad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Universidad -->
                <div class="mb-4">
                    <label for="universidad" class="block text-sm font-medium text-gray-700">Universidad</label>
                    <input type="text" name="universidad" id="universidad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Breve descripción -->
                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Breve descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                </div>

                <!-- Botón de envío -->
                <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-bold rounded hover:bg-blue-600">Registrarse</button>
            </form>
        </div>
    </div>
</body>

</html>