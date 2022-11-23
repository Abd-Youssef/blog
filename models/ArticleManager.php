<?php

/**
 *
 */
class ArticleManager extends Model
{
  
  // function createOne($table)
  // {
  //   $db =$this->getBdd();
  //   $req = $db->prepare("INSERT INTO ".$table." (titre, contenu, date_de_creation,code_categorie,code_blogueur) VALUES (?, ?, ?,?,?)");
  //   $req->execute(array($_POST['titre'], $_POST['contenu'], date("d.m.Y"), $_POST['categorie'], $_POST['blogueur']));

  //   $req->closeCursor();
  // }

  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function getArticles(){
    return $this->getAllWithObj('*','articles', 'Article');
  }

  public function getArticle($id){
      return $this->getOne('articles', 'Article', $id);
    }

  public function createArticle(){
      return $this->createOne('articles',"titre, contenu, date_de_creation,code_categorie,code_blogueur",[$_POST['titre'], $_POST['contenu'], date("d.m.Y"), $_POST['categorie'], $_POST['blogueur']],"?,?,?,?");
    }

}





 ?>
