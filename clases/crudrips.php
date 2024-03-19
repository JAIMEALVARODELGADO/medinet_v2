<?php
session_start();
/**
 * crud
 */
class crudrips{	

	public function obtenDatos($idripsac){
		$obj=new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT id_ripsac, fechacon_rac, numeroauto_rac, codigocon_rac,finalidad_rac,causaexte_rac,dxprincipal_rac,dxrel1_rac,dxrel2_rac,dxrel3_rac,tipodxprin_rac,valorcon_rac,valorcmode_rac FROM rips_ac WHERE id_ripsac='$idripsac'";
		//echo $sql;
		$row=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($row);
		$datos=array(
			'id_ripsac' => $ver[0],
			'fechacon_rac' => $ver[1], 
			'numeroauto_rac' => $ver[2], 
			'codigocon_rac' => $ver[3], 
			'finalidad_rac' => $ver[4], 
			'causaexte_rac' => $ver[5], 
			'dxprincipal_rac' => $ver[6],
			'dxrel1_rac' => $ver[7],
			'dxrel2_rac' => $ver[8],
			'dxrel3_rac' => $ver[9],
			'tipodxprin_rac' => $ver[10],
			'valorcon_rac' => $ver[11],
			'valorcmode_rac' => $ver[12],
			);
		return $datos;
	}

	public function actualizar($datos){
		$obj=new conectar();
		$conexion=$obj->conexion();

		$sql="UPDATE rips_ac SET fechacon_rac='$datos[1]',numeroauto_rac='$datos[2]',codigocon_rac='$datos[3]',finalidad_rac='$datos[4]',causaexte_rac='$datos[5]',dxprincipal_rac='$datos[6]',dxrel1_rac='$datos[7]',dxrel2_rac='$datos[8]',dxrel3_rac='$datos[9]',tipodxprin_rac='$datos[10]',valorcon_rac='$datos[11]',valorcmode_rac='$datos[12]' WHERE id_ripsac='$datos[0]'";
		 //echo $sql;
		return mysqli_query($conexion,$sql);
	}

	public function generarrips($idccob){
		$obj=new conectar();
		$conexion=$obj->conexion();
		$guardado=0;
		$consdet="SELECT id_detfac,id_factura, numero_fac, fecha_fac, id_ccobro, id_con, tipo_cdet, codigo_cdet, cantidad_detfac, valor_unit_detfac FROM vw_factura_detalle WHERE id_ccobro='$idccob' AND tipo_cdet='AC'";	
		//echo $consdet;
		$consdet=mysqli_query($conexion,$consdet);
		while($rowdet=mysqli_fetch_row($consdet)){			
			//echo "<br>".$rowdet[0];
			$conrips="SELECT id_ripsac FROM rips_ac WHERE id_detfac='$rowdet[0]'";
			//echo "<br>".$conrips;
			$conrips=mysqli_query($conexion,$conrips);
			if(mysqli_num_rows($conrips)==0){
				$fecha_con=$rowdet[3];
				$finalidad_cod='10';
				$causaext_cod='13';
				$dxprinc_cod='';
				$dxrel1_cod='';
				$dxrel2_cod='';
				$dxrel3_cod='';
				$tipodx_cod='';
				$cantidad_detfac=$rowdet[8];			
				if(!is_null($rowdet[5])){
					$conshis="SELECT SUBSTR(fecha_con,1,10) AS fecha_con, finalidad_cod, causaext_cod, dxprinc_cod, dxrel1_cod, dxrel2_cod, dxrel3_cod, tipodx_cod FROM vw_consulta WHERE id_con='$rowdet[5]'";
					//echo "<br>".$conshis;
					$conshis=mysqli_query($conexion,$conshis);
					$rowhis=mysqli_fetch_row($conshis);
					$fecha_con=$rowhis[0];
					$finalidad_cod=$rowhis[1];
					$causaext_cod=$rowhis[2];
					$dxprinc_cod=$rowhis[3];
					$dxrel1_cod=$rowhis[4];
					$dxrel2_cod=$rowhis[5];
					$dxrel3_cod=$rowhis[6];
					$tipodx_cod=$rowhis[7];
				}
				for($c=1;$c<=$cantidad_detfac;$c++){
					$sql="INSERT INTO rips_ac(id_ccobro,id_detfac,fechacon_rac,numeroauto_rac,codigocon_rac,finalidad_rac,causaexte_rac,dxprincipal_rac,dxrel1_rac,dxrel2_rac,dxrel3_rac,tipodxprin_rac,valorcon_rac,valorcmode_rac)
					VALUES('$idccob','$rowdet[0]','$fecha_con','','$rowdet[7]','$finalidad_cod','$causaext_cod','$dxprinc_cod','$dxrel1_cod','$dxrel2_cod','$dxrel3_cod','$tipodx_cod','$rowdet[9]','0')";
					//echo "<br>".$sql;
					$guardado=mysqli_query($conexion,$sql);
				}
			}
		}
		return $guardado;
	}

	public function eliminar($idripsac){
		$obj=new conectar();
		$conexion=$obj->conexion();

		$sql="DELETE FROM rips_ac WHERE id_ripsac='$idripsac'";
		return mysqli_query($conexion,$sql);
	}
}
?>
