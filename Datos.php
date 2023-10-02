<?php

$nombre =$_POST["nombre"];
$pass = $_POST["pass"];
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "adri";
$password = "12345";
$database = "lincoln";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}else{
    echo "la conexxion exxitosa";
}


$sql = "INSERT INTO tabla  VALUES ('$nombre', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Registro insertado correctamente";
} else {
    echo "Error al insertar registro: " . $conn->error;
}




// Ahora puedes ejecutar consultas SQL aquí

// Cerrar la conexión cuando hayas terminado
$conn->close();



