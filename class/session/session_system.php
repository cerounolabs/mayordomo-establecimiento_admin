<?php 
    if(!isset($_SESSION)){ 
        session_start(); 
    }

    $val_04         = $_SERVER['REMOTE_ADDR'];

    $log_01         = $_SESSION['log_01'];
    $log_02         = $_SESSION['log_02'];
    $log_03         = $_SESSION['log_03'];
    $log_04         = $_SESSION['log_04'];

    $usu_01         = $_SESSION['usu_01'];
    $usu_02         = $_SESSION['usu_02'];
    $usu_03         = $_SESSION['usu_03'];
    $usu_04         = $_SESSION['usu_04'];

//    $seg_01         = $_SESSION['seg_01'];
//    $seg_02         = $_SESSION['seg_02'];
//    $seg_03         = $_SESSION['seg_03'];

    $expire         = $_SESSION['expire'];

    if ($expire < time()) {
        header('Location: ../../class/session/session_logout.php');
    } else {
        if (isset($log_01) && isset($log_04) && isset($val_04)) {
            if ($log_04 != $val_04) {
                header('Location: ../../class/session/session_logout.php');
            } else {
                setlocale(LC_MONETARY, 'es_PY');

                
                $urlAct             = $_SERVER['REQUEST_URI'];
                $urlAnt             = substr($_SERVER['HTTP_REFERER'], 39);
                $urlPat             = strtoupper(substr(substr($_SERVER['SCRIPT_FILENAME'], 48), 0, -4));
                $_SESSION['expire'] = time() + 3600;
/*
                foreach ($seg_03['data'] as $seg_03Key=>$seg_03Array) {
                    if ($urlPat === $seg_03Array['programa_nombre']){
                        if ($seg_03Array['acceso_ingresar'] === 'S'){
                            break;
                        } else {
                            header('Location: ../../public/home.php?code=401&msg=No tiene permiso para ingresar!Favor comunicarse con informatica');
                        }
                    }
                }
*/
            }
        } else {
            header('Location: ../../class/session/session_logout.php');
        }
    }
?>