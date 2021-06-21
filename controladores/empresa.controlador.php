<?php

class ControladorEmpresa{


    static public function ctrAgregarEmpresa(){

        if(isset($_POST["nuevoEmpresa"])){

			if($_POST["nuevoEmpresa"]){

			   	$tabla = "proveedor";

			   	$datos = array("Empresa"=>$_POST["nuevoEmpresa"],
					           "razon_social"=>$_POST["nuevorazon_social"],
					           "rfc"=>$_POST["nuevorfc"],
					           "municipio"=>$_POST["nuevomunicipio"],
					           "calle"=>$_POST["nuevacalle"],
					           "region"=>$_POST["nuevaregion"],
                               "colonia"=>$_POST["nuevacolonia"],
                               "pais"=>$_POST["nuevapais"],
                               "cp"=>$_POST["nuevacp"],
                               "tel"=>$_POST["nuevatel"]);

			   	$respuesta = ModeloEmpresa::mdlAgregarEmpresa($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Los datos de la empresa ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "crear-proveedor";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos de la empresa no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proveedor";

							}
						})

			  	</script>';



			}

		} 
    }

    static public function ctrMostrarEmpresa($item, $valor){

		$tabla = "proveedor";

		$respuesta = ModeloEmpresa::mdlMostrarEmpresa($tabla, $item, $valor);

		return $respuesta;
	
	} 
}