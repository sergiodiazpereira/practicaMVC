<?php
    class Modelo {
        /* ------------- DATOS DE CONEXIÓN ------------- */
        private $direccion = "localhost";
	    private $usuario = "root";
	    private $contraseña = "";
	    private $bd = "torneo_ajedrez";

        /* ------------- ESTABLECER CONEXIÓN CON LA BD ------------- */
        private $conexion;
		private $driver;
		public function __construct(){
			$this->conexion = new mysqli($this->direccion, $this->usuario, $this->contraseña, $this->bd);
			$this->driver = new mysqli_driver();
			$this->driver->report_mode = MYSQLI_REPORT_OFF;
		}
		public function __destruct(){
			$this->conexion->close();
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
			$idProfesor = 1;
			foreach($nombres as $nombre){
				$sql = "UPDATE profesores SET nombre = '".$nombre."' WHERE idProfesor = ".$idProfesor.";";
				/* echo $sql; */
				$resultado = $this->conexion->query($sql);
				$idProfesor++;
			}
		}
    }
?>