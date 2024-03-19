<?php
session_start();
/**
 * crud
 */
class crudcertificado{
	
	public function agregar($datos){
		$obj=new conectar();
		$conexion=$obj->conexion();

		$sql="INSERT INTO certificacion (id_persona,detalle_certi,id_operador)
		VALUES ('$datos[0]','$datos[1]','$_SESSION[gusuario_log]')";
		//echo $sql;
		return mysqli_query($conexion,$sql);
	}

	public function obtenDatos($idcertificacion){
		$obj=new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT certificacion.id_certificacion, certificacion.detalle_certi FROM certificacion 
			WHERE id_certificacion='$idcertificacion'";
		$row=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($row);
		$datos=array(
			'id_certificacion' => $ver[0],
			'detalle_certi' => $ver[1]
			);
		return $datos;
	}

	public function actualizar($datos){
		$obj=new conectar();
		$conexion=$obj->conexion();

		$sql="UPDATE certificacion SET detalle_certi='$datos[1]' WHERE id_certificacion='$datos[0]'";
		//echo $sql;
		return mysqli_query($conexion,$sql);
	}

}
?>
