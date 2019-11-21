<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
	require '../../class/function/curl_api.php';
	
	$var01	= $_POST['var01'];
	$var02  = $_POST['var02'];
    $var03	= $_POST['var03'];
    $var04  = $_POST['var04'];
	
	if (isset($_POST['var05'])) {
		$pos		= strpos($_POST['var05'], '_');
		$var05_1	= substr($_POST['var05'], 0, $pos);
		$var05_2	= substr($_POST['var05'], ($pos+1));
	}

    $var06  = trim(strtoupper($_POST['var06']));
    $var07  = $_POST['var07'];
    $var08	= $_POST['var08'];
    $var09  = $_POST['var09'];

	$work01 = $_POST['workCodigo'];
	$work02 = $_POST['workModo'];
	$work03 = $_POST['workPage'];
	$work04 = $_POST['workPeso'];

	$usu_03	= $_SESSION['usu_03'];

	$log_04 = $_SESSION['log_04'];
	
	$seg_04	= $_SESSION['seg_04'];

	if (isset($var01) && isset($var02) && isset($var03) && isset($var04) && isset($var05_1) && isset($var05_2) && isset($var06) && isset($var07)) {
		$dataJSON = json_encode(
			array(
				'tipo_estado_codigo'			            => $var01,
				'tipo_origen_codigo'				        => $var03,
				'tipo_raza_codigo'                          => $var04,
				'tipo_categoria_codigo'			        	=> $var05_1,
				'tipo_subcategoria_codigo'			        => $var05_2,
                'tipo_peso_codigo'		                    => $work04,
                'establecimiento_codigo'		            => $work01,
                'establecimiento_persona_codigo'		    => $var02,
                'animal_codigo_nacimiento'		            => $var06,
                'animal_pesaje_fecha'		                => $var07,
                'animal_pesaje_peso'		                => $var08,
                'animal_observacion'                        => $var09,
				'auditoria_empresa_codigo'                  => $seg_04,
				'auditoria_usuario'                         => $usu_03,
				'auditoria_fecha_hora'                      => date('Y-m-d H:i:s'),
				'auditoria_ip'                              => $log_04
			));

        $result         = post_curl('establecimiento/608', $dataJSON);
		$result			= json_decode($result, true);
    }
    
	header('Location: ../../public/'.$work03.'.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>