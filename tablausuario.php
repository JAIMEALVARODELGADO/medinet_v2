<?php
require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();
$sql="SELECT id_persona,valor_det,numero_iden_per,nombre,direccion_per,telefono_per,email_per,profesion_usu,registro_usu,cargo_usu,estado_usu,IF(estado_usu='A','Activo','Inactivo') AS estado
FROM vw_usuario";
//echo "<br>".$sql;
$result=mysqli_query($conexion,$sql)
?>

<div>	
	<table class="table table-hover table-sm table-bordered font13" id="tablausuario">
		<thead style="background-color: #2574a9;color: white; font-weight: bold;">
			<tr>
				<td>Tp Iden.</td>
				<td>Número</td>
				<td>Nombre</td>				
				<td>Dirección</td>
				<td>Teléfono</td>
				<td>E-Mail</td>
				<td>Profesion</td>
				<td>Registro</td>
				<td>Activo</td>
				<td>Editar</td>
				<td>Menú</td>
			</tr>
		</thead>

		<tbody style="background-color: white">
			<?php
			while($row=mysqli_fetch_row($result)){
				if($row[10]=='A')
					{$chequeado='checked';}
				else
					{$chequeado='';}
				//$chequeado='checked';
				//echo $chequeado;
				?>
				<tr>
					<td><?php echo $row[1];?></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[3];?></td>					
					<td><?php echo $row[4];?></td>
					<td><?php echo $row[5];?></td>
					<td><?php echo $row[6];?></td>
					<td><?php echo $row[7];?></td>
					<td><?php echo $row[8];?></td>
					<td><input type="checkbox" <?php echo $chequeado;?> onclick="cambiarestado('<?php echo $row[0]?>')"></td>
					
					<td style="text-align: center;">
						<span class="btn btn-warning btn.sm" data-toggle="modal" data-target="#modaleditarusuario" title="Editar El Registro" onclick="FrmActualizar('<?php echo $row[0]?>')">
							<span class="far fa-edit"></span>
						</span>
					</td>
					<td style="text-align: center;">
						<?php
							if($row[10]=='A'){
								?>
									<span class="btn btn-info btn.sm" title="Autorizaciones del Menú" onclick="go_menu('<?php echo $row[0]?>')">
										<span class="fas fa-address-card"></span>
									</span>
								<?php
							}
							else{
								?>
									<span class="btn btn-secondary btn.sm" title="Autorizaciones del Menú">
										<span class="fas fa-address-card"></span>
									</span>
								<?php
							}
						?>
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
		$('#tablausuario').DataTable();
	} );
</script>