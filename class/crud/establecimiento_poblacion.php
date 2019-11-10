<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

	for ($i=0; $i < 5; $i++) { 
		$var01          = $_POST['var01_'.$i];
		$var02          = $_POST['var02_'.$i];
		$var03          = $_POST['var03_'.$i];
		$var04          = $_POST['var04_'.$i];
		$var05          = $_POST['var05_'.$i];
		$var06          = $_POST['var06_'.$i];
		$var07          = $_POST['var07_'.$i];

		$work01         = $_POST['workCodigo'];
		$work02         = $_POST['workModo'];
		$work03         = $_POST['workPage'];

		$usu_03         = $_SESSION['usu_03'];

		$log_04         = $_SESSION['log_04'];
		
		$seg_04         = $_SESSION['seg_04'];

		if (isset($var01) && isset($var02) && isset($var05) && $var05 > 0) {
			$dataJSON = json_encode(
				array(
					'tipo_origen_codigo'						=> $var02,
					'tipo_raza_codigo'							=> $var03,
					'tipo_subcategoria_codigo'					=> $var04,
					'establecimiento_codigo'                    => $work01,
					'persona_codigo'							=> $var01,
					'establecimiento_poblacion_cantidad'		=> $var05,
					'establecimiento_poblacion_peso'			=> $var06,
					'establecimiento_poblacion_observacion'		=> $var07,
					'auditoria_empresa_codigo'                  => $seg_04,
					'auditoria_usuario'                         => $usu_03,
					'auditoria_fecha_hora'                      => date('Y-m-d H:i:s'),
					'auditoria_ip'                              => $log_04
				));
			
			switch($work02){
				case 'C':
					$result	= post_curl('establecimiento/605', $dataJSON);
					break;
				case 'U':
					$result	= put_curl('establecimiento/605/'.$work01, $dataJSON);
					break;
				case 'D':
					$result	= delete_curl('establecimiento/605/'.$work01, $dataJSON);
					break;
			}
		}
	}
	
	$result		= json_decode($result, true);

	header('Location: ../../public/'.$work03.'.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>