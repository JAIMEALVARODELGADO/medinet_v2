<?php
session_start();
require_once "clases/conexion.php";
require_once "procesos/mn_funciones.php";
$obj=new conectar();
$conexion=$obj->conexion();

$fechaini=cambiafecha(hoy()).' 00:00';
$fechafin=cambiafecha(hoy()).' 23:59';
$sql="SELECT id_con,fecha_con,numeroiden_dp,nombre_dp,nombre_prof,estado_con
FROM vw_consulta 
WHERE $_SESSION[gcondicion] ORDER BY fecha_con";
//fecha_con between '2018-10-01' AND '2018-11-30'
//echo "<br>".$sql;
$result=mysqli_query($conexion,$sql)
?>

<div>
	<table class="table table-hover table-sm table-bordered font13" id="tablaagenda">
		<thead style="background-color: #2574a9;color: white; font-weight: bold;">
			<tr>				
				<td>Fecha</td>
				<td>Identificación</td>
				<td>Nombre</td>
				<td>Profesional</td>
				<td>Estado</td>
				<td>Opciones</td>
			</tr>
		</thead>

		<tbody style="background-color: white">
			<?php
			while($row=mysqli_fetch_row($result)){
				?>
				<tr>					
					<td><?php echo $row[1];?></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[3];?></td>
					<td><?php echo $row[4];?></td>
					<td><?php echo $row[5];?></td>					
					<td style="text-align: center;">
						<span class="btn btn-success btn.sm" title="Imprimir Historia" onclick="imprimir('<?php echo $row[0]?>')">
							<span class="fas fa-paste"></span>
						</span>
						<span class="btn btn-success btn.sm" title="Imprimir Formula" onclick="imprimirformula('<?php echo $row[0]?>')">									
							<span class="fas fa-pills"></span>
						</span>
						<span class="btn btn-success btn.sm" title="Imprimir Ordenes" onclick="imprimirorden('<?php echo $row[0]?>')">									
							<i class="fas fa-file-invoice"></i>
						</span>
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
		
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tablaagenda').DataTable();
	} );
</script>
