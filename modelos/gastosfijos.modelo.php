<?php

require_once "conexion.php";

class ModeloGastosfijos{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarGastosfijos($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(RECORDID, concepto, cantidad) VALUES (NULL,  :concepto, :cantidad)");

		$stmt->bindParam(NULL, $datos["RECORDID"], PDO::PARAM_STR);
		
		$stmt->bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarGastosfijos($tabla, $item, $valor){

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
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarGastosfijos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET concepto = :concepto, cantidad = :cantidad WHERE RECORDID = :RECORDID");

		$stmt->bindParam(":RECORDID", $datos["RECORDID"], PDO::PARAM_STR);
		$stmt->bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarGastosfijos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE RECORDID = :RECORDID");

		$stmt->bindParam(":RECORDID", $datos, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	
		}

		$stmt -> close();

		$stmt = null;

	}
		/*=============================================
	SUMAR EL TOTAL DE VENTAS
	=============================================*/

	static public function mdlSumaTotalDeGastosFijos($tabla){	

		$stmt = Conexion::conectar()->prepare("SELECT SUM(cantidad) as totalGF FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

}

