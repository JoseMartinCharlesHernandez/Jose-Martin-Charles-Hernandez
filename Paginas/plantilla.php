<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Proyecto Web </title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="Public/img/logo.jpg">
        <link rel="stylesheet" href="Public/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link rel="stylesheet" href="Public/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="Public/css/AdminLTE.min.css">
        <link rel="stylesheet" href="Public/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="Public/bower_components/morris.js/morris.css">
        <link rel="stylesheet" href="Public/bower_components/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="Public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="Public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="Public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="Public/plugins/iCheck/all.css">
        <link rel="stylesheet" href="Public/bower_components/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="Public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="Public/plugins/timepicker/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="Public/css/AdminLTE.min.css">   
        <link rel="stylesheet" href="Public/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper skin-green-light">
            <header class="main-header skin-green-light">

                <a href="inicio.php" class="logo">
                    <span class="logo-mini"> PW </span>
                    <span class="logo-lg"> PROYECTO WEB </span>
                </a>

                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" >
                        <i class="fas fa-arrows-alt-h"></i>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        </ul>
                    </div>
                </nav>

            </header>

            <?php
                if( $_SESSION['tipoUsuario'] == 'Socio' ){
                    include 'Paginas/navegacionSocio.php';
                }else{
                    include 'Paginas/navegacion.php';
                }
            ?>

            <div class="content-wrapper">
                <?php
                    $controlador = new Controlador();
                    $controlador -> mostrarPagina();
                ?>
            </div>

            <script src="Public/bower_components/jquery/dist/jquery.min.js"></script>
            <script src="Public/bower_components/jquery-ui/jquery-ui.min.js"></script>
            <script src="Public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="Public/bower_components/raphael/raphael.min.js"></script>
            <script src="Public/bower_components/morris.js/morris.min.js"></script>
            <script src="Public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
            <script src="Public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="Public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="Public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
            <script src="Public/bower_components/moment/min/moment.min.js"></script>
            <script src="Public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
            <script src="Public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
            <script src="Public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
            <script src="Public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
            <script src="Public/bower_components/fastclick/lib/fastclick.js"></script>
            <script src="Public/js/adminlte.min.js"></script>
            <script src="Public/js/pages/dashboard.js"></script>
            <script src="Public/js/demo.js"></script>
            <script src="Public/bower_components/jquery/dist/jquery.min.js"></script>
            <script src="Public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="Public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="Public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
            <script src="Public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
            <script src="Public/bower_components/fastclick/lib/fastclick.js"></script>
            <script src="Public/bower_components/select2/dist/js/select2.full.min.js"></script>
            <script src="Public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
            <script src="Public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
            <script src="Public/plugins/iCheck/icheck.min.js"></script>
            <script>
                $.widget.bridge('uibutton', $.ui.button);
                $(function () {
                    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass   : 'iradio_minimal-blue'
                    })
                    $('#datepicker').datepicker({
                    autoclose: true, format: 'yyyy-mm-dd'
                    })
                    $('.timepicker').timepicker({
                    showInputs: false
                    })
                    $('.select2').select2()
                    $('#tabla').DataTable({
                        "ordering": false,
                        "info":     false,
                        language: {
                            "decimal": "",
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Entradas",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "Sin resultados encontrados",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        }
                    })
                })
            </script>
        </div>
    </body>
</html>
