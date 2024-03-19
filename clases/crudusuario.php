<?php
session_start();
/**
 * crud
 */
class crudusuario{
	
	public function agregar($datos){
		$obj=new conectar();
		$conexion=$obj->conexion();
		$idcon=0;
		$guardado=0;		
		$sql="INSERT INTO usuario(id_persona, login_usu, password_usu, profesion_usu, registro_usu, cargo_usu, agendar_usu, estado_usu) VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','A')";
		//echo $sql;
		$guardado=mysqli_query($conexion,$sql);
		return $guardado;
	}

	public function obtenDatos($idusu){
		$obj=new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT id_persona,login_usu,password_usu,profesion_usu,registro_usu,cargo_usu,agendar_usu FROM usuario WHERE id_persona='$idusu'";
		//echo $sql;
		$row=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($row);
		$datos=array(
			'id_persona' => $ver[0],
			'login_usu' => $ver[1],
			'password_usu' => $ver[2],
			'profesion_usu' => $ver[3], 
			'registro_usu' => $ver[4], 
			'cargo_usu' => $ver[5], 
			'agendar_usu' => $ver[6]
			);
		return $datos;
	}

	public function actualizar($datos){
		$obj=new conectar();
		$conexion=$obj->conexion();
		if($datos[2]<>$datos[3]){
			$passw=sha1($datos[2]);
			$sql="UPDATE usuario SET password_usu='$passw' WHERE id_persona='$datos[0]'";
			//echo $sql;
			mysqli_query($conexion,$sql);
		}

		$sql="UPDATE usuario SET login_usu='$datos[1]', profesion_usu='$datos[4]', registro_usu='$datos[5]', cargo_usu='$datos[6]', agendar_usu='$datos[7]' WHERE id_persona='$datos[0]'";
		//echo $sql;
		return mysqli_query($conexion,$sql);
	}

	public function cambiarestado($idusu){
		$obj=new conectar();
		$conexion=$obj->conexion();
		$estado="A";
		$conestado="SELECT estado_usu FROM usuario WHERE id_persona='$idusu'";
		//echo $conestado;
		$conestado=mysqli_query($conexion,$conestado);
		$rowest=mysqli_fetch_row($conestado);
		if($rowest[0]=='A'){
			$estado="I";
		}
		else{
			$estado="A";
		}
		$sql="UPDATE usuario SET estado_usu='$estado' WHERE id_persona='$idusu'";
		//echo $sql;
		return mysqli_query($conexion,$sql);
	}
}
?>
