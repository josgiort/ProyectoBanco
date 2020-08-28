<?php
    if (isset($_POST['correoIS'])) {
        include 'iniciarConexionBD.php';
        $corr = $_POST['correoIS'];
        $ctrs = $_POST['contraIS'];

        try {
            $query = 'SELECT IDUsuario, Nombre  FROM usuario WHERE Email = :corr AND Contrasena = :ctrs';
            $queryOutput = $mbd->prepare($query);
            $queryOutput->bindParam(':corr',$corr, PDO::PARAM_STR, 12);
            $queryOutput->bindParam(':ctrs',$ctrs, PDO::PARAM_STR, 12);
            $queryOutput->execute();
            $result = $queryOutput->fetch(PDO::FETCH_ASSOC);
                
            if ($result != false) {// cambiar esto a una forma que aceote fetch()000000
                session_start();
                $_SESSION['identificadorCuentaUsuario']  = $result['IDUsuario'];//hacerlo con ['IDUsuario']
                $_SESSION['persona'] = $result['Nombre'];
                header("Location: cuentasUsuario.php");
            } else {
                header("Location: malaSuerte.php");
            }
            $mbd = null;
            $queryOutput = null;
        } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
        }
    }