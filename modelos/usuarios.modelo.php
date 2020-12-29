<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

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
	MOSTRAR INGRESO
	=============================================*/

	static public function mdlMostrarAcceso($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

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
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID, USUARIO, CONTRASENA, TIPOCUENTA, NOMBRECOMPL) VALUES (NULL,  :USUARIO, :CONTRASENA, :TIPOCUENTA, :NOMBRECOMPL)");

		$stmt->bindParam(NULL, $datos["ID"], PDO::PARAM_STR);
		
		$stmt->bindParam(":USUARIO", $datos["USUARIO"], PDO::PARAM_STR);
		$stmt->bindParam(":CONTRASENA", $datos["CONTRASENA"], PDO::PARAM_STR);
		$stmt->bindParam(":TIPOCUENTA", $datos["TIPOCUENTA"], PDO::PARAM_STR);
		$stmt->bindParam(":NOMBRECOMPL", $datos["NOMBRECOMPL"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ID = :ID");

		$stmt -> bindParam(":ID", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}