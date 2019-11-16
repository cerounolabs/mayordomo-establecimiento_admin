<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if(isset($_GET['code'])){
        $codeRest       = $_GET['code'];
        $msgRest        = $_GET['msg'];
    } else {
        $codeRest       = 0;
        $msgRest        = '';
    }

    $char01 = get_curl('grafico/001/'.$usu_04);
    $char02 = get_curl('grafico/002/'.$usu_04);
    $char03 = get_curl('grafico/003/'.$usu_04);
    $char04 = get_curl('grafico/004/'.$usu_04);
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
<?php
    include '../include/header.php';
?>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
<?php
    	include '../include/menu.php';
?>
       
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"></h4>
                        <div class="d-flex align-items-center"></div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../public/home.php">HOME</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        <img src="../assets/images/senacsa_logo_menu.png" alt="user" width="60" class="rounded-circle" />
                                    </div>
                                    <div>
                                        <h3 class="m-b-0"><?php echo $usu_05; ?></h3>
                                        <span><?php echo date('l d F Y'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">POBLACI&Oacute;N POR PROPIETARIO</h4>
                                <div id="cantPoblacionxPropietario"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">POBLACI&Oacute;N POR ORIGEN</h4>
                                <div id="cantPoblacionxOrigen"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">POBLACI&Oacute;N POR RAZA</h4>
                                <div id="cantPoblacionxRaza"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">POBLACI&Oacute;N POR CATEGOR&Iacute;A</h4>
                                <div id="cantPoblacionxCategoria"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
<?php
    include '../include/development.php';
?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <div class="chat-windows"></div>
<?php
    include '../include/footer.php';
   
    if ($codeRest == 401) {
?>
    <script>
        $(function() {
            toastr.error('<?php echo $msgRest; ?>', 'Error!');
        });
    </script>
<?php
    }
?>
    <script>
        $(function() {
            'use strict';

            var chart01 = c3.generate({
                bindto: "#cantPoblacionxPropietario",
                data: {
                    columns: [
<?php
    if ($char01['code'] === 200){
        foreach ($char01['data'] as $char01KEY => $char01VALUE) {
    
?>
                        ["<?php echo $char01VALUE['persona_completo']; ?>", <?php echo $char01VALUE['establecimiento_poblacion_cantidad']; ?>],
<?php
        }
    }
?>
                    ],
                    type: "pie",
                    onclick: function(o, n) { 
                        console.log("onclick", o, n) 
                    },
                    onmouseover: function(o, n) { 
                        console.log("onmouseover", o, n) 
                    },
                    onmouseout: function(o, n) { 
                        console.log("onmouseout", o, n) 
                    }
                }
            });

            var chart02 = c3.generate({
                bindto: "#cantPoblacionxOrigen",
                data: {
                    columns: [
<?php
    if ($char02['code'] === 200){
        foreach ($char02['data'] as $char02KEY => $char02VALUE) {
    
?>
                        ["<?php echo $char02VALUE['tipo_origen_nombre']; ?>", <?php echo $char02VALUE['establecimiento_poblacion_cantidad']; ?>],
<?php
        }
    }
?>
                    ],
                    type: "pie",
                    onclick: function(o, n) { 
                        console.log("onclick", o, n) 
                    },
                    onmouseover: function(o, n) { 
                        console.log("onmouseover", o, n) 
                    },
                    onmouseout: function(o, n) { 
                        console.log("onmouseout", o, n) 
                    }
                }
            });

            var chart03 = c3.generate({
                bindto: "#cantPoblacionxRaza",
                data: {
                    columns: [
<?php
    if ($char03['code'] === 200){
        foreach ($char03['data'] as $char03KEY => $char03VALUE) {
    
?>
                        ["<?php echo $char03VALUE['tipo_raza_nombre']; ?>", <?php echo $char03VALUE['establecimiento_poblacion_cantidad']; ?>],
<?php
        }
    }
?>
                    ],
                    type: "pie",
                    onclick: function(o, n) { 
                        console.log("onclick", o, n) 
                    },
                    onmouseover: function(o, n) { 
                        console.log("onmouseover", o, n) 
                    },
                    onmouseout: function(o, n) { 
                        console.log("onmouseout", o, n) 
                    }
                }
            });

            var chart04 = c3.generate({
                bindto: "#cantPoblacionxCategoria",
                data: {
                    columns: [
<?php
    if ($char04['code'] === 200){
        foreach ($char04['data'] as $char04KEY => $char04VALUE) {
    
?>
                        ["<?php echo $char04VALUE['tipo_categoria_nombre']; ?>", <?php echo $char04VALUE['establecimiento_poblacion_cantidad']; ?>],
<?php
        }
    }
?>
                    ],
                    type: "pie",
                    onclick: function(o, n) { 
                        console.log("onclick", o, n) 
                    },
                    onmouseover: function(o, n) { 
                        console.log("onmouseover", o, n) 
                    },
                    onmouseout: function(o, n) { 
                        console.log("onmouseout", o, n) 
                    }
                }
            });
        });
    </script>
</body>
</html>