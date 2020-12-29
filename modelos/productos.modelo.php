<?php

require_once "conexion.php";

class ModeloProductos{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor, $orden){
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
	MOSTRAR PRODUCTOS INICIO
	=============================================*/

	static public function mdlMostrarProductosInicio($tabla, $item, $valor, $orden){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY ventas $orden");
			$stmt -> execute();
			return $stmt -> fetchAll();
		
		$stmt -> close();
		$stmt = null;
	}


	/*=============================================
	REGISTRO DE PRODUCTO
	=============================================*/
	static public function mdlIngresarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(RECORDID, id_categoria, codigo, descripcion, utilidad, stock, precio_compra, precio_venta, unidad, ventas, fecha) VALUES (NULL, :id_categoria, :codigo, :descripcion, :utilidad, :stock, :precio_compra, :precio_venta, :unidad, :ventas, :fecha)");


		$stmt->bindParam(NULL, $datos["RECORDID"], PDO::PARAM_STR);

		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":utilidad", $datos["utilidad"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
		$stmt->bindParam(":unidad", $datos["unidad"], PDO::PARAM_STR);
		$stmt->bindParam(":ventas", $datos["ventas"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria = :id_categoria, codigo = :codigo, descripcion = :descripcion, utilidad = :utilidad, stock = :stock, precio_compra = :precio_compra, precio_venta = :precio_venta, unidad = :unidad, ventas = :ventas, fecha = :fecha WHERE RECORDID = :RECORDID");

		$stmt->bindParam(":RECORDID", $datos["RECORDID"], PDO::PARAM_STR);
		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":utilidad", $datos["utilidad"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
		$stmt->bindParam(":unidad", $datos["unidad"], PDO::PARAM_STR);
		$stmt->bindParam(":ventas", $datos["ventas"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/*=============================================
	BORRAR PRODUCTO
	=============================================*/

	static public function mdlEliminarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE RECORDID = :RECORDID");

		$stmt -> bindParam(":RECORDID", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	BORRAR PRODUCTO
	=============================================*/

	static public function mdlBorrarProducto($tabla, $datos){

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
	MOSTRAR SUMA VENTAS
	=============================================*/	

	static public function mdlMostrarSumaVentas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}





/*=============================================
	ACTUALIZAR PRODUCTO
	=============================================*/

	static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE RECORDID = :RECORDID");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":RECORDID", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR STOCK
	=============================================*/

	static public function mdlActualizarStock($tabla, $item2, $valor, $stockactual, $cantidad){

		
		if($stockactual == "NA"){
			$stocknew = "NA";
		}
		 else if($stockactual > "0"){
			$stocknew = $stockactual - $cantidad;
		}

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE RECORDID = :RECORDID");
		$stmt -> bindParam(":".$item2, $stocknew, PDO::PARAM_STR);
		$stmt -> bindParam(":RECORDID", $valor, PDO::PARAM_STR);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt -> close();
		$stmt = null;
	}

}