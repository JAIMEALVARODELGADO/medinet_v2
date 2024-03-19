<?php
require("valida_sesion.php");
//echo $_POST['id_con'];
require_once "clases/conexion.php";
require_once "procesos/mn_funciones.php";
$obj=new conectar();
$conexion=$obj->conexion();

$conhis="SELECT fecha_con,tipoiden,numeroiden_dp,nombre_dp,direccion_dp,telefono_dp,edad,sexo,estado_civil, descripcion_ciu,motivo_con,enfermedad_con,revisionsist_con,analisis_con,CONCAT(dxprinc_cod,' ',dxprinc) AS dxprinc,tipodx,CONCAT(dxrel1_cod,' ',dxrel1) AS dxrel1,CONCAT(dxrel2_cod,' ',dxrel2) AS dxrel2,CONCAT(dxrel3_cod,' ',dxrel3) AS dxrel3, observacion_con,id_profesional,examenmen_con,descrip_clin_con,pronostico_con,recomen_con,control_con,subjetivo_con,objetivo_con
FROM vw_consulta WHERE id_con='$_POST[id_con]'";
//echo $conhis;
$conhis=mysqli_query($conexion,$conhis);
$rowhis=mysqli_fetch_row($conhis);
$fecha_con=$rowhis[0];
$tipoiden=$rowhis[1];
$numeroiden_dp=$rowhis[2];
$nombre_dp=$rowhis[3];
$direccion_dp=$rowhis[4];
$telefono_dp=$rowhis[5];
$edad_dp=$rowhis[6];
$sexo_dp=$rowhis[7];
$estado_civil=$rowhis[8];
$descripcion_ciou=$rowhis[9];
$motivo_con=$rowhis[10];
$enfermedad_con=$rowhis[11];
$revisionsist_con=$rowhis[12];
$analisis_con=$rowhis[13];
$dxprinc=$rowhis[14];
$tipodx=$rowhis[15];
$dxrel1=$rowhis[16];
$dxrel2=$rowhis[17];
$dxrel3=$rowhis[18];
$observacion_con=$rowhis[19];
$id_profesional=$rowhis[20];
$examenmen_con=$rowhis[21];
$descrip_clin_con=$rowhis[22];
$pronostico_con=$rowhis[23];
$recomen_con=$rowhis[24];
$control_con=$rowhis[25];
$subjetivo_con=$rowhis[26];
$objetivo_con=$rowhis[27];

$conacu="SELECT id_con_acu,tipoiden_acu,numeroiden_acu,nombre_acu,direccion_acu,telefono_acu,parentesco_acu
FROM consulta_acudiente WHERE id_con='$_POST[id_con]'";
//echo $conacu;
$conacu=mysqli_query($conexion,$conacu);
if(mysqli_num_rows($conacu)<>0){
    $row=mysqli_fetch_row($conacu);
    $id_con_acu=$row[0];
    $tipoiden_acu=$row[1];
    $numeroiden_acu=$row[2];
    $nombre_acu=$row[3];
    $direccion_acu=$row[4];
    $telefono_acu=$row[5];
    $parentesco_acu=$row[6];
}
else{
    $id_con_acu=0;
    $tipoiden_acu='';
    $numeroiden_acu='';
    $nombre_acu='';
    $direccion_acu='';
    $telefono_acu='';
    $parentesco_acu='';
}

$conante="SELECT personales_ante,familiares_ante FROM consulta_antecedentes WHERE id_con='$_POST[id_con]'";
//echo $conante;
$conante=mysqli_query($conexion,$conante);
$rowante=mysqli_fetch_row($conante);
$personales_ante=$rowante[0];
$familiares_ante=$rowante[1];

$conprof="SELECT numero_iden_per,nombre,profesion_usu,registro_usu FROM vw_usuario WHERE id_persona='$id_profesional'";
//echo $conprof;
$conprof=mysqli_query($conexion,$conprof);
$rowprof=mysqli_fetch_row($conprof);
$identif_prof=$rowprof[0];
$nombre_prof=$rowprof[1];
$profesion=$rowprof[2];
$registro=$rowprof[3];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Medinet V2</title>
    <link rel="stylesheet" href="print.css" media="print">
    <?php 
        require_once "scripts.php";
    ?>
</head>

<body>
    <?php
    //require("encabezado.php");
    //require("menu.php");
    ?>
    <div class="container-fluid">
        <?php
            require("encabezado_prn.php");
        ?>
        
        <div class="card text-center">
            <div class="card-header">
                <h7><b>HISTORIA CLINICA</b></h7>
                <!--<div class="p-3 mb-2 bg-secondary text-white"><b>HISTORIA CLINICA</b></div>-->
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">Fecha de la consulta:  <?php echo $fecha_con;?></div>
                <div class="col-sm-6" align="right">Consulta Número:  <?php echo $_POST['id_con'];?></div>
            </div>

            <div class="row">
                <div class="col-sm-4">Tipo de Identificacion:  <?php echo $tipoiden;?></div>
                <div class="col-sm-4">Número:  <?php echo $numeroiden_dp;?></div>
                <div class="col-sm-4">Nombre:  <?php echo $nombre_dp;?></div>
            </div>

            <div class="row">
                <div class="col-sm-4">Dirección:  <?php echo $direccion_dp;?></div>
                <div class="col-sm-4">Teléfono:  <?php echo $telefono_dp;?></div>
                <div class="col-sm-4">Edad:  <?php echo $edad_dp;?></div>
            </div>

            <div class="row">
                <div class="col-sm-4">Género:  <?php echo $sexo_dp;?></div>
                <div class="col-sm-4">Estado Civil:  <?php echo $estado_civil;?></div>                        
            </div>
            <div class="row">
                <div class="col-sm-12">Ocupación:  <?php echo $descripcion_ciou;?></div>                        
            </div>
        </div>

        <?php
        if($id_con_acu<>0){
            ?>
                <div class="card text-center">
                    <div class="card-header">
                        <h7><b>INFORMACION DEL ACUDIENTE</b></h7>                                
                    </div>
                </div>
                <div class="card-body">                            
                    <div class="row">
                        <div class="col-sm-4">Tipo de Identificacion:  <?php echo $tipoiden_acu;?></div>
                        <div class="col-sm-4">Número:  <?php echo $numeroiden_acu;?></div>
                        <div class="col-sm-4">Nombre:  <?php echo $nombre_acu;?></div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">Dirección:  <?php echo $direccion_acu;?></div>
                        <div class="col-sm-4">Teléfono:  <?php echo $telefono_acu;?></div>
                        <div class="col-sm-4">Parentesco:  <?php echo $parentesco_acu;?></div>
                    </div>
                </div>
            <?php
        }
        ?>

        <div class="card text-center">
            <div class="card-header">
                <h7><b>ANAMNESIS</b></h7>
                <!--<div class="p-3 mb-2 bg-secondary text-white"><b>HISTORIA CLINICA</b></div>-->
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">Motivo de Consulta: <?php echo $motivo_con;?></div>                        
            </div>
            <div class="row">
                <div class="col-sm-12">Enfermedad Actual: <?php echo $enfermedad_con;?></div>
            </div>
            <div class="row">
                <div class="col-sm-12">Revisión por Sistemas: <?php echo $revisionsist_con;?></div>
            </div>
            <div class="row">
                <div class="col-sm-12">Examen Mental: <?php echo $examenmen_con;?></div>
            </div>
            <?php                
                if(!empty($subjetivo_con)){
                    echo "<div class='row'>";
                        echo "<div class='col-sm-12'>Subjetivo: ".$subjetivo_con."</div>";
                    echo "</div>";
                }
                if(!empty($objetivo_con)){
                    echo "<div class='row'>";
                        echo "<div class='col-sm-12'>Objetivo: ".$objetivo_con."</div>";
                    echo "</div>";
                }                
            ?>
        </div>        
        <?php
            if(!empty($personales_ante) or !empty($familiares_ante)){
                echo "<div class='card text-center'>";
                    echo "<div class='card-header'>";
                    echo "<h7><b>ANTECEDENTES</b></h7>";
                    echo "</div>";
                echo "</div>";

                echo "<div class='card-body'>";
                    if(!empty($personales_ante)){
                        echo "<div class='row'>";
                        echo "<div class='col-sm-12'>Personales: ".$personales_ante."</div>";
                        echo "</div>";
                    }
                    if(!empty($familiares_ante)){
                        echo "<div class='row'>";
                        echo "<div class='col-sm-12'>Familiares: ".$familiares_ante."</div>";
                        echo "</div>";
                    }
                echo "</div>";
            }
        ?>        

        <div class="card text-center">
            <div class="card-header">
                <h7><b>IMPRESION DIAGNOSTICA</b></h7>
                <!--<div class="p-3 mb-2 bg-secondary text-white"><b>HISTORIA CLINICA</b></div>-->
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">Analisis: <?php echo $analisis_con;?></div>                        
            </div>
            <div class="row">
                <div class="col-sm-8">Diagnóstico Principal: <?php echo $dxprinc;?></div>
                <div class="col-sm-4">Tipo de Diagnóstico Principal: <?php echo $tipodx;?></div>
            </div>
            <div class="row">
                <div class="col-sm-12">Diagnóstico Relacionado 1: <?php echo $dxrel1;?></div>                
            </div>
            <div class="row">
                <div class="col-sm-12">Diagnóstico Relacionado 2: <?php echo $dxrel2;?></div>                
            </div>
            <div class="row">
                <div class="col-sm-12">Diagnóstico Relacionado 3: <?php echo $dxrel3;?></div>                
            </div>
            <div class="row">
                <div class="col-sm-12">Descripción Clínica: <?php echo $descrip_clin_con;?></div>
            </div>
            <div class="row">
                <div class="col-sm-12">Pronóstico: <?php echo $pronostico_con;?></div>
            </div>
            <div class="row">
                <div class="col-sm-12">Recomendaciones: <?php echo $recomen_con;?></div>
            </div>
            <div class="row">
                <div class="col-sm-12">Observación: <?php echo $observacion_con;?></div>
            </div>
        </div>

        <div class="card border-light" style="width: 15rem;">
            <?php
                $firma='imagenes/firmas/'.$identif_prof.'.jpg';        
            ?>
            <img class="card-img-top" src="<?php echo $firma;?>" alt="<?php echo $identif_prof;?>">        
        </div>
        <div class="card-body">
            <div class="col-sm-12">Profesional: <?php echo $nombre_prof;?></div>
            <div class="col-sm-12"><?php echo $profesion;?></div>
            <div class="col-sm-12">Registro: <?php echo $registro;?></div>
        </div>

    </div>
</body>

</html>

<script type="text/javascript">
//function imprimir() {
    //window.print();
    //window.close();
//}
</script>