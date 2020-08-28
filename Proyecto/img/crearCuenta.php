<?php
session_start();
include 'aleatorio.php';
include 'iniciarConexionBD.php';
$nuevaCuenta = new aleatorio();
$idcnta = $_SESSION['identificadorCuentaUsuario'];
$clabe = $nuevaCuenta->generarCLABE($idcnta);

try {
    $query = 'INSERT INTO cuenta (IDUsuario, CLABE, Saldo) VALUES (:idcnta, :clabe, 0)';        
    $queryOutput = $mbd->prepare($query);
    $queryOutput->bindParam(':idcnta',$idcnta, PDO::PARAM_INT);
    $queryOutput->bindParam(':clabe',$clabe, PDO::PARAM_STR, 12);
    $queryOutput->execute();
    $mbd = null;
    $queryOutput = null;
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
header("Location: cuentasUsuario.php");