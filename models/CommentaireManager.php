<?php

/**
 *
 */
class CommentaireManager extends Model
{
  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function getCommentaires($id_article)
  {
    return $this->getAllWithObj("select * from commentaire WHERE id_article = $id_article", "Commentaire");
  }

  public function getCommentaire($id_article,$id_user)
  {
    return $this->getOneWithTwoAttribute('commentaire', 'Commentaire', $id_article,$id_user);
  }


  public function createCommentaire()
  {

      return $this->createOne('commentaire', "id_article ,id_user ,	date_de_creation, contenu",
       [$_SESSION['id_article'], $_SESSION['id_user'],time() , $_POST['contenu']], "?,?,?,?");
    



  }

}
