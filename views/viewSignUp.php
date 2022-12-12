<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card" style="height: 26rem;">
			<div class="card-header">
				<h3>Sign Up</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body" >
				<form method="POST" action="SignUp&SignUp" enctype="multipart/form-data">
					<?php if ( !empty($_SESSION["SignUpError"])) { ?>
					<div class="alert alert-danger " role="alert">
					<span  ><?php echo $_SESSION["SignUpError"]?> </span>
					</div>
					<?php } ?>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="pseudo_utilisateur" placeholder="Pseudo utilisateur" required="required">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
						</div>
						<input type="email" class="form-control" name="email" placeholder="Email" required="required">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class='fas fa-camera'></i></i></span>
						</div>
						<input type="file" class="form-control" name="image" required="required">
					</div>

					<div class="form-group">
						<input type="submit" value="Sign up" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>