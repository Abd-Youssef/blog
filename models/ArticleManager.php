<?php

/**
 *
 */
class ArticleManager extends Model
{
  function getAll($elements,$table, $obj){
    $var = [];
    $req = $this->getBdd()->prepare('SELECT '.$elements.'FROM '.$table);
    $req->execute();

    //on crée la variable data qui
    //va cobntenir les données
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      // var contiendra les données sous forme d'objets
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();


  }

  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function getArticles(){
    return $this->getAll('*','articles', 'Article');
  }

  public function getArticle($id){
      return $this->getOne('articles', 'Article', $id);
    }

  public function createArticle(){
      return $this->createOne('articles', 'Article');
    }

}





 ?>
