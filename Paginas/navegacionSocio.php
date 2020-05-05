<aside class="main-sidebar">
    <section class="sidebar">
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

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"> <center> <strong> SOCIO </strong> </center> </li>

            <li>
                <a href="inicio.php?action=dashboard_socio">
                    <i class="fa fa-th"></i> <span> Inicio </span>
                </a>
            </li> 
            

            <li>
                <a href="inicio.php?action=torneos_disponibles">
                    <i class="fas fa-trophy"></i> <span>Torneos Disponibles</span>
                </a>
            </li>

            <li >
            <a href="inicio.php?action=mis_torneos">
                <i class="fas fa-award"></i> <span>Mis torneos</span>
            </a>
            </li>

            <li>
                <a  href="inicio.php?action=salir">
                    <i class="fas fa-power-off"></i> <span>Cerrar Sesion</span>
                </a>
            </li>
        </ul>


            




            

        

    </section>
</aside>