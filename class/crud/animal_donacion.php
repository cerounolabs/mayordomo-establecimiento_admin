<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
	require '../../class/function/curl_api.php';
	
	$var01	= $_POST['var01'];
	$var02  = $_POST['var02'];
    $var03	= $_POST['var03'];
	
	if (isset($_POST['var04'])) {
		$pos		= strpos($_POST['var04'], '_');
		$var04_1	= substr($_POST['var04'], 0, $pos);
		$var04_2	= substr($_POST['var04'], ($pos+1));
	}

    $var05  = trim(strtoupper($_POST['var05']));
    $var06  = $_POST['var06'];
    $var07	= $_POST['var07'];

	$work01 = $_POST['workCodigo'];
	$work02 = $_POST['workModo'];
	$work03 = $_POST['workPage'];
	$work04 = $_POST['workDonacion'];

	$usu_03	= $_SESSION['usu_03'];

	$log_04 = $_SESSION['log_04'];
	
	$seg_04	= $_SESSION['seg_04'];

	if (isset($var01) && isset($var02) && isset($var03) && isset($var04_1) && isset($var04_2) && isset($var05) && isset($var06)) {
		$dataJSON = json_encode(
			array(
				'tipo_estado_codigo'			            => 1,
				'tipo_origen_codigo'				        => $var02,
				'tipo_raza_codigo'                          => $var03,
				'tipo_categoria_codigo'			        	=> $var04_1,
				'tipo_subcategoria_codigo'			        => $var04_2,
                'tipo_donacion_codigo'		                => $work04,
                'establecimiento_codigo'		            => $work01,
                'establecimiento_persona_codigo'		    => $var01,
                'animal_codigo_donacion'		            => $var05,
                'animal_donacion_fecha'		                => $var06,
                'animal_observacion'                        => $var07,
				'auditoria_empresa_codigo'                  => $seg_04,
				'auditoria_usuario'                         => $usu_03,
				'auditoria_fecha_hora'                      => date('Y-m-d H:i:s'),
				'auditoria_ip'                              => $log_04
			));

        $result         = post_curl('establecimiento/609', $dataJSON);
		$result			= json_decode($result, true);
    }
    
	header('Location: ../../public/'.$work03.'.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>