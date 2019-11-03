<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $var01          = $_POST['var01'];
	$var02          = strtoupper($_POST['var02']);

    $work01         = $_POST['workCodigo'];
	$work02         = $_POST['workModo'];
	$work03         = $_POST['workPage'];

	$usu_03         = $_SESSION['usu_03'];

	$log_04         = $_SESSION['log_04'];
	
	$seg_04         = $_SESSION['seg_04'];

    if (isset($var01) && isset($var02)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'                        => $var01,
                'establecimiento_codigo'                    => $work01,
                'establecimiento_seccion_nombre'            => $var02,
				'auditoria_empresa_codigo'                  => $seg_04,
				'auditoria_usuario'                         => $usu_03,
                'auditoria_fecha_hora'                      => date('Y-m-d H:i:s'),
				'auditoria_ip'                              => $log_04
			));
		
		switch($work02){
			case 'C':
				$result	= post_curl('default/602', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('default/602/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('default/602/'.$work01, $dataJSON);
				break;
		}
	}
	
	$result		= json_decode($result, true);

	header('Location: ../../public/'.$work03.'.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>