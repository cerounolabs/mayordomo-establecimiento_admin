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

    if(isset($_GET['codigo'])){
        $workCodigo     = $_GET['codigo'];
    } else {
        $workCodigo     = 0;
    }

    if(isset($_GET['mode'])){
        $workModo       = $_GET['mode'];
    }

	if ($workCodigo <> 0){
		$dataJSON			= get_curl('default/100/'.$workCodigo);
		if ($dataJSON['code'] === 200){
            $row_00			= $dataJSON['data'][0]['pais_codigo'];
			$row_01			= $dataJSON['data'][0]['tipo_estado_codigo'];
			$row_02			= $dataJSON['data'][0]['pais_nombre'];
			$row_03			= $dataJSON['data'][0]['pais_iso3166_char2'];
            $row_04			= $dataJSON['data'][0]['pais_iso3166_char3'];
            $row_05			= $dataJSON['data'][0]['pais_iso3166_numero'];
            $row_06			= $dataJSON['data'][0]['pais_observacion'];
            $row_07			= $dataJSON['data'][0]['pais_empresa_codigo'];
            $row_08			= $dataJSON['data'][0]['pais_usuario'];
            $row_09			= $dataJSON['data'][0]['pais_fecha_hora'];
            $row_10			= $dataJSON['data'][0]['pais_ip'];
        }
        
        if ($row_01 === 1){
            $row_01_h = 'selected';
            $row_01_d = '';
        }else{
            $row_01_h = '';
            $row_01_d = 'selected';
        }
    } else {
        $row_01			= 1;
        $row_01_h       = 'selected';
        $row_01_d       = '';
        $row_02			= '';
        $row_03			= '';
        $row_04			= '';
        $row_05			= '';
        $row_06			= '';
        $row_07			= '';
        $row_08			= '';
        $row_09			= '';
        $row_10			= '';
    }
    
	switch($workModo){
		case 'C':
			$workReadonly	= '';
			$workATitulo	= 'Agregar';
			$workAStyle		= 'btn-info';
			break;
		case 'R':
			$workReadonly	= 'disabled';
			$workATitulo	= 'Ver';
			$workAStyle		= 'btn-primary';
			break;
		case 'U':
			$workReadonly	= '';
			$workATitulo	= 'Actualizar';
			$workAStyle		= 'btn-success';
			break;
		case 'D':
			$workReadonly	= 'disabled';
			$workATitulo	= 'Eliminar';
			$workAStyle		= 'btn-danger';
			break;
    }
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
                            <div class="d-flex align-items-center"></div>
                        </div>
                        <div class="col-7 align-self-center">
                            <div class="d-flex no-block justify-content-end align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="../public/home.php">HOME</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../public/pais.php">PA&Iacute;S</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">MANTENIMIENTO</li>
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
                    <!-- row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">PA&Iacute;S - <a href="https://es.wikipedia.org/wiki/ISO_3166-1" target="_blank">TABLA ISO-3166</a></h4>
                                    <form id="form" data-parsley-validate class="m-t-30" method="post" action="../class/crud/pais.php">
                                        <div class="form-group">
                                            <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="<?php echo $workCodigo; ?>" required readonly>
                                            <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $workModo; ?>" required readonly>
                                        </div>

                                        <div class="row pt-3">
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var01">ESTADO</label>
                                                    <select id="var01" name="var01" class="select2 form-control custom-select" style="width: 100%; height:36px;" <?php echo $workReadonly; ?>>
                                                        <optgroup label="Estado">
                                                            <option value="1" <?php echo $row_01_h; ?>>HABILITADO</option>
                                                            <option value="2" <?php echo $row_01_d; ?>>DESHABILITADO</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var02">PA&Iacute;S</label>
                                                    <input id="var02" name="var02" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="Nombre" value="<?php echo $row_02; ?>" required <?php echo $workReadonly; ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row pt-3">
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var03">ISO-3166 CHAR2</label>
                                                    <input id="var03" name="var03" class="form-control" type="text" minlength="2" maxlength="2" style="text-transform:uppercase; height:40px;" placeholder="ISO-3166 CHAR2" value="<?php echo $row_03; ?>" required <?php echo $workReadonly; ?>>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var04">ISO-3166 CHAR3</label>
                                                    <input id="var04" name="var04" class="form-control" type="text" minlength="3" maxlength="3" style="text-transform:uppercase; height:40px;" placeholder="ISO-3166 CHAR3" value="<?php echo $row_04; ?>" required <?php echo $workReadonly; ?>>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var05">ISO-3166 NUMERICO3</label>
                                                    <input id="var05" name="var05" class="form-control" type="number" min="000" max="999" style="text-transform:uppercase; height:40px;" placeholder="ISO-3166 NUMERICO3" value="<?php echo $row_05; ?>" required <?php echo $workReadonly; ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row pt-3">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="var06">OBSERVACI&Oacute;N</label>
                                                    <textarea id="var06" name="var06" class="form-control" rows="5" style="text-transform:uppercase;" <?php echo $workReadonly; ?>><?php echo $row_06; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn <?php echo $workAStyle; ?>"><?php echo $workATitulo; ?></button>
                                        <a role="button" class="btn btn-dark" href="../public/pais.php">Volver</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
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
    if ($codeRest == 200) {
?>
        <script>
            $(function() {
                toastr.success('<?php echo $msgRest; ?>', 'Correcto!');
            });
        </script>
<?php
    }
    
    if ($codeRest == 204) {
?>
        <script>
            $(function() {
                toastr.error('<?php echo $msgRest; ?>', 'Error!');
            });
        </script>
<?php
    }
?>
    </body>
</html>