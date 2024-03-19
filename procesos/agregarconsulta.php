<?php
require_once "../clases/conexion.php";
require_once "../clases/crudconsulta.php";
require_once "mn_funciones.php";
$obj=new crudconsulta();
$control_con='N';
if(isset($_POST['chk_control'])){
	if($_POST['chk_control']=='on'){$control_con='S';}
}
//echo $_POST['dxrela1_con'];
$datos=array(
$_POST['tipoiden_dp'],
$_POST['numeroiden_dp'],
$_POST['nombre_dp'],
$_POST['direccion_dp'],
$_POST['telefono_dp'],
$_POST['fechanac_dp'],
$_POST['genero_dp'],
$_POST['etnia_dp'],
$_POST['ocupacion_dp'],
$_POST['niveleduc_dp'],
$_POST['estadociv_dp'],
$_POST['tipovin_dp'],
$_POST['tipoafil_dp'],
$_POST['grupopob_dp'],
$_POST['zonares_dp'],
$_POST['tipoiden_acu'],
$_POST['numeroiden_acu'],
$_POST['nombre_acu'],
$_POST['direccion_acu'],
$_POST['telefono_acu'],
$_POST['parentesco_acu'],
$_POST['motivo_con'],
$_POST['enfermedad_con'],
$_POST['revisionsist_con'],
$_POST['personales_ante'],
$_POST['familiares_ante'],
$_POST['id_cups'],
$_POST['finalidad_con'],
$_POST['causaext_con'],
$_POST['analisis_con'],
$_POST['dxprinc_con'],
$_POST['tipodx_con'],
$_POST['dxrela1_con'],
$_POST['dxrela2_con'],
$_POST['dxrela3_con'],
$_POST['descrip_clin_con'],
$_POST['pronostico_con'],
$_POST['recomen_con'],
$_POST['observacion_con'],
$_POST['examenmen_con'],
$control_con,
$_POST['subjetivo_con'],
$_POST['objetivo_con']
);
echo $obj->agregar($datos);
?>