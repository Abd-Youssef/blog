<footer>

	<div class="container">
		<div class="row">

			<div class="col-lg-6 col-md-6">
				<div class="footer-section">

					<a href="Accueil" class="nav-link px-2 "><b class="h4">BLOGY</b></a>
					<p class="copyright">@ 2022. All rights reserved.</p>
					<p class="copyright">Designed by <a href="public/https://colorlib.com" target="_blank">Colorlib</a></p>
					<ul class="icons">
						<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
						<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
						<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
						<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
						<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
					</ul>

				</div><!-- footer-section -->
			</div><!-- col-lg-4 col-md-6 -->




			<div class="col-lg-6 col-md-6">
				<div class="tag-area">

					<h4 class="title"><b>OUR TAG</b></h4>
					<ul>
					<?php if (isset($_SESSION["categories"])) {
											foreach ($_SESSION["categories"] as $categorie) { ?>
												<li><a href="Accueil&type=<?= $categorie["nom"] ?>" class=" dropdown-item h6"> <?= $categorie["nom"] ?></a></li>

										<?php
											}
										} ?>
					</ul>

					</div>
			</div><!-- col-lg-4 col-md-6 -->

			<!-- col-lg-4 col-md-6 -->

		</div><!-- row -->
	</div><!-- container -->
</footer>