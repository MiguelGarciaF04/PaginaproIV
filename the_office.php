<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>the office</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="shortcut icon" href="Imagenes/the-office-icono.jpg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <header>
     <h2><a href="#"></a>the office</h2>
        <nav>
           <a href="#inicio">Inicio</a> 
           <a href="#resumenp">Resumen</a> 
           <a href="#personaje">Personajes</a> 
           <a href="#comentarios">Comentarios</a> 
           <a href="#contacto">Contacto</a> 
        </nav>
    </header>
    
    <h1 id="inicio" class="fondoS1">the office</h1>
      
      <h3 class="textop">Resumen</h3>
    <section id="resumenp" class="resumen">
        
          <p>The Office es una serie de comedia estadounidense que retrata el día a día de los empleados de la sucursal de Dunder Mifflin, una empresa ficticia de venta de papel ubicada en Scranton, Pensilvania. Presentada en formato de falso documental (mockumentary), la serie sigue a un grupo de trabajadores excéntricos y sus interacciones, enfocándose en las situaciones cotidianas, los enredos y las relaciones personales en la oficina.La serie combina comedia con momentos de drama sutil, explorando la vida laboral y personal de sus personajes a lo largo de nueve temporadas emitidas entre 2005 y 2013.The Office se ha destacado por su estilo innovador en la comedia, su sátira de la cultura empresarial americana y su mezcla de humor y humanidad.</p>
    </section>
     
    <h3 class="textop">Personajes</h3>
    <br>
    
    <section id="personaje" class="personajes">

         
        <div>
             <img src="Imagenes/Michael.jpg" alt="Michael">
             <p>Michael</p>
        </div>
       
        <div>
             <img src="Imagenes/Dwight.jpg" alt="Dwight">
             <p>Dwight</p>
        </div>
       
        <div>
             <img src="Imagenes/Jim.jpg" alt="Jim">  
             <p>Jim</p>
        </div>
       
        <div>
            <img src="Imagenes/Pam.jpg" alt="Pam">
            <p>Pam</p>
        </div>
        
        <div>
           <img src="Imagenes/Ryan.jpg" alt="Ryan"> 
           <p>Ryan</p>
         </div>
         
    </section>

      <section id="comentarios" class="comentarios-section">
        <h3 class="textop">Comentarios</h3>
        
        <div class="formulario-comentarios">
            <h4>Agregar un comentario</h4>
            <form action="procesar_comentario.php" method="POST">
                <div class="campo-formulario">
                    <label for="nombreyapellido">Nombre y Apellido:</label>
                    <input type="text" id="nombreyapellido" name="nombreyapellido" required>
                </div>
                
                <div class="campo-formulario">
                    <label for="usuario">Usuario (opcional):</label>
                    <input type="text" id="usuario" name="usuario">
                </div>
                
                <div class="campo-formulario">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="campo-formulario">
                    <label for="nota">Comentario:</label>
                    <textarea id="nota" name="nota" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="btn-enviar">Enviar Comentario</button>
            </form>
        </div>
    
  <div class="lista-comentarios">
            <h4>Comentarios anteriores</h4>
            <?php
            
            include 'conexion.php';
            
            $sql = "SELECT * FROM comentarios ORDER BY fechanota DESC";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='comentario'>";
                    echo "<div class='comentario-header'>";
                    echo "<strong>" . htmlspecialchars($row['nombreyapellido']) . "</strong>";
                    if (!empty($row['usuario'])) {
                        echo " (" . htmlspecialchars($row['usuario']) . ")";
                    }
                    echo "<span class='fecha'>" . $row['fechanota'] . "</span>";
                    echo "</div>";
                    echo "<div class='comentario-texto'>" . nl2br(htmlspecialchars($row['nota'])) . "</div>";
                    echo "<div class='comentario-acciones'>";
                    echo "<a href='editar_comentario.php?id=" . $row['id'] . "' class='btn-editar'>Editar</a>";
                    echo "<a href='eliminar_comentario.php?id=" . $row['id'] . "' class='btn-eliminar' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este comentario?\")'>Eliminar</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay comentarios aún. ¡Sé el primero en comentar!</p>";
            }
            
            $conn->close();
            ?>
        </div>
    </section>
    
<footer id="contacto"> 
    <p>Proyecto de programacion IV</p>
    <p>Contacto: mgarcia7916@unimar.edu.ve</p>
    <p>Nov-2025</p>
</footer>
</body>
</html>