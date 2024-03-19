<?php
require_once "../clases/conexion.php";
require_once "../clases/crudmedicamento.php";
$obj=new crudmedicamento();

$datos=array(
$_POST['id_medicamento'],
$_POST['codigoatc_mtoU'],
$_POST['nombre_mtoU']
);

echo $obj->actualizar($datos);

?>