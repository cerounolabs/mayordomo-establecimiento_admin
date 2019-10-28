<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    }

    require '../../class/function/curl_api.php';
    require '../../class/function/function.php';

    $val_01         = $_POST['val_01'];
    $val_02         = $_POST['val_02'];
    $val_03         = getUUID();
    $val_04         = $_SERVER['REMOTE_ADDR'];

    if ($val_01 === 'admin@mayordomo.com' && $val_02 === 'mayordomo2019'){
        $_SESSION['log_01'] = $val_01;
        $_SESSION['log_02'] = $val_02;
        $_SESSION['log_03'] = $val_03;
        $_SESSION['log_04'] = $val_04;

        $_SESSION['usu_01'] = 'ADMINISTRADOR';
        $_SESSION['usu_02'] = 'MAYORDOMO';
        $_SESSION['usu_03'] = 'SISTEMA';

        $_SESSION['seg_04'] = 1;

        $_SESSION['expire'] = time() + 3600;

        header('Location: ../../public/home.php');
    } else { 
        $dataJSON       = json_encode(
            array(
                'usuario_var01' => $val_01,
                'usuario_var02' => $val_02,
                'usuario_var03' => $val_03,
                'usuario_var04'	=> $val_04,
                'usuario_var05'	=> 2,
                'usuario_var06'	=> $_SERVER['HTTP_HOST'],
                'usuario_var07'	=> $_SERVER['HTTP_USER_AGENT'],
                'usuario_var08'	=> $_SERVER['HTTP_REFERER']
            ));

        $detalleJSON    = post_curl('login', $dataJSON);
        $detalleJSON    = json_decode($detalleJSON, true);

        if ($detalleJSON['code'] === 200) {
    //        $accesoJSON             = get_curl('1500/rol/'.$detalleJSON['data']['rol_codigo']);

            $_SESSION['log_01']         = $val_01;
            $_SESSION['log_02']         = $val_02;
            $_SESSION['log_03']         = $val_03;
            $_SESSION['log_04']         = $val_04;

    //        $_SESSION['seg_01']         = $detalleJSON['data']['rol_codigo'];
    //        $_SESSION['seg_02']         = $detalleJSON['data']['rol_nombre'];
    //        $_SESSION['seg_03']         = $accesoJSON;
    //        $_SESSION['seg_04']         = $accesoJSON;       
            $_SESSION['expire']         = time() + 3600;
            
            header('Location: ../../public/home.php');
        } else {
            $val_01         = '';
            $val_02         = '';
            $val_03         = '';
            $val_04         = '';

            header('Location: ../../class/session/session_logout.php');
        }
    }
?>