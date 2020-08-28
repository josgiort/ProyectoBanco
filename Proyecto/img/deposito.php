<?php
if (isset($_POST['montoDep'])) {
    session_start();
    $origen = $_POST['cntaEspecifica'];
    $monto = $_POST['montoDep'];
    include 'iniciarConexionBD.php';
    try {
        $query = 'SELECT Saldo FROM cuentasligadasusuario WHERE NumeroCuenta = :origen';
        $queryOutput = $mbd->prepare($query);
        $queryOutput->bindParam(':origen', $origen, PDO::PARAM_INT);
        $queryOutput->execute();
        $result = $queryOutput->fetch(PDO::FETCH_ASSOC);
        $queryOutput = null;
        
        $saldoUsuario = $result['Saldo'];

	if ($monto >= 0) {
		$nuevoSaldoUsuario = $saldoUsuario + $monto;
        
        	$query2 = 'UPDATE cuentasligadasusuario SET Saldo = :nuevoSaldoUsuario WHERE NumeroCuenta = :origen';
        	$queryOutput = $mbd->prepare($query2);
        	$queryOutput->bindParam(':nuevoSaldoUsuario',$nuevoSaldoUsuario, PDO::PARAM_INT);
        	$queryOutput->bindParam(':origen', $origen, PDO::PARAM_INT);
        	$queryOutput->execute();
        	$queryOutput = null;
            
        	$query3 = 'INSERT INTO movimientosligadosusuario (NumeroCuenta, Tipo, Monto) VALUES (:origen, "Depósito", :amount)';
        	$queryOutput = $mbd->prepare($query3);
        	$queryOutput->bindParam(':amount', $monto, PDO::PARAM_INT);
        	$queryOutput->bindParam(':origen', $origen, PDO::PARAM_INT);
        	$queryOutput->execute();
        	$queryOutput = null;
        	$mbd = null;
        	//echo '<li><a href="usarCuenta.php?cuentaEspecifica='.base64_encode($result[$i]['NumeroCuenta']).'">';
        	header('Location: usarCuenta.php?cuentaEspecifica='.base64_encode($origen));
	} else {
		header('Location: malaSuerte2.php?cuentaEspecifica='.base64_encode($origen));
	}  
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
