<?php
/*controladores*/
require_once "controlador/plantillaControlador.php";
require_once "controlador/usuarioControlador.php";
require_once "controlador/rolControlador.php";
require_once "controlador/mensualidadControlador.php";
require_once "controlador/socioControlador.php";
require_once "controlador/vehiculoControlador.php";


require_once "modelo/rolModelo.php";
require_once "modelo/usuarioModelo.php";
require_once "modelo/mensualidadModelo.php";
require_once "modelo/socioModelo.php";
require_once "modelo/vehiculoModelo.php";

$plantilla=new controladorPlantilla();
$plantilla->ctrPlantilla();

