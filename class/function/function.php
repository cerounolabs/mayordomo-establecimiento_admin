<?php
    function getUUID(){
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    function getFechaHora($var01){
        $result = '';
        
        switch ($var01) {
            case '1':
                $result = date("YmdHis");
                break;
            
            case '2':
                $result = date("YmdHisv");
                break;

            case '3':
                $result = date("YmdHis");
                break;
        }
        
        return $result;
    }

    function getTitleDominio($var01){
        $result = '';

        switch ($var01) {
            case 'DISTRITOZONA':
                $result = 'DISTRITO Tipo ZONA';
                break;

            case 'DISTRITORIESGO':
                $result = 'DISTRITO TIPO RIESGO';
                break;

            case 'ESTABLECIMIENTOESTADO':
                $result = 'ESTABLECIMIENTO TIPO ESTADO';
                break;

            case 'ESTABLECIMIENTOTIPO':
                $result = 'ESTABLECIMIENTO TIPO';
                break;

            case 'ESTABLECIMIENTOFINALIDAD':
                $result = 'ESTABLECIMIENTO TIPO FINALIDAD';
                break;

            case 'ESTABLECIMIENTOCARGO':
                $result = 'ESTABLECIMIENTO TIPO CARGO';
                break;

            case 'ESTABLECIMIENTOPASTURA':
                $result = 'ESTABLECIMIENTO TIPO PASTURA';
                break;
            
            case 'ANIMALESTADO':
                $result = 'ANIMAL TIPO ESTADO';
                break;

            case 'ANIMALDONACION':
                $result = 'ANIMAL TIPO DONACIÓN';
                break;
                
            case 'ANIMALORIGEN':
                $result = 'ANIMAL TIPO ORIGEN';
                break;

            case 'ANIMALPESO':
                $result = 'ANIMAL TIPO PESO';
                break;

            case 'ANIMALRECUENTO':
                $result = 'ANIMAL TIPO RECUENTO';
                break;

            case 'ANIMALESPECIE':
                $result = 'ANIMAL TIPO ESPECIE';
                break;

            case 'ANIMALRAZA':
                $result = 'ANIMAL TIPO RAZA';
                break;

            case 'ANIMALCATEGORIA':
                $result = 'ANIMAL TIPO CATEGORÍA';
                break;

            case 'ANIMALSUBCATEGORIA':
                $result = 'ANIMAL TIPO SUB-CATEGORÍA';
                break;

            case 'ORDENTRABAJOESTADO':
                $result = 'ORDEN Trabajo TIPO ESTADO';
                break;

            case 'ORDENTRABAJOTIPO':
                $result = 'ORDEN TRABAJO TIPO';
                break;

            case 'PERSONATIPO':
                $result = 'PERSONA TIPO';
                break;

            case 'PERSONADOCUMENTO':
                $result = 'PERSONA TIPO DOCUMENTO';
                break;

            case 'DOMINIOESTADO':
                $result = 'SISTEMA TIPO ESTADO';
                break;

            case 'DOMINIOTIPO':
                $result = 'SISTEMA TIPO DOMINIO';
                break;

            case 'USUARIOESTADO':
                $result = 'USUARIO TIPO ESTADO';
                break;

            case 'USUARIOROL':
                $result = 'USUARIO TIPO ROL';
                break;

            case 'USUARIOACCESO':
                $result = 'USUARIO TIPO ACCESO';
                break;

            case 'USUARIOPROGRAMA':
                $result = 'USUARIO TIPO PROGRAMA';
                break;
        }

        return $result;
    }

    function getTitleSubDominio($var01){
        $titulo     = '';
        $titulo1    = '';
        $titulo2    = '';
        $dominio1   = '';
        $dominio2   = '';

        switch ($var01) {
            case 'ANIMALESPECIERAZA':
                $titulo     = 'ANIMAL ESPECIE / RAZA';
                $titulo1    = 'ESPECIE';
                $titulo2    = 'RAZA';
                $dominio1   = 'ANIMALESPECIE';
                $dominio2   = 'ANIMALRAZA';
                break;

            case 'ANIMALESPECIECATEGORIA':
                $titulo     = 'ANIMAL ESPECIE / CATEGORÍA';
                $titulo1    = 'ESPECIE';
                $titulo2    = 'CATEGORÍA';
                $dominio1   = 'ANIMALESPECIE';
                $dominio2   = 'ANIMALCATEGORIA';
                break;

            case 'ANIMALCATEGORIASUBCATEGORIA':
                $titulo     = 'ANIMAL CATEGORÍA / SUBCATEGORÍA';
                $titulo1    = 'CATEGORÍA';
                $titulo2    = 'SUBCATEGORÍA';
                $dominio1   = 'ANIMALCATEGORIA';
                $dominio2   = 'ANIMALSUBCATEGORIA';
                break;
        }

        return array($titulo, $titulo1, $titulo2, $dominio1, $dominio2);
    }

    function getTitleTriDominio($var01){
        $titulo     = '';
        $titulo1    = '';
        $titulo2    = '';
        $titulo3    = '';
        $dominio1   = '';
        $dominio2   = '';
        $dominio3   = '';

        switch ($var01) {
            case 'ANIMALESPECIECATEGORIASUBCATEGORIA':
                $titulo     = 'ANIMAL ESPECIE / CATEGORIA / SUBCATEGORIA';
                $titulo1    = 'ESPECIE';
                $titulo2    = 'CATEGORIA';
                $titulo3    = 'SUBCATEGORIA';
                $dominio1   = 'ANIMALESPECIE';
                $dominio2   = 'ANIMALCATEGORIA';
                $dominio3   = 'ANIMALSUBCATEGORIA';
                break;
        }

        return array($titulo, $titulo1, $titulo2, $titulo3, $dominio1, $dominio2, $dominio3);
    }
?>