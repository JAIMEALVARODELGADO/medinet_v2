<?php
require("valida_sesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Medinet V2</title>
    <?php 
        require_once "scripts.php";
        
    ?>
    <link rel="stylesheet" type="text/css" href="../librerias/css/jquery.autocomplete.css">
    <script type="text/javascript" src="../librerias/js/jquery.js"></script>
    <script type='text/javascript' src='../librerias/js/jquery.autocomplete.js'></script>
</head>

<body>
    <?php
    require("encabezado.php");
    require("menu.php")
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-left">
                    <div class="card-header">
                        <h4>Registro de Usuarios del Sistema</h4>
                    </div>
                    <div class="card-body">
                        <span class="btn btn-secondary openBtn" data-toggle="modal" data-target="#modalnuevousuario" title="Agrega Nuevo Usuario">
                            Nuevo <span class="fas fa-plus-circle"></span>
                        </span>
                        <hr>
                        <div id="tablaDatausuario"></div>
                    </div>
                    <div class="card-footer text-muted">
                        By Soluciones Thin & Thin
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form name="frm_menu" action="mn_usuario11.php" method="post">
        <input type="hidden" id="id_usuario" name="id_usuario">
    </form>
    <!-- Modal Nuevo -->
    <div class="modal fade" id="modalnuevousuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar un Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frm_nuevo">
                        <label>Persona</label>
                        <input type="text" maxlength="80" class="form-control input-sm" id="persona" name="persona">
                        <input type="hidden" id="id_persona" name="id_persona">
                        <label>Nombre de Usuario</label>
                        <input type="text" maxlength="45" class="form-control input-sm" id="login_usu" name="login_usu">
                        <label>Password</label>
                        <input type="password" maxlength="8" class="form-control input-sm" id="password_usu" name="password_usu">                        
                        <label>Profesion</label>
                        <input type="text" maxlength="45" class="form-control input-sm" id="profesion" name="profesion">
                        <label>Registro</label>
                        <input type="text" maxlength="20" class="form-control input-sm" id="registro_usu" name="registro_usu">
                        <label>Cargo</label>
                        <input type="text" maxlength="20" class="form-control input-sm" id="cargo_usu" name="cargo_usu">
                        <label>Agendar</label>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" id="agendar_usu" name="agendar_usu">
                                </div>
                            </div>
                            <input type="text" placeholder="Agendar" class="form-control" aria-label="Text input with checkbox" disabled="true">
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar <span class="fas fa-angle-double-left"></span></button>
                    <button type="button" id="btnNuevo" class="btn btn-primary">Guardar <span class="fas fa-save"></span></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="modaleditarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frm_editar">
                        <label>Nombre de Usuario</label>
                        <input type="hidden" id="id_personaU" name="id_personaU">
                        <input type="text" maxlength="45" class="form-control input-sm" id="login_usuU" name="login_usuU">
                        <label>Password</label>
                        <input type="password" maxlength="8" class="form-control input-sm" id="password_usuU" name="password_usuU">
                        <input type="hidden" maxlength="8" class="form-control input-sm" id="password_ant" name="password_ant">
                        <label>Profesion</label>
                        <input type="text" maxlength="45" class="form-control input-sm" id="profesionU" name="profesionU">
                        <label>Registro</label>
                        <input type="text" maxlength="20" class="form-control input-sm" id="registro_usuU" name="registro_usuU">
                        <label>Cargo</label>
                        <input type="text" maxlength="20" class="form-control input-sm" id="cargo_usuU" name="cargo_usuU">
                        <label>Agendar</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" id="agendar_usuU" name="agendar_usuU">
                                </div>
                            </div>
                            <input type="text" placeholder="Agendar" class="form-control" aria-label="Text input with checkbox" disabled="true">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar <span class="fas fa-angle-double-left"></span></button>
                    <button type="button" id="btnActualizar" class="btn btn-primary">Guardar <span class="fas fa-save"></span></button>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
        $("#tablaDatausuario").load("tablausuario.php");
    });
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $("#btnNuevo").click(function(){
            datos=$('#frm_nuevo').serialize();

            $.ajax({
                type:"POST",
                data:datos,
                url:"procesos/agregarusuario.php",
                success:function(r){
                    if(r==1){
                        alertify.success("Registro guardado");
                        $('#frm_nuevo')[0].reset();
                        $("#tablaDatausuario").load("tablausuario.php");                        
                    }
                    else{
                        alertify.error("Error: El registro no guardado");
                    }
                }
            });
        });

        $('#btnActualizar').click(function(){
            datos=$('#frm_editar').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"procesos/actualizarusuario.php",
                success:function(r){
                    if(r==1){
                        $("#tablaDatausuario").load("tablausuario.php");
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
    function FrmActualizar(idusu){        
        $.ajax({
            type:"POST",
            data:"idusu="+idusu,
            url:"procesos/obtenDatosusuario.php",
            success:function(r){
                var datos = JSON.parse(r);
                $('#id_personaU').val(datos['id_persona']);
                $('#login_usuU').val(datos['login_usu']);
                $('#password_usuU').val(datos['password_usu']);
                $('#password_ant').val(datos['password_usu']);
                $('#profesionU').val(datos['profesion_usu']);
                $('#registro_usuU').val(datos['registro_usu']);
                $('#cargo_usuU').val(datos['cargo_usu']);
                if(datos['agendar_usu']=='S'){
                    $('#agendar_usuU').attr('checked', true);
                }
                else{
                    $('#agendar_usuU').attr('checked', false);
                }
            }
        })
    }

    function cambiarestado(idusu){
                $.ajax({
                    type:"POST",
                    data:"idusu="+idusu,
                    url:"procesos/cambiarestadousu.php",
                    success:function(r){
                        if(r==1){
                            $("#tablaDatausuario").load("tablausuario.php");
                            alertify.success("Estado Actualizado!");
                        }else{
                            alertify.error("Estado Sin Actualizar!");
                        }
                    }
                })

    }

    function go_menu(idper){        
        document.frm_menu.id_usuario.value=idper;
        document.frm_menu.submit();
    }

</script>

<script type="text/javascript">
    $().ready(function() {
        $("#persona").autocomplete("procesos/autocomp_persona.php", {
            width: 460,
            matchContains: false,
            mustMatch: false,
            selectFirst: false
        });
        $("#persona").result(function(event, data, formatted) {
            $("#id_persona").val(data[1]);
        });
    }); 
</script>