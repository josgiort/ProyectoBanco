<?php

class aleatorio {
    function generarCLABE($idCuenta) {
        $numeroDeCuenta = "";
        for ($i = 0; $i < 3; $i++) {
            $numeroDeCuenta .= strval(mt_rand(0,9));
        }
        for ($i = 0; $i < (4 - strlen($idCuenta)); $i++) {
            $numeroDeCuenta .= "0";
        }
        $numeroDeCuenta .= strval($idCuenta);
        $numeroDeCuenta .= strval(mt_rand(0,9));
        return $numeroDeCuenta;
    }

    function generarInfoTarjeta() {
        $numeroTarjeta = '';
        $nip = '';
        $fechaVenc = '2028/';
        $codigoSeguridad = '';
        for ($i = 0; $i < 16; $i++) {
            $numeroTarjeta .= strval(mt_rand(0,9));
        }
        for ($i = 0; $i < 4; $i++) {
            $nip .= strval(mt_rand(0,9));
        }
        for ($i = 0; $i < 2; $i++) {
            $fechaVenc .= strval(mt_rand(1,12));
            if ($i == 0) {
                $fechaVenc .= '/';
            }
        }
        for ($i = 0; $i < 3; $i++) {
            $codigoSeguridad .= strval(mt_rand(0,9));
        }
        $tarjeta = array($numeroTarjeta, $nip, $fechaVenc, $codigoSeguridad);
        return $tarjeta;
    }
    
    function generarInfoAdicionalTarjetaCredito() {
        $fechaCort = '2020/';
        $tasaInteres = '';
        
        for ($i = 0; $i < 2; $i++) {
            $fechaCort .= strval(mt_rand(1,12));
            if ($i == 0) {
                $fechaCort .= '/';
            }
        }
        
        for ($i = 0; $i < 3; $i++) {
            $tasaInteres .= strval(mt_rand(0,9));
            if ($i == 0) {
                $tasaInteres .= '.';
            }
        }
        
        $tarjeta = array($fechaCort, $tasaInteres);
        return $tarjeta;
    }
}