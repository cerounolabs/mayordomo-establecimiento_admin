<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

	for ($i=0; $i < 10; $i++) { 
		$var01	= $_POST['var01_'.$i];
		$var02  = $_POST['var02_'.$i];
		$var03  = $_POST['var03_'.$i];
		$var04  = $_POST['var04_'.$i];
		$var05  = '';
		$var06	= trim(strtoupper($_POST['var05_'.$i]));

		$work01 = $_POST['workCodigo'];
		$work02 = $_POST['workModo'];
		$work03 = $_POST['workPage'];

		$usu_03	= $_SESSION['usu_03'];

		$log_04 = $_SESSION['log_04'];
		
		$seg_04	= $_SESSION['seg_04'];

		if (isset($var01) && isset($var02) && isset($var03) && isset($var04) && $var04 > 0) {
			$dataJSON = json_encode(
				array(
					'establecimiento_potrero_codigo'			=> $var01,
					'establecimiento_lote_codigo'				=> $var02,
					'establecimiento_codigo'                    => $work01,
					'establecimiento_ubicacion_nombre'			=> $var05,
					'establecimiento_ubicacion_observacion'		=> $var06,
					'auditoria_empresa_codigo'                  => $seg_04,
					'auditoria_usuario'                         => $usu_03,
					'auditoria_fecha_hora'                      => date('Y-m-d H:i:s'),
					'auditoria_ip'                              => $log_04
				));
			
			switch($work02){
				case 'C':
					$result	= post_curl('establecimiento/606', $dataJSON);
					break;
				case 'U':
					$result	= put_curl('establecimiento/606/'.$work01, $dataJSON);
					break;
				case 'D':
					$result	= delete_curl('establecimiento/606/'.$work01, $dataJSON);
					break;
			}

			$result			= json_decode($result, true);
			$codUbicacion	= $result['codigo'];

			if ($codUbicacion > 0){
				$dataJSON = json_encode(
					array(
						'tipo_estado_codigo'							=> 1,
						'establecimiento_ubicacion_codigo'				=> $codUbicacion,
						'tipo_subcategoria_codigo'						=> $var03,
						'establecimiento_ubicacion_detalle_cantidad'	=> $var04,
						'establecimiento_ubicacion_detalle_observacion'	=> $var06,
						'auditoria_empresa_codigo'                  	=> $seg_04,
						'auditoria_usuario'                         	=> $usu_03,
						'auditoria_fecha_hora'                      	=> date('Y-m-d H:i:s'),
						'auditoria_ip'                              	=> $log_04
					));
				
				switch($work02){
					case 'C':
						$result	= post_curl('establecimiento/607', $dataJSON);
						break;
					case 'U':
						$result	= put_curl('establecimiento/607/'.$work01, $dataJSON);
						break;
					case 'D':
						$result	= delete_curl('establecimiento/607/'.$work01, $dataJSON);
						break;
				}

				$result	= json_decode($result, true);
			}
		}
	}

	header('Location: ../../public/'.$work03.'.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>