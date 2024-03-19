<?php
require("valida_sesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Medinet V2</title>
    <?php require_once "scripts.php";?>
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
                        <h4>Pacientes Agendados</h4>
                    </div>
                    <div class="card-body">
                        <!--<span class="btn btn-secondary openBtn" data-toggle="modal" data-target="#nuevopersona" title="Agrega Nueva Persona">
                            Nuevo <span class="fas fa-plus-circle"></span>
                        </span>
                        <hr>-->
                        <div id="tablaDatatable"></div>
                    </div>
                    <div class="card-footer text-muted">
                        By Soluciones Thin & Thin
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form name='form1' action='mn_consu11.php' method="POST">
        <input type="hidden" id="id_agc" name="id_agc">
        <input type="hidden" id="id_con" name="id_con">
    </form>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
        $("#tablaDatatable").load("tablaagendamedico.php");
    });
</script>


<script type="text/javascript">
    function atender(id_agc){        
        $('#id_agc').val(id_agc);
        document.form1.action='mn_consu11.php'
        document.form1.target="";
        document.form1.submit();
    }

    function inasistencia(id_agc,nombre_){
        alertify.confirm('Registrar Inasistencia', 'Desea registrar la inasistencia del paciente: '+nombre_,
            function(){ 
                $.ajax({
                    type:"POST",
                    data:"id_agc="+id_agc,
                    url:"procesos/inasistencia.php",
                    success:function(r){
                        if(r==1){
                            $("#tablaDatatable").load("tablaagendamedico.php");
                            alertify.success("Inasistencia Registrada!");
                        }else{
                            alertify.error("Inasistencia no Registrada!");
                        }
                    }
                })

            }
            ,function(){

            });
    }

    function imprimir(id_con){        
        $('#id_con').val(id_con);
        document.form1.action="mn_impr_historia.php";
        document.form1.target="new";
        document.form1.submit();
    }

    function imprimirformula(id_con){        
        $('#id_con').val(id_con);
        document.form1.action="mn_impr_formula.php";
        document.form1.target="new";
        document.form1.submit();
    }

    function imprimirorden(id_con){        
        $('#id_con').val(id_con);
        document.form1.action="mn_impr_orden.php";
        document.form1.target="new";
        document.form1.submit();
    }

</script>
