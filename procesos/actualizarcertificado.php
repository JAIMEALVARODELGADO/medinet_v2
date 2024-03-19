<?php
require_once "../clases/conexion.php";
require_once "../clases/crudcertificado.php";
$obj=new crudcertificado();

$datos=array(
	$_POST['idcertificacion'],
	$_POST['detalle_certiU']);

echo $obj->actualizar($datos);

?>