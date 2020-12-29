<?php

class Conexion{

	static public function conectar(){


$usuario = "u305396598_piloto";
$contraseña = "Manzana21";
  try{
    $link = new PDO('mysql:host=sql284.main-hosting.eu;dbname=u305396598_piloto', $usuario, $contraseña);
  }catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
  }
  return $link;
  $link = null;
}
}
