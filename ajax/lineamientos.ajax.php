<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxLineamiento{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idLineamiento;

	public function ajaxEditarLineamiento(){

		$item = "id";
		$valor = $this->idLineamiento;

		$respuesta = Controlador::ctrMostrarCategorias($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idLineamiento"])){

	$categoria = new AjaxLineamiento();
	$categoria -> idLineamiento = $_POST["idLineamiento"];
	$categoria -> ajaxEditarCategoria();
}
