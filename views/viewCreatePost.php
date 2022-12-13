<div class="contact1">
  <div class="container-contact1">
    <div class="contact1-pic js-tilt" data-tilt>
      <img src="https://img.freepik.com/photos-gratuite/gros-plan-programmeur-homme-tapant-main-script-site-web-ordinateur-travaillant-distance-maison-hacker-afro-americain-programme-code-binaire-aide-systeme-securite-reseau-concept-codage_482257-37980.jpg?w=360&t=st=1670842484~exp=1670843084~hmac=4eb214c8948500b8f939965f8791b93c8c96951ac434a53038993c22501af24a" 
      alt="IMG" style="border-radius: 30px ;">
    </div>
    <form method="post" action="post&status=<?php if (isset($article)) echo $article[0]->id(); else echo "new"  ?>" class="contact1-form validate-form">
      <span class="contact1-form-title">Ajouter un post</span>
      <div class="wrap-input1 validate-input" data-validate="Name is required">
        <span class="">Titre : </span>
        <input class="input1"required="required" type="text" name="titre" placeholder="Titre de l'article" value="<?php if (isset($article)) {
                                                                                                echo $article[0]->titre();
                                                                                              } ?>">
        <span class="shadow-input1"></span>
      </div>
      <div class="wrap-input1 validate-select" data-validate="Name is required">
      <span class="">Categorie : </span>

        <select name="categorie" required="required" class="select1" value="<?php foreach($_SESSION["categories"] as $c){ if ( (isset($article))&&($article[0]->code_categorie() == $c["id"])   ) {echo $c["nom"] ;}}?>">
          			<option> choisire categorie</option>
                  	<?php 
                      foreach($_SESSION["categories"] as $c){
                        ?>
                        <option value=<?=$c["id"]?>><?=$c["nom"]?></option>
                        <?php
                        }
                 	 ?>
                    
               </select>
      </div>
      <div class="wrap-input1 validate-input" data-validate="Name is required">
      <span class="">Blogueur : </span>
        <input class="input1" type="text"  disabled="disabled" name="blogueur" placeholder="code blogueur" value="<?= $_SESSION["user"] ?>">
        <span class="shadow-input1"></span>
      </div>

      <div class="wrap-input1 validate-input" data-validate="Message is required">
        <span class="">Une petit description : </span>
        <textarea class="input1"required="required" name="description" placeholder="petit description" ><?php if (isset($article)) {
                                                                                            echo $article[0]->description();
                                                                                          } ?></textarea>
        <span class="shadow-input1"></span>
      </div>

      <div class="wrap-input1 validate-input" data-validate="Message is required">
        <span class="">Description : </span>
        <textarea class="input1"required="required" name="contenu" placeholder="Contenu de l'article" ><?php if (isset($article)) {
                                                                                            echo $article[0]->contenu();
                                                                                          } ?></textarea>
        <span class="shadow-input1"></span>
      </div>

      <div class="wrap-input1 validate-input" data-validate="Name is required">
      <span class="">image : </span>
        <input type="file" class="form-control" name="image" >
        <span class="shadow-input1"></span>
      </div>                                                                                  

      <div class="container-contact1-form-btn">
        <button class="contact1-form-btn">
          <span>
            Créer l'article
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
          </span>
        </button>
      </div>
    </form>
  </div>
</div>