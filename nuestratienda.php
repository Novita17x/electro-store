<?php
require __DIR__ . '/php/conexion.php';
// Comienza la sesión solo si no ha sido iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_cliente'])) {
    // Redireccionar al usuario a la página de inicio de sesión si no ha iniciado sesión
    header("Location: index.php");
    exit; // Terminar el script para evitar que se ejecute más código
}

// Obtener el nombre del usuario de la sesión, o establecer "Perfil" si no está definido
$nombre_usuario = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : "Perfil";

// Obtener el ID del cliente de la sesión
$id_cliente = $_SESSION['id_cliente'];

// Conectar a la base de datos
$conexion = $cnx;

// Verificar la conexión a la base de datos
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Enlace a la hoja de estilos de Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Enlace a la hoja de estilos personalizada -->
    <link rel="icon" href="img/image.ico">
    <link rel="stylesheet" href="css/stylesmain.css">
    <link rel="stylesheet" href="css/modal.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
</head>

<body>
    <div class="wrapper">
        <aside>
            <div>
                <!-- Logo de la página -->
                <a href="inicio.php" class="logo">
                    <img src="./img/logo.png" alt="Logo de Electro">
                </a>
            </div>
            <div class="perfil">
                <i class="fa-solid fa-user"></i>
                <p id="nombre-usuario"><?php echo htmlspecialchars($nombre_usuario); ?></p>
            </div>


            <ul class="nav-links">
            <li>
                <a href="inicio.php" class="btn-return">
                    <i class="fa-solid fa-arrow-left"></i> Seguir comprando
                </a>
            </li>
            <li>
                <a id="accountLink" class="modal-btn btn-history">
                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                </a>
            </li>
        </ul>




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

        <main>
            <center> 
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d104992.15166778676!2d-77.077957199377!3d-12.057677706334735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105cfa119425693%3A0xb139c5822472bdc1!2sELECTRO%20IN!5e0!3m2!1ses!2spe!4v1719762306772!5m2!1ses!2spe" width="900" height="730" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </center>
            
        </main> 
    </div>
    <script src="js/alertcompra.js"></script>
    <script src="js/cerrarSesion.js"></script>
    <script src="js/modal.js"></script>
</body>

</html>
