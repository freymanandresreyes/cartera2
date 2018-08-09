<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>ORGANIZACION BLESS S.A.S</title>
    <!-- Custom CSS -->
    <link href=" {!! asset('../assets/node_modules/horizontal-timeline/css/horizontal-timeline.css') !!}" rel="stylesheet">
    <link href=" {!! asset('dist/css/style.css') !!}" rel="stylesheet">
    <link href=" {!! asset('dist/css/pages/bootstrap-switch.css') !!}" rel="stylesheet">
    <link href=" {!! asset('css/personalizado.css') !!}" rel="stylesheet">
    <link href=" {!! asset('dist/css/pages/timeline-vertical-horizontal.css') !!}" rel="stylesheet">
    <link href=" {!! asset('dist/css/pages/footable-page.css') !!}" rel="stylesheet">
    <link href=" {!! asset('css/plusis.css') !!}" rel="stylesheet">
    <link href=" {!! asset('css/print_personalizados.css') !!}" rel="stylesheet" type="text/css" media="print">
    <link href=" {!! asset('css/factura_compras.css') !!}" rel="stylesheet">
    
    <!-- css alertas -->
    <link rel="stylesheet" href=" {!! asset('dist/css/alertify.core.css') !!}" />
    <link rel="stylesheet" href=" {!! asset('dist/css/alertify.default.css') !!}" />
</head>
<body class="skin-blue fixed-layout">
    @yield('factura')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader" id="descarga">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">ORGANIZACION BLESS S.A.S</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper menu_ocultar">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="../assets/images/logo-light-icon.png" alt="homepage" id="oculto " class="light-logo-icono" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text --><span>
                    <!-- dark Logo text -->
                    <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo text -->
                    <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.png" alt="user" class=""> <span class="hidden-md-down">{{ Auth::user()->name }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">

                                <!-- text-->

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            <!-- text-->
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End User Profile -->
                    <!-- ============================================================== -->

                    <li class="nav-item right-side-toggle">
                        <!-- <a class="nav-link  waves-effect waves-light" href="" id="cambiar_tienda" data-toggle="modal" data-target=".bs-example-modal-sm"> -->
                        <a class="nav-link  waves-effect waves-light" href="" id="configuraciones">
                            <i class="ti-settings"></i>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    </div>





    <!-- ***************************************INICIO DEL MODAL ************************************************** -->
    <div class="row menu_ocultar">
        <!-- sample modal content -->
        <div id="modal_configuraciones" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h3>CONFIGURACIONES...</h3>
              </div>
              <div class="modal-body">
      
                    <form id="form_estados">
                        
                        <div class="col-md-12">
                            <label for="recipient-name" class="control-label">Rango:</label>
                            <div id="range_03"></div>
                        </div>

                        <div class="form-group">
                                <label for="recipient-name" class="control-label">Tipos De Facturas:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control custom-select" id="tipo_facturas"></input>
                            </div>
                        </div>
                            
                        <div class="form-group">
                                <label for="recipient-name" class="control-label">Dias Mora:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control custom-select" id="dias_mora"></input>
                            </div>
                        </div>

                    </form>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="cerrar_modal_configuraciones">Cerrar</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" id="guardar_modal_configuraciones">Guardar</button>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
    <!-- ***************************************FIN DEL MODAL ************************************************** -->




    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <div id="capa_modal" class="div_modal" style="display: none;"></div>
    <div id="capa_formularios" class="div_contenido" style="display: none;"></div>
    @include('plantilla.menu')


    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper menu_ocultar">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            @include('plantilla.info')
            @include('plantilla.error')
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            @yield('contenido')
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer menu_ocultar" id="menu_ocultar">
        © 2018 ORGANIZACION BLESS S.A.S
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{!! asset('../assets/node_modules/jquery/jquery-3.2.1.min.js') !!}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src=" {!! asset('../assets/node_modules/popper/popper.min.js') !!}"></script>
<script src=" {!! asset('../assets/node_modules/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{!! asset('dist/js/perfect-scrollbar.jquery.min.js ') !!}"></script>
<!--Wave Effects -->
<script src=" {!! asset('dist/js/waves.js') !!}"></script>
<!--Menu sidebar -->
<script src=" {!! asset('dist/js/sidebarmenu.js') !!}"></script>
<!--stickey kit -->
<script src="{!! asset('../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') !!}"></script>
<script src=" {!! asset('../assets/node_modules/sparkline/jquery.sparkline.min.js') !!}"></script>
<!--Custom JavaScript -->
<script src=" {!! asset('dist/js/custom.min.js') !!}"></script>


<!-- This is data table -->
<script src="{!! asset('../assets/node_modules/horizontal-timeline/js/horizontal-timeline.js') !!}"></script>
<!-- Footable -->
<script src=" {!! asset('../assets/node_modules/footable/js/footable.all.min.js') !!}"></script>
<!--FooTable init-->


<!-- Libreria de Alertas  -->
<script src=" {!! asset('dist/js/alertify.js') !!}"></script>

<!-- start - This is for export functionality only -->
<!-- This is data table -->
<script src=" {!! asset('../assets/node_modules/datatables/jquery.dataTables.min.js') !!}"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="{!! asset('js/plusis.js') !!}" type="text/javascript"></script>


@yield('codigo')
<!-- end - This is for export functionality only -->
<script src=" {!! asset('dist/js/pages/jquery.PrintArea.js') !!}" type="text/JavaScript"></script>

    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Chart JS -->
    <script src="../assets/node_modules/echarts/echarts-all.js"></script>
    {{-- <script src="../assets/node_modules/echarts/echarts-init.js"></script> --}}



{{-- ARCHIVO DE COMPILACION --}}

<script src="{!! asset('js/compilados.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/cliente_modal/cliente_modal.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/guardar_datos_cliente/guardar_datos_cliente.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/cliente_modal/select_facturas.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/configuraciones/configuraciones.js') !!}" type="text/javascript"></script>

<script>
$(document).ready(function() {
    $('#myTable').DataTable();
    $(document).ready(function() {
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
});
$('#example23').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});

</script>

</body>

</html>
