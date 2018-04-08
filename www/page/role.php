<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: text/html; charset=ISO-8859-1",true);
    require_once("../PHP/Config.php");
	$config = new Config();
	$conexao = $config->conectaBanco();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css"> 
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
   

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>QuissaTrip &mdash;</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  	
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Google Webfonts -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Simple Line Icons-->
	<link rel="stylesheet" href="../css/simple-line-icons.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<!-- Salvattore -->
	<link rel="stylesheet" href="../css/salvattore.css">
	<!-- Theme Style -->
	<link rel="stylesheet" href="../css/style.css">
	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="../js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body style="background: #4fd2c2;">
		
	<div id="fh5co-offcanvass">
		<ul>
			<li class="active"><a href="../index.html" data-nav-section="home">Início</a></li>
			<li><a href="#" ><i class="icon-user ">  Usuário</i> </a></li>
			<li><a href="p2-to.html" ><i class="icon-screen-smartphone">    Tour</i></a></li>
			<li><a href="p2-pt.html" ><i class="icon-map">    Pontos Turísticos</i></a></li>
			<li><a href="p2-hos.html" ><i class="icon-hotel">    Hospedagem</i></a></li>
			<li><a href="p2-al.html" ><i class="icon-cup">       Alimentação</i></a></li>
			<li><a href="p2-el.html" ><i class="icon-rocket">       Eventos & Lazer</i></a></li>
			<li><a href="role.php" ><i class="icon-camera">   Rolê</i></a></li>
			<li><a href="p2-tr.html" ><i class="icon-taxi">     Transportes</i></a></li>
			<li><a href="p2-up.html" ><i class="icon-people">    Ultilidade Pública</i></a></li>
		</ul>
		<h3 class="fh5co-lead">Prefeitura de Quissamã</h3>
	</div>
	
	<div id="fh5co-menu" class="navbar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#fh5co-navbar" aria-expanded="false" aria-controls="navbar"><span>Menu</span> <i></i></a>
					<a href="../index.html" class="navbar-brand"><span>QuissaTrip</span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="role_nav">
		<button onclick="window.location.href='p2-user.php'" class="role_icon"><img src="../PHP/getimage.php" class="img-circle" style="position: relative; max-width: 100%; height: 100%;"></button>
		<button onclick="app.capturePhoto()" class="role_icon"><img src="../css/camera.png" style="display: block; margin-left: auto; margin-right: auto; position: relative; max-width: 80%; height: 80%; top:1px;"></button>
		<button onclick="" class="role_icon"></button>
	</div>

	<div id="fh5co-page">
		<div id="fh5co-wrap">
			<div class="fh5co-intro">
				<div class="container">
					<div class="row">
						<div id="fh5co-testimony" data-section="testimonies">
							<?php
								$sql = mysqli_query($conexao,"SELECT * FROM postagens ORDER BY datahora_p DESC");
								$conta = mysqli_num_rows($sql);
								if($conta <= 0){
									echo '<h2>Sem Postagens...</h2>';
								} else {
									while($res = mysqli_fetch_array($sql)){
										$id_u = $res['id_usuario_p'];
										$nome_u = mysqli_fetch_array(mysqli_query($conexao,"SELECT * FROM usuarios WHERE id_usuario = \"$id_u\""));
							?>
				    		<div class="pic_post">
								<?php echo '<img class="pic_img" src="data:image/jpeg;base64,' . base64_encode($res['imagem_p']) . '"/>'; ?>
								<div class="post_info">
									<?php echo '<img class="profile_img" src="data:image/jpeg;base64,' . base64_encode($nome_u['imagem']) . '" />'; ?>
									<p class="post_date"><?php echo $res['datahora_p']; ?></p>
									<p class="profile_name"><?php echo $nome_u['nome_completo']; ?></p>
									</div>
							</div>
							<br>
							<?php }} ?>
				    	</div>
				    </div>
			    </div>
			</div>
		</div>						
	</div>
			
			
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<!-- Owl Carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- toCount -->
	<script src="../js/jquery.countTo.js"></script>
	<!-- Main JS -->
	<script src="../js/main.js"></script>
	<!-- App js -->
	<script src="../js/app.js"></script>

	

	</body>
</html>
