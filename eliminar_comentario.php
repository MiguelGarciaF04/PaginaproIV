<?php

include 'conexion.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    

    $sql = "DELETE FROM comentarios WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        // Redirigir de vuelta a la página principal
        header("Location: the_office.php#comentarios");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID no proporcionado";
}

// Cerrar conexión
$conn->close();
?>