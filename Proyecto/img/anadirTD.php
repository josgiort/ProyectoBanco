<?php
if (isset($_POST['d2'])) {
    session_start();
    include 'iniciarConexionBD.php';
    $cuentaEspecifica = $_POST['cntaEspecifica'];
    $d0 = $_POST['d0'];
    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
    $d3 = $_POST['d3'];
    $comis = $_POST['comis'];
    $dircc = $_POST['domic'];
    try {
            $query = 'INSERT INTO tarjetasdebligadasusuario (NumeroTarjeta, NumeroCuenta, NIP, FechaVencimiento, '
                    . 'CodigoSeguridad, Comision, DomicilioFacturacion) VALUES (:d0, :cntaEspecifica, :d1, :d2, '
                    . ':d3, :comis, :dircc)';
            $queryOutput = $mbd->prepare($query);
            $queryOutput->bindParam(':d0', $d0, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':cntaEspecifica', $cuentaEspecifica, PDO::PARAM_INT);
            $queryOutput->bindParam(':d1', $d1, PDO::PARAM_INT);
            $queryOutput->bindParam(':d2', $d2, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':d3', $d3, PDO::PARAM_INT);
            $queryOutput->bindParam(':comis', $comis, PDO::PARAM_INT);
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
