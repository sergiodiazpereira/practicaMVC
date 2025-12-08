<html>
    <head>
        <title>Datos usuario</title>
    </head>
    <body>
        <form action="resultadoProfesores.php" method="POST">
            <?php
            if ($datosProfesores->num_rows > 0){
                while ($fila = $datosProfesores->fetch_assoc()){
                    echo '<p>Id del profesor: '.$fila["idProfesor"].'</p>
                    <label for="inputNombre">Nombre: </label>
                    <input name="nombres[]" id="inputNombre" type="text" value="'.$fila["nombre"].'"></input>
                    <br/><br/><br/>';
                }
            } else {
                echo 'No se han encontrado profesores registrados';
            }
            ?>
            <input type="submit" value="Actualizar"></input>
        </form>
    </body>
</html>