<?php
    require_once 'controlador/controlador.php';
    $controlador = new Controlador();
    $datosProfesores = $controlador->mandarDatosProfesores();
    include 'vista/vistaModificarProfesores.php';
?>