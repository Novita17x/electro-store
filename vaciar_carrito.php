<?php
session_start();
require __DIR__ . '/php/conexion.php';

if (!isset($_SESSION['id_cliente'])) {
    header("Location: index.php");
    exit;
}

$id_cliente = $_SESSION['id_cliente'];

$conexion = $cnx;
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

$sql = "DELETE FROM carrito WHERE id_cliente = $id_cliente";

if ($conexion->query($sql) === TRUE) {
    // Redireccionar de vuelta al carrito
    header("Location: carrito.php");
    exit;
} else {
    echo "Error al vaciar el carrito: " . $conexion->error;
}

$conexion->close();
?>
