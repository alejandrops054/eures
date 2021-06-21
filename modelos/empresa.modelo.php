<?php

require_once "conexion.php";

class ModeloEmpresa{

    static public function mdlAgregarEmpresa($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Empresa, razon_social, rfc, municipio, calle, region, colonia, pais, cp, tel) VALUES (:Empresa, :razon_social, :rfc, :municipio, :calle, :region, :colonia, :pais, :cp, :tel)");

		$stmt->bindParam(":Empresa", $datos["Empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":razon_social", $datos["razon_social"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":municipio", $datos["municipio"], PDO::PARAM_STR);
        $stmt->bindParam(":calle", $datos["calle"], PDO::PARAM_STR);
        $stmt->bindParam(":region", $datos["region"], PDO::PARAM_STR);
        $stmt->bindParam(":colonia", $datos["colonia"], PDO::PARAM_STR);
        $stmt->bindParam(":pais", $datos["pais"], PDO::PARAM_STR);
        $stmt->bindParam(":cp", $datos["cp"], PDO::PARAM_STR);
        $stmt->bindParam(":tel", $datos["tel"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }

    //MOSTRAR PROVEEDORES
	static public function mdlMostrarEmpresa($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}
}