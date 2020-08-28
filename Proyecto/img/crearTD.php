<?php
session_start();
$idcnta = $_SESSION['identificadorCuentaUsuario'];
$person = $_SESSION['persona'];
include 'aleatorio.php';
include 'iniciarConexionBD.php';
$cuentaEspecifica = $_POST['cntaEspecifica'];
$nuevaTarj = new aleatorio();
$datosNuevaTarj = $nuevaTarj->generarInfoTarjeta();
$d0 = $datosNuevaTarj[0];
$d1 = $datosNuevaTarj[1];
$d2 = $datosNuevaTarj[2];
$d3 = $datosNuevaTarj[3];
$comis = 54;

try {
        $query = 'SELECT Nombre, Apellido FROM cuentasligadasusuario WHERE IDUsuario = :idcnta';
        $queryOutput = $mbd->prepare($query);
        $queryOutput->bindParam(':idcnta', $idcnta, PDO::PARAM_INT);
        $queryOutput->execute();
        $result = $queryOutput->fetch(PDO::FETCH_ASSOC);
        $titular = $result['Nombre'].' '.$result['Apellido'];
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
    <title>V G M &#8214; Crear tarjeta</title>
	
	
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
 <body clas ="js">
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
                                        <li class="current"><a href="#header">Creación de tarjeta de débito</a></li>
										
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
    <div class="container">
       <div class="row">
          <div class="col-sm-12">
             <div class="jumbotron">      
              
                 <br>
                 <h1>Usuario: <?php echo $person;?></h1>
                 <br>
                  <h1>Favor de agregar su domicilio de facturación.</h1>
                  <br>
                 <section>
                     <h2>Número de tarjeta:</h2>
                      <br>
                     <h2><?php echo $d0;?></h2>
                      <br>
                     <h2>Titular:</h2>
                     <br>
                     <h2><?php echo $titular;?></h2>
                      <br>
                     <h2>NIP:</h2>
                      <br>
                     <h2><?php echo $d1;?></h2>
                      <br>
                     <h2>Fecha de vencimiento:</h2>
                     <br>
                     <h2><?php echo $d2;?></h2>
                     <br>
                     <h2>Codigo de seguridad:</h2>
                     <br>
                     <h2><?php echo $d3;?></h2>
                     <br>
                     <h2>Comision mensual fija:</h2>
                      <br>
                     <h2><?php echo '$ '.$comis.' MXN';?></h2>
                 </section>
                  <br><br>
                 <section>
                     <h1>Ingrese su domicilio de facturacion para la tarjeta:</h1>
                     <br>
                     <form action="anadirTD.php" method="post">
                         <?php
                          echo '<input type="hidden" name="d0" value="'.$d0.'">';
                          echo '<input type="hidden" name="cntaEspecifica" value="'.$cuentaEspecifica.'">';
                          echo '<input type="hidden" name="d1" value="'.$d1.'">';
                          echo '<input type="hidden" name="d2" value="'.$d2.'">';
                          echo '<input type="hidden" name="d3" value="'.$d3.'">';
                          echo '<input type="hidden" name="comis" value="'.$comis.'">';
                         ?>
                         <h2>Domicilio:</h2>
                         <input type="text" name="domic" required>
                         <br><br>
                         <button type="submit" class="btn btn-info">Crear tarjeta de débito</button>
                      </form>
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
