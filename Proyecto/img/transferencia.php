<?php
if (isset($_POST['montoTrsfr'])) {
    session_start();
    $origen = $_POST['cntaEspecifica'];
    $monto = $_POST['montoTrsfr'];
    $destino = $_POST['clabeInter'];
    include 'iniciarConexionBD.php';
    try {
        $query = 'SELECT Saldo FROM cuentasligadasusuario WHERE NumeroCuenta = :origen';
        $queryOutput = $mbd->prepare($query);
        $queryOutput->bindParam(':origen', $origen, PDO::PARAM_INT);
        $queryOutput->execute();
        $result = $queryOutput->fetch(PDO::FETCH_ASSOC);
        $queryOutput = null;

        $query2 = 'SELECT Saldo FROM cuentasligadasusuario WHERE CLABE = :destino';
        $queryOutput = $mbd->prepare($query2);
        $queryOutput->bindParam(':destino',$destino, PDO::PARAM_STR, 12);
        $queryOutput->execute();
        $result2 = $queryOutput->fetch(PDO::FETCH_ASSOC);
        $queryOutput = null;
        
        $saldoOrigen = $result['Saldo'];
        $saldoDestino = $result2['Saldo'];
        
        if ($monto <= $saldoOrigen && $monto >= 0) {
            $nuevoSaldoOrigen = $saldoOrigen - $monto;
            $nuevoSaldoDestino = $saldoDestino + $monto;
            
            $query3 = 'UPDATE cuentasligadasusuario SET Saldo = :nuevoSaldoOrigen WHERE NumeroCuenta = :origen';
            $queryOutput = $mbd->prepare($query3);
            $queryOutput->bindParam(':nuevoSaldoOrigen',$nuevoSaldoOrigen, PDO::PARAM_INT);
            $queryOutput->bindParam(':origen',$origen, PDO::PARAM_INT);
            $queryOutput->execute();
            $queryOutput = null;
            
            $query4 = 'UPDATE cuentasligadasusuario SET Saldo = :nuevoSaldoDestino WHERE CLABE = :destino';
            $queryOutput = $mbd->prepare($query4);
            $queryOutput->bindParam(':nuevoSaldoDestino',$nuevoSaldoDestino,PDO::PARAM_INT);
            $queryOutput->bindParam(':destino',$destino, PDO::PARAM_STR, 12);
            $queryOutput->execute();
            $queryOutput = null;
            
            $query5 = 'INSERT INTO movimientosligadosusuario (NumeroCuenta, Tipo, Monto) VALUES (:origen, "Transferencia Enviada", :amount)';
            $queryOutput = $mbd->prepare($query5);
            $queryOutput->bindParam(':amount',$monto, PDO::PARAM_INT);
            $queryOutput->bindParam(':origen',$origen, PDO::PARAM_INT);
            $queryOutput->execute();
            $queryOutput = null;
            
            $query6 = 'SELECT NumeroCuenta FROM cuentasligadasusuario WHERE CLABE = :destino';
            $queryOutput = $mbd->prepare($query6);
            $queryOutput->bindParam(':destino',$destino, PDO::PARAM_STR, 12);
            $queryOutput->execute();
            $result3 = $queryOutput->fetch(PDO::FETCH_ASSOC);
            $queryOutput = null;
            $ResultNumeroCta = $result3['NumeroCuenta'];
            
            $query7 = 'INSERT INTO movimientosligadosusuario (NumeroCuenta, Tipo, Monto) VALUES (:result, "Transferencia Recibida", :amount)';
            $queryOutput = $mbd->prepare($query7);
            $queryOutput->bindParam(':amount', $monto, PDO::PARAM_INT);
            $queryOutput->bindParam(':result', $ResultNumeroCta, PDO::PARAM_INT);
            $queryOutput->execute();
            
            $queryOutput = null;
            $mbd = null;
        
            header('Location: usarCuenta.php?cuentaEspecifica='.base64_encode($origen));
        } else {
            header('Location: malaSuerte2.php?cuentaEspecifica='.base64_encode($origen));
        }
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
