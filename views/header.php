<link href="../public/header/bootstrap.min.css" rel="stylesheet">
<link href="../public/header/headers.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="text-bg-dark m-3 mx-5  ">
	<div class="container-fluid ">
		<div class="d-flex justify-content-between">
			<div class="d-flex align-items-center  ">
				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2  mb-md-0">
					<a href="Accueil" class="nav-link px-2 "><img src="public/images/logo.png" alt="Logo Image"></a>
					<li><a href="Accueil" class="nav-link px-2 text-secondary">Home</a></li>
					<li>
						<div class="nav-item dropdown  flex-fill">
							<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"> Categories <b class="caret"></b></a>
							<div class="dropdown-menu">
								<?php if (isset($_SESSION["categories"])) {
									foreach ($_SESSION["categories"] as $categorie) { ?>
										<a href="Accueil&type=<?= $categorie["nom"] ?>" class=" dropdown-item"> <?= $categorie["nom"] ?></a>

								<?php
									}
								} ?>
								<div class="dropdown-divider"></div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="d-flex align-items-center  flex-grow">
				<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
					<input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
				</form>
			</div>
			<div class="d-flex align-items-center mg-3 ">

				<?php
				if ($_SESSION["connect"] == false) { ?>
					<a href="SignIn" type="button" class="btn btn-outline-success m-3 ">Login</a>
					<a href="SignUp" type="button" class="btn btn-outline-warning m-3">Sign-up</a>
				<?php } else if (isset($_SESSION["blogueur"]) && $_SESSION["blogueur"] == true) { ?>

					<a href="post&create" type="button" class="btn btn-outline-success  m-1">Créer un article</a>
					<a href="accueil&disconnect" type="button" class="btn btn-outline-danger m-1">disconnect</a>
				<?php
				} else { ?>
					<a href="accueil&disconnect" type="button" class="btn btn-outline-danger m-1">disconnect</a>
				<?php } ?>
				<?php if ($_SESSION["connect"] == true) { ?>
					<div class="nav-item dropdown m-1 flex-fill">
						<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="public/images/user.png" class="avatar"> <?php echo $_SESSION["user"] ?> <b class="caret"></b></a>
						<div class="dropdown-menu">
							<a href="tab&users" class="dropdown-item"><i class="fa fa-user-o"></i> Table of users</a></a>
							<a href="tab&articles" class="dropdown-item"><i class="fa fa-calendar-o"></i> Table of Articles</a></a>
							<a href="tab&statistique" class="dropdown-item"><i class="fa fa-sliders"></i> Statistique </a></a>
							<div class="dropdown-divider"></div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</nav>