<html>
    <head>
        <title>Datos usuario</title>
    </head>
    <body>
        <form action="">
            <?php
            if ($datosProfesores->num_rows > 0){
                while ($fila = $datosProfesores->fetch_assoc()){
                    echo '<p>Id del profesor: '.$fila["idProfesor"].'</p>
                    <label for="inputNombre">Nombre: </label>
                    <input id="inputNombre" type="text" readonly placeholder="'.$fila["nombre"].'"></input>
                    <br/><br/><br/>';
                }
            } else {
                echo 'No se han encontrado profesores registrados';
            }
            ?>
        </form>
        <a href="modificarProfesores.php">Volver a la pagina de modificaciones</a>
    </body>
</html>