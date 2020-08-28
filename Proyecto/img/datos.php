<?php
    if (isset($_POST['nombre'])) {
        include 'iniciarConexionBD.php';
        $nombr = $_POST['nombre'];
        $apell= $_POST['apellidos'];
        $fecha= $_POST['fecha'];
        $sexo= $_POST['sexo'];
        $numTe= $_POST['numeroTel'];
        $corEl= $_POST['correoElec'];
        $contr= $_POST['contras'];

        try {
            $query = 'INSERT INTO usuario (Nombre, Apellido, FechaNacimiento, Sexo, Telefono, Email, Contrasena) VALUES (:nombr, :apell, :fecha, :sexo, :numTe, :corEl, :contr)';        
            $queryOutput = $mbd->prepare($query);
            $queryOutput->bindParam(':nombr',$nombr, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':apell',$apell, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':fecha',$fecha, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':sexo',$sexo, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':numTe',$numTe, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':corEl',$corEl, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':contr',$contr, PDO::PARAM_STR, 12);
            $queryOutput->execute();
            $mbd = null;
            $queryOutput = null;
        } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
        }
        header("Location: /Proyecto/index.php");
    }