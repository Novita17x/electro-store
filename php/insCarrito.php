<?php

session_start(); 
require __DIR__.'/conexion.php';
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_cliente'])) {
    // Si no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("location: ../index.php");
    exit;
}

// Incluir el archivo de conexión
include('conexion.php'); // Usa require_once en lugar de include

// Obtener el ID del cliente desde la sesión
$id_cliente = $_SESSION['id_cliente'];

// Verificar si se ha enviado el formulario de agregar al carrito
if (isset($_POST['agregar'])) {
    $conn = $cnx;

    // Obtener los datos del producto enviado por el formulario
    $nombre_producto = $_POST['nombre_producto'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $categoria = $_POST['categoria'];

    // Escapar los datos para evitar inyección SQL
    $nombre_producto = mysqli_real_escape_string($conn, $nombre_producto);
    $precio = mysqli_real_escape_string($conn, $precio);
    $imagen = mysqli_real_escape_string($conn, $imagen);
    $categoria = mysqli_real_escape_string($conn, $categoria);

    // Preparar la consulta SQL para insertar en el carrito
    $stmt = $conn->prepare("INSERT INTO carrito (id_cliente, nombre_producto, precio, imagen, categoria) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isdss", $id_cliente, $nombre_producto, $precio, $imagen, $categoria);

    // Ejecutar la consulta
    if ($stmt->execute() === TRUE) {
        // Producto agregado exitosamente al carrito
        $_SESSION['msj3'] = "Producto agregado al carrito exitosamente";
    } else {
        // Error al agregar el producto al carrito
        $_SESSION['msj3'] = "Error al agregar el producto al carrito: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Redirigir de vuelta al inicio
header("location:../inicio.php");
exit;
?>
