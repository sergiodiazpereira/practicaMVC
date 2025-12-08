<?php
    require_once 'modelo/modelo.php';
    class Controlador{
        private $modelo;
        public function __construct(){
            $this->modelo = new Modelo();
        }



        public function mandarDatosProfesores(){
            /* --------------- VISTA DE MODIFICAR PROFESORES ---------------- */
            $datosProfesores = $this->modelo->datosProfesores();
            return $datosProfesores;
        }



        public function mandarResultadoProfesores(){
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
                /* ---------------- ACTUALIZAR Y COMPROBAR CAMBIOS EN LA BD -------------------- */
                $resultadoModificacion = $this->modelo->modificarProfesores($_POST['nombres']);
                
                if ($resultadoModificacion) { // El metodo del modelo devuelve "true" si la consulta es exitosa
                    $datosProfesores = $this->modelo->datosProfesores();
                    return $datosProfesores;
                } else {
                    return "error";
                }

            } catch (Exception $e) {
                echo $e->getMessage() . ", <a href='modificarProfesores.php'>vuelve al formulario de modificación</a>";
            }
        }
    }
?>