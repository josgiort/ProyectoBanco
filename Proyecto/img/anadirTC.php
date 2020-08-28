<?php
if (isset($_POST['d4'])) {
    session_start();
    include 'iniciarConexionBD.php';
    $cuentaEspecifica = $_POST['cntaEspecifica'];
    $d0 = $_POST['d0'];
    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
    $d3 = $_POST['d3'];
    $d4 = $_POST['d4'];
    $d5 = $_POST['d5'];
    $comis = $_POST['comis'];
    $dircc = $_POST['domic'];
    $lineaCred = $_POST['lineaCred'];
    try {
            $query = 'INSERT INTO tarjetascreligadasusuario (NumeroTarjeta, NumeroCuenta, NIP, FechaVencimiento, '
                    . 'CodigoSeguridad, Comision, FechaCorte, TasaInteres, MontoLineaCredito, DomicilioFacturacion) '
                    . 'VALUES (:d0, :cntaEspecifica, :d1, :d2, :d3, :comis, :d4, :d5, :lineaCred ,:dircc)';
            $queryOutput = $mbd->prepare($query);
            $queryOutput->bindParam(':d0', $d0, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':cntaEspecifica', $cuentaEspecifica, PDO::PARAM_INT);
            $queryOutput->bindParam(':d1', $d1, PDO::PARAM_INT);
            $queryOutput->bindParam(':d2', $d2, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':d3', $d3, PDO::PARAM_INT);
            $queryOutput->bindParam(':comis', $comis, PDO::PARAM_INT);
            $queryOutput->bindParam(':d4', $d4, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':d5', $d5, PDO::PARAM_INT);
            $queryOutput->bindParam(':lineaCred', $lineaCred, PDO::PARAM_INT);
            $queryOutput->bindParam(':dircc', $dircc, PDO::PARAM_STR, 12);
            $queryOutput->execute();

            $queryOutput = null;
            $mbd = null;
            
            header('Location: usarCuenta.php?cuentaEspecifica='.base64_encode($cuentaEspecifica));
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
?>
