<?php
require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();

$sql="SELECT id_certificacion,nombre,tipo_iden,numero_iden_per,fecha_reg
FROM vw_certificado";
//echo "<br>".$sql;
$result=mysqli_query($conexion,$sql)
?>

<div>
	<table class="table table-hover table-sm table-bordered font13" id="tablapersona">
		<thead style="background-color: #2574a9;color: white; font-weight: bold;">
			<tr>
				<td>Tp Iden.</td>
				<td>Número</td>
				<td>Nombre</td>
				<td>Fecha Registro</td>
				<td>Editar</td>
				<td>Imprimir</td>
			</tr>
		</thead>

		<tbody style="background-color: white">
			<?php
			while($row=mysqli_fetch_row($result)){
				?>
				<tr>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[3];?></td>
					<td><?php echo $row[1];?></td>
					<td><?php echo $row[4];?></td>
					<td style="text-align: center;">
						<span class="btn btn-warning btn.sm" data-toggle="modal" data-target="#modalEditar" title="Editar El Registro" onclick="agregaFrmActualizar('<?php echo $row[0]?>')">
							<span class="far fa-edit"></span>
						</span>
					</td>
					<td style="text-align: center;">
						<span class="btn btn-success btn.sm" title="Imprimir Certificado" onclick="imprimir('<?php echo $row[0]?>')">
							<span class="fas fa-paste"></span>
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
		//$('#tablapersona').DataTable();
	} );
</script>