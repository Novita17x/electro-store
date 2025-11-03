<?php

require_once __DIR__ . '/../php/conexion.php';

class Usuario {
    /** @var mysqli */
    private $con;
    private $nombres;
    private $apellidos;
    private $correo;
    private $password;

    public function __construct(string $nombres, string $apellidos, string $correo, string $password, mysqli $cnx) {
        $this->con = $cnx;

        $this->nombres   = $this->con->real_escape_string($nombres);
        $this->apellidos = $this->con->real_escape_string($apellidos);
        $this->correo    = $this->con->real_escape_string($correo);
        $this->password  = $this->con->real_escape_string($password);
    }

    public function registrarUsuario(): array {
        // 1) Verificar si el correo ya existe (consulta preparada)
        $stmt = $this->con->prepare('SELECT 1 FROM registro WHERE correo = ? LIMIT 1');
        $stmt->bind_param('s', $this->correo);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->close();
            return [
                'titulo'  => '¡Correo existente!',
                'mensaje' => 'El correo electrónico ya está registrado.',
                'icono'   => 'error'
            ];
        }
        $stmt->close();

        // 2) Insertar nuevo registro (consulta preparada)
        $stmt = $this->con->prepare(
            'INSERT INTO registro (nombres, apellidos, correo, pass) VALUES (?, ?, ?, ?)'
        );
        $stmt->bind_param('ssss', $this->nombres, $this->apellidos, $this->correo, $this->password);

        if ($stmt->execute()) {
            $stmt->close();
            return [
                'titulo'  => '¡Registro exitoso!',
                'mensaje' => 'Ahora puedes acceder a todos nuestros servicios.',
                'icono'   => 'success'
            ];
        } else {
            $stmt->close();
            return [
                'titulo'  => '¡Error!',
                'mensaje' => 'Error al registrar el usuario',
                'icono'   => 'error'
            ];
        }
    }
}
