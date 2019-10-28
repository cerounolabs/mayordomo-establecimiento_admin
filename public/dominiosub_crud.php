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

    if(isset($_GET['dominio1'])){
        $workCodigo1    = $_GET['dominio1'];
    }

    if(isset($_GET['dominio2'])){
        $workCodigo2    = $_GET['dominio2'];
    }

    if(isset($_GET['dominio'])){
        $workDominio    = $_GET['dominio'];
        $dataDominio    = getTitleSubDominio($workDominio);
        $titleDominio   = $dataDominio[0];
        $titleDominio1  = $dataDominio[1];
        $titleDominio2  = $dataDominio[2];
        $valueDominio1  = $dataDominio[3];
        $valueDominio2  = $dataDominio[4];
    }

    if(isset($_GET['mode'])){
        $workModo       = $_GET['mode'];
    }

    $dominioJSON        = get_curl('default/000');

	if ($workCodigo1 <> 0 && $workCodigo2 <> 0){
		$dataJSON			= get_curl('default/020/'.$workDominio.'/'.$workCodigo1.'/'.$workCodigo2);
		if ($dataJSON['code'] == 200){
			$row_01			= $dataJSON['data'][0]['tipo_estado_codigo'];
			$row_02			= $dataJSON['data'][0]['tipo_dominio1_codigo'];
			$row_03			= $dataJSON['data'][0]['tipo_dominio2_codigo'];
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
            $workReadonly1	= '';
			$workATitulo	= 'Agregar';
			$workAStyle		= 'btn-info';
			break;
		case 'R':
            $workReadonly	= 'disabled';
            $workReadonly1	= 'disabled';
			$workATitulo	= 'Ver';
			$workAStyle		= 'btn-primary';
			break;
		case 'U':
            $workReadonly	= '';
            $workReadonly1	= 'disabled';
			$workATitulo	= 'Actualizar';
			$workAStyle		= 'btn-success';
			break;
		case 'D':
            $workReadonly	= 'disabled';
            $workReadonly1	= 'disabled';
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
                                        <a href="../public/dominiosub.php?dominio=<?php echo $workDominio; ?>"><?php echo $titleDominio; ?></a>
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
                                <form id="form" data-parsley-validate class="m-t-30" method="post" action="../class/crud/dominiosub.php">
                                   	<div class="form-group">
                                        <input id="workCodigo1" name="workCodigo1" class="form-control" type="hidden" placeholder="Codigo" value="<?php echo $workCodigo1; ?>" required readonly>
                                        <input id="workCodigo2" name="workCodigo2" class="form-control" type="hidden" placeholder="Codigo" value="<?php echo $workCodigo2; ?>" required readonly>
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
                                        <label for="var02"><?php echo $titleDominio1; ?></label>
                                        <select id="var02" name="var02" class="select2 form-control custom-select" style="width: 100%; height:40px;" <?php echo $workReadonly1; ?>>
                                            <optgroup label="<?php echo $titleDominio1; ?>">
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === $valueDominio1){
                if($row_02 === $dominioVALUE['tipo_codigo']){
                    $row_02_selected = 'selected';
                } else {
                    $row_02_selected = '';
                }
?>
                                                <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $row_02_selected; ?>><?php echo $dominioVALUE['tipo_nombre']; ?></option>
<?php
            }
        }
    }
?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="var03"><?php echo $titleDominio2; ?></label>
                                        <select id="var03" name="var03" class="select2 form-control custom-select" style="width: 100%; height:40px;" <?php echo $workReadonly1; ?>>
                                            <optgroup label="<?php echo $titleDominio2; ?>">
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === $valueDominio2){
                if($row_03 === $dominioVALUE['tipo_codigo']){
                    $row_03_selected = 'selected';
                } else {
                    $row_03_selected = '';
                }
?>
                                                <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $row_03_selected; ?>><?php echo $dominioVALUE['tipo_nombre']; ?></option>
<?php
            }
        }
    }
?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="var04">DOMINIO</label>
                                        <input id="var04" name="var04" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="Dominio" value="<?php echo $workDominio; ?>" required readonly>
                                    </div>
                                    <div class="form-group">
                                    	<label for="var05">OBSERVACI&oacute;N</label>
                                    	<textarea id="var05" name="var05" class="form-control" style="text-transform:uppercase;" rows="5" <?php echo $workReadonly; ?>><?php echo $row_05; ?></textarea>
                                	</div>
                                    <button type="submit" class="btn <?php echo $workAStyle; ?>"><?php echo $workATitulo; ?></button>
                                    <a role="button" class="btn btn-dark" href="../public/dominiosub.php?dominio=<?php echo $workDominio; ?>">Volver</a>
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