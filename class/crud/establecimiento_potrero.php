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
	$var05          = strtoupper($_POST['var05']);
	$var06          = strtoupper($_POST['var06']);

    $work01         = $_POST['workCodigo'];
	$work02         = $_POST['workModo'];
	$work03         = $_POST['workPage'];

	$usu_03         = $_SESSION['usu_03'];

	$log_04         = $_SESSION['log_04'];
	
	$seg_04         = $_SESSION['seg_04'];

    if (isset($var01) && isset($var05)) {
        $dataJSON = json_encode(
            array(
				'tipo_estado_codigo'                        	=> $var01,
				'tipo_pastura_codigo'                       	=> $var02,
				'establecimiento_codigo'                    	=> $work01,
				'establecimiento_seccion_codigo'            	=> $var04,
				'establecimiento_potrero_nombre'            	=> $var05,
				'establecimiento_potrero_hectarea'				=> $var03,
				'establecimiento_potrero_observacion'			=> $var06,
				'auditoria_empresa_codigo'                  	=> $seg_04,
				'auditoria_usuario'                         	=> $usu_03,
                'auditoria_fecha_hora'                      	=> date('Y-m-d H:i:s'),
				'auditoria_ip'                              	=> $log_04
			));
		
		switch($work02){
			case 'C':
				$result	= post_curl('default/603', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('default/603/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('default/603/'.$work01, $dataJSON);
				break;
		}
	}
	
	$result		= json_decode($result, true);

	header('Location: ../../public/'.$work03.'.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>