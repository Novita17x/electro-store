<?php
// Mostrar errores de mysqli en desarrollo
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Config
$host = '127.0.0.1';
$user = 'root';
$pass = '';  
$db   = 'electrof';
$port = 3307;

// Conexión
$cnx = mysqli_connect($host, $user, $pass, $db, $port);
mysqli_set_charset($cnx, 'utf8mb4');
