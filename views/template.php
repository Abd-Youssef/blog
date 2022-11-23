<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>TITLE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="public/common-css/bootstrap.css" rel="stylesheet">

	<link href="public/common-css/ionicons.css" rel="stylesheet">


	<link href="public/layout-1/css/styles.css" rel="stylesheet">

	<link href="public/layout-1/css/responsive.css" rel="stylesheet">

</head>
<body >

<link href="../public/header/bootstrap.min.css" rel="stylesheet">
<link href="../public/header/headers.css" rel="stylesheet">
<nav class="text-bg-dark m-3 " >
	<div class="container-fluid ">
		<div class="d-flex justify-content-between">
				<div class="d-flex align-items-center  ">
					<ul class="nav col-12 col-lg-auto me-lg-auto mb-2  mb-md-0">
						<a href="Accueil" class="nav-link px-2 "><img src="public/images/logo.png" alt="Logo Image"></a>
						<li><a href="Accueil" class="nav-link px-2 text-secondary">Home</a></li>
						<li><a href="#" class="nav-link px-2 text-Black">Features</a></li>
						<li><a href="#" class="nav-link px-2 text-Black">Pricing</a></li>	
					</ul>
				</div>
				<div class="d-flex align-items-center  flex-grow">
					<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
					<input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
					</form>
				</div>
				<div class="d-flex align-items-center mg-3 ">

					<?php 
					if ($_SESSION["connect"]==false){ ?>
						<a href="SignIn" type="button" class="btn btn-outline-success m-3 ">Login</a>
						<a href="SignUp" type="button" class="btn btn-outline-warning m-3">Sign-up</a>
					<?php }
					else if( isset($_SESSION["blogueur"]) && $_SESSION["blogueur"]==true){?>
						
						<a href="post&create" type="button" class="btn btn-outline-success  m-1">Créer un article</a>
						<a href="accueil&disconnect" type="button" class="btn btn-outline-danger m-1">disconnect</a>		
					<?php 
					} 
					else {?>
						<a href="accueil&disconnect" type="button" class="btn btn-outline-danger m-1">disconnect</a>
						<?php } ?>
					<?php  if ($_SESSION["connect"]==true){ ?>
						<div class="nav-item dropdown m-1 flex-fill">
							<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="inc/images/user.png" class="avatar" > <?php echo $_SESSION["user"] ?> <b class="caret"></b></a>
							<div class="dropdown-menu">
								<a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Table of users</a></a>
								<a href="#" class="dropdown-item"><i class="fa fa-calendar-o"></i> Table of Articles</a></a>
								<a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Statistique </a></a>
								<div class="dropdown-divider"></div>
							</div>
						</div>
					<?php } ?>
				</div>		
		</div>
    </div>
  </header>
	<?= $content ?>


	 <?php include("footer.php") ?>




	


	<!-- SCIPTS -->

	<script src="public/common-js/jquery-3.1.1.min.js"></script>

	<script src="public/common-js/tether.min.js"></script>

	<script src="public/common-js/bootstrap.js"></script>

	<script src="public/common-js/scripts.js"></script>

</body>
</html>
