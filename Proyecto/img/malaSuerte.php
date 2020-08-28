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
                                <h2>No existe una cuenta con esa informacion.</h2>
                                <br>
                                <h2>Email y/o Contraseña incorrecta.</h2>
                                <br>
                                <h2>En breve seras redirigido para iniciar sesión.</h2>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    setTimeout(function(){
                        window.location.href = 'Log.php';
                    }, 15000);
                </script>
    </body>
</html>