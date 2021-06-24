<?php 

require_once "conexion.php";

class ModeloLineamiento{

    /*=============================================
	CREAR LINEAMIENTOS
	=============================================*/

	static public function mdlIngresarLineamiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(lino, idcategoria, lineamiento, puntos) VALUES (:lino, :idcategoria, :lineamiento, :puntos)");

		$stmt->bindParam(":lino", $datos["lino"], PDO::PARAM_STR);
		$stmt->bindParam(":idcategoria", $datos["idcategoria"], PDO::PARAM_INT);
        $stmt->bindParam(":lineamiento", $datos["lineamiento"], PDO::PARAM_STR);
        $stmt->bindParam(":puntos", $datos["puntos"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR LINEAMIENTOS    
	=============================================*/

	static public function mdlMostrarLineamiento($tabla, $item, $valor){

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

	/*=============================================
	MOSTRAR SUMA    
	=============================================*/
	static public function mdlSumaTotal($tabla){	

		$stmt = Conexion::conectar()->prepare("SELECT SUM(puntos) as puntos FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}
}