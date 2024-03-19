<?php
/**
 * crud
 */
class crudcupsprof{
	
	public function agregar($datos){
		$obj=new conectar();
		$conexion=$obj->conexion();

		$sql="INSERT INTO cups_profesional (id_persona,id_cups,estado_cprof)
		VALUES ('$datos[0]','$datos[1]','A')";
		//echo $sql;
		return mysqli_query($conexion,$sql);
	}

	public function obtenDatos($idcupsprof){
		$obj=new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT idcups_prof,id_cups,id_persona,descripcion_cups FROM vw_cups_profesional WHERE idcups_prof='$idcupsprof'";
		//echo $sql;
		$row=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($row);
		$datos=array(
			'idcups_prof' => $ver[0],
			'id_cups' => $ver[1], 
			'id_persona' => $ver[2],
			'descripcion_cups' => $ver[3]
			);
		return $datos;
	}

	public function actualizar($datos){
		$obj=new conectar();
		$conexion=$obj->conexion();

		$sql="UPDATE cups_profesional SET id_cups='$datos[1]' WHERE idcups_prof='$datos[0]'";
		//echo $sql;
		return mysqli_query($conexion,$sql);
	}

	public function cambiarestado($idcupsprof){
		$obj=new conectar();
		$conexion=$obj->conexion();
		$estado="A";
		$conestado="SELECT estado_cprof FROM cups_profesional WHERE idcups_prof='$idcupsprof'";
		//echo $conestado;
		$conestado=mysqli_query($conexion,$conestado);
		$rowest=mysqli_fetch_row($conestado);
		if($rowest[0]=='A'){
			$estado="I";
		}
		else{
			$estado="A";
		}
		$sql="UPDATE cups_profesional SET estado_cprof='$estado' WHERE idcups_prof='$idcupsprof'";
		//echo $sql;
		return mysqli_query($conexion,$sql);
	}
}
?>
