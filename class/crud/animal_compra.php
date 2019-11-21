<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
	require '../../class/function/curl_api.php';
	require '../../class/function/function.php';
	
	$var01	= trim(strtoupper($_POST['var01']));
	$var02  = trim(strtoupper($_POST['var02']));
	$var03	= trim(strtoupper($_POST['var03']));
	$var04	= trim(strtoupper($_POST['var04']));
    $var05  = trim(strtoupper($_POST['var05']));
    $var06  = $_POST['var06'];
	$var07	= $_POST['var07'];
	$var08	= trim(strtoupper($_POST['var08']));

	$work01 = $_POST['workCodigo'];
	$work02 = $_POST['workModo'];
	$work03 = $_POST['workPage'];
	$work04 = $_POST['workCount'];

	$usu_03	= $_SESSION['usu_03'];

	$log_04 = $_SESSION['log_04'];
	
	$seg_04	= $_SESSION['seg_04'];

	if (isset($var01) && isset($var02) && isset($var03) && isset($var04) && isset($var05)) {
		$dataJSON = json_encode(
			array(
				'animal_compra_chofer'			            => $var01,
				'animal_compra_chapa'				        => $var02,
				'animal_compra_entregado'                   => $var03,
				'animal_compra_recibo'			        	=> $var04,
				'animal_compra_cota'			        	=> $var05,
				'animal_compra_guia'		            	=> $var06,
                'animal_compra_factura'		                => $var07,
                'animal_compra_fecha'		    			=> $var08,
				'auditoria_empresa_codigo'                  => $seg_04,
				'auditoria_usuario'                         => $usu_03,
				'auditoria_fecha_hora'                      => date('Y-m-d H:i:s'),
				'auditoria_ip'                              => $log_04
			));

        $result         = post_curl('establecimiento/610', $dataJSON);
		$result			= json_decode($result, true);
		$codigoCompra	= $result['codigo'];
	}
	
	for ($i=0; $i < $work04; $i++) { 
		$var09	= $_POST['var09_'.$i];
		$var10  = $_POST['var10_'.$i];
		$var11	= $_POST['var11_'.$i];
		$var12	= $_POST['var12_'.$i];
		$var13  = $_POST['var13_'.$i];
		$var14	= 10;
		$var15	= 79;

		if (isset($var12) && $var12 > 0 && $codigoCompra > 0) {
			$dataJSON = json_encode(
				array(
					'tipo_origen_codigo'			            => $var14,
					'tipo_raza_codigo'				        	=> $var10,
					'tipo_categoria_codigo'                   	=> $var11,
					'tipo_subcategoria_codigo'			        => $var15,
					'establecimiento_codigo'		        	=> $work01,
					'establecimiento_persona_codigo'           	=> $var09,
					'animal_codigo_movimiento'					=> getFechaHora(3),
					'animal_compra_codigo'		                => $codigoCompra,
					'animal_compra_cantidad'		    		=> $var12,
					'animal_compra_peso'						=> $var13,
					'auditoria_empresa_codigo'                  => $seg_04,
					'auditoria_usuario'                         => $usu_03,
					'auditoria_fecha_hora'                      => date('Y-m-d H:i:s'),
					'auditoria_ip'                              => $log_04
				));
	
			$result         = post_curl('establecimiento/610/detalle', $dataJSON);
			$result			= json_decode($result, true);
		}
	}
    
	header('Location: ../../public/'.$work03.'.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>