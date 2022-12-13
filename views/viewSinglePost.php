<?php $_SESSION['id_article']=$article[0]->id();
                ?>

<div class="slider">
  <div class="display-table  center-text">
    <h1 class="title display-table-cell"><?php 
                if (isset($_SESSION["categories"])) {
									foreach ($_SESSION["categories"] as $categorie) { 
                      if ($categorie["id"] == $article[0]->code_categorie()  ) {?>
										    <b> <?= $categorie["nom"] ?></b>
                      

								<?php }
									}
								} ?></h1>
  </div>
</div><!-- slider -->

<section class="post-area section">
  <div class="container">

    <div class="row">

      <div class="col-lg-8 col-md-12 no-right-padding">

        <div class="main-post">

          <div class="blog-post-inner">

            <div class="post-info">

              <div class="left-area">
                <img src="<?=$article[0]->image()   ?>" alt="Profile Image">
              </div>

              <div class="middle-area">
                
                <a class="name" href="#"><?php 
                
                  if (isset($_SESSION["users"])) {
                    foreach ($_SESSION["users"] as $user) { 
                        if ($user["id"] == $article[0]->code_blogueur()  ) {?>
                         <?= $user["pseudo_utilisateur"] ?>
                        

                  <?php }
                    }
                  } ?></a>
                <h6 class="date"><?= $article[0]->date_de_creation() ?></h6>
              </div>

            </div><!-- post-info -->

            <h3 class="title"><a href="#"><b><?= $article[0]->titre() ?></b></a></h3>

            <p class="para"><?= $article[0]->contenu() ?></p>



            <ul class="tags">
              <li><?php 
                if (isset($_SESSION["categories"])) {
									foreach ($_SESSION["categories"] as $categorie) { 
                      if ($categorie["id"] == $article[0]->code_categorie()  ) {?>
										    <a href="Accueil&type=<?= $categorie["nom"] ?>" > <?= $categorie["nom"] ?></a>
                      

								<?php }
									}
								} ?></a></li>
            </ul>
          </div><!-- blog-post-inner -->

          <!-- <div class="post-icons-area">
            <ul class="post-icons">
              <li><a href="#"><i class="ion-heart"></i>57</a></li>
              <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
              <li><a href="#"><i class="ion-eye"></i>138</a></li>
            </ul>

            <ul class="icons">
              <li>SHARE : </li>
              <li><a href="#"><i class="ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
            </ul> 
          </div> -->


        </div><!-- main-post -->
      </div><!-- col-lg-8 col-md-12 -->

      <div class="col-lg-4 col-md-12 no-left-padding">

        <div class="single-post info-area">

          <div class="sidebar-area about-area">
            <h4 class="title"><b>ABOUT BLOGY</b></h4>
            <p>BLOGY is a platform created by Abdennadher Youssef And Mohamed Ali Elleuch To
              present to you the different framework and technology in the world of software engineering 
            </p>
          </div>


          <div class="tag-area">

            <h4 class="title"><b>OUR TAG</b></h4>
            <ul>
              <?php if (isset($_SESSION["categories"])) {
									foreach ($_SESSION["categories"] as $categorie) { ?>
										<li><a href="Accueil&type=<?= $categorie["nom"] ?>" class=" dropdown-item"> <?= $categorie["nom"] ?></a></li>

								<?php
									}
								} ?>
            </ul>

          </div><!-- subscribe-area -->

        </div><!-- info-area -->

      </div><!-- col-lg-4 col-md-12 -->

    </div><!-- row -->

  </div><!-- container -->
</section><!-- post-area -->



<section class="comment-section ">
  <div class="container ">
    <h4><b>POST COMMENT</b></h4>
    <div class="row" >

      <div class="col-lg-8 col-md-12">
        <div class="comment-form">
          <form method="POST" action="Post&id=<?=$article[0]->id()   ?>&commentaire" >

            <div class="row">

              <div class="col-sm-6">
                <input type="text" aria-required="true" disabled="disabled" name="contact-form-name" class="form-control" placeholder="Enter your name" aria-invalid="true" required value="<?php if (isset($_SESSION["user"])) echo $_SESSION["user"] ;?>" >
              </div><!-- col-sm-6 -->
              <div class="col-sm-6">
                <input type="email" aria-required="true"  disabled="disabled" name="contact-form-email" class="form-control" placeholder="Enter your email" aria-invalid="true" required value=<?php if (isset($_SESSION["email"]))  echo $_SESSION["email"] ?>>
              </div><!-- col-sm-6 -->

              <div class="col-sm-12">
                <textarea name="contenu" rows="2" class="text-area-messge form-control" placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea>
              </div><!-- col-sm-12 -->
              <div class="col-sm-12">
                <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
              </div><!-- col-sm-12 -->

            </div><!-- row -->
          </form>
        </div><!-- comment-form -->


        <h4><b>COMMENTS(<?=count($commentaires)?>)</b></h4>

        <div class="commnets-area">

            <?php
          foreach ($commentaires as $commentaire) :
          ?>
            
            

            <div class="comment">

            <div class="post-info">

              <div class="left-area">
                <a class="avatar" href="#"><img src="public/images/avatar.jpg" alt="Profile Image"></a>
              </div>

              <div class="middle-area">
                <a class="name" href="#"><?php 
                
                if (isset($_SESSION["users"])) {
                  foreach ($_SESSION["users"] as $user) { 
                      if ($user["id"] == $commentaire->id_user()  ) {?>
                       <?= $user["pseudo_utilisateur"] ?>
                      

                <?php }
                  }
                } ?></a>
                <h6 class="date"><?= $commentaire->date_de_creation() ?></h6>
              </div>

              <!-- <div class="right-area">
                <h5 class="reply-btn"><a href="#"><b>REPLY</b></a></h5>
              </div> -->

            </div><!-- post-info -->

            <p><?=$commentaire->contenu()?></p>

          </div>

          <?php endforeach ?>

          

          

        </div><!-- commnets-area -->

        <!-- <a class="more-comment-btn" href="#"><b>VIEW MORE COMMENTS</a> -->

      </div><!-- col-lg-8 col-md-12 -->

    </div><!-- row -->

  </div><!-- container -->
</section>