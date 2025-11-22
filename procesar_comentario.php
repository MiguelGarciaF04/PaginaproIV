<?php

include 'conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y limpiar datos del formulario
    $nombreyapellido = $conn->real_escape_string($_POST['nombreyapellido']);
    $usuario = $conn->real_escape_string($_POST['usuario']);
    $email = $conn->real_escape_string($_POST['email']);
    $nota = $conn->real_escape_string($_POST['nota']);
    

    $fecha = date('Y-m-d H:i:s');
    

    $sql = "INSERT INTO comentarios (nombreyapellido, usuario, email, nota, fechanota) 
            VALUES ('$nombreyapellido', '$usuario', '$email', '$nota', '$fecha')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirigir de vuelta a la página principal
        header("Location: the_office.php#comentarios");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>