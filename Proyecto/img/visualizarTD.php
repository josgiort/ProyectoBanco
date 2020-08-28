<?php
if (isset($_POST['numTar'])) {
    session_start();
    $idcnta = $_SESSION['identificadorCuentaUsuario'];
    $person = $_SESSION['persona'];
    include 'iniciarConexionBD.php';
    $cuentaEspecifica = $_POST['cntaEspecifica'];
    $numTar = $_POST['numTar'];

    try {
            $query = 'SELECT Nombre, Apellido FROM cuentasligadasusuario WHERE IDUsuario = :idcnta';
            $queryOutput = $mbd->prepare($query);
            $queryOutput->bindParam(':idcnta', $idcnta, PDO::PARAM_INT);
            $queryOutput->execute();
            $result = $queryOutput->fetch(PDO::FETCH_ASSOC);
            $titular = $result['Nombre'].' '.$result['Apellido'];
            $queryOutput = null;

            $query2 = 'SELECT NIP, FechaVencimiento, CodigoSeguridad, Comision, DomicilioFacturacion FROM tarjetasdebligadasusuario WHERE NumeroTarjeta = :numTar';
            $queryOutput = $mbd->prepare($query2);
            $queryOutput->bindParam(':numTar', $numTar, PDO::PARAM_STR, 12);
            $queryOutput->execute();
            $result2 = $queryOutput->fetch(PDO::FETCH_ASSOC);

            $queryOutput = null;
            $mbd = null;
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
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
    <title>V G M &#8214; Configuración</title>
	
	
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
    <?php //require_once "scripts.php";?>
</head>
 <body class="js">
   <!-- Preloader -->
 <div class="loader">
		  <div class="loader-inner">
			  <div class="k-loader k-circle"></div>
		 </div>
	 </div>
	<!-- End Preloader -->
    <!-- Start Header -->
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
                                        <li class="current"><a href="#header">Configuración de la tarjeta</a></li>
										<li><a href="cuentasUsuario.php">Regresar a la cuenta</a></li>
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
               <h1>Usuario: <?php echo $person;?></h1>
               <br>
               <h2>Puede hacer modificaciones en esta tarjeta unicamente en los campos NIP y domicilio de facturacion</h2>
               <br>
              <section>
                  <h2>Número de tarjeta:</h2>
                   <br>
                  <h2><?php echo $numTar;?></h2>
                  <br>
                  <h2>Titular:</h2>
                   <br>
                  <h2><?php echo $titular;?></h2>
                  <br>
                  <h2>Fecha de vencimiento</h2>
                  <br>
                 <h2><?php echo $result2['FechaVencimiento'] ;?></h2>
                  <br>
                 <h2>Codigo de seguridad:</h2>
                  <br>
                 <h2><?php echo $result2['CodigoSeguridad'] ;?></h2>
                  <br>
                 <h2>Comision mensual fija:</h2>
                  <br>
                 <h2><?php echo '$ '.$result2['Comision'].' MXN';?></h2>
              </section>
              <br>
              <section>
              <h2>Configuración de la tarjeta de débito:</h2>
               <br>
              <form action="actualizarTD.php" method="post">
                   <?php
                  echo '<input type="hidden" name="cntaEspecifica" value="'.$cuentaEspecifica.'">';
                  echo '<input type="hidden" name="numTar" value="'.$numTar.'">';
                  echo '<h2>NIP:</h2><br>';
                  echo '<input type="text" name="nip" value="'.$result2['NIP'] .'" required><br>';
                  echo '<h2>Domicilio:</h2><br>';
                  echo '<input type="text" name="domic" value="'.$result2['DomicilioFacturacion'] .'" required><br><br>';
                  echo '<button type="submit" class="btn btn-info">Modificar tarjeta</button>';
                  ?>
              </form>
              <br>
               <form action="actualizarTD.php" method="post">
                  <?php
                  echo '<input type="hidden" name="cntaEspecifica" value="'.$cuentaEspecifica.'">';
                 ?>
                  <input type="hidden" name="salte" value="sjdfsjfdk">
                  <br>
                 <button type="submit" class="btn btn-info">Atras</button>
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