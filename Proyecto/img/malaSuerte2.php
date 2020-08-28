<?php
session_start();
$cuentaEspecifica = base64_decode($_GET['cuentaEspecifica']);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://kit.fontawesome.com/06755c47c6.js" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MalaSuerte</title>
        <link rel="shortcut icon" href="../img/VGicono.png" type="image/x-icon">
        <?php require_once "scripts.php";?>
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    </head>

    <body>
    <br>
    <br>
    <br>
    <div class= "container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="jumbotron">
                               <h2>No fue posible realizar la operacion</h2>
                               <br>
                              <h2>Es posible que el saldo en su cuenta no permita realizarla</h2>
                              <br>
                              <h2>Intentalo de nuevo</h2>
                              <br>
                              <h2>En breve se te redirigira</h2>
              
                            </div>
                        </div>
                    </div>
    </div>
        <?php
            echo '<script>';
            echo 'setTimeout(function() {';
                echo 'window.location.href="usarCuenta.php?cuentaEspecifica='.base64_encode($cuentaEspecifica).'";';
            echo '}, 10000);';
            echo '</script>';
        ?>
    </body>
</html>
