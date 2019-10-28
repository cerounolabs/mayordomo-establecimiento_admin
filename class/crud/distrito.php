<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $var01          = $_POST['var01'];
    $var02          = $_POST['var02'];
    $var03          = strtoupper($_POST['var03']);
	$var04          = $_POST['var04'];
	$var05          = $_POST['var05'];
	$var06          = strtoupper($_POST['var06']);

    $work01         = $_POST['workCodigo'];
    $work02         = $_POST['workModo'];

	$usu_03         = $_SESSION['usu_03'];

	$log_04         = $_SESSION['log_04'];
	
	$seg_04         = $_SESSION['seg_04'];

    if (isset($var01) && isset($var02) && isset($var03) && isset($var04) && isset($var05)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'				=> $var01,
				'tipo_zona_codigo'					=> $var04,
				'tipo_riesgo_codigo'				=> $var05,
				'departamento_codigo'				=> $var02,
				'distrito_nombre'					=> $var03,
				'distrito_observacion'				=> $var06,
				'distrito_empresa_codigo'			=> $seg_04,
				'distrito_usuario'					=> $usu_03,
                'distrito_fecha_hora'				=> date('Y-m-d H:i:s'),
				'distrito_ip'						=> $log_04
			));
		
		switch($work02){
			case 'C':
				$result	= post_curl('default/300', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('default/300/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('default/300/'.$work01, $dataJSON);
				break;
		}
	}

	$result		= json_decode($result, true);

	if ($work02 === 'D'){
		header('Location: ../../public/distrito.php?code='.$result['code'].'&msg='.$result['message']);
	} else {
		header('Location: ../../public/distrito_crud.php?mode='.$work02.'&codigo='.$work01.'&code='.$result['code'].'&msg='.$result['message']);
	}

	ob_end_flush();
?>