<?php
session_start();
include 'iniciarConexionBD.php';
$idcnta = $_SESSION['identificadorCuentaUsuario'];
try {
    $query0 = 'SELECT Nombre FROM cuentasligadasusuario WHERE IDUsuario = :idcnta';
    $queryOutput = $mbd->prepare($query0);
    $queryOutput->bindParam(':idcnta',$idcnta, PDO::PARAM_INT);
    $queryOutput->execute();
    $result0 = $queryOutput->fetch(PDO::FETCH_ASSOC);
    $queryOutput = null;
    $person = $result0['Nombre'];
    $_SESSION['persona'] = $person;
    
    $query = 'SELECT NumeroCuenta, Saldo, CLABE, Nombre, Apellido FROM cuentasligadasusuario WHERE IDUsuario = :idcnta';
    $queryOutput = $mbd->prepare($query);
    $queryOutput->bindParam(':idcnta',$idcnta, PDO::PARAM_INT);
    $queryOutput->execute();
    $result = $queryOutput->fetchAll(PDO::FETCH_ASSOC);
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
    <title>V G M &#8214; Bienvenido</title>
	
	
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
    <?php// require_once "scripts.php";?>
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
                    <li class="current"><a href="#header">Bienvenido</a></li>
										<li><a href="crearCuenta.php">Solicitar cuenta bancaria</a></li>
										<li><a href="visualizarCnta.php">Configure sus datos</a></li>
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
 <br><br>
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
           <div class="jumbotron">
              <h2>Usuario: <?php echo $person;?></h2>
             <br><br>
             <h2>Cuentas del usuario:</h2>
             <br><br>
             <div class="table-responsive">
               <table class="table table-hover">
                 <thead>
                      <tr style="text-align: center;">
                         <th><h3>Hacer una operación</h3></th>
 
                         <th><h3>Saldo</h3></th>
                         
                         <th><h3>Clabe Interbancaria</h3></th>
                         
                         <th><h3>Titular</h3></th>
                      </tr>
                 </thead>
                 <tbody>
                     <?php 
                      for ($i = count($result) - 1; $i >= 0; $i--) {
                        echo '<tr>';
                           echo '<td><a class="btn btn-success" href="usarCuenta.php?cuentaEspecifica='.base64_encode($result[$i]['NumeroCuenta']).'">En la cuenta: '.$result[$i]['NumeroCuenta'].'</a></td>';
                           
                           echo '<td><h4>$ '.$result[$i]['Saldo'].' MXN</h4></td>';
                           
                           echo '<td><h4>'.$result[$i]['CLABE'].'</h4></td>';
                           
                           echo '<td><h4>'.$result[$i]['Nombre'].' '.$result[$i]['Apellido'].'</h4></td>';
                       echo '</tr>';
                      }
                     ?>
                  </tbody>
               </table>
             </div> 
             <br>
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

