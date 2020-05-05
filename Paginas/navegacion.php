<aside class="main-sidebar skin-green-light">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar skin-green-light">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="Public/img/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <?php
                echo '<p>'.$_SESSION['nombre'].'</p>';
                echo '<a href="#">' . $_SESSION['tipoUsuario'] . '</a>';
            ?>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <!--ENCABEZADO-->
            <li class="header"> <center> <strong> ADMINISTRACION </strong> </center> </li>

            <!--OPCION DE DASHBOARD-->
            <li>
                <a href="inicio.php?action=dashboard" style="color: #ff4d00;">
                <i class="fas fa-chart-line"></i> <span>Inicio</span>
                </a>
            </li> 

            <!--OPCION DE CONSOLAS-->
            <li class="treeview">
                <a href="#" style="color:#ff00ff;">
                <i class="fas fa-compact-disc"></i>
                    <span>Consolas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="inicio.php?action=consolas">
                            
                            <i class="far fa-list-alt"></i> Lista de Consolas
                        </a>
                    </li>
                    <li active>
                        <a href="inicio.php?action=agregar_consola">
                            <i class="fas fa-plus"></i> Agregar consola
                        </a>
                    </li>
                </ul>
            </li>

            <!-- OPCION DE SOCIOS GAMERS -->
            <li class="treeview">
                <a href="#" style="color: #00ff88;">
                    <i class="fas fa-users"></i>
                    <span>Socios Gamers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="inicio.php?action=gamers">
                            
                            <i class="far fa-list-alt"></i> Lista de socios
                        </a>
                    </li>
                    <li active>
                        <a href="inicio.php?action=agregar_gamers">
                            <i class="fas fa-plus"></i> Agregar socio
                        </a>
                    </li>
                </ul>
            </li>

            <!-- OPCION DE JUEGOS -->
            <li class="treeview">
                <a href="#" style="color:#00a2ff;">
                    <i class="fas fa-gamepad"></i>
                    <span>Juegos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="inicio.php?action=juegos">
                            
                            <i class="far fa-list-alt"></i> Lista de juegos
                        </a>
                    </li>
                    <li active>
                        <a href="inicio.php?action=agregar_juego">
                            <i class="fas fa-plus"></i> Agregar juego
                        </a>
                    </li>
                </ul>
            </li>

            

            <!-- OPCION DE SOCIOS GAMERS -->
            <li class="treeview">
                <a href="#" style="color: #00ff88;">
                    <i class="fas fa-users"></i>
                    <span>Torneos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="inicio.php?action=torneos">
                            
                            <i class="far fa-list-alt"></i> Lista de socios
                        </a>
                    </li>
                    <li active>
                        <a href="inicio.php?action=agregar_torneos">
                            <i class="fas fa-plus"></i> Agregar socio
                        </a>
                    </li>
                </ul>
            </li>

            <li>
            <a  href="inicio.php?action=salir" style="color:#9008ff;">
            <i class="fas fa-power-off"></i> <span>Cerrar Sesion</span>
            </a>
            </li>

        </ul>
    </section>
</aside>