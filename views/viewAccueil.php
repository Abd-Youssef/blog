<!-- <div class="slider"></div> -->

<section class="blog-area section" id= "output">
	<div class="container">

		<div class="row" >

			<?php
			foreach ($articles as $article) :
			?>
				


				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="public/images/20945431.jpg" alt="Blog Image"></div>

							<a class="avatar" href="post&id=<?= $article->id() ?>"><img src="<?= $article->image() ?>" alt=<?= $article->titre() . " Image" ?> style="background-color:white ;"></a>

							<div class="blog-info">

								<h4 class="title"><a href="post&id=<?= $article->id() ?>"><b><?= $article->titre() ?></b></a></h4>
								<p><?= $article->description() ?><a href="post&id=<?= $article->id() ?>" style="color:#ba04c2 ;"> voir plus ...</a></p>

								<ul class="post-footer">
									<li><a href="#"><i class="ion-heart"></i>57</a></li>
									<li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
									<li><a href="#"><i class="ion-eye"></i>138</a></li>
								</ul>

							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->

			<?php endforeach ?>

		</div><!-- row -->

		<a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

	</div><!-- container -->
</section><!-- section -->