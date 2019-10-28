<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $var01          = $_POST['var01'];
    $var02          = strtoupper($_POST['var02']);
    $var03          = strtoupper($_POST['var03']);
	$var04          = strtoupper($_POST['var04']);
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
                'tipo_estado_codigo'			=> $var01,
				'pais_nombre'					=> $var02,
				'pais_iso3166_char2'          	=> $var03,
				'pais_iso3166_char3'			=> $var04,
				'pais_iso3166_numero'			=> $var05,
				'pais_observacion'				=> $var06,
                'pais_empresa_codigo'			=> $seg_04,
				'pais_usuario'					=> $usu_03,
				'pais_fecha_hora'				=> date('Y-m-d H:i:s'),
				'pais_ip'						=> $log_04
			));
		
		switch($work02){
			case 'C':
				$result	= post_curl('default/100', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('default/100/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('default/100/'.$work01, $dataJSON);
				break;
		}
	}

	$result		= json_decode($result, true);

	if ($work02 === 'D'){
		header('Location: ../../public/pais.php?code='.$result['code'].'&msg='.$result['message']);
	} else {
		header('Location: ../../public/pais_crud.php?mode='.$work02.'&codigo='.$work01.'&code='.$result['code'].'&msg='.$result['message']);
	}

	ob_end_flush();
?>