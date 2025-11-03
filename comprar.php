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

// Obtener los productos del carrito del usuario actual
$sql = "SELECT * FROM carrito WHERE id_cliente = $id_cliente";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Insertar cada producto del carrito en la tabla de compras
        $nombre_producto = $fila['nombre_producto'];
        $precio = $fila['precio'];
        $imagen = $fila['imagen'];
        $categoria = $fila['categoria'];
        
        $insert_sql = "INSERT INTO compra (id_cliente, nombre_producto, precio, imagen, categoria) VALUES ('$id_cliente', '$nombre_producto', '$precio', '$imagen', '$categoria')";
        $conexion->query($insert_sql);
    }
}

// Vaciar el carrito después de comprar
$delete_sql = "DELETE FROM carrito WHERE id_cliente = $id_cliente";
$conexion->query($delete_sql);

$conexion->close();

// Configura la sesión para indicar una compra exitosa
$_SESSION['compra_exitosa'] = true;

// Redireccionar al usuario a la página de inicio después de comprar
header("Location: inicio.php");
exit;
?>
