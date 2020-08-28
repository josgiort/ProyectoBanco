<?php
if (isset($_POST['domic'])) {
    session_start();
    include 'iniciarConexionBD.php';
    $cuentaEspecifica = $_POST['cntaEspecifica'];
    $numTar = $_POST['numTar'];
    $nip = $_POST['nip'];
    $domic = $_POST['domic'];
    $lineaCred = $_POST['lineaCred'];

    try {
            $query = 'UPDATE tarjetascreligadasusuario SET NIP = :nip, DomicilioFacturacion = :domic, MontoLineaCredito = :lineaCred WHERE NumeroTarjeta = :numTar';
            $queryOutput = $mbd->prepare($query);
            $queryOutput->bindParam(':nip',$nip, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':domic',$domic, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':lineaCred',$lineaCred,  PDO::PARAM_INT);
            $queryOutput->bindParam(':numTar',$numTar, PDO::PARAM_STR, 12);
            $queryOutput->execute();

            $queryOutput = null;
            $mbd = null;
            header('Location: usarCuenta.php?cuentaEspecifica='.base64_encode($cuentaEspecifica));
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    if (isset($_POST['salte'])) {
        session_start();
        $cuentaEspecifica = $_POST['cntaEspecifica'];
        header('Location: usarCuenta.php?cuentaEspecifica='.base64_encode($cuentaEspecifica));
    }


