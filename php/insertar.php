<?php
session_start();

require_once __DIR__ . '/conexion.php';        
require_once __DIR__ . '/../clases/usuario.php'; 

if (
    !empty($_POST['nombres']) &&
    !empty($_POST['apellidos']) &&
    !empty($_POST['correo']) &&
    !empty($_POST['pass'])
) {
    $nombres   = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $correo    = trim($_POST['correo']);
    $pass      = trim($_POST['pass']);

    // Instancia con la firma nueva: (nombres, apellidos, correo, password, $cnx)
    $usuario = new Usuario($nombres, $apellidos, $correo, $pass, $cnx);

    $resultado = $usuario->registrarUsuario();

    // Muestra el SweetAlert según tu index.php (usa msj, tit, iconn)
    $_SESSION['tit']   = $resultado['titulo'];
    $_SESSION['msj']   = $resultado['mensaje'];
    $_SESSION['iconn'] = $resultado['icono'];
} else {
    // Aviso por campos vacíos
    $_SESSION['ico']   = 'warning';
    $_SESSION['titu']  = '¡Espacios en blanco!';
    $_SESSION['error'] = 'Todos los campos son requeridos';
}

header('Location: ../index.php');
exit;
