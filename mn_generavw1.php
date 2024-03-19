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
                        <h4>Generando Vistas</h4>
                    </div>
                    <div class="card-body">

                        <?php
                        $sql="CREATE OR REPLACE VIEW vw_detalle_grupo AS  
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det, grupos.id_grupo,grupos.descripcion_grupo
                        FROM detalle_grupo
                        INNER JOIN grupos ON grupos.id_grupo=detalle_grupo.id_grupo";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_detalle_grupo NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_conceptos AS
                        SELECT detalle_grupo.codi_det,detalle_grupo.id_grupo,detalle_grupo.descripcion_det,detalle_grupo.valor_det,grupos.descripcion_grupo
                        FROM detalle_grupo
                        INNER JOIN grupos ON grupos.id_grupo=detalle_grupo.id_grupo";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_conceptos NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_tipo_ident AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=1";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_tipo_ident NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_sexo AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=2";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_sexo NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_tpusuario AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=3";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_tpusuario NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_etnia AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=4";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_etnia NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_niveducat AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=5";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_niveducat NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_estadocivil AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=6";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_estadocivil NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_estadocita AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=7";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_estadocita NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_tpafiliado AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=8";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_tpafiliado NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_grupopobla AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=9";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_grupopobla NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_zona AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=10";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_zona NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_finalidad_con AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=11";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_finalidad_con NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_causa_exte AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=12";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_causa_exte NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_tpdiagnostico AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=13";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_tpdiagnostico NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_via AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=14";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_via NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_tipoorden AS
                        SELECT detalle_grupo.codi_det, detalle_grupo.descripcion_det, detalle_grupo.valor_det FROM detalle_grupo WHERE detalle_grupo.id_grupo=15";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_tipoorden NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_municipio AS
                        SELECT municipio.codigo_mun, municipio.nombre_mun, departameto.nombre_dep FROM municipio INNER JOIN departameto ON departameto.codigo_dep=municipio.codigo_dep";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_municipio NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_usuario AS
                        SELECT persona.id_persona,vw_tipo_ident.valor_det,persona.numero_iden_per,concat(persona.pnom_per,' ',persona.snom_per,' ',persona.pape_per,' ',persona.sape_per) AS nombre ,persona.direccion_per,persona.telefono_per,persona.email_per,usuario.login_usu,usuario.password_usu,usuario.profesion_usu,usuario.registro_usu,usuario.cargo_usu,usuario.agendar_usu,usuario.estado_usu 
                        FROM persona 
                        INNER JOIN usuario ON usuario.id_persona=persona.id_persona
                        INNER JOIN vw_tipo_ident ON vw_tipo_ident.codi_det=persona.tipo_iden_per";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_usuario NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_paciente AS
                        SELECT persona.id_persona, CONCAT(persona.pnom_per,' ',persona.snom_per,' ',persona.pape_per,' ',persona.sape_per,' ' ,detalle_grupo.valor_det,' ', persona.numero_iden_per) AS nombre 
                        FROM persona 
                        INNER JOIN detalle_grupo ON detalle_grupo.codi_det=persona.tipo_iden_per
                        INNER JOIN paciente ON paciente.id_persona=persona.id_persona";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_paciente NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_agenda_medico AS
                        SELECT agenda_cita.id_agc,agenda_cita.estado_agc,agenda_cita.observacion_agc,agenda_horario.fecha_agh,agenda_horario.id_persona AS id_profesional,CONCAT(profesional.pnom_per,' ',profesional.snom_per,' ',profesional.pape_per,profesional.sape_per) AS nombre_profesional,
                        persona.id_persona,persona.numero_iden_per,CONCAT(persona.pnom_per,' ',persona.snom_per,' ',persona.pape_per,persona.sape_per) AS nombre
                        FROM agenda_cita
                        INNER JOIN agenda_horario ON agenda_horario.id_agh=agenda_cita.id_agh
                        INNER JOIN persona ON persona.id_persona=agenda_cita.id_persona
                        INNER JOIN persona AS profesional ON profesional.id_persona=agenda_horario.id_persona";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_agenda_medico NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_cups_profesional AS
                        SELECT idcups_prof,cups_profesional.id_persona,cups_profesional.id_cups,estado_cprof,CONCAT(persona.pnom_per,' ',persona.snom_per,' ',persona.pape_per,' ',persona.sape_per) AS nombre, cups.codigo_cups,cups.descripcion_cups,cups.estado_cups 
                        FROM cups_profesional 
                        INNER JOIN persona ON persona.id_persona=cups_profesional.id_persona 
                        INNER JOIN cups ON cups.id_cups=cups_profesional.id_cups";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_cups_profesional NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_cie AS
                        SELECT id_cie,CONCAT(codigo_cie,' ',descripcion_cie) AS descripcion FROM cie WHERE estado_cie='A'";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_cie NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_persona_paciente AS
                        SELECT persona.id_persona,persona.tipo_iden_per,vw_tipo_ident.valor_det AS tipo_ident,persona.numero_iden_per,CONCAT(persona.pnom_per,' ',persona.snom_per,' ',persona.pape_per,' ',persona.sape_per) AS nombre_per, persona.fnac_per, persona.sexo_per,vw_sexo.valor_det AS sexo, persona.direccion_per,persona.telefono_per,persona.email_per,
                        paciente.codigo_mun,paciente.zona,
                        paciente.tipo_usuario,paciente.etnia,paciente.nivel_educ,paciente.id_ciuo,ciuo.codigo_ciuo,ciuo.descripcion_ciu,paciente.estado_civ
                        FROM persona
                        INNER JOIN paciente ON paciente.id_persona=persona.id_persona
                        INNER JOIN vw_tipo_ident ON vw_tipo_ident.codi_det=persona.tipo_iden_per
                        INNER JOIN vw_sexo ON vw_sexo.codi_det=persona.sexo_per
                        INNER JOIN ciuo ON ciuo.id_ciuo=paciente.id_ciuo";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_persona_paciente NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_formula_detalle AS
                        SELECT consulta_formula.id_con,consulta_formula_detalle.id_form_det, consulta_formula_detalle.id_form, consulta_formula_detalle.id_medicamento, medicamento.nombre_mto, consulta_formula_detalle.dosis_det, consulta_formula_detalle.frecuencia_det, consulta_formula_detalle.via_det, vw_via.descripcion_det AS via_admin, consulta_formula_detalle.tiempo_trat_det, consulta_formula_detalle.cantidad_det, consulta_formula_detalle.observacion_det FROM consulta_formula_detalle
                        INNER JOIN consulta_formula ON consulta_formula.id_form=consulta_formula_detalle.id_form
                        INNER JOIN medicamento ON medicamento.id_medicamento=consulta_formula_detalle.id_medicamento
                        INNER JOIN vw_via ON vw_via.codi_det=consulta_formula_detalle.via_det";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_formula_detalle NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_consulta AS
                        SELECT consulta.id_con,consulta.id_agc,consulta.fecha_con,consulta.motivo_con,consulta.enfermedad_con,consulta.revisionsist_con,consulta.examenmen_con,consulta.id_cups,
                        cups.codigo_cups,cups.descripcion_cups,
                        consulta.finalidad_con,
                        vw_finalidad_con.descripcion_det AS finalidad,vw_finalidad_con.valor_det AS finalidad_cod,
                        consulta.causaext_con,
                        vw_causa_exte.descripcion_det AS causaexte,vw_causa_exte.valor_det AS causaext_cod,
                        consulta.analisis_con,consulta.dxprinc_con,
                        cie.codigo_cie AS dxprinc_cod,cie.descripcion_cie AS dxprinc,
                        consulta.dxrela1_con,
                        cierel1.codigo_cie AS dxrel1_cod, cierel1.descripcion_cie AS dxrel1,
                        consulta.dxrela2_con,
                        cierel2.codigo_cie AS dxrel2_cod, cierel2.descripcion_cie AS dxrel2,
                        consulta.dxrela3_con,
                        cierel3.codigo_cie AS dxrel3_cod, cierel3.descripcion_cie AS dxrel3,
                        consulta.tipodx_con,
                        vw_tpdiagnostico.descripcion_det AS tipodx,vw_tpdiagnostico.valor_det AS tipodx_cod,
                        consulta.observacion_con,consulta.descrip_clin_con,consulta.pronostico_con,consulta.recomen_con,consulta.control_con,consulta.subjetivo_con,consulta.objetivo_con,consulta.id_profesional,
                        CONCAT(profesional.pnom_per,' ',profesional.snom_per,' ',profesional.pape_per,' ',profesional.sape_per) AS nombre_prof,
                        consulta.estado_con,
                        vw_tipo_ident.descripcion_det AS tipoiden,vw_tipo_ident.valor_det AS tipoiden_cod,
                        consulta_dpersonales.numeroiden_dp,consulta_dpersonales.nombre_dp,consulta_dpersonales.fechanac_dp,TRUNCATE((DATEDIFF(consulta.fecha_con,consulta_dpersonales.fechanac_dp)/365.25),0) AS edad,vw_sexo.descripcion_det AS sexo,consulta_dpersonales.direccion_dp,consulta_dpersonales.telefono_dp,ciuo.descripcion_ciu,vw_estadocivil.descripcion_det AS estado_civil,vw_tpusuario.descripcion_det AS tipo_usuario,vw_tpafiliado.descripcion_det AS tipo_afiliado, agenda_cita.id_eps,eps.nombre_eps
                        FROM consulta
                        INNER JOIN agenda_cita ON agenda_cita.id_agc=consulta.id_agc
                        INNER JOIN eps ON eps.id_eps=agenda_cita.id_eps
                        INNER JOIN cups ON cups.id_cups=consulta.id_cups
                        INNER JOIN vw_finalidad_con ON vw_finalidad_con.codi_det=consulta.finalidad_con
                        INNER JOIN vw_causa_exte ON vw_causa_exte.codi_det=consulta.causaext_con
                        INNER JOIN cie ON cie.id_cie=consulta.dxprinc_con
                        INNER JOIN vw_tpdiagnostico ON vw_tpdiagnostico.codi_det=consulta.tipodx_con
                        INNER JOIN persona AS profesional ON profesional.id_persona=consulta.id_profesional
                        INNER JOIN consulta_dpersonales ON consulta_dpersonales.id_con=consulta.id_con
                        INNER JOIN vw_tipo_ident ON vw_tipo_ident.codi_det=consulta_dpersonales.tipoiden_dp
                        INNER JOIN vw_sexo ON vw_sexo.codi_det=consulta_dpersonales.genero_dp
                        INNER JOIN ciuo ON ciuo.id_ciuo=consulta_dpersonales.ocupacion_dp
                        INNER JOIN vw_estadocivil ON vw_estadocivil.codi_det=consulta_dpersonales.estadociv_dp
                        INNER JOIN vw_tpafiliado ON vw_tpafiliado.codi_det=consulta_dpersonales.tipoafil_dp
                        INNER JOIN vw_tpusuario ON vw_tpusuario.codi_det=consulta_dpersonales.tipovin_dp
                        LEFT JOIN cie AS cierel1 ON cierel1.id_cie=consulta.dxrela1_con
                        LEFT JOIN cie AS cierel2 ON cierel2.id_cie=consulta.dxrela2_con
                        LEFT JOIN cie AS cierel3 ON cierel3.id_cie=consulta.dxrela3_con";
                        //echo $sql;
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_consulta NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_consulta_fac AS
                        SELECT consulta.id_con,consulta.id_agc,agenda_cita.id_persona,consulta.fecha_con,consulta.id_cups,
                        cups.codigo_cups,cups.descripcion_cups,
                        consulta.id_profesional,
                        CONCAT(profesional.pnom_per,' ',profesional.snom_per,' ',profesional.pape_per,' ',profesional.sape_per) AS nombre_prof,
                        consulta.estado_con,consulta.facturada_con,
                        vw_tipo_ident.valor_det AS tipoiden_cod,
                        consulta_dpersonales.numeroiden_dp,consulta_dpersonales.nombre_dp,
                        eps.nombre_eps
                        FROM consulta
                        INNER JOIN cups ON cups.id_cups=consulta.id_cups
                        INNER JOIN persona AS profesional ON profesional.id_persona=consulta.id_profesional
                        INNER JOIN consulta_dpersonales ON consulta_dpersonales.id_con=consulta.id_con
                        INNER JOIN vw_tipo_ident ON vw_tipo_ident.codi_det=consulta_dpersonales.tipoiden_dp
                        INNER JOIN agenda_cita ON agenda_cita.id_agc=consulta.id_agc
                        INNER JOIN eps ON eps.id_eps=agenda_cita.id_eps";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_consulta_fac NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_formula_encabezado AS
                        SELECT consulta_formula.id_form,consulta_formula.id_con,
                        vw_tipo_ident.descripcion_det AS tipo_iden,consulta_dpersonales.numeroiden_dp,consulta_dpersonales.nombre_dp,TRUNCATE(DATEDIFF(consulta.fecha_con,consulta_dpersonales.fechanac_dp)/365.25,0) AS edad,vw_sexo.descripcion_det AS sexo,consulta_dpersonales.direccion_dp,consulta_dpersonales.telefono_dp,eps.nombre_eps,
                        consulta.fecha_con,consulta.dxprinc_con,cie.codigo_cie,cie.descripcion_cie,consulta.id_profesional,profesional.numero_iden_per AS identificacion_profe, CONCAT(profesional.pnom_per,' ',profesional.snom_per,' ',profesional.pape_per,' ',profesional.sape_per) AS nombre_profe
                        FROM consulta_formula
                        INNER JOIN consulta ON consulta.id_con=consulta_formula.id_con
                        INNER JOIN agenda_cita ON agenda_cita.id_agc=consulta.id_agc
                        INNER JOIN consulta_dpersonales ON consulta_dpersonales.id_con=consulta_dpersonales.id_con
                        INNER JOIN eps ON eps.id_eps=agenda_cita.id_eps
                        INNER JOIN cie ON cie.id_cie=consulta.dxprinc_con
                        INNER JOIN persona AS profesional ON profesional.id_persona=consulta.id_profesional
                        INNER JOIN vw_tipo_ident ON vw_tipo_ident.codi_det=consulta_dpersonales.tipoiden_dp
                        INNER JOIN vw_sexo ON vw_sexo.codi_det=consulta_dpersonales.genero_dp";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_formula_encabezado NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_consulta_orden AS
                        SELECT consulta_orden.id_ord, consulta_orden.id_con, consulta_orden.tipo_ord, vw_tipoorden.descripcion_det AS orden
                        FROM consulta_orden
                        INNER JOIN vw_tipoorden ON vw_tipoorden.codi_det=consulta_orden.tipo_ord";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_consulta_orden NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_orden_detalle AS
                        SELECT consulta_orden_detalle.id_ord_det,consulta_orden_detalle.id_ord,consulta_orden_detalle.id_cups,consulta_orden_detalle.observacion_det,
                        cups.codigo_cups,cups.descripcion_cups
                        FROM consulta_orden_detalle
                        INNER JOIN cups ON cups.id_cups=consulta_orden_detalle.id_cups";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_orden_detalle NO CREADA</div>";
                        }


                        $sql="CREATE OR REPLACE VIEW vw_nousuario AS
                        SELECT persona.id_persona,CONCAT(persona.numero_iden_per,' ',persona.pnom_per,' ',persona.snom_per,' ',persona.pape_per,' ',persona.sape_per) AS nombre FROM persona LEFT JOIN usuario ON usuario.id_persona=persona.id_persona WHERE ISNULL(usuario.id_persona)";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_nousuario NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_cups AS
                        SELECT cups.id_cups,CONCAT(cups.codigo_cups,' ',cups.descripcion_cups) AS descripcion_cups,cups.estado_cups FROM cups";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_cups NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_horarios AS
                        SELECT agenda_horario.id_agh,agenda_horario.id_persona,agenda_horario.fecha_agh,agenda_horario.estado_agh,agenda_horario.operador_agh,agenda_horario.fechagen_agh,
                        CONCAT(profesional.pnom_per,' ',profesional.snom_per,' ',profesional.pape_per,' ',profesional.sape_per) AS nombre_prof, usuario.profesion_usu,
                        CONCAT(operador.pnom_per,' ',operador.snom_per,' ',operador.pape_per,' ',operador.sape_per) AS nombre_operador
                        FROM agenda_horario
                        INNER JOIN persona AS profesional ON profesional.id_persona=agenda_horario.id_persona
                        INNER JOIN usuario ON usuario.id_persona=profesional.id_persona
                        INNER JOIN persona AS operador ON operador.id_persona=agenda_horario.operador_agh";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_horarios NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_citas AS
                        SELECT agenda_cita.id_agc, agenda_cita.id_agh,
                        agenda_horario.fecha_agh,profesional.id_persona AS id_profesional,CONCAT(profesional.pnom_per,' ',profesional.snom_per,' ',profesional.pape_per,' ',profesional.sape_per) AS nombre_profesional,
                        agenda_cita.id_persona, persona.numero_iden_per, CONCAT(persona.pnom_per,' ',persona.snom_per,' ',persona.pape_per,' ',persona.sape_per) AS nombre_persona,persona.direccion_per,persona.telefono_per,
                        agenda_cita.id_eps,eps.nombre_eps,
                        agenda_cita.estado_agc,agenda_cita.observacion_agc,agenda_cita.operador_agc,CONCAT(operador.pnom_per,' ',operador.snom_per,' ',operador.pape_per,' ',operador.sape_per) AS nombre_operador,
                        agenda_cita.fechasol_agc
                        FROM
                        agenda_cita
                        INNER JOIN agenda_horario ON agenda_horario.id_agh=agenda_cita.id_agh
                        INNER JOIN persona AS profesional ON profesional.id_persona=agenda_horario.id_persona
                        INNER JOIN persona ON persona.id_persona=agenda_cita.id_persona
                        INNER JOIN eps ON eps.id_eps=agenda_cita.id_eps
                        INNER JOIN persona AS operador ON operador.id_persona=agenda_cita.operador_agc";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_citas NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_convenio AS
                        SELECT convenio_encabezado.id_convenio, convenio_encabezado.numero_conv, convenio_encabezado.id_eps,
                        eps.nombre_eps,
                        convenio_encabezado.fecha_conv, convenio_encabezado.observacion_conv, convenio_encabezado.estado_conv, CONCAT( convenio_encabezado.numero_conv,' ',eps.nombre_eps) AS convenio_eps
                        FROM convenio_encabezado
                        INNER JOIN eps ON eps.id_eps=convenio_encabezado.id_eps";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_convenio NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_convenio_detalle AS
                        SELECT convenio_detalle.id_cdet, convenio_detalle.id_convenio, convenio_detalle.descripcion_cdet, convenio_detalle.tipo_cdet, convenio_detalle.codigo_cdet, convenio_detalle.valor_cdet, convenio_detalle.estado_cdet,
                        convenio_encabezado.numero_conv, convenio_encabezado.estado_conv,
                        eps.nombre_eps
                        FROM convenio_detalle
                        INNER JOIN convenio_encabezado ON convenio_encabezado.id_convenio=convenio_detalle.id_convenio
                        INNER JOIN eps ON eps.id_eps=convenio_encabezado.id_eps";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_convenio_detalle NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_factura AS
                        SELECT factura_encabezado.id_factura,factura_encabezado.numero_fac,factura_encabezado.id_persona,
                        vw_tipo_ident.valor_det AS tipoiden_per,
                        persona.numero_iden_per, CONCAT(persona.pnom_per,' ',persona.snom_per,' ',persona.pape_per,' ',persona.sape_per) AS nombre_pac,persona.direccion_per, persona.telefono_per,
                        factura_encabezado.id_convenio,convenio_encabezado.numero_conv,eps.id_eps,eps.nombre_eps,
                        factura_encabezado.fecha_fac,factura_encabezado.fechaini_fac,factura_encabezado.fechafin_fac,factura_encabezado.fechacierre_fac,factura_encabezado.operador_fac,
                        operador.numero_iden_per AS identif_operador, CONCAT(operador.pnom_per,' ',operador.snom_per,' ',operador.pape_per,' ',operador.sape_per) AS nombre_operador,
                        factura_encabezado.id_ccobro,factura_encabezado.valortot_fac,factura_encabezado.copago_fac,factura_encabezado.descuento_fac,factura_encabezado.valorneto_fac,factura_encabezado.esta_fac
                        FROM factura_encabezado
                        INNER JOIN persona ON persona.id_persona=factura_encabezado.id_persona
                        INNER JOIN convenio_encabezado ON convenio_encabezado.id_convenio=factura_encabezado.id_convenio
                        INNER JOIN eps ON eps.id_eps=convenio_encabezado.id_eps
                        INNER JOIN persona AS operador ON operador.id_persona=factura_encabezado.operador_fac
                        INNER JOIN vw_tipo_ident ON vw_tipo_ident.codi_det=persona.tipo_iden_per";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_factura NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_factura_detalle AS
                        SELECT factura_detalle.id_detfac, factura_detalle.id_factura, factura_encabezado.numero_fac, SUBSTR(factura_encabezado.fecha_fac,1,10) AS fecha_fac, factura_encabezado.id_ccobro, factura_detalle.id_con, factura_detalle.id_cdet,
                        convenio_detalle.descripcion_cdet, convenio_detalle.tipo_cdet, convenio_detalle.codigo_cdet,
                        factura_detalle.cantidad_detfac,factura_detalle.valor_unit_detfac, (factura_detalle.cantidad_detfac*factura_detalle.valor_unit_detfac) AS valor_total 
                        FROM factura_detalle 
                        INNER JOIN factura_encabezado ON factura_encabezado.id_factura=factura_detalle.id_factura
                        INNER JOIN convenio_detalle ON convenio_detalle.id_cdet=factura_detalle.id_cdet";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_factura_detalle NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_usuarios_factura_rips AS
                        SELECT factura_encabezado.id_factura,factura_encabezado.id_ccobro,factura_encabezado.esta_fac,factura_encabezado.id_persona,vw_tipo_ident.valor_det AS tipoiden, persona.numero_iden_per,persona.pape_per,persona.sape_per,persona.pnom_per,persona.snom_per,TRUNCATE(DATEDIFF(factura_encabezado.fecha_fac,persona.fnac_per)/365.25,0) AS edad, vw_sexo.valor_det AS sexo, paciente.codigo_mun,paciente.zona, vw_tpusuario.valor_det AS tipousuario
                        FROM factura_encabezado
                        INNER JOIN persona ON persona.id_persona=factura_encabezado.id_persona
                        INNER JOIN paciente ON paciente.id_persona=persona.id_persona
                        INNER JOIN vw_tipo_ident ON vw_tipo_ident.codi_det=persona.tipo_iden_per
                        INNER JOIN vw_sexo ON vw_sexo.codi_det=persona.sexo_per
                        INNER JOIN vw_tpusuario ON vw_tpusuario.codi_det=paciente.tipo_usuario";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_usuarios_factura_rips NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_cuentacobro AS
                        SELECT factura_cuentacobro.id_ccobro, factura_cuentacobro.numero_ccob, factura_cuentacobro.fecha_ccob,factura_cuentacobro.fechaini_ccob, factura_cuentacobro.fechafin_ccob, factura_cuentacobro.id_eps, eps.nombre_eps, eps.nit_eps, eps.codigo_eps, factura_cuentacobro.concepto_ccob, factura_cuentacobro.estado_ccob 
                        FROM factura_cuentacobro
                        INNER JOIN eps ON eps.id_eps=factura_cuentacobro.id_eps";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_cuentacobro NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_ripsac AS
                        SELECT rips_ac.id_ripsac, rips_ac.id_ccobro, rips_ac.id_detfac,factura_encabezado.id_factura, factura_encabezado.numero_fac, rips_ac.fechacon_rac, rips_ac.numeroauto_rac, rips_ac.codigocon_rac, rips_ac.finalidad_rac, rips_ac.causaexte_rac, rips_ac.dxprincipal_rac, rips_ac.dxrel1_rac, rips_ac.dxrel2_rac, rips_ac.dxrel3_rac, rips_ac.tipodxprin_rac, rips_ac.valorcon_rac, rips_ac.valorcmode_rac, vw_usuarios_factura_rips.tipoiden,vw_usuarios_factura_rips.numero_iden_per,factura_encabezado.esta_fac
                        FROM rips_ac 
                        INNER JOIN factura_detalle ON factura_detalle.id_detfac=rips_ac.id_detfac
                        INNER JOIN factura_encabezado ON factura_encabezado.id_factura=factura_detalle.id_factura
                        INNER JOIN vw_usuarios_factura_rips ON vw_usuarios_factura_rips.id_factura=factura_encabezado.id_factura";
                        //echo $sql;
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_ripsac NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_menu AS
                        SELECT menu_usuario.id_musu,menu_usuario.id_persona,menu_usuario.id_menu,
                        CONCAT(persona.pnom_per,' ',persona.snom_per,' ',persona.pape_per,' ',persona.sape_per) AS nombre_per,
                        menu.orden_menu,menu.opcion_menu,menu.nivel_menu,menu.dependencia_menu,menu.tienesub_menu,menu.url_menu
                        FROM menu_usuario
                        INNER JOIN persona ON persona.id_persona=menu_usuario.id_persona
                        INNER JOIN menu ON menu.id_menu=menu_usuario.id_menu";
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_menu NO CREADA</div>";
                        }

                        $sql="CREATE OR REPLACE VIEW vw_certificado AS
                        SELECT persona.id_persona, CONCAT(persona.pnom_per,' ',persona.snom_per,' ',persona.pape_per,' ',persona.sape_per) AS nombre,detalle_grupo.valor_det AS tipo_iden,persona.numero_iden_per,persona.fnac_per,certificacion.id_certificacion,certificacion.detalle_certi,certificacion.fecha_reg,profesional.numero_iden_per AS identificacion_profe,CONCAT(profesional.pnom_per,' ',profesional.snom_per,' ',profesional.pape_per,' ',profesional.sape_per) AS nombre_profesional,usuario.profesion_usu,usuario.registro_usu
                        FROM certificacion
                        INNER JOIN persona ON persona.id_persona=certificacion.id_persona 
                        INNER JOIN detalle_grupo ON detalle_grupo.codi_det=persona.tipo_iden_per
                        INNER JOIN persona AS profesional ON profesional.id_persona=certificacion.id_operador
                        INNER JOIN usuario ON usuario.id_persona=profesional.id_persona";
                        //echo $sql;
                        $res=mysqli_query($conexion,$sql);
                        if($res<>1){
                            echo "<div class='col-sm-12'>vw_certificado NO CREADA</div>";
                        }


                        ?>
                    </div>
                    <div class="card-footer text-muted">
                        By Soluciones Thin & Thin
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script type="text/javascript">
    function creavistas(){
        alert();
        <?php
        echo "<div class='col-sm-12'>vw_detalle_grupo</div>";
        ?>
    }
</script>