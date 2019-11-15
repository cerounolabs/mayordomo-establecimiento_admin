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

    $porcCarga          = 0;
    $dominioJSON        = get_curl('default/000');
    $triDominioJSON     = get_curl('default/040/ANIMALESPECIECATEGORIASUBCATEGORIA');
    
    $estPersonaJSON     = get_curl('establecimiento/601/'.$usu_04);
    if($estPersonaJSON['code'] === 200){
        $porcCarga  = $porcCarga + 16.6666;
    }

    $estSeccionJSON     = get_curl('default/602/'.$usu_04);
    if($estSeccionJSON['code'] === 200){
        $porcCarga  = $porcCarga + 16.6666;
    }

    $estPotreroJSON     = get_curl('default/603/'.$usu_04);
    if($estPotreroJSON['code'] === 200){
        $porcCarga  = $porcCarga + 16.6666;
    }

    $estLoteJSON        = get_curl('establecimiento/604/'.$usu_04);
    if($estLoteJSON['code'] === 200){
        $porcCarga  = $porcCarga + 16.6666;
    }

    $estPoblacionJSON        = get_curl('establecimiento/605/'.$usu_04);
    if($estPoblacionJSON['code'] === 200){
        $porcCarga  = $porcCarga + 16.6666;
    }

    $estUbicacionJSON        = get_curl('establecimiento/606/'.$usu_04);
    if($estUbicacionJSON['code'] === 200){
        $porcCarga  = $porcCarga + 16.6666;
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
    if ($porcCarga >= 83){
    	include '../include/menu.php';
    }
?>
       
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Configuraci&oacute;n realizada</h4>
                                <div class="progress m-t-20">
                                    <div class="progress-bar bg-success" style="width:<?php echo number_format($porcCarga, 0, '', ''); ?>%; height:100%;" role="progressbar"><?php echo number_format($porcCarga, 0, '', ''); ?>%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-2 col-md-3">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-responsive" src="../assets/images/icon/default.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Usuario</h4>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:left;" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getUsuario();">Ver</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:right;" title="Nuevo" data-toggle="modal" data-target="#modaldiv" onclick="setUsuario();">Nuevo</a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->

                           <!-- column -->
                           <div class="col-lg-2 col-md-3">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-responsive" src="../assets/images/icon/default.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Sección</h4>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:left;" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getSeccion();">Ver</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:right;" title="Nuevo" data-toggle="modal" data-target="#modaldiv" onclick="setSeccion();">Nuevo</a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->

                            <!-- column -->
                            <div class="col-lg-2 col-md-3">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top" src="../assets/images/icon/default.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Potrero</h4>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:left;" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getPotrero();">Ver</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:right;" title="Nuevo" data-toggle="modal" data-target="#modaldiv" onclick="setPotrero();">Nuevo</a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->

                            <!-- column -->
                            <div class="col-lg-2 col-md-3">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top" src="../assets/images/icon/default.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Loteo</h4>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:left;" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getLote();">Ver</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:right;" title="Nuevo" data-toggle="modal" data-target="#modaldiv" onclick="setLote();">Nuevo</a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->

                            <!-- column -->
                            <div class="col-lg-2 col-md-3">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-responsive" src="../assets/images/icon/default.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Poblaci&oacute;n</h4>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:left;" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getPoblacion();">Ver</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:right;" title="Nuevo" data-toggle="modal" data-target="#modaldiv" onclick="setPoblacion();">Nuevo</a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->

                            <!-- column -->
                            <div class="col-lg-2 col-md-3">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top" src="../assets/images/icon/default.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Ubicaci&oacute;n</h4>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:left;" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getUbicacion();">Ver</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:right;" title="Nuevo" data-toggle="modal" data-target="#modaldiv" onclick="setUbicacion();">Nuevo</a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->
                        </div>
                    </div>
                </div>
                
                <!-- Modal -->
                <div id="modaldiv" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" id="modalcontent">
                    </div>
                </div>
                <!-- Modal -->
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

    if ($codeRest == 204 || $codeRest == 401) {
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
        function getUsuario(){
            var html =
            '<div class="modal-content">'+
            '	<div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		<h4 class="modal-title" id="vcenter"> Usuario </h4>'+
            '		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	</div>'+
            '	<div class="modal-body" >'+
            '        <div class="table-responsive">'+
            '            <table id="tableLoad" class="table v-middle" style="width: 100%;">'+
            '                <thead id="tableCodigo" class="">'+
            '                    <tr class="bg-light">'+
            '                        <th class="border-top-0" style="text-align:center;">TIPO USUARIO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">TIPO PERSONA</th>'+
            '                        <th class="border-top-0" style="text-align:center;">PERSONA / EMPRESA</th>'+
            '                        <th class="border-top-0" style="text-align:center;">TIPO DOCUMENTO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">DOCUMENTO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">CÓDIGO SITRAP</th>'+
            '                        <th class="border-top-0" style="text-align:center;">CÓDIGO SIGOR</th>'+
            '                        <th class="border-top-0" style="text-align:center;">&nbsp;</th>'+
            '                    </tr>'+
            '                </thead>'+
            '                <tbody>'+
<?php
    if ($estPersonaJSON['code'] === 200){
        foreach ($estPersonaJSON['data'] as $estPersonaKEY => $estPersonaVALUE) {
?>
            '                    <tr>'+
            '                        <td><?php echo $estPersonaVALUE['tipo_usuario_nombre']; ?></td>'+
            '                        <td><?php echo $estPersonaVALUE['tipo_persona_nombre']; ?></td>'+
            '                        <td><?php echo $estPersonaVALUE['establecimiento_persona_completo']; ?></td>'+
            '                        <td><?php echo $estPersonaVALUE['tipo_documento_nombre']; ?></td>'+
            '                        <td><?php echo $estPersonaVALUE['establecimiento_persona_documento']; ?></td>'+
            '                        <td><?php echo $estPersonaVALUE['establecimiento_persona_codigo_sitrap']; ?></td>'+
            '                        <td><?php echo $estPersonaVALUE['establecimiento_persona_codigo_sigor']; ?></td>'+
            '                        <td style="text-align:center;"><a href="javascript:void(0)" id="<?php echo $estPersonaVALUE['establecimiento_persona_codigo']; ?>" role="button" class="btn btn-danger" title="Eliminar" onclick="setUsuarioId(this.id)";><i class="ti-trash"></i>&nbsp;</a></td>'+
            '                    </tr>'+
<?php
        }
    }
?>
            '                </tbody>'+
            '            </table>'+
            '        </div>'+
            '	</div>'+
            '	<div class="modal-footer">'+
            '		<button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	</div>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }

        function setUsuario(){
            var html =
            '<div class="modal-content">'+
            '   <form id="form" data-parsley-validate method="post" action="../class/crud/establecimiento_persona.php">'+
            '	    <div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		    <h4 class="modal-title" id="vcenter"> Usuario </h4>'+
            '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	    </div>'+
            '	    <div class="modal-body" >'+
            '           <div class="form-group">'+
            '               <input id="workCodigo" name="workCodigo" value="<?php echo $usu_04; ?>" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
            '               <input id="workModo" name="workModo" value="C" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
            '               <input id="workPage" name="workPage" value="configuracion" class="form-control" type="hidden" placeholder="Page" required readonly>'+
            '           </div>'+
            '           <div class="row pt-3">'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var01">ESTADO</label>'+
            '                       <select id="var01" name="var01" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Estado">'+
            '                               <option value="1">HABILITADO</option>'+
            '                               <option value="2">DESHABILITADO</option>'+
            '                           </optgroup>'+
            '                       </select>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var02">TIPO USUARIO</label>'+
            '                       <select id="var02" name="var02" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Tipo Usuario">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'USUARIOROL'){
?>
            '                               <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre']; ?></option>'+
<?php
            }
        }
    }
?>
            '                           </optgroup>'+
            '                       </select>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var03">TIPO PERSONA</label>'+
            '                       <select id="var03" name="var03" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Tipo Persona">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'PERSONATIPO'){
?>
            '                               <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre']; ?></option>'+
<?php
            }
        }
    }
?>
            '                           </optgroup>'+
            '                       </select>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var04">PERSONA / EMPRESA</label>'+
            '                       <input id="var04" name="var04" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="PERSONA / EMPRESA" required>'+
            '                   </div>'+
            '               </div>'+
            '           </div>'+
            '           <div class="row pt-3">'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var05">TIPO DOCUMENTO</label>'+
            '                       <select id="var05" name="var05" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Tipo Documento">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'PERSONADOCUMENTO'){
?>
            '                               <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre']; ?></option>'+
<?php
            }
        }
    }
?>
            '                           </optgroup>'+
            '                       </select>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var06">DOCUMENTO</label>'+
            '                       <input id="var06" name="var06" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="NRO DOCUMENTO">'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var07">SIGLAS SITRAP</label>'+
            '                       <input id="var07" name="var07" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="SIGLAS SITRAP">'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var08">C&Oacute;DIGO SIGOR</label>'+
            '                       <input id="var08" name="var08" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="C&Oacute;DIGO SIGOR">'+
            '                   </div>'+
            '               </div>'+
            '           </div>'+
            '	    </div>'+
            '	    <div class="modal-footer">'+
            '           <button type="submit" class="btn btn-info">Guardar</button>'+
            '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	    </div>'+
            '   </form>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }

        function getSeccion(){
            var html =
            '<div class="modal-content">'+
            '	<div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		<h4 class="modal-title" id="vcenter"> Sección </h4>'+
            '		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	</div>'+
            '	<div class="modal-body" >'+
            '        <div class="table-responsive">'+
            '            <table id="tableLoad" class="table v-middle" style="width: 100%;">'+
            '                <thead id="tableCodigo" class="">'+
            '                    <tr class="bg-light">'+
            '                        <th class="border-top-0" style="text-align:center;">ESTADO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">SECCIÓN</th>'+
            '                        <th class="border-top-0" style="text-align:center;">&nbsp;</th>'+
            '                    </tr>'+
            '                </thead>'+
            '                <tbody>'+
<?php
    if ($estSeccionJSON['code'] === 200){
        foreach ($estSeccionJSON['data'] as $estSeccionKEY => $estSeccionVALUE) {
?>
            '                    <tr>'+
            '                        <td><?php echo $estSeccionVALUE['tipo_estado_nombre']; ?></td>'+
            '                        <td><?php echo $estSeccionVALUE['establecimiento_seccion_nombre']; ?></td>'+
            '                        <td style="text-align:center;"><a href="javascript:void(0)" id="<?php echo $estSeccionVALUE['establecimiento_seccion_codigo']; ?>" role="button" class="btn btn-danger" title="Eliminar" onclick="setSeccionId(this.id)";><i class="ti-trash"></i>&nbsp;</a></td>'+
            '                    </tr>'+
<?php
        }
    }
?>
            '                </tbody>'+
            '            </table>'+
            '        </div>'+
            '	</div>'+
            '	<div class="modal-footer">'+
            '		<button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	</div>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }

        function setSeccion(){
            var html =
            '<div class="modal-content">'+
            '   <form id="form" data-parsley-validate method="post" action="../class/crud/establecimiento_seccion.php">'+
            '	    <div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		    <h4 class="modal-title" id="vcenter"> Sección </h4>'+
            '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	    </div>'+
            '	    <div class="modal-body" >'+
            '           <div class="form-group">'+
            '               <input id="workCodigo" name="workCodigo" value="<?php echo $usu_04; ?>" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
            '               <input id="workModo" name="workModo" value="C" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
            '               <input id="workPage" name="workPage" value="configuracion" class="form-control" type="hidden" placeholder="Page" required readonly>'+
            '           </div>'+
            '           <div class="row pt-3">'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var01">ESTADO</label>'+
            '                       <select id="var01" name="var01" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Estado">'+
            '                               <option value="1">HABILITADO</option>'+
            '                               <option value="2">DESHABILITADO</option>'+
            '                           </optgroup>'+
            '                       </select>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-9">'+
            '                   <div class="form-group">'+
            '                       <label for="var02">SECCIÓN</label>'+
            '                       <input id="var02" name="var02" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="SECCIÓN" required>'+
            '                   </div>'+
            '               </div>'+
            '           </div>'+
            '	    </div>'+
            '	    <div class="modal-footer">'+
            '           <button type="submit" class="btn btn-info">Guardar</button>'+
            '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	    </div>'+
            '   </form>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }

        function getPotrero(){
            var html =
            '<div class="modal-content">'+
            '	<div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		<h4 class="modal-title" id="vcenter"> Potrero </h4>'+
            '		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	</div>'+
            '	<div class="modal-body" >'+
            '        <div class="table-responsive">'+
            '            <table id="tableLoad" class="table v-middle" style="width: 100%;">'+
            '                <thead id="tableCodigo" class="">'+
            '                    <tr class="bg-light">'+
            '                        <th class="border-top-0" style="text-align:center;">ESTADO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">TIPO PASTURA 1</th>'+
            '                        <th class="border-top-0" style="text-align:center;">TIPO PASTURA 2</th>'+
            '                        <th class="border-top-0" style="text-align:center;">SECCIÓN</th>'+
            '                        <th class="border-top-0" style="text-align:center;">POTRERO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">DIMENSIÓN</th>'+
            '                        <th class="border-top-0" style="text-align:center;">CAPACIDAD RECEPTIVIDAD</th>'+
            '                        <th class="border-top-0" style="text-align:center;">&nbsp;</th>'+
            '                    </tr>'+
            '                </thead>'+
            '                <tbody>'+
<?php
    if ($estPotreroJSON['code'] === 200){
        foreach ($estPotreroJSON['data'] as $estPotreroKEY => $estPotreroVALUE) {
?>
            '                    <tr>'+
            '                        <td style="text-align:left;"><?php echo $estPotreroVALUE['tipo_estado_nombre']; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estPotreroVALUE['tipo_pastura1_nombre']; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estPotreroVALUE['tipo_pastura2_nombre']; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estPotreroVALUE['establecimiento_seccion_nombre']; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estPotreroVALUE['establecimiento_potrero_nombre']; ?></td>'+
            '                        <td style="text-align:right;"><?php echo $estPotreroVALUE['establecimiento_potrero_hectarea']; ?></td>'+
            '                        <td style="text-align:right;"><?php echo $estPotreroVALUE['establecimiento_potrero_capacidad']; ?></td>'+
            '                        <td style="text-align:center;"><a href="javascript:void(0)" id="<?php echo $estPotreroVALUE['establecimiento_potrero_codigo']; ?>" role="button" class="btn btn-danger" title="Eliminar" onclick="setPotreroId(this.id)";><i class="ti-trash"></i>&nbsp;</a></td>'+
            '                    </tr>'+
<?php
        }
    }
?>
            '                </tbody>'+
            '            </table>'+
            '        </div>'+
            '	</div>'+
            '	<div class="modal-footer">'+
            '		<button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	</div>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }

        function setPotrero(){
            var html =
            '<div class="modal-content">'+
            '   <form id="form" data-parsley-validate method="post" action="../class/crud/establecimiento_potrero.php">'+
            '	    <div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		    <h4 class="modal-title" id="vcenter"> Potrero </h4>'+
            '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	    </div>'+
            '	    <div class="modal-body" >'+
            '           <div class="form-group">'+
            '               <input id="workCodigo" name="workCodigo" value="<?php echo $usu_04; ?>" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
            '               <input id="workModo" name="workModo" value="C" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
            '               <input id="workPage" name="workPage" value="configuracion" class="form-control" type="hidden" placeholder="Page" required readonly>'+
            '           </div>'+
            '           <div class="row pt-3">'+
            '               <div class="col-sm-12 col-md-4">'+
            '                   <div class="form-group">'+
            '                       <label for="var01">ESTADO</label>'+
            '                       <select id="var01" name="var01" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Estado">'+
            '                               <option value="1">HABILITADO</option>'+
            '                               <option value="2">DESHABILITADO</option>'+
            '                           </optgroup>'+
            '                       </select>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-4">'+
            '                   <div class="form-group">'+
            '                       <label for="var02">TIPO PASTURA 1</label>'+
            '                       <select id="var02" name="var02" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Tipo Pastura 1">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'ESTABLECIMIENTOPASTURA'){
?>
            '                               <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre']; ?></option>'+
<?php
            }
        }
    }
?>
            '                           </optgroup>'+
            '                       </select>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-4">'+
            '                   <div class="form-group">'+
            '                       <label for="var03">TIPO PASTURA 2</label>'+
            '                       <select id="var03" name="var03" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Tipo Pastura 2">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'ESTABLECIMIENTOPASTURA'){
?>
            '                               <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre']; ?></option>'+
<?php
            }
        }
    }
?>
            '                           </optgroup>'+
            '                       </select>'+
            '                   </div>'+
            '               </div>'+
            '           </div>'+
            '           <div class="row pt-3">'+
            '               <div class="col-sm-12 col-md-4">'+
            '                   <div class="form-group">'+
            '                       <label for="var04">SECCIÓN</label>'+
            '                       <select id="var04" name="var04" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Sección">'+
<?php
    if ($estSeccionJSON['code'] === 200){
        foreach ($estSeccionJSON['data'] as $estSeccionKEY => $estSeccionVALUE) {
?>
            '                               <option value="<?php echo $estSeccionVALUE['establecimiento_seccion_codigo']; ?>"><?php echo $estSeccionVALUE['establecimiento_seccion_nombre']; ?></option>'+
<?php
        }
    }
?>
            '                           </optgroup>'+
            '                       </select>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-8">'+
            '                   <div class="form-group">'+
            '                       <label for="var05">POTRERO</label>'+
            '                       <input id="var05" name="var05" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="POTRERO" required>'+
            '                   </div>'+
            '               </div>'+
            '           </div>'+
            '           <div class="row pt-3">'+
            '               <div class="col-sm-12 col-md-4">'+
            '                   <div class="form-group">'+
            '                       <label for="var06">DIMENSIÓN</label>'+
            '                       <input id="var06" name="var06" class="form-control" type="number" step=".01" style="text-transform:uppercase; height:40px;" placeholder="DIMENSIÓN">'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-4">'+
            '                   <div class="form-group">'+
            '                       <label for="var07">CAPACIDAD RECEPTIVDAD</label>'+
            '                       <input id="var07" name="var07" class="form-control" type="number" step=".01" style="text-transform:uppercase; height:40px;" placeholder="CAPACIDAD RECEPTIVDAD">'+
            '                   </div>'+
            '               </div>'+
            '           </div>'+
            '	    </div>'+
            '	    <div class="modal-footer">'+
            '           <button type="submit" class="btn btn-info">Guardar</button>'+
            '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	    </div>'+
            '   </form>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }

        function getLote(){
            var html =
            '<div class="modal-content">'+
            '	<div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		<h4 class="modal-title" id="vcenter"> Loteo </h4>'+
            '		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	</div>'+
            '	<div class="modal-body" >'+
            '        <div class="table-responsive">'+
            '            <table id="tableLoad" class="table v-middle" style="width: 100%;">'+
            '                <thead id="tableCodigo" class="">'+
            '                    <tr class="bg-light">'+
            '                        <th class="border-top-0" style="text-align:center;">ESTADO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">LOTE</th>'+
            '                        <th class="border-top-0" style="text-align:center;">&nbsp;</th>'+
            '                    </tr>'+
            '                </thead>'+
            '                <tbody>'+
<?php
    if ($estLoteJSON['code'] === 200){
        foreach ($estLoteJSON['data'] as $estLoteKEY => $estLoteVALUE) {
?>
            '                    <tr>'+
            '                        <td style="text-align:left;"><?php echo $estLoteVALUE['tipo_estado_nombre']; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estLoteVALUE['establecimiento_lote_nombre']; ?></td>'+
            '                        <td style="text-align:center;"><a href="javascript:void(0)" id="<?php echo $estLoteVALUE['establecimiento_lote_codigo']; ?>" role="button" class="btn btn-danger" title="Eliminar" onclick="setLoteId(this.id)";><i class="ti-trash"></i>&nbsp;</a></td>'+
            '                    </tr>'+
<?php
        }
    }
?>
            '                </tbody>'+
            '            </table>'+
            '        </div>'+
            '	</div>'+
            '	<div class="modal-footer">'+
            '		<button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	</div>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }

        function setLote(){
            var html =
            '<div class="modal-content">'+
            '   <form id="form" data-parsley-validate method="post" action="../class/crud/establecimiento_lote.php">'+
            '	    <div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		    <h4 class="modal-title" id="vcenter"> Loteo </h4>'+
            '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	    </div>'+
            '	    <div class="modal-body" >'+
            '           <div class="form-group">'+
            '               <input id="workCodigo" name="workCodigo" value="<?php echo $usu_04; ?>" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
            '               <input id="workModo" name="workModo" value="C" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
            '               <input id="workPage" name="workPage" value="configuracion" class="form-control" type="hidden" placeholder="Page" required readonly>'+
            '           </div>'+
            '           <div class="row pt-3">'+
            '               <div class="col-sm-12 col-md-4">'+
            '                   <div class="form-group">'+
            '                       <label for="var01">ESTADO</label>'+
            '                       <select id="var01" name="var01" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Estado">'+
            '                               <option value="1">HABILITADO</option>'+
            '                               <option value="2">DESHABILITADO</option>'+
            '                           </optgroup>'+
            '                       </select>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-8">'+
            '                   <div class="form-group">'+
            '                       <label for="var02">LOTE</label>'+
            '                       <input id="var02" name="var02" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="LOTE" required>'+
            '                   </div>'+
            '               </div>'+
            '           </div>'+
            '	    </div>'+
            '	    <div class="modal-footer">'+
            '           <button type="submit" class="btn btn-info">Guardar</button>'+
            '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	    </div>'+
            '   </form>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }

        function getPoblacion(){
            var html =
            '<div class="modal-content">'+
            '	<div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		<h4 class="modal-title" id="vcenter"> Población </h4>'+
            '		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	</div>'+
            '	<div class="modal-body" >'+
            '       <div class="table-responsive">'+
            '            <table id="tableLoad" class="table v-middle" style="width: 100%;">'+
            '                <thead id="tableCodigo" class="">'+
            '                    <tr class="bg-light">'+
            '                        <th class="border-top-0" style="text-align:center;">PROPIETARIO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">ORIGEN</th>'+
            '                        <th class="border-top-0" style="text-align:center;">RAZA</th>'+
            '                        <th class="border-top-0" style="text-align:center;">CATEGORÍA</th>'+
            '                        <th class="border-top-0" style="text-align:center;">SUBCATEGORÍA</th>'+
            '                        <th class="border-top-0" style="text-align:center;">CANTIDAD</th>'+
            '                        <th class="border-top-0" style="text-align:center;">PESO PROMEDIO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">OBSERVACIÓN</th>'+
            '                        <th class="border-top-0" style="text-align:center;">&nbsp;</th>'+
            '                    </tr>'+
            '                </thead>'+
            '                <tbody>'+
<?php
    if ($estPoblacionJSON['code'] === 200){
        foreach ($estPoblacionJSON['data'] as $estPoblacionKEY => $estPoblacionVALUE) {
?>
            '                    <tr>'+
            '                        <td style="text-align:left;"><?php echo $estPoblacionVALUE['persona_completo']; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estPoblacionVALUE['tipo_origen_nombre']; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estPoblacionVALUE['tipo_raza_nombre']; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estPoblacionVALUE['tipo_categoria_nombre']; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estPoblacionVALUE['tipo_subcategoria_nombre']; ?></td>'+
            '                        <td style="text-align:right;"><?php echo number_format($estPoblacionVALUE['establecimiento_poblacion_cantidad'], 0, ',', '.'); ?></td>'+
            '                        <td style="text-align:right;"><?php echo number_format($estPoblacionVALUE['establecimiento_poblacion_peso_promedio'], 3, ',', '.').' KG'; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estPoblacionVALUE['establecimiento_poblacion_observacion']; ?></td>'+
            '                        <td style="text-align:center;"><a href="javascript:void(0)" id="<?php echo $estPoblacionVALUE['establecimiento_poblacion_codigo']; ?>" role="button" class="btn btn-danger" title="Eliminar" onclick="setPoblacionId(this.id)";><i class="ti-trash"></i>&nbsp;</a></td>'+
            '                    </tr>'+
<?php
        }
    }
?>
            '                </tbody>'+
            '            </table>'+
            '        </div>'+
            '	</div>'+
            '	<div class="modal-footer">'+
            '		<button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	</div>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }

        function setPoblacion(){
            var html =
            '<div class="modal-content">'+
            '   <form id="form" data-parsley-validate method="post" action="../class/crud/establecimiento_poblacion.php">'+
            '	    <div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		    <h4 class="modal-title" id="vcenter"> Población </h4>'+
            '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	    </div>'+
            '	    <div class="modal-body" >'+
            '           <div class="form-group">'+
            '               <input id="workCodigo" name="workCodigo" value="<?php echo $usu_04; ?>" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
            '               <input id="workModo" name="workModo" value="C" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
            '               <input id="workPage" name="workPage" value="configuracion" class="form-control" type="hidden" placeholder="Page" required readonly>'+
            '           </div>'+
            '           <div class="table-responsive">'+
            '               <table id="tableLoad" class="table v-middle" style="width: 100%;">'+
            '                   <thead id="tableCodigo" class="">'+
            '                       <tr class="bg-light">'+
            '                           <th class="border-top-0" style="text-align:center;">PROPIETARIO</th>'+
            '                           <th class="border-top-0" style="text-align:center;">ORIGEN</th>'+
            '                           <th class="border-top-0" style="text-align:center;">RAZA</th>'+
            '                           <th class="border-top-0" style="text-align:center;">SUBCATEGORÍA</th>'+
            '                           <th class="border-top-0" style="text-align:center;">CANTIDAD</th>'+
            '                           <th class="border-top-0" style="text-align:center;">PESO PROMEDIO</th>'+
            '                           <th class="border-top-0" style="text-align:center;">OBSERVACIÓN</th>'+
            '                       </tr>'+
            '                   </thead>'+
            '                   <tbody>'+
<?php
    for ($i=0; $i < 10; $i++) {
?>
            '                       <tr>'+
            '                           <td style="text-align:left;">'+
            '                               <select id="var01_<?php echo $i; ?>" name="var01_<?php echo $i; ?>" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                                   <optgroup label="Propietario">'+
<?php
    if ($estPersonaJSON['code'] === 200){
        foreach ($estPersonaJSON['data'] as $estPersonaKEY => $estPersonaVALUE) {
            if ($estPersonaVALUE['tipo_usuario_codigo'] === 49 && $estPersonaVALUE['tipo_estado_codigo'] === 1){
?>
            '                                       <option value="<?php echo $estPersonaVALUE['establecimiento_persona_codigo']; ?>"><?php echo $estPersonaVALUE['establecimiento_persona_completo']; ?></option>'+
<?php
            }
        }
    }
?>
            '                                   </optgroup>'+
            '                               </select>'+
            '                           </td>'+
            '                           <td style="text-align:left;">'+
            '                               <select id="var02_<?php echo $i; ?>" name="var02_<?php echo $i; ?>" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                                   <optgroup label="Origen">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'ANIMALORIGEN'){
                $selected = '';

                if ($dominioVALUE['tipo_codigo'] === 9){
                    $selected = 'selected';
                }
?>
            '                                       <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $dominioVALUE['tipo_nombre']; ?></option>'+
<?php
            }
        }
    }
?>
            '                                   </optgroup>'+
            '                               </select>'+
            '                           </td>'+
            '                           <td style="text-align:left;">'+
            '                               <select id="var03_<?php echo $i; ?>" name="var03_<?php echo $i; ?>" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                                   <optgroup label="Raza">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'ANIMALRAZA'){
                $selected = '';

                if ($dominioVALUE['tipo_codigo'] === 39){
                    $selected = 'selected';
                }
?>
            '                                       <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $dominioVALUE['tipo_nombre']; ?></option>'+
<?php
            }
        }
    }
?>
            '                                   </optgroup>'+
            '                               </select>'+
            '                           </td>'+
            '                           <td style="text-align:left;">'+
            '                               <select id="var04_<?php echo $i; ?>" name="var04_<?php echo $i; ?>" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
<?php
    if ($triDominioJSON['code'] === 200){
        foreach ($triDominioJSON['data'] as $triDominioKEY => $triDominioVALUE) {
            foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
                if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'ANIMALSUBCATEGORIA' && $dominioVALUE['tipo_codigo'] === $triDominioVALUE['tipo_dominio3_codigo']){
?>
            '                                   <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $triDominioVALUE['tipo_dominio2_nombre'].' - '.$dominioVALUE['tipo_nombre']; ?></option>'+
<?php
                }
            }
        }
    }
?>
            '                               </select>'+
            '                           </td>'+
            '                           <td style="text-align:left;">'+
            '                               <input id="var05_<?php echo $i; ?>" name="var05_<?php echo $i; ?>" class="form-control" type="number" style="text-transform:uppercase; height:40px;" placeholder="CANTIDAD">'+
            '                           </td>'+
            '                           <td style="text-align:left;">'+
            '                               <input id="var06_<?php echo $i; ?>" name="var06_<?php echo $i; ?>" class="form-control" type="number" step=".001" style="text-transform:uppercase; height:40px;" placeholder="PESO PROMEDIO">'+
            '                           </td>'+
            '                           <td style="text-align:left;">'+
            '                               <input id="var07_<?php echo $i; ?>" name="var07_<?php echo $i; ?>" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="OBSERVACIÓN">'+
            '                           </td>'+
            '                       </tr>'+
<?php
    }
?>
            '                   </tbody>'+
            '               </table>'+
            '           </div>'+
            '	    </div>'+
            '	    <div class="modal-footer">'+
            '           <button type="submit" class="btn btn-info">Guardar</button>'+
            '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	    </div>'+
            '   </form>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }

        function getUbicacion(){
            var html =
            '<div class="modal-content">'+
            '	<div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		<h4 class="modal-title" id="vcenter"> Ubicación </h4>'+
            '		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	</div>'+
            '	<div class="modal-body" >'+
            '       <div class="table-responsive">'+
            '            <table id="tableLoad" class="table v-middle" style="width: 100%;">'+
            '                <thead id="tableCodigo" class="">'+
            '                    <tr class="bg-light">'+
            '                        <th class="border-top-0" style="text-align:center;">POTRERO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">LOTE</th>'+
            '                        <th class="border-top-0" style="text-align:center;">CATEGORÍA</th>'+
            '                        <th class="border-top-0" style="text-align:center;">SUBCATEGORÍA</th>'+
            '                        <th class="border-top-0" style="text-align:center;">CANTIDAD</th>'+
            '                        <th class="border-top-0" style="text-align:center;">OBSERVACIÓN</th>'+
            '                        <th class="border-top-0" style="text-align:center;">&nbsp;</th>'+
            '                    </tr>'+
            '                </thead>'+
            '                <tbody>'+
<?php
    if ($estUbicacionJSON['code'] === 200){
        foreach ($estUbicacionJSON['data'] as $estUbicacionKEY => $estUbicacionVALUE) {
            if ($estUbicacionVALUE['establecimiento_ubicacion_cantidad'] > 0){
                foreach ($estUbicacionVALUE['detalle'] as $estUbicacionDetalleKEY => $estUbicacionDetalleVALUE) {
?>
            '                    <tr>'+
            '                        <td style="text-align:left;"><?php echo $estUbicacionVALUE['establecimiento_potrero_nombre']; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estUbicacionVALUE['establecimiento_lote_nombre']; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estUbicacionDetalleVALUE['tipo_categoria_nombre']; ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estUbicacionDetalleVALUE['tipo_subcategoria_nombre']; ?></td>'+
            '                        <td style="text-align:right;"><?php echo number_format($estUbicacionDetalleVALUE['establecimiento_ubicacion_detalle_cantidad'], 0, ',', '.'); ?></td>'+
            '                        <td style="text-align:left;"><?php echo $estUbicacionDetalleVALUE['establecimiento_ubicacion_detalle_observacion']; ?></td>'+
            '                        <td style="text-align:center;"><a href="javascript:void(0)" id="<?php echo $estUbicacionDetalleVALUE['establecimiento_ubicacion_detalle_codigo']; ?>" role="button" class="btn btn-danger" title="Eliminar" onclick="setUbicacionId(this.id)";><i class="ti-trash"></i>&nbsp;</a></td>'+
            '                    </tr>'+
<?php   
                }
            }
        }
    }
?>
            '                </tbody>'+
            '            </table>'+
            '        </div>'+
            '	</div>'+
            '	<div class="modal-footer">'+
            '		<button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	</div>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }

        function setUbicacion(){
            var html =
            '<div class="modal-content">'+
            '   <form id="form" data-parsley-validate method="post" action="../class/crud/establecimiento_ubicacion.php">'+
            '	    <div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		    <h4 class="modal-title" id="vcenter"> Ubicación </h4>'+
            '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	    </div>'+
            '	    <div class="modal-body" >'+
            '           <div class="row pt-3">'+
            '               <div class="col-sm-12 col-md-4">'+
            '                   <div class="form-group">'+
            '                       <label for="var01">POTRERO</label>'+
            '                       <select id="var01" name="var01" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Potrero">'+
<?php
        if ($estPotreroJSON['code'] === 200){
            foreach ($estPotreroJSON['data'] as $estPotreroKEY => $estPotreroVALUE) {
                if ($estPotreroVALUE['tipo_estado_codigo'] === 1){
?>
            '                               <option value="<?php echo $estPotreroVALUE['establecimiento_potrero_codigo']; ?>"><?php echo $estPotreroVALUE['establecimiento_potrero_nombre']; ?></option>'+
<?php
                }
            }
        }
?>
            '                           </optgroup>'+
            '                       </select>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-4">'+
            '                   <div class="form-group">'+
            '                       <label for="var02">LOTE</label>'+
            '                       <select id="var02" name="var02" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Lote">'+
<?php
        if ($estLoteJSON['code'] === 200){
            foreach ($estLoteJSON['data'] as $estLoteKEY => $estLoteVALUE) {
                if ($estLoteVALUE['tipo_estado_codigo'] === 1){
?>
            '                               <option value="<?php echo $estLoteVALUE['establecimiento_lote_codigo']; ?>"><?php echo $estLoteVALUE['establecimiento_lote_nombre']; ?></option>'+
<?php
                }
            }
        }
?>
            '                           </optgroup>'+
            '                       </select>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-4">'+
            '                   <div class="form-group">'+
            '                       <label for="var03">UBICACIÓN</label>'+
            '                       <input id="var03" name="var03" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="UBICACIÓN">'+
            '                   </div>'+
            '               </div>'+
            '           </div>'+
            '           <div class="table-responsive">'+
            '               <table id="tableLoad" class="table v-middle" style="width: 100%;">'+
            '                   <thead id="tableCodigo" class="">'+
            '                       <tr class="bg-light">'+
            '                           <th class="border-top-0" style="text-align:center;">CATEGORÍA</th>'+
            '                           <th class="border-top-0" style="text-align:center;">SUBCATEGORÍA</th>'+
            '                           <th class="border-top-0" style="text-align:center;">CANTIDAD NO UBICADO</th>'+
            '                           <th class="border-top-0" style="text-align:center;">CANTIDAD A UBICAR</th>'+
            '                           <th class="border-top-0" style="text-align:center;">OBSERVACIÓN</th>'+
            '                       </tr>'+
            '                   </thead>'+
            '                   <tbody>'+
<?php
    if ($estPoblacionJSON['code'] === 200){
        $index = 1;
        foreach ($estPoblacionJSON['data'] as $estPoblacionKEY => $estPoblacionVALUE) {
            if ($estPoblacionVALUE['establecimiento_poblacion_cantidad'] > 0){
                $aniUbicado = 0;

                foreach ($estUbicacionJSON['data'] as $estUbicacionKEY => $estUbicacionVALUE) {
                    if ($estUbicacionVALUE['establecimiento_ubicacion_cantidad'] > 0){
                        foreach ($estUbicacionVALUE['detalle'] as $estUbicacionDetalleKEY => $estUbicacionDetalleVALUE) {
                            if ($estUbicacionDetalleVALUE['tipo_categoria_codigo'] === $estPoblacionVALUE['tipo_categoria_codigo'] && $estUbicacionDetalleVALUE['tipo_subcategoria_codigo'] === $estPoblacionVALUE['tipo_subcategoria_codigo']) {
                                $aniUbicado = $aniUbicado + $estUbicacionDetalleVALUE['establecimiento_ubicacion_detalle_cantidad'];
                            }
                        }
                    }
                }

                $falUbicar = $estPoblacionVALUE['establecimiento_poblacion_cantidad'] - $aniUbicado;

                if ($falUbicar > 0){
?>
            '                       <tr>'+
            '                           <td style="text-align:left;">'+
            '                               <select id="var04_<?php echo $index; ?>" name="var04_<?php echo $index; ?>" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                                   <option value="<?php echo $estPoblacionVALUE['tipo_categoria_codigo']; ?>"><?php echo $estPoblacionVALUE['tipo_categoria_nombre']; ?></option>'+
            '                               </select>'+
            '                           </td>'+
            '                           <td style="text-align:left;">'+
            '                               <select id="var05_<?php echo $index; ?>" name="var05_<?php echo $index; ?>" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                                   <option value="<?php echo $estPoblacionVALUE['tipo_subcategoria_codigo']; ?>"><?php echo $estPoblacionVALUE['tipo_subcategoria_nombre']; ?></option>'+
            '                               </select>'+
            '                           </td>'+
            '                           <td style="text-align:left;">'+
            '                               <input id="var06_<?php echo $index; ?>" name="var06_<?php echo $index; ?>" value="<?php echo $falUbicar; ?>" class="form-control" type="number" style="text-transform:uppercase; height:40px;" placeholder="CANTIDAD" readonly>'+
            '                           </td>'+
            '                           <td style="text-align:left;">'+
            '                               <input id="var07_<?php echo $index; ?>" name="var07_<?php echo $index; ?>" value="0" min="0" max="<?php echo $falUbicar; ?>" class="form-control" type="number" style="text-transform:uppercase; height:40px;" placeholder="CANTIDAD">'+
            '                           </td>'+
            '                           <td style="text-align:left;">'+
            '                               <input id="var08_<?php echo $index; ?>" name="var08_<?php echo $index; ?>" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="OBSERVACIÓN">'+
            '                           </td>'+
            '                       </tr>'+
<?php
                    $index = $index + 1;
                }
            }
        }
    }
?>
            '                   </tbody>'+
            '               </table>'+
            '           </div>'+
            '	    </div>'+
            '           <div class="form-group">'+
            '               <input id="workCodigo" name="workCodigo" value="<?php echo $usu_04; ?>" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
            '               <input id="workModo" name="workModo" value="C" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
            '               <input id="workPage" name="workPage" value="configuracion" class="form-control" type="hidden" placeholder="Page" required readonly>'+
            '               <input id="workCount" name="workCount" value="<?php echo $index; ?>" class="form-control" type="hidden" placeholder="Page" required readonly>'+
            '           </div>'+
            '	    <div class="modal-footer">'+
            '           <button type="submit" class="btn btn-info">Guardar</button>'+
            '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	    </div>'+
            '   </form>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }

        function setUbicacionId(codigo){
            var html =
            '<div class="modal-content" style="background-color:transparent; border:0px">'+
            '   <div class="col-12">'+
            '       <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">'+
            '           <span class="sr-only">Loading...</span>'+
            '       </div>'+
            '   </div>'+
            '   <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">'+
            '       <span class="sr-only">Loading...</span>'+
            '   </div>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);

            var xHTTP	= new XMLHttpRequest();
            var xURL	= 'https://www.cerouno.me/mayordomo_api/public/v1/establecimiento/607/delete/' + codigo;
            var xPARS   = JSON.stringify({
                "auditoria_empresa_codigo": "<?php echo $seg_04; ?>",
                "auditoria_usuario": "<?php echo $usu_03; ?>",
                "auditoria_fecha_hora": "<?php echo date('Y-m-d H:i:s'); ?>",
                "auditoria_ip": "<?php echo $log_04; ?>",
            });

            xHTTP.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var xJSON = JSON.parse(this.responseText);
                    window.location.replace('../public/configuracion.php?code='+ xJSON.code + '&msg=' + xJSON.message); 
                }
            };
            
            xHTTP.open('PUT', xURL, true);
            xHTTP.setRequestHeader('Content-type', 'application/json;charset=UTF-8');
            xHTTP.send(xPARS);
        }
    </script>
</body>
</html>