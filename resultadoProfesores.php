<?php
    require_once 'controlador/controlador.php';
    $controlador = new Controlador();
    $datosProfesores = $controlador->mandarResultadoProfesores();
    if ($datosProfesores == "error") {
        include 'vista/vistaErrorModificacionProfesores.php';
    } else {
        include 'vista/vistaResultadoProfesores.php';
    }

?>