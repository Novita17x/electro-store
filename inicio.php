<?php

require __DIR__ . '/php/conexion.php';
// Comienza la sesión solo si no ha sido iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//Variables para el numerito
$nombre_usuario = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : "Perfil";
$id_cliente = $_SESSION['id_cliente'];
$conexion = $cnx;
$sql = "SELECT * FROM carrito WHERE id_cliente = $id_cliente";
$resultado = $conexion->query($sql);
$total_productos = 0;
if ($resultado->num_rows > 0) {
    // Recorrer los resultados y agregar los productos al arreglo
    while ($fila = $resultado->fetch_assoc()) {
        $total_productos++;
    }
}


// Función para cerrar sesión
if (isset($_POST['cerrarSesion'])) {
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión actual
    header("Location: index.php"); // Redirige al usuario a la página de inicio de sesión
    exit;
}

// Obtiene el nombre del usuario de la sesión, o establece "Perfil" si no está definido
$nombre_usuario = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : "Perfil";

// Array de productos
$products = [
    // Laptops
    ['categoria' => 'laptop', 'id' => 'laptop-01', 'nombreProducto' => 'MacBook', 'precio' => 3000.00, 'imagen' => './img/3d/laptop.glb'],
    ['categoria' => 'laptop', 'id' => 'laptop-02', 'nombreProducto' => 'Lenovo ThinkPad X1 Carbon', 'precio' => 2200.00, 'imagen' => './img/3d/apple_imac.glb'],
    ['categoria' => 'laptop', 'id' => 'laptop-03', 'nombreProducto' => 'HP Spectre x360', 'precio' => 2000.00, 'imagen' => './img/3d/macbook_laptop333333333333.glb'],
    ['categoria' => 'laptop', 'id' => 'laptop-04', 'nombreProducto' => 'Dell XPS 13', 'precio' => 2300.00, 'imagen' => './img/3d/my_laptop (1).glb'],
    ['categoria' => 'laptop', 'id' => 'laptop-05', 'nombreProducto' => 'Asus ROG Zephyrus G14', 'precio' => 2500.00, 'imagen' => './img/3d/laptop.glb'],
    ['categoria' => 'laptop', 'id' => 'laptop-06', 'nombreProducto' => 'Microsoft Surface Laptop 4', 'precio' => 2600.00,  'imagen' => './img/3d/apple_imac.glb'],
    ['categoria' => 'laptop', 'id' => 'laptop-07', 'nombreProducto' => 'Razer Blade 15', 'precio' => 3500.00, 'imagen' => './img/3d/macbook_laptop333333333333.glb'],
    ['categoria' => 'laptop', 'id' => 'laptop-08', 'nombreProducto' => 'Acer Swift 3', 'precio' => 2800.00, 'imagen' => './img/3d/laptop.glb'],
    
    // Audífonos
    ['categoria' => 'audifono', 'id' => 'audifono-01', 'nombreProducto' => 'Audio-Technica ATH M50x', 'precio' => 779.00, 'imagen' => './img/3d/earphone (1).glb'],
    ['categoria' => 'audifono', 'id' => 'audifono-02', 'nombreProducto' => 'Bose QuietComfort 35 II', 'precio' => 1200.00, 'imagen' => './img/3d/earphone.glb'],
    ['categoria' => 'audifono', 'id' => 'audifono-03', 'nombreProducto' => 'HyperX Cloud II', 'precio' => 474.00, 'imagen' => './img/3d/earphone_-_3d_model.glb'],
    ['categoria' => 'audifono', 'id' => 'audifono-04', 'nombreProducto' => 'Logitech-G Pro X', 'precio' => 658.00, 'imagen' => './img/3d/headphone_with_stand.glb'],
    ['categoria' => 'audifono', 'id' => 'audifono-05', 'nombreProducto' => 'Razer BlackShark V2', 'precio' => 654.00, 'imagen' => './img/3d/headphones_3d_high_poly_nike.glb'],
    ['categoria' => 'audifono', 'id' => 'audifono-06', 'nombreProducto' => 'Sennheiser HD-660 S', 'precio' => 2421.00, 'imagen' => './img/3d/red_headphones.glb'],
    ['categoria' => 'audifono', 'id' => 'audifono-07', 'nombreProducto' => 'Sony WH-1000XM4', 'precio' => 939.00, 'imagen' => './img/3d/earphone (1).glb'],
    ['categoria' => 'audifono', 'id' => 'audifono-08', 'nombreProducto' => 'SteelSeries Arctis Pro', 'precio' => 298.00, 'imagen' => './img/3d/earphone.glb'],
    
    // Cámaras
    ['categoria' => 'camara', 'id' => 'camara-01', 'nombreProducto' => 'Canon EOS-R5', 'precio' => 3899.00, 'imagen' => './img/3d/vintage_camera__asahi_pentax_h2.glb'],
    ['categoria' => 'camara', 'id' => 'camara-02', 'nombreProducto' => 'Fujifilm X-T4', 'precio' => 2996.95, 'imagen' => './img/3d/cinema_camera.glb'],
    ['categoria' => 'camara', 'id' => 'camara-03', 'nombreProducto' => 'GoPro Hero 11 Black', 'precio' => 3498.00, 'imagen' => './img/3d/retro_camera_fed_2.glb'],
    ['categoria' => 'camara', 'id' => 'camara-04', 'nombreProducto' => 'Nikon Z6 II', 'precio' => 5999.00, 'imagen' => './img/3d/canon_at-1_retro_camera.glb'],
    ['categoria' => 'camara', 'id' => 'camara-05', 'nombreProducto' => 'Olympus OM-D E-M1 Mark III', 'precio' => 1997.99, 'imagen' => './img/3d/cinema_camera.glb'],
    ['categoria' => 'camara', 'id' => 'camara-06', 'nombreProducto' => 'Panasonic Lumix GH5', 'precio' => 1799.00, 'imagen' => './img/3d/camera.glb'],
    ['categoria' => 'camara', 'id' => 'camara-07', 'nombreProducto' => 'Sony A7-IV', 'precio' => 1796.95, 'imagen' => './img/3d/dae_-_bilora_bella_46_camera_-_game_ready_asset.glb'],
    ['categoria' => 'camara', 'id' => 'camara-08', 'nombreProducto' => 'Sony Cyber-shot RX100-VII', 'precio' => 4995.00, 'imagen' => './img/3d/canon_at-1_retro_camera.glb'],
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro</title>

    <!-- Enlace a la hoja de estilos de Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Enlace a la hoja de estilos personalizada -->
    <link rel="stylesheet" href="css/stylesmain.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="icon" href="img/image.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<?php
// Mostrar mensaje de bienvenida si está configurado en la sesión
if (isset($_SESSION['msj2'])) {
    $respuesta = $_SESSION['msj2'];
    ?>
    <script>
        Swal.fire({
            title: "¡Bienvenido!",
            text: "<?php echo $respuesta; ?>",
            icon: "success"
        });
    </script>
    <?php
    unset($_SESSION['msj2']);
}

// Mostrar mensaje de carrito exitoso si está configurado en la sesión
if (isset($_SESSION['msj3'])) {
    $respuestaCarrito = $_SESSION['msj3'];
    ?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "<?php echo $respuestaCarrito; ?>",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php
    unset($_SESSION['msj3']);
}

// Mostrar SweetAlert si la compra fue exitosa
if (isset($_SESSION['compra_exitosa'])) {
    ?>
    <script>
        Swal.fire({
            title: "¡Gracias por su compra!",
            text: "¿Desea enviar su dirección de envío para recibir el producto?",
            imageUrl: "https://media.tenor.com/suRA-3MIp8UAAAAM/cleaning-money-squidward.gif",
            imageWidth: 400,
            imageHeight: 200,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'Más tarde'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "direccionEnvio.php";
            }
        });
    </script>
    <?php
    unset($_SESSION['compra_exitosa']);
}

// Mostrar mensaje si el envío de la dirección fue exitoso
if (isset($_SESSION['envio_exitoso']) && $_SESSION['envio_exitoso']) {
    ?>
    <script>
        Swal.fire({
            title: "¡Su dirección se ha enviado!",
            text: "Gracias por comprar en Electro.",
            icon: "success"
        });
    </script>
    <?php
    unset($_SESSION['envio_exitoso']);
}
?>

<div class="wrapper"> <!-- Contenedor principal de la página -->
    <aside> <!-- Barra lateral dentro del nav -->
        <div>
            <!-- Logo de la página -->
            <a href="inicio.php" class="logo">
                <img src="./img/logo.png" alt="">
            </a>
        </div>
        <div class="perfil">
            <i class="fa-solid fa-user"></i>
            <p style="font-weight: bold;" id="nombre-usuario"><?php echo htmlspecialchars($nombre_usuario); ?></p>
        </div>
        <ul class="nav-links">
            <li>
                <button onclick="location.href='inicio.php'" id="todos" class="btn-menu btn-category active"><i class="fa-solid fa-hand-point-right"></i> Todos los productos</button>
            </li>
            <li>
                <button onclick="mostrarProductos('laptop')" id="laptops" class="btn-menu btn-category"><i class="fa-solid fa-hand-point-right"></i> Laptops</button>
            </li>
            <li>
                <button onclick="mostrarProductos('audifono')" id="audifonos" class="btn-menu btn-category"><i class="fa-solid fa-hand-point-right"></i> Audífonos</button>
            </li>
            <li>
                <button onclick="mostrarProductos('camara')" id="camaras" class="btn-menu btn-category"><i class="fa-solid fa-hand-point-right"></i> Cámaras</button>
            </li>
            <li>
                <!-- Botón "Mi Carro" en la barra de navegación -->
                <a href="carrito.php" class="btn-car">
                    <i class="fa-solid fa-cart-shopping"></i> Carrito
                    <span class="cart-count"><?php echo $total_productos; ?></span>

                    
                </a>
                <a href="historial.php" class="btn-history">
                    <i class="fa-solid fa-clock"></i> Historial
                </a>
                <a href="nuestratienda.php" class="btn-history">
                    <i class="fa-solid fa-store"></i> Nuestra tienda 
                </a>
                <li>
                <form action="" method="post">
                    <button type="submit" name="cerrarSesion" class="modal-btn btn-car">
                        <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                    </button>
                </form>
            </li>
            </li>
        </ul>
        
        <!-- Modal para cerrar sesión -->
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

    <main> <!-- Contenido principal de la página -->
        <h2 class="title-main" id="main-title">Todos los Productos</h2> <!-- Título de la sección principal -->
        <div id="container-products" class="container-products">
            <!-- Contenedor para los productos -->
            <?php foreach ($products as $product) : ?>
                <div class="product-card" data-categoria="<?php echo $product['categoria']; ?>">
                    <model-viewer src="<?php echo htmlspecialchars($product['imagen']); ?>" 
                                alt="<?php echo htmlspecialchars($product['nombreProducto']); ?>" 
                                ar ar-modes="scene-viewer webxr quick-look" 
                                camera-controls tone-mapping="neutral" 
                                poster="poster.webp" shadow-intensity="1" 
                                auto-rotate class="model-viewer">
                                
                        <div class="progress-bar hide" slot="progress-bar">
                            <div class="update-bar"></div>
                        </div>
                        <button slot="ar-button" id="ar-button">View in your space</button>
                        <div id="ar-prompt">
                            <img src="https://modelviewer.dev/shared-assets/icons/hand.png">
                        </div>
                    </model-viewer>

                    <div class="details-product">
                        <h3 class="product-name"><?php echo htmlspecialchars($product['nombreProducto']); ?></h3>
                        <p class="product-price">S/.<?php echo number_format($product['precio'], 2); ?></p>
                        <form action="php/insCarrito.php" method="post" class="product-form">
                            <input type="hidden" name="nombre_producto" value="<?php echo $product['nombreProducto']; ?>">
                            <input type="hidden" name="precio" value="<?php echo $product['precio']; ?>">
                            <input type="hidden" name="imagen" value="<?php echo $product['imagen']; ?>">
                            <input type="hidden" name="categoria" value="<?php echo $product['categoria']; ?>">
                            <button type="submit" name="agregar" class="add-to-cart">Agregar</button>
                        </form>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </main> <!-- Contenido principal de la página -->
</div>

<!-- Realidad aumentada -->
<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"></script>

<!-- Enlace al archivo JavaScript personalizado -->
<script src="js/nav.js"></script>
<script src="js/cerrarSesion.js"></script>
<script src="js/modal.js"></script>
<script src="js/main.js"></script>
</body>

</html>
