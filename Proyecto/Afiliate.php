<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="shortcut icon" href="img/VGicono.png" type="image/x-icon">
    <link rel="stylesheet" href="diseño/afiliate.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
</head>
<body>
    <form action="img/datos.php" method="post" id="form">
        <div class="form">
            <h1>Registro</h1>
            <div class="grupo">
                <input type="text" name="nombre" id="name" required><span class="barra"></span>
                <label for="">Nombre</label>
            </div>
            <div class="grupo">
                <input type="text" name="apellidos" id="name" required><span class="barra"></span>
                <label for="">Apellidos</label>
            </div>
            <div class="grupo">
                <input type="date" name="fecha" id="name" required><span class="barra"></span>
                <label for="" class="fecha">Fecha de nacimiento</label>
            </div>
            <div class="grupo">
               <select name="sexo">
                 <option>Sexo:</option> 
                 <option value="Hombre">Hombre</option> 
                 <option value="Mujer">Mujer</option> 
              </select>
            </div>
            
            <div class="grupo">
                <input type="tel" name="numeroTel" required><span class="barra"></span>
                <label>Celular:</label>
            </div>
            <div class="grupo">
                <input type="email" name="correoElec" required><span class="barra"></span>
                <label>Email:</label>
            </div>
            
            <div class="grupo">
                <input type="password" name="contras" id="password" class= "contraseña"required><span class="barra"></span>
                <label for="">Contraseña</label>
            </div>
            
            <button type="submit">Registrarme</button>
            <button type="submit" class="cancelar"><a href="index.php">Canecelar</a></button>
        </div>
    </form>
</body>
</html>