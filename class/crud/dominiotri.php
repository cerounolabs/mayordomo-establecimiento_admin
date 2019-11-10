<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val01          = $_POST['var01'];
    $val02          = $_POST['var02'];
	$val03          = $_POST['var03'];
	$val04          = $_POST['var04'];
	$val05          = strtoupper($_POST['var05']);
	$val06          = strtoupper($_POST['var06']);

	$work01_1		= $_POST['workCodigo1'];
	$work01_2		= $_POST['workCodigo2'];
	$work01_3		= $_POST['workCodigo3'];
    $work02         = $_POST['workModo'];
    $work03         = $_POST['workDominio'];

	$usu_03         = $_SESSION['usu_03'];

	$log_04         = $_SESSION['log_04'];
	
	$seg_04         = $_SESSION['seg_04'];

	if (!isset($val01)){
		$val01 = 1;
	}

	if (!isset($val02)){
		$val02 = $work01_1;
	}

	if (!isset($val03)){
		$val03 = $work01_2;
	}

	if (!isset($val04)){
		$val04 = $work01_3;
	}

	if (!isset($val05)){
		$val05 = $work03;
	}

    if (isset($val01) && isset($val02) && isset($val03) && isset($val04)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'    => $val01,
				'tipo_dominio1_codigo'	=> $val02,
				'tipo_dominio2_codigo'	=> $val03,
				'tipo_dominio3_codigo'	=> $val04,
				'tipo_dominio'          => $val05,
				'tipo_observacion'      => $val06,
				'tipo_empresa'			=> $seg_04,
				'tipo_usuario'          => $usu_03,
                'tipo_fecha_hora'       => date('Y-m-d H:i:s'),
                'tipo_ip'               => $log_04
			));

		switch($work02){
			case 'C':
				$result	= post_curl('default/040', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('default/040/'.$work03.'/'.$work01_1.'/'.$work01_2.'/'.$work01_3, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('default/040/'.$work03.'/'.$work01_1.'/'.$work01_2.'/'.$work01_3, $dataJSON);
				break;
		}
	}

	$result		= json_decode($result, true);

	if ($work02 === 'D'){
		header('Location: ../../public/dominiotri.php?dominio='.$work03.'&code='.$result['code'].'&msg='.$result['message']);
	} else {
		header('Location: ../../public/dominiotri_crud.php?dominio='.$work03.'&mode='.$work02.'&dominio1='.$work01_1.'&dominio2='.$work01_2.'&dominio3='.$work01_3.'&code='.$result['code'].'&msg='.$result['message']);
	}

	ob_end_flush();
?>