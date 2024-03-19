
<?php
	/**
	 * Conexion a la BD
	 */
	class conectar{
		public function conexion(){
			$conexion=mysqli_connect('localhost','root','654321','medinet_v2');
			//$conexion=mysqli_connect('localhost','root','','medinet_v2');
			mysqli_set_charset($conexion,"utf8");
			return $conexion;
		}
	}

?>