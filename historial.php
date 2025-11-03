<?php
require __DIR__ . '/php/conexion.php';
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
    <link rel="stylesheet" href="css/stylesmain.css"><!--Estilo de la página general para todas las ventanas-->
    <link rel="stylesheet" href="css/modal.css"> <!--Ventanas emergentes y las salidas-->
    <link rel="stylesheet" href="css/historial.css"> <!---->
    <link rel="icon" href="img/image.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <button href="historial.php" id="generar-pdf-button" class="nav-link">
                            <i class="fa-solid fa-file-pdf"></i> Generar PDF
                        </button>
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

        <div id="pdf-content">
            <main> <!-- Contenido principal de la página -->
                <div id="historial-container" class="container-products">
                    <h1>Historial de Compras de  <?php echo htmlspecialchars($nombre_usuario); ?></h1> <!--Título de la sección principal -->
                    <?php
                    // Conectar a la base de datos
                    $conn = $cnx;

                    // Verificar la conexión
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    // Obtener el id_cliente del usuario actual
                    $sql = "SELECT id_cliente FROM registro WHERE nombres = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $nombre_usuario);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $id_cliente = $row['id_cliente'];

                        // Obtener el historial de compras del usuario actual
                        $sql = "SELECT nombre_producto, precio, fecha_compra, categoria FROM compra WHERE id_cliente = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $id_cliente);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            echo "<table>";
                            echo "<tr><th>Fecha</th><th>Producto</th><th>Categoría</th><th>Precio</th></tr>";
                            // Mostrar cada compra
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['fecha_compra']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['nombre_producto']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['categoria']) . "</td>";
                                echo "<td>S/." . number_format($row['precio'], 2) . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "<p>No hay historial de compras disponible.</p>";
                        }
                    } else {
                        echo "<p>Usuario no encontrado.</p>";
                    }

                    // Cerrar la conexión
                    $conn->close();
                    ?>
                </div>
            </main> <!-- Contenido principal de la página -->
        </div>
    </div>
    <script src="js/cerrarSesion.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/html2pdf.bundle.min.js"></script>
    <script src="js/convertirPDF.js"></script>
</body>

</html>