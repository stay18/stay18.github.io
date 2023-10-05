

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    
    $apellidoPaterno = $_POST["apellido_paterno"];
    $apellidoMaterno = $_POST["apellido_materno"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    
    // Calcular la edad a partir de la fecha de nacimiento
    $fechaNacimiento = new DateTime($fechaNacimiento);
    $hoy = new DateTime();
    $edad = $hoy->diff($fechaNacimiento)->y;

    // Puedes imprimir la edad para verificar
    // echo "Edad: " . $edad;
    
    // Aquí puedes realizar operaciones con los datos, como guardarlos en una base de datos
    // Por ejemplo, puedes usar una conexión a una base de datos MySQL para guardar los datos
    // Reemplaza los siguientes valores con los datos de tu base de datos
       $servername = "localhost";
        $username = "adri";
        $password = "12345";
        $database = "lincoln";

    
    // Establecer conexión a la base de datos
    $conexion = new mysqli($servidor, $usuario, $contrasena, $nombreBaseDatos);
    
    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }
    
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO alumnos (nombre, apellido_paterno, apellido_materno, fecha_nacimiento, edad) VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$fechaNacimiento', $edad)";
    
    if ($conexion->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar el alumno: " . $conexion->error;
    }
    
    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>


