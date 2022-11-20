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
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="Accueil" class="logo"><img src="public/images/logo.png" alt="Logo Image"></a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="Accueil" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-Black">Featudres</a></li>
          <li><a href="#" class="nav-link px-2 text-Black">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-Black">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-Black">About</a></li>
          
        </ul>
        
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
		<?php 
		if ($_SESSION["connect"]==false){ ?>
			<a href="SignIn" type="button" class="btn btn-outline-success ">Login</a>
          	<a href="SignUp" type="button" class="btn btn-outline-warning">Sign-up</a>
		<?php }
		else {?>
			<a href="post&create" type="button" class="btn btn-outline-success ">Créer un article</a>
          	<a href="accueil&disconnect" type="button" class="btn btn-outline-danger">disconnect</a>		
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
