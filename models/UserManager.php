<?php

/**
 *
 */
class UserManager extends Model
{
  function getAll($elements,$table, $obj){
    $req = $this->getBdd()->prepare('SELECT '.$elements.'FROM '.$table);
    $req->execute();

    //on crée la variable data qui
    //va cobntenir les données
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    return $data;
    $req->closeCursor();


  }

  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function getUsers(){
    return $this->getAll('*','user', 'User');
  }

  public function getUser($id){
      return $this->getOne('user', 'User', $id);
    }

  public function createUser(){
      return $this->createOne('user', 'User');
    }

}





 ?>