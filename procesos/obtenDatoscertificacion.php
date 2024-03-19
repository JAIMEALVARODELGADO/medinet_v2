<?php
	require_once "../clases/conexion.php";
	require_once "../clases/crudcertificado.php";

	$obj=new crudcertificado();
	echo json_encode($obj->obtenDatos($_POST['idcertificacion']));

?>