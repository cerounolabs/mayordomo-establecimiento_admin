<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $var01          = $_POST['var01'];
    $var02          = $_POST['var02'];
    $var03          = $_POST['var03'];
	$var04          = strtoupper($_POST['var04']);
	$var05          = strtoupper($_POST['var05']);
	$var06          = strtoupper($_POST['var06']);
	$var07          = strtolower($_POST['var07']);
	$var08          = strtoupper($_POST['var08']);
	$var13          = strtoupper($_POST['var13']);
	$var14          = strtoupper($_POST['var14']);

    $work01         = $_POST['workCodigo'];
    $work02         = $_POST['workModo'];

	$usu_03         = $_SESSION['usu_03'];

	$log_04         = $_SESSION['log_04'];
	
	$seg_04         = $_SESSION['seg_04'];

    if (isset($var01) && isset($var02) && isset($var03) && isset($var04)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'			=> $var01,
				'tipo_persona_codigo'			=> $var02,
				'tipo_documento_codigo'			=> $var03,
				'persona_completo'				=> $var04,
				'persona_documento'				=> $var05,
				'persona_codigo_sitrap'			=> $var13,
				'persona_codigo_sigor'			=> $var14,
				'persona_telefono'				=> $var06,
				'persona_email'					=> $var07,
				'persona_observacion'			=> $var08,
				'persona_empresa_codigo'		=> $seg_04,
				'persona_usuario'				=> $usu_03,
                'persona_fecha_hora'			=> date('Y-m-d H:i:s'),
				'persona_ip'					=> $log_04
			));
		
		switch($work02){
			case 'C':
				$result	= post_curl('default/400', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('default/400/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('default/400/'.$work01, $dataJSON);
				break;
		}
	}
	
	$result		= json_decode($result, true);

	if ($work02 === 'D'){
		header('Location: ../../public/persona.php?code='.$result['code'].'&msg='.$result['message']);
	} else {
		header('Location: ../../public/persona_crud.php?mode='.$work02.'&codigo='.$work01.'&code='.$result['code'].'&msg='.$result['message']);
	}

	ob_end_flush();
?>