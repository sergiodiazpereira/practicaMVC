<?php
	require 'config/configdb.php';
	class Conexion{
		protected $conexion; /* Para acceder a la conexion desde los modelos (clases hijas) */
		private $driver;
		public function __construct(){
			global $direccion, $usuario, $contraseña, $bd;
			
			$this->conexion = new mysqli($direccion, $usuario, $contraseña, $bd);
			$this->driver = new mysqli_driver();
			$this->driver->report_mode = MYSQLI_REPORT_OFF;
		}
		public function __destruct(){
			$this->conexion->close();
		}
	}
?>