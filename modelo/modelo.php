<?php
	require "config/conexion.php";
    class Modelo extends Conexion{
        /* ------------- ESTABLECER CONEXIÓN CON LA BD ------------- */
		public function __construct(){
			parent::__construct();
		}

        /* ----------------- FUNCIONES DEL MODELO --------------------- */
        public function datosProfesores(){
            $sql = "SELECT idProfesor, nombre FROM profesores WHERE idProfesor > 0 ORDER BY idProfesor;";
			/* echo $sql; */
			$resultado = $this->conexion->query($sql);
			return $resultado;
        }

        
        
        public function numeroProfesores(){
	        $sql = "SELECT COUNT(*) FROM profesores";
			/* echo $sql; */
			$resultado = $this->conexion->query($sql);
			$resultadoIndexado = $resultado->fetch_row();
			$resultadoFinal = (int)$resultadoIndexado[0];
            return $resultadoFinal;
        }



		public function modificarProfesores($nombres) {
			$todoOK = true;
			$idProfesor = 1;
			foreach($nombres as $nombre){
				$sql = "UPDATE profesores SET nombre = '".$nombre."' WHERE idProfesor = ".$idProfesor.";";
				/* echo $sql; */
				$resultado = $this->conexion->query($sql);
				$idProfesor++;
				if (!$resultado) {
        			$todoOK = false;
    			}
			}
			return $todoOK;
		}
    }
?>