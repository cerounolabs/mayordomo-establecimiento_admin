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

    if(isset($_GET['codigo1'])){
        $workCodigo1    = $_GET['dominio1'];
    }

    if(isset($_GET['codigo2'])){
        $workCodigo2    = $_GET['dominio2'];
    }

    if(isset($_GET['mode'])){
        $workModo       = $_GET['mode'];
    }

    $dominioJSON        = get_curl('default/000');

	if ($workCodigo1 <> 0 && $workCodigo2 <> 0){
		$dataJSON			= get_curl('establecimiento/600/'.$workCodigo1.'/'.$workCodigo2);
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
                                <form id="form" data-parsley-validate class="m-t-30" method="post" action="../class/crud/establecimiento_categoria.php">
                                   	<div class="form-group">
                                        <input id="workCodigo1" name="workCodigo1" class="form-control" type="hidden" placeholder="Codigo" value="<?php echo $workCodigo1; ?>" required readonly>
                                        <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $workModo; ?>" required readonly>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="tableLoad" class="table v-middle" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>CATEGOR&Iacute;A</th>
                                                    <th>CANTIDAD</th>
                                                    <th>PESO TOTAL</th>
                                                    <th>PESO PROMEDIO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
    $contDominio = 0;
    if($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_dominio'] === 'ANIMALCATEGORIA'){
                $contDominio = $contDominio + 1;
?>
                                                <tr>
                                                    <td>
                                                        <select id="var02_<?php echo $contDominio; ?>" name="var02_<?php echo $contDominio; ?>" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
<?php
    if($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $categoriaKEY => $categoriaVALUE) {
            if ($categoriaVALUE['tipo_dominio'] === 'ANIMALCATEGORIA') {
                if ($categoriaVALUE['tipo_codigo'] === $dominioVALUE['tipo_codigo']) {
?> 
                                                            <option value="<?php echo $categoriaVALUE['tipo_codigo']; ?>"><?php echo $categoriaVALUE['tipo_nombre']; ?></option>
<?php
                }
            } 
        }
    } 
?>
                                                        </select>
                                                    </td>
                                                    <td><input id="var03_<?php echo $contDominio; ?>" name="var03_<?php echo $contDominio; ?>" class="form-control" type="number" style="height:40px;" value="" required></td>
                                                    <td><input id="var04_<?php echo $contDominio; ?>" name="var04_<?php echo $contDominio; ?>" class="form-control" type="number" style="height:40px;" value="" step=".001" required></td>
                                                    <td><input id="var05_<?php echo $contDominio; ?>" name="var05_<?php echo $contDominio; ?>" class="form-control" type="number" style="height:40px;" value="" step=".001" required readonly></td>
                                                </tr>
<?php
            }
        }
    }
?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <button type="submit" class="btn <?php echo $workAStyle; ?>"><?php echo $workATitulo; ?></button>
                                    <a role="button" class="btn btn-dark" href="../public/establecimiento.php">Volver</a>
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