<?php
session_start();
require __DIR__.'/conexion.php';

if (empty($_POST['correo']) || empty($_POST['pass'])) {
    $_SESSION['ico']  = 'warning';
    $_SESSION['titu'] = '¡Espacios en blanco!';
    $_SESSION['error']= 'Por favor, ingresa tu correo y contraseña.';
    header('Location: ../index.php');
    exit;
}

$correo = trim($_POST['correo']);
$contra = trim($_POST['pass']);

$sql  = 'SELECT id_cliente, nombres, pass FROM registro WHERE correo = ? LIMIT 1';
$stmt = $cnx->prepare($sql);
$stmt->bind_param('s', $correo);
$stmt->execute();
$res  = $stmt->get_result();

if ($row = $res->fetch_assoc()) {

    $login_ok = ($contra === $row['pass']);

    if ($login_ok) {
        $_SESSION['id_cliente']     = $row['id_cliente'];
        $_SESSION['nombre_usuario'] = $row['nombres'];

        // Usa las MISMAS llaves que lee tu index.php (msj, tit, iconn)
        $_SESSION['msj']   = "¡Bienvenido, {$row['nombres']}!";
        $_SESSION['tit']   = 'Login correcto';
        $_SESSION['iconn'] = 'success';

        header('Location: ../inicio.php');
        exit;
    }
}

$_SESSION['ico']  = 'error';
$_SESSION['titu'] = '¡Error!';
$_SESSION['error']= 'Correo o contraseña incorrectos.';
header('Location: ../index.php');
exit;
