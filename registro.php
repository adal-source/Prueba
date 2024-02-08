<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$usuario = 'root';
$clave = '';
$base_datos = 'registros';

// Verificar si se enviaron datos por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Crear la conexión
    $conexion = new mysqli($host, $usuario, $clave, $base_datos);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $turno = $_POST['turno'];
    $grupo = $_POST['grupo'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO tbl_ope_persona (Nombre, ApellidoPaterno, ApellidoMaterno, Turno, Grupo) VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$turno', '$grupo')";

    if ($conexion->query($sql) === TRUE) {
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>
    
    <label for="apellido_paterno">Apellido Paterno:</label>
    <input type="text" id="apellido_paterno" name="apellido_paterno" required>
    <br>

    <label for="apellido_materno">Apellido Materno:</label>
    <input type="text" id="apellido_materno" name="apellido_materno" required>
    <br>

    <label for="turno">Turno:</label>
    <select id="turno" name="turno">
        <option value="manana">Mañana</option>
        <option value="tarde">Tarde</option>
        <option value="noche">Noche</option>
    </select>
    <br>

    <label for="grupo">Grupo:</label>
    <select id="grupo" name="grupo">
        <option value="grupo_a">Grupo A</option>
        <option value="grupo_b">Grupo B</option>
        <option value="grupo_c">Grupo C</option>
    </select>
    <br>

    <input type="submit" value="Registrar">
</form>

</body>
</html>