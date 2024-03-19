<?php
require_once "../clases/conexion.php";
require_once "../clases/crudusuario.php";
$obj=new crudusuario();
$agendar='N';
if(isset($_POST['agendar_usu']) AND $_POST['agendar_usu']=='on'){	
	$agendar='S';
}

$datos=array(
$_POST['id_persona'],
$_POST['login_usu'],
sha1($_POST['password_usu']),
$_POST['profesion'],
$_POST['registro_usu'],
$_POST['cargo_usu'],
$agendar);

echo $obj->agregar($datos);

?>