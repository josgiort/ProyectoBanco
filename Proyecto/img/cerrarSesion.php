<?php
session_destroy();
$_SESSION['identificadorCuenta'] = "";
$_SESSION['persona'] = "";
header("Location: /Proyecto/Log.php");