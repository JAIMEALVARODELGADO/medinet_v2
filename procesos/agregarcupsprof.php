<?php
require_once "../clases/conexion.php";
require_once "../clases/crudcupsprof.php";
$obj=new crudcupsprof();

$datos=array($_POST['id_persona'],
$_POST['id_cups']
);

echo $obj->agregar($datos);

?>