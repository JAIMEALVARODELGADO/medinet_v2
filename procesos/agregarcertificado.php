<?php
require_once "../clases/conexion.php";
require_once "../clases/crudcertificado.php";
$obj=new crudcertificado();

$datos=array($_POST['id_persona'],
$_POST['detalle_certi']);

echo $obj->agregar($datos);

?>