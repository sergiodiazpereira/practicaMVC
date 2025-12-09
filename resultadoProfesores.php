<?php
    require_once 'controlador/controlador.php';
    $controlador = new Controlador();
    $datosProfesores = $controlador->mandarResultadoProfesores();
    include 'vista/vistaResultadoProfesores.php';
?>