<?php

require_once "conexion.php";

class ModeloCategorias{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarCategoria($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(RECORDID, FAMILIA, FAV) VALUES (NULL,  :FAMILIA, :FAV)");

		$stmt->bindParam(NULL, $datos["RECORDID"], PDO::PARAM_STR);
		
		$stmt->bindParam(":FAMILIA", $datos["FAMILIA"], PDO::PARAM_STR);
		$stmt->bindParam(":FAV", $datos["FAV"], PDO::PARAM_STR);

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

	static public function mdlMostrarCategorias($tabla, $item, $valor){

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

	static public function mdlEditarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET FAMILIA = :FAMILIA, FAV = :FAV WHERE RECORDID = :RECORDID");

		$stmt->bindParam(":RECORDID", $datos["RECORDID"], PDO::PARAM_STR);
		$stmt->bindParam(":FAMILIA", $datos["FAMILIA"], PDO::PARAM_STR);
		$stmt->bindParam(":FAV", $datos["FAV"], PDO::PARAM_STR);


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

	static public function mdlBorrarCategoria($tabla, $datos){

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

}

