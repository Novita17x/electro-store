<?php
session_start();
require __DIR__ . '/php/conexion.php';

if (!isset($_SESSION['id_cliente'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['producto_id'])) {
    $id_producto = $_POST['producto_id'];

    $conexion = $cnx;
    if ($conexion->connect_error) {
        die("La conexión falló: " . $conexion->connect_error);
    }

    $sql = "DELETE FROM carrito WHERE id = $id_producto";
    if ($conexion->query($sql) === TRUE) {
        // Redireccionar de vuelta al carrito
        header("Location: carrito.php");
        exit;
    } else {
        echo "Error al eliminar el producto: " . $conexion->error;
    }

    $conexion->close();
}
?>
