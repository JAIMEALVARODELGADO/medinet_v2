<?php
/**
 * crud
 */
class crudmenu{
	public function actualizar($datos){
		$obj=new conectar();
		$conexion=$obj->conexion();

		$consmenu="SELECT id_musu FROM menu_usuario WHERE id_persona='$datos[1]' AND id_menu='$datos[0]'";
		//echo $consmenu;
		$consmenu=mysqli_query($conexion,$consmenu);
		if(mysqli_num_rows($consmenu)==0){
			$sql="INSERT INTO menu_usuario(id_persona,id_menu) VALUES ('$datos[1]','$datos[0]')";
		}
		else{
			$row=mysql_fetch_row($consmenu);
			$sql="DELETE FROM menu_usuario WHERE id_musu=$row[0]";	
		}		
		//echo $sql;
		return mysqli_query($conexion,$sql);
	}
}
?>
