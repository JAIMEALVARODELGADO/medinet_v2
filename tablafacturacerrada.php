<?php
session_start();
require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();

$sql="SELECT id_factura, numero_fac, SUBSTR(fecha_fac,1,10), numero_iden_per, nombre_pac, numero_conv, nombre_eps,valorneto_fac,esta_fac FROM vw_factura WHERE ".$_SESSION['gcondicion']." ORDER BY fecha_fac";
//echo "<br>".$sql;
$result=mysqli_query($conexion,$sql);
?>

<div>
	<table class="table table-hover table-sm table-bordered font13" id="tablafactura">
		<thead style="background-color: #2574a9;color: white; font-weight: bold;">
			<tr>
				<td>Imprimir</td>
				<td>Numero</td>
				<td>Fecha</td>
				<td>Identificacion</td>
				<td>Paciente</td>
				<td>EPS</td>
				<td>Convenio</td>
				<td>Valor Neto</td>
				<td>Anular</td>				
			</tr>
		</thead>
		
		<tbody style="background-color: white">
			<?php
			while($row=mysqli_fetch_row($result)){
				?>
				<tr>
					<td style="text-align: center;">
						<span class="btn btn-success btn.sm" title="Imprimir" onclick="imprimir('<?php echo $row[0]?>')">
							<i class="fas fa-print"></i></span>
						</span>
					</td>

					<td><?php echo $row[1];?></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[3];?></td>
					<td><?php echo $row[4];?></td>
					<td><?php echo $row[6];?></td>
					<td><?php echo $row[5];?></td>
					<td align="right"><?php echo number_format($row[7],2,'.',',');?></td>					
					<td style="text-align: center;">
						<?php
							if($row[8]=='N'){
								?>
								<span class="btn btn-secondary btn.sm" title="Anular la factura">
								<i class="fas fa-minus-square"></i>
								</span>
								<?php
							}
							else{
								?>
								<span class="btn btn-danger btn.sm" title="Anular la factura" onclick="anular('<?php echo $row[0]?>','<?php echo $row[3]?>')">
								<i class="fas fa-minus-square"></i>
								</span>
								<?php
							}
						;?>
					</td>
				<?php
			}
			?>
		</tbody>
		
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tablafactura').DataTable();
	} );
</script>