<?php

//controladores
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/lineamiento.controlador.php";
require_once "controladores/empresa.controlador.php";

//modelos
require_once "modelos/plantilla.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/proveedores.modelos.php";
require_once "modelos/lineamiento.modelo.php";
require_once "modelos/empresa.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();