<?php

require_once "conexion.php";

class ModeloVentas{

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function mdlMostrarVentas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY FECHA ASC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY FECHA ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE FECHA like '%$fechaFinal%'");

			$stmt -> bindParam(":FECHA", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE FECHA BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE FECHA BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}
		
			$stmt -> execute();

			return $stmt -> fetchAll();

		}
			}






	

	/*=============================================
	SUMAR EL TOTAL DE VENTAS
	=============================================*/

	static public function mdlSumaTotalVentas($tabla){	

		$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIO) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

		/*=============================================
	SUMAR EL TOTAL DE VENTAS AL DIA
	=============================================*/

	static public function mdlSumaTotalVentasDia($tabla, $fechaInicialDia){	

		
		$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIO) as totalVHOY FROM $tabla WHERE FECHA like '%$fechaInicialDia%'");

		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	SUMAR EL TOTAL DE VENTAS RANGO
	=============================================*/

	static public function mdlSumaTotalVentasRango($tabla, $fechaInicialR, $fechaFinalR){	


		if($fechaInicialR == null){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIO) as totalrango FROM $tabla");



		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;


	}else if($fechaInicialR == $fechaFinalR){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIO) as totalrango FROM $tabla WHERE FECHA like '%$fechaFinalR%'");

			
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinalR);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIO) as totalrango FROM $tabla WHERE FECHA BETWEEN '$fechaInicialR' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIO) as totalrango FROM $tabla WHERE FECHA BETWEEN '$fechaInicialR' AND '$fechaFinalR'");

			}
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;


		}
}
	

	/*=============================================
	SUMAR EL TOTAL DE UTILIDADES DIARIA
	=============================================*/

	static public function mdlSumaTotalUtilidades($tabla, $fechaInicialDia){	


		$stmt = Conexion::conectar()->prepare("SELECT SUM(HORA) as totalUti FROM $tabla WHERE FECHA like '%$fechaInicialDia%'");
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	
/*=============================================
	SUMAR EL TOTAL DE UTILIDAD RANGO
	=============================================*/
	static public function mdlSumaTotalUtilidadRango($tabla, $fechaInicialR, $fechaFinalR){	
	$stmt = Conexion::conectar()->prepare("SELECT SUM(HORA) as totalrangoUtilidad FROM $tabla WHERE FECHA >= '$fechaInicialR%'");
	$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
}
	

/*=============================================
	SUMAR EL TOTAL DE EFECTIVO RANGO
	=============================================*/
	static public function mdlSumaTotalEfectivoRango($tabla, $fechaInicialR, $fechaFinalR){	
		$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIO) as totalrangoEfectivo FROM $tabla WHERE METODO like 'Efectivo' and FECHA >= '$fechaInicialR%'");

		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
}


/*=============================================
	SUMAR EL TOTAL DE TARJETA RANGO
	=============================================*/
	static public function mdlSumaTotalTarjetaRango($tabla, $fechaInicialR, $fechaFinalR){	
		$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIO) as totalrangoTarjeta FROM $tabla WHERE METODO like '__' and FECHA >= '$fechaInicialR%'");

		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
}
	



/*=============================================
	ULTIMO TICKET
	=============================================*/
	static public function mdlMostrarUltimoTicket($tabla){	
	$stmt = Conexion::conectar()->prepare("SELECT (RECORDID) as IDTICKET FROM $tabla ORDER BY RECORDID DESC LIMIT 1");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}


/*=============================================
	CREAR CAJA
	=============================================*/

	static public function mdlIngresarVenta($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(RECORDID, IDVENTA, CLIENTE, VENDEDOR, CODIGOB, PRODUCTO, IMPUESTO, DESCUENTO, PRECIO, TOTAL, METODO, FECHA, HORA) VALUES (NULL, :IDVENTA, :CLIENTE, :VENDEDOR, :CODIGOB, :PRODUCTO, :IMPUESTO, :DESCUENTO, :PRECIO, :TOTAL, :METODO, :FECHA, :HORA)");

		$stmt->bindParam(null, $datos["RECORDID"], PDO::PARAM_STR);
		
		$stmt->bindParam(":IDVENTA", $datos["IDVENTA"], PDO::PARAM_STR);
		$stmt->bindParam(":CLIENTE", $datos["CLIENTE"], PDO::PARAM_STR);
		$stmt->bindParam(":VENDEDOR", $datos["VENDEDOR"], PDO::PARAM_STR);
		$stmt->bindParam(":CODIGOB", $datos["CODIGOB"], PDO::PARAM_STR);
		$stmt->bindParam(":PRODUCTO", $datos["PRODUCTO"], PDO::PARAM_STR);
		$stmt->bindParam(":IMPUESTO", $datos["IMPUESTO"], PDO::PARAM_STR);
		$stmt->bindParam(":DESCUENTO", $datos["DESCUENTO"], PDO::PARAM_STR);
		$stmt->bindParam(":PRECIO", $datos["PRECIO"], PDO::PARAM_STR);
		$stmt->bindParam(":TOTAL", $datos["TOTAL"], PDO::PARAM_STR);
		$stmt->bindParam(":METODO", $datos["METODO"], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA", $datos["FECHA"], PDO::PARAM_STR);
		$stmt->bindParam(":HORA", $datos["HORA"], PDO::PARAM_STR);

	if($stmt->execute()){

			return "ok";

		}else{
			return "error";
		}
		
		$stmt->close();
		$stmt = null;

	}

	
}



