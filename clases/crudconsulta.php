<?php
session_start();

class crudconsulta{
	
	public function agregar($datos){
		$guardado=0;
		$obj=new conectar();
		$conexion=$obj->conexion();

		$conhis="SELECT id_con FROM consulta WHERE id_agc='$_SESSION[gid_agc]'";
		//echo "<br>".$conhis;
		$conhis=mysqli_query($conexion,$conhis);
		if(mysqli_num_rows($conhis)==0){
			$dxrel1=0;
		    $dxrel2=0;
		    $dxrel3=0;
		    if(!empty($datos[32])){$dxrel1=$datos[32];}
		    if(!empty($datos[33])){$dxrel2=$datos[33];}
		    if(!empty($datos[34])){$dxrel3=$datos[34];}

			$sql="INSERT INTO consulta (id_agc,motivo_con,enfermedad_con,revisionsist_con,id_cups,finalidad_con,causaext_con,analisis_con,dxprinc_con,dxrela1_con,dxrela2_con,dxrela3_con,tipodx_con,descrip_clin_con,pronostico_con,recomen_con,observacion_con,examenmen_con,id_profesional,control_con,subjetivo_con,objetivo_con) VALUES('$_SESSION[gid_agc]', '$datos[21]', '$datos[22]', '$datos[23]', '$datos[26]', '$datos[27]', '$datos[28]', '$datos[29]', '$datos[30]', $dxrel1, $dxrel2, $dxrel3, '$datos[31]', '$datos[35]','$datos[36]','$datos[37]','$datos[38]','$datos[39]','$_SESSION[gusuario_log]','$datos[40]','$datos[41]','$datos[42]')";

			//echo "<br>".$sql;
			$guardado=mysqli_query($conexion,$sql);
			$id_con=mysqli_insert_id($conexion);

			$sql="UPDATE agenda_cita SET estado_agc='En Atencion' WHERE id_agc='$_SESSION[gid_agc]'";
			mysqli_query($conexion,$sql);

			$sql="INSERT INTO consulta_dpersonales(id_con, tipoiden_dp, numeroiden_dp, nombre_dp, fechanac_dp, genero_dp, direccion_dp, telefono_dp, etnia_dp, ocupacion_dp, niveleduc_dp, estadociv_dp, tipovin_dp, tipoafil_dp, grupopob_dp, zonares_dp) VALUES('$id_con', '$datos[0]', '$datos[1]', '$datos[2]', '$datos[5]', '$datos[6]', '$datos[3]', '$datos[4]', '$datos[7]', '$datos[8]', '$datos[9]', '$datos[10]', '$datos[11]', '$datos[12]', '$datos[13]', '$datos[14]')";
			//echo "<br>".$sql;
			mysqli_query($conexion,$sql);

			$sql="INSERT INTO consulta_acudiente(id_con, tipoiden_acu, numeroiden_acu, nombre_acu, direccion_acu, telefono_acu, parentesco_acu) VALUES('$id_con', '$datos[15]', '$datos[16]', '$datos[17]', '$datos[18]', '$datos[19]', '$datos[20]')";
			//echo "<br>".$sql;
			mysqli_query($conexion,$sql);
			
			if(!empty($datos[24]) OR !empty($datos[25])){
				$sql="INSERT INTO consulta_antecedentes(id_con,personales_ante,familiares_ante) VALUES('$id_con','$datos[24]','$datos[25]')";
				//echo "<br>".$sql;
				mysqli_query($conexion,$sql);
			}
		}
		else{			
			$row=mysqli_fetch_row($conhis);
			$id_con=$row[0];			
			$dxrel1=0;
		    $dxrel2=0;
		    $dxrel3=0;
		    if(!empty($datos[32])){$dxrel1=$datos[32];}
		    if(!empty($datos[33])){$dxrel2=$datos[33];}
		    if(!empty($datos[34])){$dxrel3=$datos[34];}

			$sql="UPDATE consulta SET motivo_con='$datos[21]',
			enfermedad_con='$datos[22]',
			revisionsist_con='$datos[23]',
			id_cups='$datos[26]',
			finalidad_con='$datos[27]',
			causaext_con='$datos[28]',
			analisis_con='$datos[29]',
			dxprinc_con='$datos[30]',
			dxrela1_con='$dxrel1',
			dxrela2_con='$dxrel2',
			dxrela3_con='$dxrel3',
			tipodx_con='$datos[31]',
			descrip_clin_con='$datos[35]',
			pronostico_con='$datos[36]',
			recomen_con='$datos[37]',
			observacion_con='$datos[38]',
			examenmen_con='$datos[39]',
			control_con='$datos[40]',
			subjetivo_con='$datos[41]',
			objetivo_con='$datos[42]'
			WHERE id_con='$id_con'";

			//echo "<br>".$sql;
			$guardado=mysqli_query($conexion,$sql);

			$sql="UPDATE consulta_dpersonales SET tipoiden_dp='$datos[0]',
			 numeroiden_dp='$datos[1]', 
			 nombre_dp='$datos[2]',
			  fechanac_dp='$datos[5]', 
			  genero_dp='$datos[6]', 
			  direccion_dp='$datos[3]', 
			  telefono_dp='$datos[4]', 
			  etnia_dp='$datos[7]', 
			  ocupacion_dp='$datos[8]', 
			  niveleduc_dp='$datos[9]', 
			  estadociv_dp='$datos[10]', 
			  tipovin_dp='$datos[11]', 
			  tipoafil_dp='$datos[12]', 
			  grupopob_dp='$datos[13]', 
			  zonares_dp='$datos[14]'
			  WHERE id_con='$id_con'";
			//echo "<br>".$sql;
			mysqli_query($conexion,$sql);

			$sql="UPDATE consulta_acudiente SET tipoiden_acu='$datos[15]', 
			numeroiden_acu='$datos[16]', 
			nombre_acu='$datos[17]', 
			direccion_acu='$datos[18]', 
			telefono_acu='$datos[19]', 
			parentesco_acu='$datos[20]'
			WHERE id_con='$id_con'";
			//echo "<br>".$sql;
			mysqli_query($conexion,$sql);

			if(!empty($datos[24]) OR !empty($datos[25])){
				$sql="UPDATE consulta_antecedentes SET personales_ante='$datos[24]',familiares_ante='$datos[25]' WHERE id_con='$id_con'";
				//echo "<br>".$sql;
				mysqli_query($conexion,$sql);
			}
		}
		return ($guardado);
	}

	public function cerrarhistoria($datos){
		$obj=new conectar();
		$conexion=$obj->conexion();
		$guardado=0;
		$sql="UPDATE agenda_cita SET estado_agc='Cumplida' WHERE id_agc='$_SESSION[gid_agc]'";
		//echo $sql;
		mysqli_query($conexion,$sql);

		$sql="UPDATE consulta SET estado_con='C' WHERE id_con='$datos[0]'";
		//echo $sql;
		$guardado=mysqli_query($conexion,$sql);
		return $guardado;
	}

	public function inasistencia($datos){
		$obj=new conectar();
		$conexion=$obj->conexion();
		$guardado=0;
		$sql="UPDATE agenda_cita SET estado_agc='Inasistencia' WHERE id_agc='$datos[0]'";
		//echo $sql;
		$guardado=mysqli_query($conexion,$sql);
		return $guardado;
	}
}
?>
