<?php

require_once "conexion.php";

class ModeloGastos{

/*=============================================
	CREAR GASTOS
	=============================================*/

	static public function mdlIngresarGastos($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(RECORDID, usuario, pro1, pro2, pro3, pro4, pro5, pro6, pro7, pro8, pro9, fecha, status) VALUES (NULL, :usuario, :pro1, :pro2, :pro3, :pro4, :pro5, :pro6, :pro7, :pro8, :pro9, :fecha, :status)");

		$stmt->bindParam(NULL, $datos["RECORDID"], PDO::PARAM_STR);
		
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":pro1", $datos["pro1"], PDO::PARAM_STR);
		$stmt->bindParam(":pro2", $datos["pro2"], PDO::PARAM_STR);
		$stmt->bindParam(":pro3", $datos["pro3"], PDO::PARAM_STR);
		$stmt->bindParam(":pro4", $datos["pro4"], PDO::PARAM_STR);
		$stmt->bindParam(":pro5", $datos["pro5"], PDO::PARAM_STR);
		$stmt->bindParam(":pro6", $datos["pro6"], PDO::PARAM_STR);
		$stmt->bindParam(":pro7", $datos["pro7"], PDO::PARAM_STR);
		$stmt->bindParam(":pro8", $datos["pro8"], PDO::PARAM_STR);
		$stmt->bindParam(":pro9", $datos["pro9"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR GASTOS
	=============================================*/

	static public function mdlMostrarGastos($tabla, $item, $valor){

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
	SUMAR EL TOTAL DE VENTAS AL DIA
	=============================================*/

	static public function mdlSumaTotalGastos($tabla, $fechaInicialDia){	

		
		$stmt = Conexion::conectar()->prepare("SELECT SUM(EFECTIVO) as totalGAST FROM $tabla WHERE FECHA like '%$fechaInicialDia%'");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	SUMAR EL TOTAL DE GASTOS RANGO
	=============================================*/
	static public function mdlSumaTotalGastosRango($tabla, $fechaInicialR){	

			$stmt = Conexion::conectar()->prepare("SELECT SUM(EFECTIVO) as totalrangoGastos FROM $tabla WHERE FECHA  >= '$fechaInicialR%'");

		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
}

}
