<?php
session_start();

// Aviso de éxito / info (usa msj, tit, iconn)
if (isset($_SESSION['msj'])) {
    $respuesta = $_SESSION['msj'];
    $titulo    = $_SESSION['tit'] ?? 'Mensaje';
    $icono     = $_SESSION['iconn'] ?? 'info';
    // limpiamos para que no se repita al refrescar
    unset($_SESSION['msj'], $_SESSION['tit'], $_SESSION['iconn']);
    ?>
    <script>
        Swal.fire({
            title: <?= json_encode($titulo) ?>,
            text:  <?= json_encode($respuesta) ?>,
            icon:  <?= json_encode($icono) ?>
        });
    </script>
    <?php
}

// Aviso de error (usa error, titu, ico)
if (isset($_SESSION['error'])) {
    $ico   = $_SESSION['ico']  ?? 'error';
    $titu  = $_SESSION['titu'] ?? 'Error';
    $error = $_SESSION['error'];
    unset($_SESSION['error'], $_SESSION['ico'], $_SESSION['titu']);
    ?>
    <script>
        Swal.fire({
            icon:  <?= json_encode($ico) ?>,
            title: <?= json_encode($titu) ?>,
            text:  <?= json_encode($error) ?>
        });
    </script>
    <?php
}
?>

<!-- http://1-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiendas Online</title>
    <link rel="stylesheet" href="css/session.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="img/image.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <main>
        <div class="form">
            <h1 id="form-title">Iniciar Sesión</h1>
            
            <form id="form-register" action="php/insertar.php" method="post">
                <div class="form-input">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="nombres" placeholder="Nombres Completos" pattern="[a-zA-Z\s]+" title="El nombre solo debe contener letras y espacios" required>
                </div>
                <div class="form-input">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="apellidos" placeholder="Apellidos completos" pattern="[a-zA-Z\s]+" title="El apellido solo debe contener letras y espacios" required>
                </div>
                <div class="form-input">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="correo" placeholder="Correo Electrónico" required>
                </div>
                <div class="form-input">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="pass" placeholder="Contraseña" required>
                </div>
                <div class="btn-group">
                    <button id="sigUp" type="submit">REGISTRAR</button>
                    <button id="sigIn-in" type="button">Ya tengo una Cuenta</button>
                </div>
            </form>

            <form id="form-login" action="php/validar.php" method="post">
                <div class="form-input">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="correo" placeholder="Correo Electrónico">
                </div>
                <div class="form-input">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="pass" placeholder="Contraseña">
                </div>
                <div class="btn-group">
                    <button id="sigIn" type="submit">INICIAR SESION</button>
                    <button id="sigUp-create" type="button">No tengo Cuenta</button>
                </div>
            </form>
        </div>        
    </main>
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"></script>
    <script src="js/login.js"></script>
</body>
</html>