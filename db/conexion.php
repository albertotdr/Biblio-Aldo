<?php 
    // Datos de la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteca";

    // Crear la conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    echo "Conexión exitosa";
    
    // Retornar la conexión
    return $conn;
?>
