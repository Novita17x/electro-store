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

// Consulta para obtener los productos del carrito del usuario actual
$sql = "SELECT * FROM carrito WHERE id_cliente = $id_cliente";
$resultado = $conexion->query($sql);

// Crear un arreglo para almacenar los productos del carrito
$productos_carrito = [];
// Variables para el total de productos y el total de la compra
$total_productos = 0;
$total_compra = 0.0;


// Verificar si se encontraron productos en el carrito
if ($resultado->num_rows > 0) {
    // Recorrer los resultados y agregar los productos al arreglo
    while ($fila = $resultado->fetch_assoc()) {
        $productos_carrito[] = $fila;
        $total_productos++;
        $total_compra += $fila['precio'];
    }
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
    <link rel="stylesheet" href="css/contCarrito.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/stylesmain.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    

    <style>
        .producto .model-viewer {
            width: 100%;
            height: 100px; /* Ajusta la altura según sea necesario */
        }
    </style>
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
                <p style = "font-weight: bold;" id="nombre-usuario"><?php echo htmlspecialchars($nombre_usuario); ?></p>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="inicio.php" class="btn-return">
                        <i class="fa-solid fa-arrow-left"></i> Seguir comprando
                    </a>
                </li>
                <li>
                    <a href="carrito.php" class="btn-car btn-category active">
                        <i class="fa-solid fa-cart-shopping"></i> Carrito
                    </a>
                </li>
                <a id="accountLink" class="modal-btn btn-history">
                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                </a>
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
            <!-- Contenedor del carrito -->
            <h2 class="title-main">Carrito de Compras</h2>
            <div class="carrito-container">
                <!-- Mostrar los productos en el carrito -->
                <?php if (!empty($productos_carrito)): ?>
                    <?php foreach ($productos_carrito as $producto): ?>
                        <div class="producto">
                            
                        <model-viewer src="<?php echo htmlspecialchars($producto['imagen']); ?>" 
                                    ar ar-modes="scene-viewer webxr quick-look" 
                                    camera-controls tone-mapping="neutral" 
                                    poster="poster.webp" shadow-intensity="1" 
                                    auto-rotate class="model-viewer">
                            <div class="progress-bar hide" slot="progress-bar">
                                <div class="update-bar"></div>
                            </div>
                            <button slot="ar-button" id="ar-button">View in your space</button>
                            
                        </model-viewer>

                            <div class="name-product-car">
                                <small>Nombre del Producto</small>
                                <h3><?php echo htmlspecialchars($producto['nombre_producto']); ?></h3>
                            </div>
                            <div>
                                <small>Precio</small>
                                <p>S/.<?php echo number_format($producto['precio'], 2); ?></p>
                            </div>
                            <form class="boton-eliminar" action="eliminar_producto.php" method="POST">
                                <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                                <button class="delete-product-car" type="submit"><i class="fa-solid fa-trash"></i></button>
                            </form>
                            <form id="enviarTotalForm" action="direccionEnvio.php" method="POST">
                                <input type="hidden" name="total_compra" value="<?php echo $total_compra; ?>">
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay productos en el carrito.</p>
                <?php endif; ?>

                <div class="carrito-acciones disabled">
                    <div class="carrito-acciones-izquierda">
                        <h2>Total de productos:&nbsp</h2>
                        <h2> <?php echo $total_productos; ?></h2>
                    </div>
                    <div class="carrito-acciones-derecha">
                        <h2>Total de compra: S/.&nbsp</h2>
                        <h2> <?php echo number_format($total_compra, 2); ?></h2>
                    </div>
                </div>
                <div class="cart-action">
                    <div class="espacio">
                        <button class="boton1" onclick="vaciarCarrito()">Vaciar Carrito</button>
                    </div>
                    <form id="comprarForm" action="comprar.php" method="POST">
                        <button class="boton2" type="submit" onclick="confirmarCompra(event)"
                            name="comprar">Comprar</button>
                    </form>
                    <input type="hidden" id="totalCompra" name="total_compra" value="<?php echo $total_compra; ?>">
                </div>
            </div>
        </main>
        

    </div>

    <!-- Realidad aumentada -->
<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"></script>
<script src="js/modal.js"></script>

    <script src="js/vaciarcarro.js"></script>
    <script src="js/alertcompra.js"></script>
    <script src="js/cerrarSesion.js"></script>
    
</body>

</html>