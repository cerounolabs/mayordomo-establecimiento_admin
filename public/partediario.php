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

    $dominioJSON        = get_curl('default/000');
    $triDominioJSON     = get_curl('default/040/ANIMALESPECIECATEGORIASUBCATEGORIA');
    
    $estPersonaJSON     = get_curl('establecimiento/601/'.$usu_04);
    $aniNacimientoJSON  = get_curl('establecimiento/608/'.$usu_04.'/'.date('Ymd'));
    $aniDonacionJSON    = get_curl('establecimiento/609/'.$usu_04.'/'.date('Ymd'));

//    $estSeccionJSON     = get_curl('default/602/'.$usu_04);

//    $estPotreroJSON     = get_curl('default/603/'.$usu_04);

//    $estLoteJSON        = get_curl('establecimiento/604/'.$usu_04);

//    $estPoblacionJSON   = get_curl('establecimiento/605/'.$usu_04);

//    $estUbicacionJSON   = get_curl('establecimiento/606/'.$usu_04);
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
                    <div class="col-12">
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-2 col-md-3">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top" src="../assets/images/icon/default.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Nacimiento</h4>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:left;" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getNacimiento();">Ver</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:right;" title="Nuevo" data-toggle="modal" data-target="#modaldiv" onclick="setNacimiento();">Nuevo</a>
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
                                        <h4 class="card-title">Compra</h4>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:left;" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getNacimiento();">Ver</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:right;" title="Nuevo" data-toggle="modal" data-target="#modaldiv" onclick="setNacimiento();">Nuevo</a>
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
                                        <h4 class="card-title">Donaci&oacute;n</h4>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:left;" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getDonacion();">Ver</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:right;" title="Nuevo" data-toggle="modal" data-target="#modaldiv" onclick="setDonacion();">Nuevo</a>
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
                                        <h4 class="card-title">Traslado</h4>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:left;" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getNacimiento();">Ver</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:right;" title="Nuevo" data-toggle="modal" data-target="#modaldiv" onclick="setNacimiento();">Nuevo</a>
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
                                        <h4 class="card-title">Sobrante</h4>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:left;" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getNacimiento();">Ver</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="float:right;" title="Nuevo" data-toggle="modal" data-target="#modaldiv" onclick="setNacimiento();">Nuevo</a>
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
        function getNacimiento(){
            var html =
            '<div class="modal-content">'+
            '	<div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		<h4 class="modal-title" id="vcenter"> Nacimiento </h4>'+
            '		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	</div>'+
            '	<div class="modal-body" >'+
            '        <div class="table-responsive">'+
            '            <table id="tableLoad" class="table v-middle" style="width: 100%;">'+
            '                <thead id="tableCodigo" class="">'+
            '                    <tr class="bg-light">'+
            '                        <th class="border-top-0" style="text-align:center;">CÓDIGO NACIMIENTO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">PROPIETARIO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">ORIGEN</th>'+
            '                        <th class="border-top-0" style="text-align:center;">RAZA</th>'+
            '                        <th class="border-top-0" style="text-align:center;">CATEGORÍA</th>'+
            '                        <th class="border-top-0" style="text-align:center;">SUBCATEGORÍA</th>'+
            '                        <th class="border-top-0" style="text-align:center;">PESO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">FECHA</th>'+
            '                    </tr>'+
            '                </thead>'+
            '                <tbody>'+
<?php
    if ($aniNacimientoJSON['code'] === 200){
        foreach ($aniNacimientoJSON['data'] as $aniNacimientoKEY => $aniNacimientoVALUE) {
?>
            '                    <tr>'+
            '                        <td><?php echo $aniNacimientoVALUE['animal_codigo_nacimiento']; ?></td>'+
            '                        <td><?php echo $aniNacimientoVALUE['establecimiento_persona_completo']; ?></td>'+
            '                        <td><?php echo $aniNacimientoVALUE['tipo_origen_nombre']; ?></td>'+
            '                        <td><?php echo $aniNacimientoVALUE['tipo_raza_nombre']; ?></td>'+
            '                        <td><?php echo $aniNacimientoVALUE['tipo_categoria_nombre']; ?></td>'+
            '                        <td><?php echo $aniNacimientoVALUE['tipo_subcategoria_nombre']; ?></td>'+
            '                        <td><?php echo $aniNacimientoVALUE['animal_pesaje_fecha']; ?></td>'+
            '                        <td><?php echo $aniNacimientoVALUE['animal_pesaje_peso']; ?></td>'+
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

        function setNacimiento(){
            var html =
            '<div class="modal-content">'+
            '   <form id="form" data-parsley-validate method="post" action="../class/crud/animal_nacimiento.php">'+
            '	    <div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		    <h4 class="modal-title" id="vcenter"> Nacimiento </h4>'+
            '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	    </div>'+
            '	    <div class="modal-body" >'+
            '           <div class="form-group">'+
            '               <input id="workCodigo" name="workCodigo" value="<?php echo $usu_04; ?>" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
            '               <input id="workModo" name="workModo" value="C" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
            '               <input id="workPage" name="workPage" value="partediario" class="form-control" type="hidden" placeholder="Page" required readonly>'+
            '               <input id="workPage" name="workPeso" value="76" class="form-control" type="hidden" placeholder="Peso" required readonly>'+
            '           </div>'+
            '           <div class="row pt-3">'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var01">ESTADO</label>'+
            '                       <select id="var01" name="var01" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Estado">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'ANIMALESTADO' && ($dominioVALUE['tipo_codigo'] === 74 || $dominioVALUE['tipo_codigo'] === 75)){
                $selected = '';

                if ($dominioVALUE['tipo_codigo'] === 74){
                    $selected = 'selected';
                }
?>
            '                               <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $dominioVALUE['tipo_nombre']; ?></option>'+
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
            '                       <label for="var02">PROPIETARIO</label>'+
            '                       <select id="var02" name="var02" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Propietario">'+
<?php
    if ($estPersonaJSON['code'] === 200){
        foreach ($estPersonaJSON['data'] as $estPersonaKEY => $estPersonaVALUE) {
            if ($estPersonaVALUE['tipo_usuario_codigo'] === 49 && $estPersonaVALUE['tipo_estado_codigo'] === 1){
?>
            '                               <option value="<?php echo $estPersonaVALUE['establecimiento_persona_codigo']; ?>"><?php echo $estPersonaVALUE['establecimiento_persona_completo']; ?></option>'+
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
            '                       <label for="var03">ORIGEN</label>'+
            '                       <select id="var03" name="var03" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Origen">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'ANIMALORIGEN'){
                $selected = '';

                if ($dominioVALUE['tipo_codigo'] === 9){
                    $selected = 'selected';
                }
?>
            '                               <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $dominioVALUE['tipo_nombre']; ?></option>'+
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
            '                       <label for="var04">RAZA</label>'+
            '                       <select id="var04" name="var04" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Raza">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'ANIMALRAZA'){
                $selected = '';

                if ($dominioVALUE['tipo_codigo'] === 39){
                    $selected = 'selected';
                }
?>
            '                               <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $dominioVALUE['tipo_nombre']; ?></option>'+
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
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var05">CATEGORÍA - SUBCATEGORÍA</label>'+
            '                       <select id="var05" name="var05" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Categoría - SubCategoría">'+
<?php
    if ($triDominioJSON['code'] === 200){
        foreach ($triDominioJSON['data'] as $triDominioKEY => $triDominioVALUE) {
            foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
                if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'ANIMALSUBCATEGORIA' && $dominioVALUE['tipo_codigo'] === $triDominioVALUE['tipo_dominio3_codigo'] && $triDominioVALUE['tipo_dominio2_codigo'] === 45){
?>
            '                                   <option value="<?php echo $triDominioVALUE['tipo_dominio2_codigo'].'_'.$dominioVALUE['tipo_codigo']; ?>"><?php echo $triDominioVALUE['tipo_dominio2_nombre'].' - '.$dominioVALUE['tipo_nombre']; ?></option>'+
<?php
                }
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
            '                       <label for="var06">CÓDIGO NACIMIENTO</label>'+
            '                       <input id="var06" name="var06" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="CÓDIGO NACIMIENTO" required>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var07">FECHA NACIMIENTO</label>'+
            '                       <input id="var07" name="var07" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="FECHA NACIMIENTO" required>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var08">PESO NACIMIENTO</label>'+
            '                       <input id="var08" name="var08" class="form-control" type="number" step=".001" style="text-transform:uppercase; height:40px;" placeholder="PESO NACIMIENTO">'+
            '                   </div>'+
            '               </div>'+
            '           </div>'+
            '           <div class="row pt-3">'+
            '                <div class="col-sm-12">'+
            '                    <div class="form-group">'+
            '                        <label for="var09">OBSERVACI&Oacute;N</label>'+
            '                        <textarea id="var09" name="var09" class="form-control" rows="3" style="text-transform:uppercase;"></textarea>'+
            '                    </div>'+
            '                </div>'+
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

        function getDonacion(){
            var html =
            '<div class="modal-content">'+
            '	<div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		<h4 class="modal-title" id="vcenter"> Donación </h4>'+
            '		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	</div>'+
            '	<div class="modal-body" >'+
            '        <div class="table-responsive">'+
            '            <table id="tableLoad" class="table v-middle" style="width: 100%;">'+
            '                <thead id="tableCodigo" class="">'+
            '                    <tr class="bg-light">'+
            '                        <th class="border-top-0" style="text-align:center;">CÓDIGO DONACIÓN</th>'+
            '                        <th class="border-top-0" style="text-align:center;">PROPIETARIO</th>'+
            '                        <th class="border-top-0" style="text-align:center;">ORIGEN</th>'+
            '                        <th class="border-top-0" style="text-align:center;">RAZA</th>'+
            '                        <th class="border-top-0" style="text-align:center;">CATEGORÍA</th>'+
            '                        <th class="border-top-0" style="text-align:center;">SUBCATEGORÍA</th>'+
            '                    </tr>'+
            '                </thead>'+
            '                <tbody>'+
<?php
    if ($aniDonacionJSON['code'] === 200){
        foreach ($aniDonacionJSON['data'] as $aniDonacionKEY => $aniDonacionVALUE) {
            if ($aniDonacionVALUE['tipo_donacion_codigo'] === 77){
?>
            '                    <tr>'+
            '                        <td><?php echo $aniDonacionVALUE['animal_codigo_donacion']; ?></td>'+
            '                        <td><?php echo $aniDonacionVALUE['establecimiento_persona_completo']; ?></td>'+
            '                        <td><?php echo $aniDonacionVALUE['tipo_origen_nombre']; ?></td>'+
            '                        <td><?php echo $aniDonacionVALUE['tipo_raza_nombre']; ?></td>'+
            '                        <td><?php echo $aniDonacionVALUE['tipo_categoria_nombre']; ?></td>'+
            '                        <td><?php echo $aniDonacionVALUE['tipo_subcategoria_nombre']; ?></td>'+
            '                    </tr>'+
<?php
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

        function setDonacion(){
            var html =
            '<div class="modal-content">'+
            '   <form id="form" data-parsley-validate method="post" action="../class/crud/animal_donacion.php">'+
            '	    <div class="modal-header" style="color:#fff; background: linear-gradient(to right, rgba(164,179,87,1) 0%, rgba(33,98,22,1) 100%);">'+
            '		    <h4 class="modal-title" id="vcenter"> Donacion </h4>'+
            '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	    </div>'+
            '	    <div class="modal-body" >'+
            '           <div class="form-group">'+
            '               <input id="workCodigo" name="workCodigo" value="<?php echo $usu_04; ?>" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
            '               <input id="workModo" name="workModo" value="C" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
            '               <input id="workPage" name="workPage" value="partediario" class="form-control" type="hidden" placeholder="Page" required readonly>'+
            '               <input id="workPage" name="workDonacion" value="77" class="form-control" type="hidden" placeholder="Peso" required readonly>'+
            '           </div>'+
            '           <div class="row pt-3">'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var01">PROPIETARIO</label>'+
            '                       <select id="var01" name="var01" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Propietario">'+
<?php
    if ($estPersonaJSON['code'] === 200){
        foreach ($estPersonaJSON['data'] as $estPersonaKEY => $estPersonaVALUE) {
            if ($estPersonaVALUE['tipo_usuario_codigo'] === 49 && $estPersonaVALUE['tipo_estado_codigo'] === 1){
?>
            '                               <option value="<?php echo $estPersonaVALUE['establecimiento_persona_codigo']; ?>"><?php echo $estPersonaVALUE['establecimiento_persona_completo']; ?></option>'+
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
            '                       <label for="var02">ORIGEN</label>'+
            '                       <select id="var02" name="var02" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Origen">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'ANIMALORIGEN'){
                $selected = '';

                if ($dominioVALUE['tipo_codigo'] === 10){
                    $selected = 'selected';
                }
?>
            '                               <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $dominioVALUE['tipo_nombre']; ?></option>'+
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
            '                       <label for="var03">RAZA</label>'+
            '                       <select id="var03" name="var03" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Raza">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'ANIMALRAZA'){
                $selected = '';

                if ($dominioVALUE['tipo_codigo'] === 39){
                    $selected = 'selected';
                }
?>
            '                               <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $dominioVALUE['tipo_nombre']; ?></option>'+
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
            '                       <label for="var04">CATEGORÍA - SUBCATEGORÍA</label>'+
            '                       <select id="var04" name="var04" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
            '                           <optgroup label="Categoría - SubCategoría">'+
<?php
    if ($triDominioJSON['code'] === 200){
        foreach ($triDominioJSON['data'] as $triDominioKEY => $triDominioVALUE) {
            foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
                if ($dominioVALUE['tipo_estado_codigo'] === 1 && $dominioVALUE['tipo_dominio'] === 'ANIMALSUBCATEGORIA' && $dominioVALUE['tipo_codigo'] === $triDominioVALUE['tipo_dominio3_codigo']){
                    $selected = '';

                    if ($triDominioVALUE['tipo_dominio2_codigo'] === 47 && $dominioVALUE['tipo_codigo'] === 66){
                        $selected = 'selected';
                    }
?>
            '                                   <option value="<?php echo $triDominioVALUE['tipo_dominio2_codigo'].'_'.$dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $triDominioVALUE['tipo_dominio2_nombre'].' - '.$dominioVALUE['tipo_nombre']; ?></option>'+
<?php
                }
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
            
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var05">CÓDIGO DONACIÓN</label>'+
            '                       <input id="var05" name="var05" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="CÓDIGO DONACIÓN" required>'+
            '                   </div>'+
            '               </div>'+
            '               <div class="col-sm-12 col-md-3">'+
            '                   <div class="form-group">'+
            '                       <label for="var06">FECHA DONACIÓN</label>'+
            '                       <input id="var06" name="var06" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="FECHA DONACIÓN" required>'+
            '                   </div>'+
            '               </div>'+
            '           </div>'+
            '           <div class="row pt-3">'+
            '                <div class="col-sm-12">'+
            '                    <div class="form-group">'+
            '                        <label for="var07">OBSERVACI&Oacute;N</label>'+
            '                        <textarea id="var07" name="var07" class="form-control" rows="3" style="text-transform:uppercase;"></textarea>'+
            '                    </div>'+
            '                </div>'+
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
    </script>
</body>
</html>