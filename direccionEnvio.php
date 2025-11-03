<?php
// Comienza la sesión solo si no ha sido iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nombre_usuario = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : "Perfil";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro - Historial</title>

    <!-- Enlace a la hoja de estilos de Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Enlace a la hoja de estilos personalizada -->
    <link rel="stylesheet" href="css/stylesmain.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/historial.css">
    <link rel="stylesheet" href="css/moda.css">
    <link rel="stylesheet" href="css/formenvio.css">
    <link rel="icon" href="img/image.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script
        src="https://www.paypal.com/sdk/js?client-id=AQPMAbiBwU5ZmrvNQjjIZKYf6oxZ7kdMh-ss2AYyAiuTE-8kUy5oKsFQmxjHl3Y_szsnCj9sL36Evgl_"></script>
</head>

<body>
    <div class="wrapper"> <!-- Contenedor principal de la página -->
        <nav> <!-- Barra de navegación -->
            <aside> <!-- Barra lateral dentro del nav -->
                <div>
                    <!-- Logo de la página -->
                    <a href="inicio.php" class="logo">
                        <img src="./img/logo.png" alt="">
                    </a>
                    <!-- Logo de la página -->
                </div>
                <div class="perfil">
                    <i class="fa-solid fa-user"></i>
                    <p id="nombre-usuario"><?php echo htmlspecialchars($nombre_usuario); ?></p>
                </div>
                <div class="custom-nav">
                <ul class="nav-links">
                    <li>
                        <!-- Botón "Seguir comprando" en la barra de navegación -->
                        <a href="inicio.php" class="nav-link">
                            <i class="fa-solid fa-arrow-left"></i> Seguir comprando
                        </a>
                    </li>
                   
                    <li>
                        <a id="accountLink" class="modal-btn nav-link">
                            <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </div>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h3>¿Salir de Electro?</h3>
                        <hr>
                        <p>¿Estás seguro de salir de Electro?</p>
                        <ul class="btns-cerrar-session">
                            <li><button id="cancelarBtn">Cancelar</button></li>
                            <li><button id="cerrarSesionBtn">Cerrar sesión</button></li>
                        </ul>
                    </div>
                </div>
            </aside>
        </nav>

        <main> <!-- Contenido principal de la página -->
            <div id="historial-container" class="contenedorDelHistorial">
                <form action="procesar_envio.php" method="post" class="address-form">
                    <h1>DIRECCIÓN DE ENVIO</h1>
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="pais">País:</label>
                        <input type="text" id="pais" name="pais" required>
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" id="ciudad" name="ciudad" required>
                    </div>
                    <div class="form-group">
                        <label for="distrito">Distrito:</label>
                        <input type="text" id="distrito" name="distrito" required>
                    </div>
                    <div class="form-group">
                        <label for="codigo_postal">Código Postal:</label>
                        <input type="text" id="codigo_postal" name="codigo_postal" required>
                    </div>
                    <div class="form-group">
                        <label for="celular">Celular:</label>
                        <input type="text" id="celular" name="celular" required>
                    </div>
                    <button type="submit" class="submit-btn">Enviar</button>
                </form>
                <div id="paypal-button-container"></div>
            </div>
        </main> <!-- Contenido principal de la página -->


    </div>
    <script src="js/cerrarSesion.js"></script>
    <script src="js/modal.js"></script>
</body>

</html>