<?php

include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    

    $sql = "SELECT * FROM comentarios WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $comentario = $result->fetch_assoc();
    } else {
        echo "Comentario no encontrado";
        exit();
    }
} else {
    echo "ID no proporcionado";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreyapellido = $conn->real_escape_string($_POST['nombreyapellido']);
    $usuario = $conn->real_escape_string($_POST['usuario']);
    $email = $conn->real_escape_string($_POST['email']);
    $nota = $conn->real_escape_string($_POST['nota']);
    
    // Actualizar el comentario
    $sql = "UPDATE comentarios SET 
            nombreyapellido = '$nombreyapellido',
            usuario = '$usuario',
            email = '$email',
            nota = '$nota'
            WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        // Redirigir de vuelta a la página principal
        header("Location: the_office.php#comentarios");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comentario - The Office</title>
    <link rel="shortcut icon" href="Imagenes/the-office-icono.jpg" type="image/x-icon">
    <link rel="stylesheet" href="estilos.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet"></body>
</head>
<body>
    <header>
        <h2><a href="the_office.php">The Office</a></h2>
    </header>
    
    <div class="editar-comentario">
        <h3>Editar Comentario</h3>
        <form method="POST">
            <div class="campo-formulario">
                <label for="nombreyapellido">Nombre y Apellido:</label>
                <input type="text" id="nombreyapellido" name="nombreyapellido" value="<?php echo htmlspecialchars($comentario['nombreyapellido']); ?>" required>
            </div>
            
            <div class="campo-formulario">
                <label for="usuario">Usuario (opcional):</label>
                <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($comentario['usuario']); ?>">
            </div>
            
            <div class="campo-formulario">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($comentario['email']); ?>" required>
            </div>
            
            <div class="campo-formulario">
                <label for="nota">Comentario:</label>
                <textarea id="nota" name="nota" rows="5" required><?php echo htmlspecialchars($comentario['nota']); ?></textarea>
            </div>
            
            <button type="submit" class="btn-enviar">Actualizar Comentario</button>
            <a href="the_office.php#comentarios" class="btn-cancelar">Cancelar</a>
        </form>
    </div>
</body>
</html>

<?php

$conn->close();
?>