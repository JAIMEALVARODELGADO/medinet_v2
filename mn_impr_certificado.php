<?php
require("valida_sesion.php");
require_once "clases/conexion.php";
require_once "procesos/mn_funciones.php";
$obj=new conectar();
$conexion=$obj->conexion();
//echo $_POST['id_certi'];
$concerti="SELECT detalle_certi,fecha_reg,identificacion_profe,nombre_profesional,profesion_usu,registro_usu FROM vw_certificado WHERE id_certificacion='$_POST[id_certi]'";
//echo $concerti;
$concerti=mysqli_query($conexion,$concerti);
$rowcerti=mysqli_fetch_row($concerti);
$detalle_certi=$rowcerti[0];
$fecha_reg=$rowcerti[1];
$identificacion_profe=$rowcerti[2];
$nombre_profesional=$rowcerti[3];
$profesion_usu=$rowcerti[4];
$registro_usu=$rowcerti[5];
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
                <h7><b>CERTIFICADO MEDICO</b></h7>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">San Juan de Pasto  <?php echo $fecha_reg;?></div>
            </div>
            
            <br><br>
            <div class="row">
                <div class="col-sm-12" align="center">El suscrito médico especialista NELSAON ANTONIO RAMIREZ MONTOYA legalmente autorizado para ejercer la profesion de psiquiatra con tarjeta profesional número 919-91</div>
            </div>

            <br><br>
            <div class="row">
                <div class="col-sm-12" align="center"><b>HACE CONSTAR</b></div>
            </div>

            <br><br>
            <div class="row">
                <div class="col-sm-12" align="justify"><?php echo str_replace("\n", "<br>",$detalle_certi);?></div>
            </div>
 
            <br><br>
            <div class="row">
                <div class="col-sm-12" align="justify">El presente certificado médico se expide a patición del interesado(a)</div>
            </div>

            
        </div>

        <div class="card border-light" style="width: 15rem;">
            <?php
                $firma='imagenes/firmas/'.$identificacion_profe.'.jpg';        
            ?>
            <img class="card-img-top" src="<?php echo $firma;?>" alt="<?php echo $identificacion_profe;?>">
        </div>
        <div class="card-body">
            <div class="col-sm-12">Profesional: <?php echo $nombre_profesional;?></div>
            <div class="col-sm-12"><?php echo $profesion_usu;?></div>
            <div class="col-sm-12">Registro: <?php echo $registro_usu;?></div>
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