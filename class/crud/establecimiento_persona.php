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
	$var05          = $_POST['var05'];
	$var06          = strtoupper($_POST['var06']);
	$var07          = strtoupper($_POST['var07']);
	$var08          = strtoupper($_POST['var08']);

    $work01         = $_POST['workCodigo'];
	$work02         = $_POST['workModo'];
	$work03         = $_POST['workPage'];

	$usu_03         = $_SESSION['usu_03'];

	$log_04         = $_SESSION['log_04'];
	
	$seg_04         = $_SESSION['seg_04'];

    if (isset($var01) && isset($var02) && isset($var03) && isset($var04)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'							=> $var01,
                'tipo_usuario_codigo'							=> $var02,
				'tipo_persona_codigo'							=> $var03,
                'tipo_documento_codigo'							=> $var05,
                'establecimiento_codigo'        				=> $work01,
				'establecimiento_persona_completo'				=> $var04,
				'establecimiento_persona_documento'				=> $var06,
				'establecimiento_persona_codigo_sitrap'			=> $var07,
                'establecimiento_persona_codigo_sigor'			=> $var08,
				'auditoria_empresa_codigo'						=> $seg_04,
				'auditoria_usuario'								=> $usu_03,
                'auditoria_fecha_hora'							=> date('Y-m-d H:i:s'),
				'auditoria_ip'									=> $log_04
			));
		
		switch($work02){
			case 'C':
				$result	= post_curl('establecimiento/601', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('establecimiento/601/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('establecimiento/601/'.$work01, $dataJSON);
				break;
		}
	}
	
	$result		= json_decode($result, true);

	header('Location: ../../public/'.$work03.'.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>