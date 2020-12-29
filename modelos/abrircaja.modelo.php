<?php

require_once "conexion.php";

class ModeloAbrircaja{


	/*=============================================
	MOSTRAR CAJA
	=============================================*/

	static public function mdlMostrarAbrircaja($tabla, $item, $valor){

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
	SE ABRIO CAJA CON
	=============================================*/
	static public function mdlMostrarSeAbrioCaja($tabla, $fechaInicialR, $fechaFinalR){	
	$stmt = Conexion::conectar()->prepare("SELECT (EFECTIVO) as ABRIR FROM $tabla ORDER BY RECORDID DESC");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}

		/*=============================================
	TRAER ULTIMO CORTE
	=============================================*/
	static public function mdlMostrarUltimoCorte($tabla){	
	$stmt = Conexion::conectar()->prepare("SELECT (FECHA) as UltimoCorte FROM $tabla ORDER BY RECORDID DESC LIMIT 1");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	TRAER ESTATUS 	ULTIMO CORTE
	=============================================*/
	static public function mdlMostrarEstatusUltimoCorte($tabla){	
	$stmt = Conexion::conectar()->prepare("SELECT (CAJAABIERTA) as CajaAbierta FROM $tabla ORDER BY RECORDID DESC LIMIT 1");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}


	/*=============================================
	TRAER ID 	ULTIMO CORTE 
	=============================================*/
	static public function mdlMostrarIDUltimoCorte($tabla){	
	$stmt = Conexion::conectar()->prepare("SELECT (RECORDID) as id FROM $tabla ORDER BY RECORDID DESC LIMIT 1");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}
/*=============================================
	CREAR CAJA
	=============================================*/

	static public function mdlIngresarCaja($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(RECORDID, USUARIO, FECHA, HORA, EFECTIVO, CAJAABIERTA) VALUES (NULL, :USUARIO, :FECHA, :HORA, :EFECTIVO, :CAJAABIERTA)");

		$stmt->bindParam(NULL, $datos["RECORDID"], PDO::PARAM_STR);
		
		$stmt->bindParam(":USUARIO", $datos["USUARIO"], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA", $datos["FECHA"], PDO::PARAM_STR);
		$stmt->bindParam(":HORA", $datos["HORA"], PDO::PARAM_STR);
		$stmt->bindParam(":EFECTIVO", $datos["EFECTIVO"], PDO::PARAM_STR);
		$stmt->bindParam(":CAJAABIERTA", $datos["CAJAABIERTA"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ACTUALIZAR PRODUCTO
	=============================================*/

	static public function mdlCambiarEstatusCaja($tabla, $ultimoID, $column){
$newStatus = "NO";
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $column = :$column WHERE RECORDID = :RECORDID");

		$stmt -> bindParam(":".$column, $newStatus, PDO::PARAM_STR);
		$stmt -> bindParam(":RECORDID", $ultimoID, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}
