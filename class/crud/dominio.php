<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val01          = $_POST['var01'];
    $val02          = strtoupper($_POST['var02']);
    $val03          = strtoupper($_POST['var03']);
    $val04          = strtoupper($_POST['var04']);

    $work01         = $_POST['workCodigo'];
    $work02         = $_POST['workModo'];
    $work03         = $_POST['workDominio'];

	$usu_03         = $_SESSION['usu_03'];

	$log_04         = $_SESSION['log_04'];
	
	$seg_04         = $_SESSION['seg_04'];

    if (isset($val01) && isset($val02) && isset($val03)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'    => $val01,
				'tipo_nombre'           => $val02,
				'tipo_dominio'          => $val03,
				'tipo_observacion'      => $val04,
				'tipo_empresa'			=> $seg_04,
				'tipo_usuario'          => $usu_03,
                'tipo_fecha_hora'       => date('Y-m-d H:i:s'),
                'tipo_ip'               => $log_04
			));
		
		switch($work02){
			case 'C':
				$result	= post_curl('default/000', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('default/000/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('default/000/'.$work01, $dataJSON);
				break;
		}
	}

	$result		= json_decode($result, true);

	if ($work02 === 'D'){
		header('Location: ../../public/dominio.php?dominio='.$work03.'&code='.$result['code'].'&msg='.$result['message']);
	} else {
		header('Location: ../../public/dominio_crud.php?dominio='.$work03.'&mode='.$work02.'&codigo='.$work01.'&code='.$result['code'].'&msg='.$result['message']);
	}

	ob_end_flush();
?>