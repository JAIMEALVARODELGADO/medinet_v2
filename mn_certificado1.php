<?php
require("valida_sesion.php");
require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Medinet V2</title>
    <?php require_once "scripts.php";?>
    <link rel="stylesheet" type="text/css" href="../librerias/css/jquery.autocomplete.css">
    <script type="text/javascript" src="../librerias/js/jquery.js"></script>
    <script type='text/javascript' src='../librerias/js/jquery.autocomplete.js'></script>
</head>

<body>
    <?php
    require("encabezado.php");
    require("menu.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-left">
                    <div class="card-header">
                        <h4>Registro de Certificados Médicos</h4>
                    </div>
                    <div class="card-body">
                        <span class="btn btn-secondary openBtn" data-toggle="modal" data-target="#nuevocertificado" title="Agrega Nuevo Certificado">
                            Nuevo <span class="fas fa-plus-circle"></span>
                        </span>
                        <hr>
                        <div id="tablaDatatable"></div>
                    </div>
                    <div class="card-footer text-muted">
                        By Soluciones Thin & Thin
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Nuevo -->
    <div class="modal fade" id="nuevocertificado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Certificado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frm_nuevo">
                        <label>Paciente</label>
                        <input type="text" maxlength="80" class="form-control input-sm" id="nombre" name="nombre">
                        <input type="hidden" id="id_persona" name="id_persona">
                        <input type="hidden" id="tipo_iden_per" name="tipo_iden_per">
                        <input type="hidden" id="numero_iden_per" name="numero_iden_per">
                        <input type="hidden" id="edad" name="edad">
                        <label>Hace Constar</label>
                        <textarea name="detalle_certi" id="detalle_certi" cols="70" rows="11" maxlength="800" onfocus="concatenar()"></textarea>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar <span class="fas fa-angle-double-left"></span></button>
                    <button type="button" id="btnNuevo" class="btn btn-primary">Guardar <span class="fas fa-save"></span></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar-->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Certificado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frm_editar">
                        <input type="hidden" id="idcertificacion" name="idcertificacion">

                        <label>Hace Constar</label>
                        <textarea name="detalle_certiU" id="detalle_certiU" cols="70" rows="11" maxlength="800"></textarea>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar <span class="fas fa-angle-double-left"></span></button>
                    <button type="button" class="btn btn-primary" id="btnActualizar">Guardar <span class="fas fa-save"></span></button>
                </div>
            </div>
        </div>
    </div>
    <form id="form1" name='form1' method="POST">
        <input type="hidden" id="id_certi" name="id_certi">
    </form>
    
</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
        $("#tablaDatatable").load("tablacertificado.php");
    });
</script>

<script type="text/javascript">
    function concatenar(){
    var texto="";
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var hora= (d.getHours()<10 ?'0':'')+d.getHours()+":"+(d.getMinutes()<10 ? '0' : '')+d.getMinutes();
    var output = (day<10 ? '0' : '') + day+ '/' + (month<10 ? '0' : '') + month + '/' +d.getFullYear()+" a las "+hora;
        texto="Al realizar el examen médico psiquiatrico el día ";
        texto+=output;
        texto+=" al paciente "+$('#nombre').val();
        texto+=" identificado con "+$('#tipo_iden_per').val()+" "+$('#numero_iden_per').val();
        texto+=" con "+$('#edad').val()+" años de edad.";
        texto+=" SI NO encuentro patología ni transtorno mental psiquiatrico que le impida vida comunitaria social o laboral";
        $('#detalle_certi').val(texto);
    }
    $(document).ready(function(){
        $("#btnNuevo").click(function(){
            datos=$('#frm_nuevo').serialize();

            $.ajax({
                type:"POST",
                data:datos,
                url:"procesos/agregarcertificado.php",
                success:function(r){
                    if(r==1){
                        alertify.success("Registro guardado");
                        $('#frm_nuevo')[0].reset();
                        $("#tablaDatatable").load("tablacertificado.php");
                        
                    }
                    else{
                        alertify.error("Error: Registro no guardado");
                    }
                }
            });
        });

        $('#btnActualizar').click(function(){
            datos=$('#frm_editar').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"procesos/actualizarcertificado.php",
                success:function(r){
                    if(r==1){
                        $("#tablaDatatable").load("tablacertificado.php");
                        alertify.success("Registro guardado");
                    }
                    else{
                        alertify.error("Error: El registro no guardado");
                    }
                }
            });
        });

    });

</script>

<script type="text/javascript">
    function agregaFrmActualizar(idcertificacion){
        $.ajax({
            type:"POST",
            data:"idcertificacion="+idcertificacion,
            url:"procesos/obtenDatoscertificacion.php",
            success:function(r){
                var datos = JSON.parse(r);
                $('#idcertificacion').val(datos['id_certificacion']);
                $('#detalle_certiU').val(datos['detalle_certi']);
            }
        })
    }

    function imprimir(id_certi){
        $('#id_certi').val(id_certi);
        document.form1.action="mn_impr_certificado.php";
        document.form1.target="new";
        document.form1.submit();
    }

    /*function agregaFrmPaciente(idpersona){
        $.ajax({
            type:"POST",
            data:"idpersona="+idpersona,
            url:"procesos/obtenDatospaciente.php",
            success:function(r){
                datos=jQuery.parseJSON(r);
                $('#idpersona_pac').val(datos['id_persona']);
                $('#codigo_munU').val(datos['codigo_mun']);
                $('#zonaU').val(datos['zona']);
                $('#tipo_usuarioU').val(datos['tipo_usuario']);
                $('#etniaU').val(datos['etnia']);
                $('#nivel_educU').val(datos['nivel_educ']);
                $('#id_ciuoU').val(datos['id_ciuo']);
                $('#estado_civU').val(datos['estado_civ']);                
            }
        })
    }*/
</script>

<script type="text/javascript">
    $().ready(function() {
        $("#nombre").autocomplete("procesos/autocomp_persona2.php", {
            width: 460,
            matchContains: false,
            mustMatch: false,
            selectFirst: false
        });
        $("#nombre").result(function(event, data, formatted) {
            $("#id_persona").val(data[1]);
            $("#tipo_iden_per").val(data[2]);
            $("#numero_iden_per").val(data[3]);
            $("#edad").val(data[4]);
        });
    }); 
</script>
