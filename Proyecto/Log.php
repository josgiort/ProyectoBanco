<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/06755c47c6.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="shortcut icon" href="img/VGicono.png" type="image/x-icon">
    <link rel="stylesheet" href="diseño/log.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
</head>
 <body>
     <form action="img/iniciarSesion.php" method="post" id="form">
        <div class="form">
            <h1>Iniciar Sesión</h1>
            
            <div class="grupo">
                <input type="text" name="correoIS" class="nombre" required><span class="barra"></span>
                <label>Correo electrónico</label>
            </div>
            
            <div class="grupo">
                <input type="password" name="contraIS" class="contraseña" required><span class="barra"></span>
                <label>Contraseña</label>
            </div>
            
            <button type="submit">Entrar</button>
            <button type="submit" class="cancelar"><a href="index.php">Página principal</a></button>
        </div>
    </form>
    <script src="main.js"></script>
 </body>
</html>