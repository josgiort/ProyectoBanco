<?php
session_start();
$idcnta = $_SESSION['identificadorCuentaUsuario'];
$person = $_SESSION['persona'];
include 'iniciarConexionBD.php';
$cuentaEspecifica = base64_decode($_GET['cuentaEspecifica']);

try {
    $query = 'SELECT Saldo, CLABE, Nombre, Apellido FROM cuentasligadasusuario WHERE IDUsuario = :idcnta AND NumeroCuenta = :cntaEsp';
    $queryOutput = $mbd->prepare($query);
    $queryOutput->bindParam(':idcnta',$idcnta, PDO::PARAM_INT);
    $queryOutput->bindParam(':cntaEsp',$cuentaEspecifica, PDO::PARAM_INT);
    $queryOutput->execute();
    $result = $queryOutput->fetch(PDO::FETCH_ASSOC);
    $queryOutput = null;
    
    $query2 = 'SELECT Tipo, Monto FROM movimientosligadosusuario WHERE NumeroCuenta = :cntaEsp';
    $queryOutput = $mbd->prepare($query2);
    $queryOutput->bindParam(':cntaEsp',$cuentaEspecifica, PDO::PARAM_INT);
    $queryOutput->execute();
    $result2 = $queryOutput->fetchAll(PDO::FETCH_ASSOC);
    $queryOutput = null;
    
    $query3 = 'SELECT NumeroTarjeta, FechaVencimiento FROM tarjetasdebligadasUsuario WHERE NumeroCuenta = :cntaEsp';
    $queryOutput = $mbd->prepare($query3);
    $queryOutput->bindParam(':cntaEsp',$cuentaEspecifica, PDO::PARAM_INT);
    $queryOutput->execute();
    $result3 = $queryOutput->fetchAll(PDO::FETCH_ASSOC);
    $queryOutput = null;
    
    $query4 = 'SELECT NumeroTarjeta, FechaVencimiento, MontoLineaCredito FROM tarjetascreligadasusuario WHERE NumeroCuenta = :cntaEsp';
    $queryOutput = $mbd->prepare($query4);
    $queryOutput->bindParam(':cntaEsp',$cuentaEspecifica, PDO::PARAM_INT);
    $queryOutput->execute();
    $result4 = $queryOutput->fetchAll(PDO::FETCH_ASSOC);
    $queryOutput = null;
    
    $mbd = null;    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
       <!-- Meta Tag -->
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content='codeglim'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Title Tag-->
    <title>V G M &#8214; Movimientos</title>
	
	
	<!-- Google Fonts & Google Maps API -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700" rel="stylesheet"> 
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM" type="text/javascript"></script>	
	
	<!-- Hover  Css -->
    <link rel="stylesheet" href="css/hover.min.css">
	
	<!-- Mobile Nav -->
    <link rel="stylesheet" href="css/slicknav.min.css">	
	
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
	
	<!-- Animate Min -->
    <link rel="stylesheet" href="css/animate.min.css">
	
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">
	
	<!-- Slick Slider -->
    <link rel="stylesheet" href="css/slick.css">
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<!-- Sufia Stylesheet -->
	<link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
	
	<!-- Sufia Color -->
    <!--<link rel="stylesheet" href="css/skin/orange.css">-->
    <!--<link rel="stylesheet" href="css/skin/red.css">-->
    <!--<link rel="stylesheet" href="css/skin/green.css">-->	
    <!--<link rel="stylesheet" href="css/skin/purple.css">-->	
    <!--<link rel="stylesheet" href="css/skin/pink.css">-->	
    <!--<link rel="stylesheet" href="css/skin/blaze.css">-->	
    <!--<link rel="stylesheet" href="css/skin/blue2.css">-->	
    <link rel="stylesheet" href="css/skin/blue.css">	
	
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <link rel="shortcut icon" href="../img/VGicono.png" type="image/x-icon">
</head>
 <body class="js">
 <!-- Preloader -->
 <div class="loader">
		  <div class="loader-inner">
			  <div class="k-loader k-circle"></div>
		 </div>
	 </div>
	<!-- End Preloader -->
 <header class="header clearfix" id="header">
		<!-- Header Inner -->
        <div class="header-inner">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-12">

						<!-- Mobile Menu -->
						<div class="mobile-menu"></div>	
						<!--/ End Mobile Menu -->
					</div>
					<div class="col-md-10 col-sm-10 col-xs-12">
						<!-- Main Menu -->
						<div class="main-menu">
							<!-- Navigation -->
							<nav class="navbar">
								<div class="collapse navbar-collapse">
									<ul class="nav menu navbar-nav">
                                        <li class="current"><a href="#header">Operaciónes</a></li>
										<li><a href="cuentasUsuario.php">Volver a la cuenta</a></li>
										<li><a href="cerrarSesion.php">Cerrar sesión</a></li>
									</ul>
								</div>
							</nav>
							<!--/ End Navigation -->
						</div>
						<!--/ End Main Menu -->
					</div>
				</div>
			</div>
        </div>
		<!--/ End Header Inner -->
    </header>
    <!--/ End Header-->
      <div class="container">
         <div class="row">
          <div class="col-sm-12">
             <div class="jumbotron">
                 <br>
                 <h1>Usuario: <?php echo $person;?></h1>
                 <br>
                  <section>
                     <h1>Datos de la cuenta</h1>
                     <br>
                     <h2>Número de cuenta:</h2>
                     <br>
                     <h2><?php echo $cuentaEspecifica;?></h2>
                     <br>
                     <h2>Clabe interbancaria:</h2>
                     <br>
                     <h2><?php echo $result['CLABE'];?></h2>
                     <br>
                     <h2>Titular</h2>
                     <br>
                     <h2><?php echo $result['Nombre'].' '.$result['Apellido'];?></h2>
                  </section>
                  <br>
                 <section>
                     <h1>Saldo y movimientos</h1>
                     <br>
                     <h2>Saldo actual:</h2>
                     <br>
                     <h2><?php echo '$ '.$result['Saldo'].' MXN';?></h2>
                     <br><br>
                      <div class="table-responsive">
                         <table  class="table table-hover">
                              <thead>
                                 <tr>
                                     <th scope="col"><h2>Tipo de movimiento</h2></th>
                                     <th scope="col"><h2>Monto del movimiento</h2></th>
                                  </tr>
                             </thead>
                             <tbody>
                                  <?php 
                                    for ($i = count($result2) - 1; $i >= 0; $i--) {
                                      echo '<tr>';
                                          echo '<td><h2>'.$result2[$i]['Tipo'].'</h2></td>';
                                          echo '<td><h2>$ '.$result2[$i]['Monto'].' MXN</h2></td>';
                                      echo '</tr>';
                                     }
                                   ?>
                              </tbody>
                           </table>
                      </div> 
                  </section>
                  <br><br>
                  <section>
                      <h1>Realizar una operación</h1>
                      <br>
                      <h2>Realizar transferencia a otra cuenta:</h2>
                      <br>
                     <form action="transferencia.php" method="post">
                        <?php
                        echo '<input type="hidden" name="cntaEspecifica" value="'.$cuentaEspecifica.'">';
                        ?>
                        <h2> Monto de la transferencia:</h2>
                         <div class="input-group mb-3">
                             <input type="text" name="montoTrsfr" required class="form-control" aria-label="Amount (to the nearest dollar)">
                         </div>
                         <br>
                         <h2>Clabe interbancaria de la cuenta destino:</h2>
                         <div class="input-group mb-3">
                             <input type="text" name="clabeInter" required class="form-control" aria-label="Amount (to the nearest dollar)">
                         </div>
                         <br><br>
                         <button type="submit" class="btn btn-warning">Transferir</button>
                     </form>
                     <br><br>
                     <h2>Realizar un retiro de la cuenta</h2>
                     <br>
                     <form action="retiro.php" method="post">
                          <?php
                          echo '<input type="hidden" name="cntaEspecifica" value="'.$cuentaEspecifica.'">';
                         ?>
                          <h2> Monto del retiro:</h2>
                          <div class="input-group mb-3">
                              <input type="text" name="montoRet" required class="form-control" aria-label="Amount (to the nearest dollar)">
                          </div>
                           <br><br>
                         <button type="submit" class="btn btn-warning">Retirar</button>
                      </form>
                      <br><br>
                     <h2>Realizar un depósito a la cuenta</h2>
                     <br>
                     <form action="deposito.php" method="post">
                         <?php
                         echo '<input type="hidden" name="cntaEspecifica" value="'.$cuentaEspecifica.'">';
                         ?>
                         <h2> Monto del depósito:</h2>
                         <div class="input-group mb-3">
                             <input type="text" name="montoDep" required class="form-control" aria-label="Amount (to the nearest dollar)">
                         </div>
                         <br><br>
                         <button type="submit" class="btn btn-success">Depósitar</button>
                      </form>
                  </section>
                  <br><br><br>
                  <section>
                     <h1>Mis tarjetas</h1>
                     <br>
                     <h2>Tarjetas de débito de la cuenta</h2>
                     <br><br>
                     <table class= "table">
                          <tbody>
                              <?php 
                              for ($i = count($result3) - 1; $i >= 0; $i--) {
                             echo '<tr>';
                                 echo '<form action="visualizarTD.php" method="post">';
                                     echo '<input type="hidden" name="cntaEspecifica" value="'.$cuentaEspecifica.'">';
                                     echo '<input type="hidden" name="numTar" value="'.$result3[$i]['NumeroTarjeta'].'">';
                                     echo '<h2>Numero de tarjeta: '.$result3[$i]['NumeroTarjeta'].'          Fecha de vencimiento: '.$result3[$i]['FechaVencimiento'].' <h2>';
                                     echo '<br>';
                                     echo '<button type="submit" class="btn btn-success">Ver detalles</button>';
                                  echo '</form>';
                             echo '</tr>';
                             }
                             ?>
                          </tbody>
                     </table>
                     <br>
                     <form action="crearTD.php" method="post">
                         <?php
                          echo '<input type="hidden" name="cntaEspecifica" value="'.$cuentaEspecifica.'">';
                         ?>
                         <br><br>
                         <button type="submit" class="btn btn-warning">Solicitar tarjeta de debito</button>
                      </form>
                     <br><br>
                     <h2>Tarjetas de crédito de la cuenta</h2>
                     <br>
                     <table class= "table">
                         <tbody>
                             <?php 
                              for ($i = count($result4) - 1; $i >= 0; $i--) {
                             echo '<tr>';
                                 echo '<form action="visualizarTC.php" method="post">';
                                     echo '<input type="hidden" name="cntaEspecifica" value="'.$cuentaEspecifica.'">';
                                     echo '<input type="hidden" name="numTar" value="'.$result4[$i]['NumeroTarjeta'].'">';
                                     echo '<h2>Numero de tarjeta:  '.$result4[$i]['NumeroTarjeta'].'  Fecha de vencimiento: '.$result4[$i]['FechaVencimiento'].'  Linea de credito: $ '.$result4[$i]['MontoLineaCredito'].' MXN </h2>';
                                     echo '<br><br>';
                                     echo '<button type="submit" class="btn btn-success">Ver detalles</button>';
                                  echo '</form>';
                              echo '</tr>';
                             }
                             ?>
                         </tbody>
                      </table>
                      <br>
                     <form action="crearTC.php" method="post">
                         <?php
                         echo '<input type="hidden" name="cntaEspecifica" value="'.$cuentaEspecifica.'">';
                         ?>
                         <br><br>
                         <button type="submit" class="btn btn-warning">Solicitar tarjeta de crédito</button>
                     </form>
                 </section>
             </div>
          </div>
         </div>
      </div>
    <!-- Jquery -->
   <script type="text/javascript" src="js/jquery.min.js"></script>

<!-- Modernizr JS -->
<script type="text/javascript" src="js/modernizr.min.js"></script>

<!-- Appear Js -->
<script type="text/javascript" src="js/jquery.appear.js"></script>	

<!-- Scrool Up -->
  <script type="text/javascript" src="js/jquery.scrollUp.min.js"></script>

<!-- Typed Js -->
<script type="text/javascript" src="js/typed.min.js"></script>

<!-- Slick Nav -->
<script type="text/javascript" src="js/jquery.slicknav.min.js"></script>

<!-- Onepage Nav -->
<script type="text/javascript" src="js/jquery.nav.js"></script>

  <!-- Yt Player -->
<script type="text/javascript" src="js/ytplayer.min.js"></script>

<!-- Magnific Popup -->
<script type="text/javascript" src="js/magnific-popup.min.js"></script>

<!-- Wow JS -->
<script type="text/javascript" src="js/wow.min.js"></script>

<!-- Counter JS -->
<script type="text/javascript" src="js/waypoints.min.js"></script>
  <script type="text/javascript" src="js/jquery.counterup.min.js"></script>

<!-- Isotop JS -->
<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>

  <!-- Masonry JS -->
<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>

<!-- Slick Slider -->
<script type="text/javascript" src="js/slick.min.js"></script>

<!-- Bootstrap JS -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- Google Map JS -->
<script type="text/javascript" src="js/gmap.js"></script>
  
  <!-- Activate JS -->
<script type="text/javascript" src="js/active.js"></script> 
 </body>
</html>
