<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['nombre_usuario'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

// Conectar a la base de datos
include('php/conexion.php');
$mysqli = $cnx;

// Inicializar la variable para controlar el estado del envío
$envio_exitoso = false;

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $direccion = $_POST['direccion'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $distrito = $_POST['distrito'];
    $codigo_postal = $_POST['codigo_postal'];
    $celular = $_POST['celular'];
    $id_cliente = $_SESSION['id_cliente']; // Suponiendo que guardas el ID del cliente en la sesión

    // Preparar la consulta SQL para insertar los datos en la tabla "envio"
    $sql = "INSERT INTO envio (id_cliente, direccion, pais, ciudad, distrito, codigo_postal, celular) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            
    if ($stmt = $mysqli->prepare($sql)) {
        // Vincular variables a la declaración preparada como parámetros
        $stmt->bind_param("issssss", $id_cliente, $direccion, $pais, $ciudad, $distrito, $codigo_postal, $celular);
        
        // Ejecutar la declaración
        if ($stmt->execute()) {
            // Establecer una variable para indicar el éxito del envío
            $envio_exitoso = true;
        } else {
            // Mostrar un mensaje de error si la ejecución de la declaración falla
            echo "Error al insertar en la base de datos: " . $stmt->error;
        }
        
        // Cerrar la declaración preparada
        $stmt->close();
    } else {
        // Mostrar un mensaje de error si la preparación de la declaración falla
        echo "Error al preparar la consulta SQL: " . $mysqli->error;
    }
    
    // Cerrar la conexión a la base de datos
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Envío</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/stylesmain.css">
    <style>
        .confirmacion-container {
            text-align: center;
            padding: 50px;
            background-color: #f8f9fa;
            border-radius: 8px;
            margin: 100px auto;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .confirmacion-container i {
            font-size: 5em;
            color: #28a745;
            margin-bottom: 20px;
        }

        .confirmacion-container h2 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .confirmacion-container p {
            font-size: 1.2em;
            color: #6c757d;
        }

        .loading-spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #28a745;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <?php if ($envio_exitoso): ?>
        <div class="confirmacion-container">
            <i class="fas fa-check-circle"></i>
            <h2>¡Envío exitoso!</h2>
            <p>Sus datos se han enviado correctamente.</p>
            <div class="loading-spinner"></div>
            <p>Redirigiendo en unos momentos...</p>
        </div>
        <script>
            // Redirigir a la página de dirección de envío después de unos segundos
            setTimeout(function() {
                alert('Puedes realizar tu pago con PayPal');
                window.location.href = 'direccionEnvio.php';
            }, 3000);
        </script>
    <?php else: ?>
        <div class="error-container">
            <h2>Ocurrió un error al enviar sus datos.</h2>
            <p>Por favor, intente nuevamente.</p>
        </div>
    <?php endif; ?>
</body>
</html>
