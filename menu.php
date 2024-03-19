<?php
require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();    
?>

        <ul class="nav nav-pills" style="background-color:#024b83">
            <li class="nav-item">
                <a class="nav-link  btn-secondary"  href="inicio.php" role="button" aria-haspopup="true" aria-expanded="false">Inicio</a>                
            </li>
            <?php
                $consmenu="SELECT id_menu,opcion_menu,url_menu FROM menu WHERE nivel_menu='1' ORDER BY orden_menu";
                //echo $consmenu;
                $consmenu=mysqli_query($conexion,$consmenu);
                while ($rowmenu=mysqli_fetch_array($consmenu)){
                    //echo "<br>".$rowmenu['opcion_menu'];
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn-secondary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $rowmenu['opcion_menu'];?></a>
                            
                                <?php
                                $consubmenu="SELECT opcion_menu,url_menu FROM vw_menu WHERE dependencia_menu='$rowmenu[id_menu]' AND id_persona='$_SESSION[gusuario_log]' ORDER BY orden_menu";
                                //echo $consubmenu;
                                $consubmenu=mysqli_query($conexion,$consubmenu);
                                if(mysqli_num_rows($consubmenu)<>0){
                                    echo "<div class='dropdown-menu'>";
                                    while($rowsub=mysqli_fetch_array($consubmenu)){
                                        echo "<a class='dropdown-item' href='$rowsub[url_menu]'>$rowsub[opcion_menu]</a>";
                                    }
                                    echo "</div>";
                                }
                                ?>                            
                        </li>
                    <?php
                }

            ?>
            <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn-secondary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admisiones</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="mn_persona1.php">Personas</a>

                    <div class="dropdown-divider"></div>
                    
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn-secondary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Agenda</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="mn_cita1.php">Citas</a>
                    <a class="dropdown-item" href="mn_horario1.php">Horarios</a>
                    <a class="dropdown-item" href="mn_cita2.php">Asignar Cita sin Agenda</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn-secondary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Historia</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="mn_consu1.php">Pacientes Agendados</a>
                    <a class="dropdown-item" href="mn_consu2.php">Consultar Historias</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn-secondary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Facturación</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="mn_factura1.php">Factura</a>
                    <a class="dropdown-item" href="mn_convenio1.php">Convenios</a>
                    <a class="dropdown-item" href="mn_cuentacobro1.php">Cuenta de Cobro</a>                    
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn-secondary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administracion</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="mn_eps1.php">EPS</a>
                    <a class="dropdown-item" href="mn_cie1.php">CIE</a>
                    <a class="dropdown-item" href="mn_cups1.php">CUPS</a>
                    <a class="dropdown-item" href="mn_cups_prof1.php">CUPS por Profesional</a>
                    <a class="dropdown-item" href="mn_medicamento1.php">Medicamentos</a>
                    <a class="dropdown-item" href="mn_concepto1.php">Conceptos</a>
                    <a class="dropdown-item" href="mn_ocupacion1.php">Ocupaciones(CIUO)</a>          
                    <a class="dropdown-item" href="mn_usuario1.php">Usuarios del Sistema</a>
                    <a class="dropdown-item" href="mn_entidad1.php">Configuración</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn-secondary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Informes</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="mn_inf_consulta1.php">Consultas</a>
                    <a class="dropdown-item" href="mn_inf_cita1.php">Citas</a>
                    <a class="dropdown-item" href="mn_inf_factura1.php">Facturas</a>                    
                </div>
            </li>-->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn-secondary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Ayuda</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="mn_acercade.php" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;">Acerca de Medinet</a>
                    <a class="dropdown-item" href="mn_manual.php" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=700'); return false;">Manual de Usuario</a>                    
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link btn-secondary" href="index.php">Salir</a>                
            </li>
        </ul>
