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
    }

    if(isset($_GET['dominio'])){
        $workDominio    = $_GET['dominio'];
        $titleDominio   = getTitleDominio($workDominio);
    }

    if(isset($_GET['mode'])){
        $workModo       = $_GET['mode'];
    }

	if ($workCodigo <> 0){
		$dataJSON			= get_curl('default/000/'.$workCodigo);
		if ($dataJSON['code'] == 200){
			$row_01			= $dataJSON['data'][0]['tipo_estado_codigo'];
			$row_02			= $dataJSON['data'][0]['tipo_estado_nombre'];
			$row_03			= $dataJSON['data'][0]['tipo_nombre'];
            $row_04			= $dataJSON['data'][0]['tipo_dominio'];
            $row_05			= $dataJSON['data'][0]['tipo_observacion'];
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
        $row_04			= $workDominio;
        $row_05			= '';
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
                                        <a href="../public/dominio.php?dominio=<?php echo $workDominio; ?>"><?php echo $titleDominio; ?></a>
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
                                <h4 class="card-title"><?php echo $titleDominio; ?></h4>
                                <form id="form" data-parsley-validate class="m-t-30" method="post" action="../class/crud/dominio.php">
                                   	<div class="form-group">
                                        <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="<?php echo $workCodigo; ?>" required readonly>
                                        <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $workModo; ?>" required readonly>
                                        <input id="workDominio" name="workDominio" class="form-control" type="hidden" placeholder="Dominio" value="<?php echo $workDominio; ?>" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="var01">ESTADO</label>
                                		<select id="var01" name="var01" class="select2 form-control custom-select" style="width: 100%; height:40px;" <?php echo $workReadonly; ?>>
                                    		<optgroup label="Estado">
                                        		<option value="1" <?php echo $row_01_h; ?>>HABILITADO</option>
                                        		<option value="2" <?php echo $row_01_d; ?>>DESHABILITADO</option>
                                    		</optgroup>
                                		</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="var02">NOMBRE</label>
                                        <input id="var02" name="var02" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="Nombre" value="<?php echo $row_03; ?>" required <?php echo $workReadonly; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="var03">DOMINIO</label>
                                        <input id="var03" name="var03" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="Dominio" value="<?php echo $workDominio; ?>" required readonly>
                                    </div>
                                    <div class="form-group">
                                    	<label for="var04">OBSERVACI&oacute;N</label>
                                    	<textarea id="var04" name="var04" class="form-control" style="text-transform:uppercase;" rows="5" <?php echo $workReadonly; ?>><?php echo $row_05; ?></textarea>
                                	</div>
                                    <button type="submit" class="btn <?php echo $workAStyle; ?>"><?php echo $workATitulo; ?></button>
                                    <a role="button" class="btn btn-dark" href="../public/dominio.php?dominio=<?php echo $workDominio; ?>">Volver</a>
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