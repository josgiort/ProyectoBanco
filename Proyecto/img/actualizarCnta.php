<?php
if (isset($_POST['cell'])) {
    session_start();
    $idcnta = $_SESSION['identificadorCuentaUsuario'];
    $person = $_SESSION['persona'];
    include 'iniciarConexionBD.php';
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $cell = $_POST['cell'];
    $email = $_POST['email'];
    $passwrd = $_POST['passwrd'];
    try {
            $query = 'UPDATE usuario SET Nombre = :nooo, Apellido = :sooo, FechaNacimiento = :booo, Sexo = :gooo, Telefono = :cooo, Email = :eooo, Contrasena = :pooo WHERE IDUsuario = :idcnta';
            $queryOutput = $mbd->prepare($query);
            $queryOutput->bindParam(':nooo',$name, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':sooo',$surname, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':booo',$birthday, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':gooo',$gender, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':cooo',$cell, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':eooo',$email,  PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':pooo',$passwrd, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':idcnta',$idcnta, PDO::PARAM_INT);
            $queryOutput->execute();

            $queryOutput = null;
            $mbd = null;
            header('Location: cuentasUsuario.php');
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
}
if (isset($_POST['exit'])) {
    session_start();
    header('Location: cuentasUsuario.php'); 
    
}


