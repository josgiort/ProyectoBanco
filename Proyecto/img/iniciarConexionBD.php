<?php
$bd = "mysql:host=localhost;dbname=banco1";
$usuario = "root";
$contrasena = "";

$mbd = new PDO($bd, $usuario, $contrasena);
$mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);