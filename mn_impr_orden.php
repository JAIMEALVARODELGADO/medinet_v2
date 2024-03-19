<?php
require("valida_sesion.php");
//echo $_POST['id_con'];
require_once "clases/conexion.php";
require_once "procesos/mn_funciones.php";
$obj=new conectar();
$conexion=$obj->conexion();

$confor="SELECT id_form,tipo_iden,numeroiden_dp,nombre_dp,edad,direccion_dp,telefono_dp,nombre_eps,fecha_con,CONCAT(codigo_cie,' ',descripcion_cie) AS diagnostico,id_profesional,identificacion_profe,nombre_profe
FROM vw_formula_encabezado WHERE id_con='$_POST[id_con]'";
//echo $confor;
$confor=mysqli_query($conexion,$confor);
$rowfor=mysqli_fetch_row($confor);
$id_form=$rowfor[0];
$tipo_iden=$rowfor[1];
$numeroiden_dp=$rowfor[2];
$nombre_dp=$rowfor[3];
$edad=$rowfor[4];
$direccion_dp=$rowfor[5];
$telefono_dp=$rowfor[6];
$nombre_eps=$rowfor[7];
$fecha_con=$rowfor[8];
$diagnostico=$rowfor[9];
$id_profesional=$rowfor[10];
$identificacion_profe=$rowfor[11];
$nombre_profe=$rowfor[12];

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

    <?php 
        require_once "scripts.php";
    ?>
</head>

<body>
    <div class="container-fluid">
        <?php
            require("encabezado_prn.php");
        ?>
        
        <div class="card text-center">
            <div class="card-header">
                <h7><b>ORDENES</b></h7>                
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">Fecha:  <?php echo $fecha_con;?></div>
                <div class="col-sm-6" align="right">Fórmula Número:  <?php echo $id_form;?></div>
            </div>

            <div class="row">
                <div class="col-sm-4">Tipo de Identificacion:  <?php echo $tipo_iden;?></div>
                <div class="col-sm-4">Número:  <?php echo $numeroiden_dp;?></div>
                <div class="col-sm-4">Nombre:  <?php echo $nombre_dp;?></div>
            </div>

            <div class="row">
                <div class="col-sm-4">Dirección:  <?php echo $direccion_dp;?></div>
                <div class="col-sm-4">Teléfono:  <?php echo $telefono_dp;?></div>
                <div class="col-sm-4">Edad:  <?php echo $edad;?></div>
            </div>
            <div class="row">
                <div class="col-sm-12">Diagnóstico: <?php echo $diagnostico;?></div>                
            </div>
        </div>
        <?php
            $sql="SELECT id_ord,orden
            FROM  vw_consulta_orden
            WHERE id_con='$_POST[id_con]'";
            //echo $sql;        
            $result=mysqli_query($conexion,$sql);
        
            if($_POST['id_con']!=0){
            ?>
                <div>
                    <?php
                        while($row=mysqli_fetch_row($result)){
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-10"><b><?php echo $row[1];?></b></div>                            
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php
                                        $consdet="SELECT id_ord_det,codigo_cups,descripcion_cups,observacion_det FROM vw_orden_detalle WHERE id_ord='$row[0]'";
                                        //echo $consdet;
                                        $consdet=mysqli_query($conexion,$consdet);
                                        if(mysqli_num_rows($consdet)<>0){
                                            ?>
                                                <table class="table table-hover table-sm table-bordered font13" id="tablaorden">
                                                    <thead style="background-color: #2574a9;color: white; font-weight: bold;">
                                                        <tr>
                                                            <td>Código</td>
                                                            <td>Descripción</td>
                                                            <td>Observación</td>                                                
                                                        </tr>
                                                    </thead>
                                                    <tbody style="background-color: white">
                                                        <?php
                                                            while($rowdet=mysqli_fetch_row($consdet)){
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $rowdet[1];?></td>
                                                                    <td><?php echo $rowdet[2];?></td>
                                                                    <td><?php echo $rowdet[3];?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            <?php
                                        }
                                        ?>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            <?php
            }
        ?>


        <div class="card border-light" style="width: 15rem;">
            <?php
                $firma='imagenes/firmas/'.$identif_prof.'.jpg';
                //echo $firma;
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
    window.print();
    window.close();
//}
</script>