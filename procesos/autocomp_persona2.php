<?php
//require("mn_funciones.php");
require_once "../clases/conexion.php";

$obj=new conectar();
$conexion=$obj->conexion();

$q = strtoupper($_GET["q"]);
if (!$q) RETURN;
$sql = "SELECT DISTINCT id_persona,nombre_per,tipo_ident,numero_iden_per,floor(datediff(now(),fnac_per)/365.25) AS edad
FROM vw_persona_paciente WHERE nombre_per LIKE '%$q%'";
//echo $sql;
$rsd=mysqli_query($conexion,$sql);
if($rsd){
    while($rs=mysqli_fetch_row($rsd)){
        $cid = $rs[0];		
        $cname = $rs[1];
        $ctipoid = $rs[2];
        $cnumero = $rs[3];
        $cedad = $rs[4];
        echo "$cname|$cid|$ctipoid|$cnumero|$cedad\n";
    }
}
?>
<p><font color="#000000">no encontrado</font></p>
