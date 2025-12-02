<?php
    require_once '../modelo/modelo.php';
    class Controlador{
        private $modelo;
        public function __construct(){
            $this->modelo = new Modelo();
        }



        public function mostrarDatosProfesores(){
            /* --------------- VISTA DE MODIFICAR PROFESORES ---------------- */
            $datosProfesores = $this->modelo->datosProfesores();

            ?>
            <html>
                <head>
                    <title>Datos usuario</title>
                </head>
                <body>
                    <form action="../vista/resultadoProfesores.php" method="POST">
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
            <?php
        }



        public function mostrarResultadoProfesores(){
            try{
                /* -------------- VERIFICACION DE NOMBRES DE PROFESORES NO VACÍOS -------------------- */
                $contador = 0;
                $numeroProfesores = $this->modelo->numeroProfesores();
                foreach ($_POST['nombres'] as $nombre) {
                    if (!empty($nombre)) $contador++;
                }
                if ($numeroProfesores != $contador) {
                    throw new Exception("Has quedado nombres vacíos");
                }
                /* ---------------- ACTUALIZAR CAMBIOS EN LA BD -------------------- */
                $this->modelo->modificarProfesores($_POST['nombres']);

                /* --------------- VISTA DE RESULTADO DE LA MODIFICACIÓN DE PROFESORES ---------------- */
                $datosProfesores = $this->modelo->datosProfesores();

                ?>
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
                        <a href="../vista/modificarProfesores.php">Volver a la pagina de modificaciones</a>
                    </body>
                </html>
                <?php
            } catch (Exception $e) {
                echo $e->getMessage() . ", <a href='../vista/modificarProfesores.php'>vuelve al formulario de modificación</a>";
            }
        }
    }
?>