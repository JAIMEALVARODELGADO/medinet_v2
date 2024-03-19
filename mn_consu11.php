<?php
require("valida_sesion.php");
if(isset($_POST['id_agc'])){
	$_SESSION['gid_agc']=$_POST['id_agc'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Medinet V2</title>
	<?php 
		require_once "scripts.php";
		require_once "clases/conexion.php";
		$obj=new conectar();
		$conexion=$obj->conexion();
	?>
	<link rel="stylesheet" type="text/css" href="../librerias/css/jquery.autocomplete.css">
	<script type="text/javascript" src="../librerias/js/jquery.js"></script>
	<script type='text/javascript' src='../librerias/js/jquery.autocomplete.js'></script>
</head>

<body>
	<?php
	$tipoiden_dp='';	
    $numeroiden_dp='';
    $nombre_dp='';
    $direccion_dp='';
    $telefono_dp='';
    $fechanac_dp='';
    $genero_dp='';
    $etnia_dp='';
    $ocupacion_dp='';
    $ocupacion='';
    $niveleduc_dp='';
    $estadociv_dp='';
    $tipovin_dp='';
    $zonares_dp='';
    $tipoafil_dp='';
	$grupopob_dp='';

	$motivo_con='';
	$enfermedad_con='';
	$revisionsist_con='';
	$examenmen_con='';
	$id_cups='';
	$finalidad_con='';
	$causaext_con='';
	$analisis_con='';
	$dxprinc_con='';	
	$dxrela1_con='';
	$dxrela2_con='';
	$dxrela3_con='';
	$tipodx_con='';	
	$observacion_con='';
	$descrip_clin_con='';
	$pronostico_con='';
	$recomen_con='';
	$dxprinc="";
	$dxrela1="";
	$dxrela2="";
	$dxrela3="";
	$tipoiden_acu="";
	$numeroiden_acu="";
	$nombre_acu="";
	$direccion_acu="";
	$telefono_acu="";
	$parentesco_acu="";
	$personales_ante="";
	$familiares_ante="";
	$control_con='';
	$subjetivo_con='';
	$objetivo_con='';

	$conhis="SELECT id_con,motivo_con,enfermedad_con,revisionsist_con,examenmen_con,id_cups,finalidad_con,causaext_con,analisis_con,dxprinc_con,dxrela1_con,dxrela2_con,dxrela3_con,tipodx_con,observacion_con,dxpr.descripcion_cie AS dxprinc,dxr1.descripcion_cie AS dxrela1,dxr2.descripcion_cie AS dxrela2,dxr3.descripcion_cie AS dxrela3,descrip_clin_con,pronostico_con,recomen_con,control_con,subjetivo_con,
	objetivo_con
	FROM consulta 
	INNER JOIN cie AS dxpr ON dxpr.id_cie=consulta.dxprinc_con
	LEFT JOIN cie AS dxr1 ON dxr1.id_cie=consulta.dxrela1_con
	LEFT JOIN cie AS dxr2 ON dxr2.id_cie=consulta.dxrela2_con
	LEFT JOIN cie AS dxr3 ON dxr3.id_cie=consulta.dxrela3_con
	WHERE id_agc='$_SESSION[gid_agc]'";
	//echo "<br>".$conhis;
	$conhis=mysqli_query($conexion,$conhis);
	if(mysqli_num_rows($conhis)==0){		
		//Aqui consulto la informacion del paciente
		$consultapac="SELECT tipo_iden_per,vw_persona_paciente.numero_iden_per,nombre_per,direccion_per,telefono_per,fnac_per,sexo_per,etnia,id_ciuo,descripcion_ciu,nivel_educ,estado_civ, tipo_usuario,zona FROM vw_persona_paciente
	    INNER JOIN vw_agenda_medico ON vw_agenda_medico.id_persona=vw_persona_paciente.id_persona
		WHERE id_agc='$_SESSION[gid_agc]'";
		//echo "<br>".$consultapac;
		$consultapac=mysqli_query($conexion,$consultapac);
	    $rowpac=mysqli_fetch_row($consultapac);
	    $tipoiden_dp=$rowpac[0];
	    $numeroiden_dp=$rowpac[1];
	    $nombre_dp=$rowpac[2];
	    $direccion_dp=$rowpac[3];
	    $telefono_dp=$rowpac[4];
	    $fechanac_dp=$rowpac[5];
	    $genero_dp=$rowpac[6];
	    $etnia_dp=$rowpac[7];
	    $ocupacion_dp=$rowpac[8];
	    $ocupacion=$rowpac[9];
	    $niveleduc_dp=$rowpac[10];
	    $estadociv_dp=$rowpac[11];
	    $tipovin_dp=$rowpac[12];
	    $zonares_dp=$rowpac[13];	    
	}
	else{
		//Aqui consulta la inforacion de una historia guardada		
		$row=mysqli_fetch_row($conhis);
		$id_con=$row[0];
		$motivo_con=$row[1];
		$enfermedad_con=$row[2];
		$revisionsist_con=$row[3];
		$examenmen_con=$row[4];
		$id_cups=$row[5];		
		$finalidad_con=$row[6];
		$causaext_con=$row[7];		
		$analisis_con=$row[8];
		$dxprinc_con=$row[9];		
		$dxrela1_con=$row[10];
		$dxrela2_con=$row[11];
		$dxrela3_con=$row[12];
		$tipodx_con=$row[13];
		$observacion_con=$row[14];
		$dxprinc=$row[15];
		$dxrela1=$row[16];
		$dxrela2=$row[17];
		$dxrela3=$row[18];
		$descrip_clin_con=$row[19];
		$pronostico_con=$row[20];
		$recomen_con=$row[21];
		$control_con=$row[22];
		$subjetivo_con=$row[23];
		$objetivo_con=$row[24];

		$condp="SELECT tipoiden_dp,numeroiden_dp, nombre_dp, direccion_dp, telefono_dp,fechanac_dp, genero_dp, etnia_dp, ocupacion_dp,descripcion_ciu, niveleduc_dp, estadociv_dp, tipovin_dp,zonares_dp,tipoafil_dp, grupopob_dp FROM consulta_dpersonales 
		INNER JOIN ciuo ON ciuo.id_ciuo=consulta_dpersonales.ocupacion_dp
		WHERE id_con='$id_con'";
		//echo "<br>".$condp;
		$condp=mysqli_query($conexion,$condp);
		$rowpac=mysqli_fetch_row($condp);
		$tipoiden_dp=$rowpac[0];
	    $numeroiden_dp=$rowpac[1];
	    $nombre_dp=$rowpac[2];
	    $direccion_dp=$rowpac[3];
	    $telefono_dp=$rowpac[4];
	    $fechanac_dp=$rowpac[5];
	    $genero_dp=$rowpac[6];
	    $etnia_dp=$rowpac[7];
	    $ocupacion_dp=$rowpac[8];
	    $ocupacion=$rowpac[9];
	    $niveleduc_dp=$rowpac[10];
	    $estadociv_dp=$rowpac[11];
	    $tipovin_dp=$rowpac[12];
	    $zonares_dp=$rowpac[13];
		$tipoafil_dp=$rowpac[14];
		$grupopob_dp=$rowpac[15];

		$conacud="SELECT tipoiden_acu,numeroiden_acu,nombre_acu,direccion_acu,telefono_acu,parentesco_acu FROM consulta_acudiente WHERE id_con='$id_con'";
		//echo "<br>".$conacud;		
		$conacud=mysqli_query($conexion,$conacud);
		if(mysqli_num_rows($conacud)<>0){
			$rowacud=mysqli_fetch_row($conacud);
			$tipoiden_acu=$rowacud[0];
			$numeroiden_acu=$rowacud[1];
			$nombre_acu=$rowacud[2];
			$direccion_acu=$rowacud[3];
			$telefono_acu=$rowacud[4];
			$parentesco_acu=$rowacud[5];
		}

		$conante="SELECT personales_ante,familiares_ante FROM consulta_antecedentes WHERE id_con='$id_con'";
		//echo "<br>".$conante;		
		$conante=mysqli_query($conexion,$conante);
		if(mysqli_num_rows($conante)<>0){
			$rowante=mysqli_fetch_row($conante);
			$personales_ante=$rowante[0];			
			$familiares_ante=$rowante[1];
		}
	}
    
	require("encabezado.php");
	//require("menu.php")
	?>
	<div class="card text">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs">
				<li class="nav-item">
					<a class="nav-link active" href="#">Historia</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="mn_consu12.php">Formula</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="mn_consu13.php">Ordenes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="mn_consu14.php">Finalizar Conulta</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="mn_consu1.php">Pacientes Agendados</a>
				</li>
			</ul>

		</div>       
		<br><h5>Historia de Consulta</h5>        
		<div class="card-body">
			<form id="frm_consulta" name="frm_consulta" action="">
				<div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="..." name="chk_control" id="chk_control" onclick="mostrar()">
                    </span>
                    Consulta de Control
                </div>
				<div class="card">
					<div class="card-header">
						Información del Paciente
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Tipo Identificación</label>
						<div class="col-sm-2">
							<select class="form-control form-control-sm" id="tipoiden_dp" name="tipoiden_dp">
								<option value=""></option>
									<?php
									$sql="SELECT codi_det,descripcion_det FROM vw_tipo_ident ORDER BY descripcion_det";
									$result=mysqli_query($conexion,$sql);
									while($row=mysqli_fetch_row($result)){
										echo "<option value='$row[0]'>$row[1]</option>";
									}
									?>
							</select> 
						</div>
						<label class="col-sm-2 col-form-label">Núm. Identificacion</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" id="numeroiden_dp" name="numeroiden_dp" maxlength='20' placeholder="Identificacion" required>
						</div>

						<label class="col-sm-1 col-form-label">Nombre</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="nombre_dp" name="nombre_dp" maxlength='80' placeholder="Nombre" required">
						</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-1 col-form-label">Dirección</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="direccion_dp" name="direccion_dp" maxlength='50' placeholder="Direccion" required>
							</div>

							<label class="col-sm-2 col-form-label">Teléfono</label>       
							<div class="col-sm-2">
								<input type="text" class="form-control" id="telefono_dp" name="telefono_dp" maxlength='20' placeholder="Teléfono" required>
							</div>

							<label class="col-sm-1 col-form-label">Fecha Nac.</label>
							<div class="col-sm-3">
								<input type="date" class="form-control" id="fechanac" name="fechanac" maxlength='10' placeholder="F.Nacim" required>
								<input type="hidden" class="form-control" id="fechanac_dp" name="fechanac_dp">

							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-1 col-form-label">Género</label>
							<div class="col-sm-3">
								<select class="form-control form-control-sm" id="genero_dp" name="genero_dp">
									<option value=""></option>
									<?php
										$sql="SELECT codi_det,descripcion_det FROM vw_sexo ORDER BY descripcion_det";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select> 
							</div>

							<label class="col-sm-2 col-form-label">Pertenencia Etnica</label>       
							<div class="col-sm-2">
								<select class="form-control form-control-sm" id="etnia_dp" name="etnia_dp">
									<option value=""></option>
									<?php										
										$sql="SELECT codi_det,descripcion_det FROM vw_etnia";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select> 
							</div>

							<label class="col-sm-1 col-form-label">Ocupación</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="ocupacion" name="ocupacion" maxlength='80' placeholder="Ocupación" required>
								<input type="hidden" class="form-control" id="ocupacion_dp" name="ocupacion_dp">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-1 col-form-label">Nivel Educativo</label>
							<div class="col-sm-3">
								<select class="form-control form-control-sm" id="niveleduc_dp" name="niveleduc_dp">
									<option value=""></option>
									<?php
										$sql="SELECT codi_det,descripcion_det FROM vw_niveducat";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select> 
							</div>

							<label class="col-sm-2 col-form-label">Estado Civil</label>       
							<div class="col-sm-2">
								<select class="form-control form-control-sm" id="estadociv_dp" name="estadociv_dp">
									<option value=""></option>
									<?php
										$sql="SELECT codi_det,descripcion_det FROM vw_estadocivil ORDER BY descripcion_det";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select> 
							</div>

							<label class="col-sm-2 col-form-label">Tipo de Vinculación</label>
							<div class="col-sm-2">
								<select class="form-control form-control-sm" id="tipovin_dp" name="tipovin_dp">
									<option value=""></option>
									<?php
										$sql="SELECT codi_det,descripcion_det FROM vw_tpusuario";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select> 
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Tipo de Afiliado</label>
							<div class="col-sm-2">
								<select class="form-control form-control-sm" id="tipoafil_dp" name="tipoafil_dp">
									<option value=""></option>
									<?php
										$sql="SELECT codi_det,descripcion_det FROM vw_tpafiliado";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select>
							</div>

							<label class="col-sm-2 col-form-label">Grupo Poblacional</label>       
							<div class="col-sm-2">
								<select class="form-control form-control-sm" id="grupopob_dp" name="grupopob_dp">
									<option value=""></option>
									<?php
										$sql="SELECT codi_det,descripcion_det FROM vw_grupopobla";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select> 
							</div>

							<label class="col-sm-2 col-form-label">Zona de Residencia</label>
							<div class="col-sm-2">
								<select class="form-control form-control-sm" id="zonares_dp" name="zonares_dp">
									<option value=""></option>
									<?php
										$sql="SELECT valor_det,descripcion_det FROM vw_zona";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select> 
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header">
							Información del Acudiente
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Tipo Identificación</label>
							<div class="col-sm-2">
								<select class="form-control form-control-sm" id="tipoiden_acu" name="tipoiden_acu">
									<option value=""></option>
									<?php
										$sql="SELECT valor_det,descripcion_det FROM vw_tipo_ident ORDER BY descripcion_det";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select> 
							</div>
							<label class="col-sm-2 col-form-label">Núm. Identificacion</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="numeroiden_acu" name="numeroiden_acu" maxlength='20' placeholder="Identificacion" required>
							</div>

							<label class="col-sm-1 col-form-label">Nombre</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="nombre_acu" name="nombre_acu" maxlength='80' placeholder="Nombre" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-1 col-form-label">Dirección</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="direccion_acu" name="direccion_acu" maxlength='50' placeholder="Direccion" required>
							</div>

							<label class="col-sm-2 col-form-label">Teléfono</label>       
							<div class="col-sm-2">
								<input type="text" class="form-control" id="telefono_acu" name="telefono_acu" maxlength='20' placeholder="Teléfono" required>
							</div>

							<label class="col-sm-1 col-form-label">Parentesco</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="parentesco_acu" name="parentesco_acu" maxlength='20' placeholder="Parentesco" required>
							</div>
						</div>                                
					</div>

					<div class="card">
						<div class="card-header" id="anamnesis1">
							Anamnesis
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-form-label">Motivo de Consulta
								<textarea rows="3" class="form-control" id="motivo_con" name="motivo_con" placeholder="Motivo de consulta" required><?php echo $motivo_con;?></textarea>
							</label>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-form-label">Enfermedad Actual
								<textarea rows="3" class="form-control" id="enfermedad_con" name="enfermedad_con" placeholder="Enfermedad Actual" required><?php echo $enfermedad_con;?></textarea>
							</label>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-form-label">Revisión por Sistemas
								<textarea rows="3" class="form-control" id="revisionsist_con" name="revisionsist_con" placeholder="Revisión por Sistemas" required><?php echo $revisionsist_con;?></textarea>
							</label>
						</div>

						<div id="anamnesis2">
	                        <div class="card">
	                            <div class="card-header">
	                                Anamnesis
	                            </div>
	                            <div class="form-group row">
	                                <label class="col-sm-12 col-form-label">Subjetivo
	                                    <textarea rows="3" class="form-control" id="subjetivo_con" name="subjetivo_con" placeholder="Subjetivo" required><?php echo $subjetivo_con;?></textarea>
	                                </label>
	                            </div>

	                            <div class="form-group row">
	                                <label class="col-sm-12 col-form-label">Objetivo
	                                    <textarea rows="3" class="form-control" id="objetivo_con" name="objetivo_con" placeholder="Objetivo" required><?php echo $objetivo_con;?></textarea>
	                                </label>
	                            </div>
	                        </div>
                    	</div>

						<div class="form-group row">
							<label class="col-sm-12 col-form-label">Examen Mental
								<textarea rows="3" class="form-control" id="examenmen_con" name="examenmen_con" placeholder="Examen Mental" required><?php echo $examenmen_con;?></textarea>
							</label>
						</div>
					</div>

					<div class="card" id="divantecedentes">
						<div class="card-header">
							Antecedentes
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-form-label">Personales
								<textarea rows="3" class="form-control" id="personales_ante" name="personales_ante" maxlength='250' placeholder="Antecedentes patológicos, quirurgicos, traumaticos, toxicoalérgicos, etc" required><?php echo $personales_ante;?></textarea>
							</label>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-form-label">Familiares
								<textarea rows="3" class="form-control" id="familiares_ante" name="familiares_ante" maxlength='250' placeholder="Antecedentes familiares" required><?php echo $familiares_ante;?></textarea>
							</label>
						</div>
					</div>

					<div class="card">
						<div class="card-header">
							Impresión Diagnóstica
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">CUPS de la Consulta</label>
							<div class="col-sm-10">
								<select class="form-control form-control-sm" id="id_cups" name="id_cups">
									<option value=""></option>
									<?php
										$sql="SELECT id_cups,descripcion_cups FROM vw_cups_profesional";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select> 								
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Finalidad</label>
							<div class="col-sm-4">
								<select class="form-control form-control-sm" id="finalidad_con" name="finalidad_con">
									<option value=""></option>
									<?php
										$sql="SELECT codi_det,descripcion_det FROM vw_finalidad_con";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select> 
							</div>
							<label class="col-sm-2 col-form-label">Causa Externa</label>
							<div class="col-sm-4">
								<select class="form-control form-control-sm" id="causaext_con" name="causaext_con">
									<option value=""></option>
									<?php
										$sql="SELECT codi_det,descripcion_det FROM vw_causa_exte";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select> 
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Análisis</label>
							<div class="col-sm-10">
								<textarea rows="3" class="form-control" id="analisis_con" name="analisis_con" maxlength='250' placeholder="Análisis" required><?php echo $analisis_con;?></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-1 col-form-label">Dx Principal</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="dxprinc" name="dxprinc" maxlength='80' placeholder="Digite el código CIE10 o la descripción" required> 
								<input type="hidden" class="form-control" id="dxprinc_con" name="dxprinc_con" required> 
							</div>
							<label class="col-sm-2 col-form-label">Tipo de Dx Principal</label>
							<div class="col-sm-2">
								<select class="form-control form-control-sm" id="tipodx_con" name="tipodx_con">
									<option value=""></option>
									<?php
										$sql="SELECT codi_det,descripcion_det FROM vw_tpdiagnostico";
										$result=mysqli_query($conexion,$sql);
										while($row=mysqli_fetch_row($result)){
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									?>
								</select> 
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Dx Relacionado 1</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="dxrela1" name="dxrela1" maxlength='80' placeholder="Digite el código CIE10 o la descripción" required>
								<input type="hidden" class="form-control" id="dxrela1_con" name="dxrela1_con">
							</div>                                    
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Dx Relacionado 2</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="dxrela2" name="dxrela2" maxlength='80' placeholder="Digite el código CIE10 o la descripción" required> 
								<input type="hidden" class="form-control" id="dxrela2_con" name="dxrela2_con"> 
							</div>                                    
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Dx Relacionado 3</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="dxrela3" name="dxrela3" maxlength='80' placeholder="Digite el código CIE10 o la descripción" required> 
								<input type="hidden" class="form-control" id="dxrela3_con" name="dxrela3_con"> 
							</div>                                    
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Descripción Clínica</label>
							<div class="col-sm-10">
								<textarea rows="3" class="form-control" id="descrip_clin_con" name="descrip_clin_con" maxlength='500' placeholder="Descripción Clínica" required></textarea>
							</div>                                    
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Pronóstico</label>
							<div class="col-sm-10">
								<textarea rows="3" class="form-control" id="pronostico_con" name="pronostico_con" maxlength='500' placeholder="Pronóstico" required></textarea>
							</div>                                    
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Recomendaciones</label>
							<div class="col-sm-10">
								<textarea rows="3" class="form-control" id="recomen_con" name="recomen_con" maxlength='500' placeholder="Recomendaciones" required></textarea>
							</div>                                    
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Observacion</label>
							<div class="col-sm-10">
								<textarea rows="3" class="form-control" id="observacion_con" name="observacion_con" maxlength='250' placeholder="Observacion" required></textarea>
							</div>                                    
						</div>						
					</div>

					<span class="btn btn-primary" title="Guardar" onclick="validar()" id="btn_guardar">
						Guardar <span class="fas fa-save"></span>
					</span>
			</form>
		</div>
	</div>
</body>

</html>


<script type="text/javascript">
	$().ready(function() {  
		$("#ocupacion").autocomplete("procesos/autocomp_ocupa.php", {
			width: 460,
			matchContains: false,
			mustMatch: false,
			selectFirst: false
		});
		$("#ocupacion").result(function(event, data, formatted) {
			$("#ocupacion_dp").val(data[1]);
		});

		$("#dxprinc").autocomplete("procesos/autocomp_cie.php", {
			width: 500,
			matchContains: false,
			mustMatch: false,
			selectFirst: false
		});
		$("#dxprinc").result(function(event, data, formatted) {
			$("#dxprinc_con").val(data[1]);
		});

		$("#dxrela1").autocomplete("procesos/autocomp_cie.php", {
			width: 500,
			matchContains: false,
			mustMatch: false,
			selectFirst: false
		});
		$("#dxrela1").result(function(event, data, formatted) {
			$("#dxrela1_con").val(data[1]);
		});

		$("#dxrela2").autocomplete("procesos/autocomp_cie.php", {
			width: 500,
			matchContains: false,
			mustMatch: false,
			selectFirst: false
		});
		$("#dxrela2").result(function(event, data, formatted) {
			$("#dxrela2_con").val(data[1]);
		});

		$("#dxrela3").autocomplete("procesos/autocomp_cie.php", {
			width: 500,
			matchContains: false,
			mustMatch: false,
			selectFirst: false
		});
		$("#dxrela3").result(function(event, data, formatted) {
			$("#dxrela3_con").val(data[1]);
		});

        $("#tipoiden_dp").val("<?php echo $tipoiden_dp;?>");
        $("#numeroiden_dp").val("<?php echo $numeroiden_dp;?>");
        $("#nombre_dp").val("<?php echo $nombre_dp;?>");
        $("#direccion_dp").val("<?php echo $direccion_dp;?>");
        $("#telefono_dp").val("<?php echo $telefono_dp;?>");
        $("#fechanac").val("<?php echo $fechanac_dp;?>");
        $("#genero_dp").val("<?php echo $genero_dp;?>");
        $("#etnia_dp").val("<?php echo $etnia_dp;?>");
        $("#ocupacion_dp").val("<?php echo $ocupacion_dp;?>");
        $("#ocupacion").val("<?php echo $ocupacion;?>");
        $("#niveleduc_dp").val("<?php echo $niveleduc_dp;?>");
        $("#estadociv_dp").val("<?php echo $estadociv_dp;?>");
        $("#tipovin_dp").val("<?php echo $tipovin_dp;?>");
        $("#zonares_dp").val("<?php echo $zonares_dp;?>");
		$("#tipoafil_dp").val("<?php echo $tipoafil_dp;?>");
		$("#grupopob_dp").val("<?php echo $grupopob_dp;?>");		
		$("#id_cups").val("<?php echo $id_cups;?>");
		$("#finalidad_con").val("<?php echo $finalidad_con;?>");
		$("#causaext_con").val("<?php echo $causaext_con;?>");		
		$("#dxprinc_con").val("<?php echo $dxprinc_con;?>");
		$("#dxrela1_con").val("<?php echo $dxrela1_con;?>");
		$("#dxrela2_con").val("<?php echo $dxrela2_con;?>");
		$("#dxrela3_con").val("<?php echo $dxrela3_con;?>");
		$("#tipodx_con").val("<?php echo $tipodx_con;?>");
		$("#descrip_clin_con").val("<?php echo $descrip_clin_con;?>");
		$("#pronostico_con").val("<?php echo $pronostico_con;?>");
		$("#recomen_con").val("<?php echo $recomen_con;?>");
		$("#observacion_con").val("<?php echo $observacion_con;?>");
		$("#dxprinc").val("<?php echo $dxprinc;?>");
		$("#dxrela1").val("<?php echo $dxrela1;?>");
		$("#dxrela2").val("<?php echo $dxrela2;?>");
		$("#dxrela3").val("<?php echo $dxrela3;?>");
		$("#tipoiden_acu").val("<?php echo $tipoiden_acu;?>");
		$("#numeroiden_acu").val("<?php echo $numeroiden_acu;?>");
		$("#nombre_acu").val("<?php echo $nombre_acu;?>");
		$("#direccion_acu").val("<?php echo $direccion_acu;?>");
		$("#telefono_acu").val("<?php echo $telefono_acu;?>");
		$("#parentesco_acu").val("<?php echo $parentesco_acu;?>");
		<?php
		if($control_con=='S'){
			?>
			$("#chk_control").attr('checked', true);
			<?php
		}
		?>
		mostrar();		
	});
	
</script>

<script language="javascript">
	//document.frm_consulta.id_cups.value='<?php echo $id_cups;?>';

	function validar(){
		err="";
		if(document.frm_consulta.tipoiden_dp.value==''){err+="Tipo de identificacion del paciente\n"}
		if(document.frm_consulta.numeroiden_dp.value==''){err+="Número de identificacion del paciente\n"}
		if(document.frm_consulta.nombre_dp.value==''){err+="Nombre del paciente\n"}
		if(document.frm_consulta.direccion_dp.value==''){err+="Direccion del paciente\n"}
		if(document.frm_consulta.telefono_dp.value==''){err+="Teléfono del paciente\n"}
		if(document.frm_consulta.fechanac.value==''){err+="Fecha de nacimiento\n"}
		if(document.frm_consulta.genero_dp.value==''){err+="Género\n"}
		if(document.frm_consulta.etnia_dp.value==''){err+="Pertenencia étnica\n"}
		if(document.frm_consulta.ocupacion_dp.value==''){err+="Ocupación\n"}
		if(document.frm_consulta.niveleduc_dp.value==''){err+="Nivel educativo\n"}
		if(document.frm_consulta.estadociv_dp.value==''){err+="Estado civil\n"}
		if(document.frm_consulta.tipovin_dp.value==''){err+="Tipo de vinculación\n"}
		if(document.frm_consulta.tipoafil_dp.value==''){err+="Tipo de afiliado\n"}
		if(document.frm_consulta.grupopob_dp.value==''){err+="Grupo poblacional\n"}
		if(document.frm_consulta.zonares_dp.value==''){err+="Zona de residencia\n"}
		if(document.frm_consulta.motivo_con.value==''){err+="Motivo de consulta\n"}
		if(document.frm_consulta.enfermedad_con.value==''){err+="Enfermedad actual\n"}
		if(document.frm_consulta.revisionsist_con.value==''){err+="Revisión por sistemas\n"}
		//if(document.frm_consulta.personales_ante.value==''){err+="Antecedentes personales\n"}
		//if(document.frm_consulta.familiares_ante.value==''){err+="Antecedentes familiares\n"}
		if(document.frm_consulta.id_cups.value==''){err+="CUPS de la consulta\n"}
		if(document.frm_consulta.finalidad_con.value==''){err+="Finalidad\n"}
		if(document.frm_consulta.causaext_con.value==''){err+="Causa externa\n"}
		if(document.frm_consulta.analisis_con.value==''){err+="Análisis\n"}
		if(document.frm_consulta.dxprinc_con.value==''){err+="Diagnóstico principal\n"}
		if(document.frm_consulta.tipodx_con.value==''){err+="Tipo de diagnóstico principal\n"}
		if(document.frm_consulta.dxrela1.value==''){document.frm_consulta.dxrela1_con.value="";}
		if(document.frm_consulta.dxrela2.value==''){document.frm_consulta.dxrela2_con.value="";}
		if(document.frm_consulta.dxrela3.value==''){document.frm_consulta.dxrela3_con.value="";}
		if(err!=''){
			alert('Para continuar debe completar la siguiente información:\n'+err);
		}
		else{
			document.frm_consulta.fechanac_dp.value=document.frm_consulta.fechanac.value;
			guardar()
		}
	}
	
	function guardar(){
		$(document).ready(function(){
			//$("#btn_guardar").click(function(){
				datos=$('#frm_consulta').serialize();

				$.ajax({
					type:"POST",
					data:datos,
					url:"procesos/agregarconsulta.php",
					success:function(r){
						if(r==1){
							alertify.success("Registro guardado");
							$('#frm_cita')[0].reset();
						}
						else{
							alertify.error("Error: Registro no guardado");
						}
					}
				});
			//});
		});
	}

	function mostrar(){
        if( $('#chk_control').attr('checked') ) {
            $(document).ready(function(){
                $('#anamnesis1').hide();
                $('#anamnesis2').show();
                $('#divantecedentes').hide();                
            });
        }
        else{
            $(document).ready(function(){
                $('#anamnesis1').show();
                $('#anamnesis2').hide();
                $('#divantecedentes').show();                
            });
        }
    }
</script>

<script type="text/javascript">	
    /*$(document).ready(function(){
        $("#tablaDataanamnesis").load("tablaanamnesis.php");
    });
    $(document).ready(function(){
        $("#tablaDataanteced").load("tablaantecedentes.php");
    });
    $(document).ready(function(){
        $("#tablaDatadx").load("tabladx.php");
    });
    $(document).ready(function(){
        $("#tablaDataplan").load("tablaplan.php");
    });*/
</script>
