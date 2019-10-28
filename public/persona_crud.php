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

    $dominioJSON        = get_curl('default/000');

	if ($workCodigo <> 0){
		$dataJSON			= get_curl('default/400/'.$workCodigo);
		if ($dataJSON['code'] === 200){
            $row_00			= $dataJSON['data'][0]['persona_codigo'];
			$row_01			= $dataJSON['data'][0]['tipo_estado_codigo'];
            $row_02			= $dataJSON['data'][0]['tipo_persona_codigo'];
            $row_03			= $dataJSON['data'][0]['tipo_documento_codigo'];
            $row_04			= $dataJSON['data'][0]['persona_completo'];
            $row_05			= $dataJSON['data'][0]['persona_documento'];
            $row_06			= $dataJSON['data'][0]['persona_telefono'];
            $row_07			= $dataJSON['data'][0]['persona_email'];
            $row_08			= $dataJSON['data'][0]['persona_observacion'];
            $row_09			= $dataJSON['data'][0]['persona_empresa_codigo'];
            $row_10			= $dataJSON['data'][0]['persona_usuario'];
            $row_11			= $dataJSON['data'][0]['persona_fecha_hora'];
            $row_12			= $dataJSON['data'][0]['persona_ip'];
            $row_13			= $dataJSON['data'][0]['persona_codigo_sitrap'];
            $row_14			= $dataJSON['data'][0]['persona_codigo_sigor'];
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
        $row_11			= '';
        $row_12			= '';
        $row_13			= '';
        $row_14			= '';
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
                                        <a href="../public/persona.php">PERSONA</a>
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
                                <h4 class="card-title">PERSONA</h4>
                                <form id="form" data-parsley-validate class="m-t-30" method="post" action="../class/crud/persona.php">
                                	<div class="form-group">
                                        <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="<?php echo $workCodigo; ?>" required readonly>
                                        <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $workModo; ?>" required readonly>
                                    </div>

                                    <div class="row pt-3">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="var01">ESTADO</label>
                                                <select id="var01" name="var01" class="select2 form-control custom-select" style="width: 100%; height:40px;" <?php echo $workReadonly; ?>>
                                                    <optgroup label="Estado">
                                                        <option value="1" <?php echo $row_01_h; ?>>HABILITADO</option>
                                                        <option value="2" <?php echo $row_01_d; ?>>DESHABILITADO</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="var02">TIPO PERSONA</label>
                                                <select id="var02" name="var02" class="select2 form-control custom-select" style="width: 100%; height:40px;" <?php echo $workReadonly; ?>>
                                                    <optgroup label="Tipo Persona">
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'PERSONATIPO'){
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
                                        </div>

                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="var03">TIPO DOCUMENTO</label>
                                                <select id="var03" name="var03" class="select2 form-control custom-select" style="width: 100%; height:40px;" <?php echo $workReadonly; ?>>
                                                    <optgroup label="Tipo Documento">
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'PERSONADOCUMENTO'){
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
                                        </div>
                                    </div>
                                    
                                    <div class="row pt-3">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="var04">PERSONA / EMPRESA</label>
                                                <input id="var04" name="var04" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="PERSONA / EMPRESA" value="<?php echo $row_04; ?>" required <?php echo $workReadonly; ?>>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="var13">SIGLAS SITRAP</label>
                                                <input id="var13" name="var13" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="SIGLAS SITRAP" value="<?php echo $row_13; ?>" required <?php echo $workReadonly; ?>>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="var14">C&Oacute;DIGO SIGOR</label>
                                                <input id="var14" name="var14" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="C&Oacute;DIGO SIGOR" value="<?php echo $row_14; ?>" required <?php echo $workReadonly; ?>>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-3">
                                        
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="var06">TEL&Eacute;FONO</label>
                                                <input id="var06" name="var06" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="TEL&Eacute;FONO" value="<?php echo $row_06; ?>" required <?php echo $workReadonly; ?>>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="var07">EMAIL</label>
                                                <input id="var07" name="var07" class="form-control" type="email" style="text-transform:lowercase; height:40px;" placeholder="EMAIL" value="<?php echo $row_07; ?>" required <?php echo $workReadonly; ?>>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="var08">OBSERVACI&Oacute;N</label>
                                                <textarea id="var08" name="var08" class="form-control" rows="5" style="text-transform:uppercase;" <?php echo $workReadonly; ?>><?php echo $row_08; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn <?php echo $workAStyle; ?>" <?php echo $workReadonly; ?>><?php echo $workATitulo; ?></button>
                                    <a role="button" class="btn btn-dark" href="../public/persona.php">Volver</a>
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