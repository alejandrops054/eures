<?php

class ControladorLineamiento{
    
    /*=============================================
	CREAR LINEAMIENTOS
	=============================================*/

	static public function ctrCrearLineamiento(){

		if(isset($_POST["seleccionarCategoria"])){

			if($_POST["seleccionarCategoria"]){

				$tabla = "sub_categoria_fs";

				$datos = array("lino" => $_POST["nuevano"],
								"idcategoria" => $_POST["seleccionarCategoria"],
                                "lineamiento"=>$_POST["nuevalineamiento"],
                                "puntos"=>$_POST["nuevapuntos"]);

				$respuesta = ModeloLineamiento::mdlIngresarLineamiento($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Los lineamiento ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

			  	</script>';

			}

		}

	}

    /*=============================================
	MOSTRAR Lineamientos
	=============================================*/

	static public function ctrMostrarLineamientos($item, $valor){

		$tabla = "sub_categoria_fs";

		$respuesta = ModeloLineamiento::mdlMostrarLineamiento($tabla, $item, $valor);

		return $respuesta;
	
	}
	/*=============================================
	SUMA TOTAL VENTAS
	=============================================*/

	static public function ctrSumaTotalLineamento(){

		$tabla = "sub_categoria_fs";

		$respuesta = ModeloLineamiento::mdlSumaTotal($tabla);

		return $respuesta;

	}

}