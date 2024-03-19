
<?php
require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();
$sql="SELECT id_medicamento,codigoatc_mto,nombre_mto,estado_mto FROM medicamento ORDER BY nombre_mto";
//echo "<br>".$sql;
$result=mysqli_query($conexion,$sql)
?>

<div>
	<table class="table table-hover table-sm table-bordered font13" id="tablamed">
		<thead style="background-color: #2574a9;color: white; font-weight: bold;">
			<tr>
				<td>Código ATC</td>
				<td>Nombre</td>
				<td>Activo</td>				
				<td>Editar</td>				
			</tr>
		</thead>

		<tbody style="background-color: white">
			<?php
			while($row=mysqli_fetch_row($result)){
				if($row[3]=='A')
					{$chequeado='checked';}
				else
					{$chequeado='';}
				?>
				<tr>
					<td><?php echo $row[1];?></td>
					<td><?php echo $row[2];?></td>
					<td><input type="checkbox" <?php echo $chequeado;?> onclick="cambiarestado('<?php echo $row[0]?>')"></td>
					
					<td style="text-align: center;">
						<span class="btn btn-warning btn.sm" data-toggle="modal" data-target="#modaleditarmed" title="Editar El Registro" onclick="FrmActualizar('<?php echo $row[0]?>')">
							<span class="far fa-edit"></span>
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
		//$('#tablamed').DataTable();
	} );
</script>