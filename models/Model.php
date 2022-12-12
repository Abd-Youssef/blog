<?php

abstract class Model
{

  private static $_bdd;

  //connexion a la bdd

  private static function setBdd(){
    self::$_bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

    //on utilise les constantes de PDO pour gérer les erreurs
    self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }

  //fonction de connexion par defaut a la bdd
  protected function getBdd(){
    if (self::$_bdd == null) {
      self::setBdd();
      return self::$_bdd;
    }
  }

  //creation de la methode
  //de récupération de liste d'elements
  //dans la bdd
  //principalement récupiration des articles

  protected function getAllWithObj($sql, $obj){
    $var = [];
    $this->getBdd();
    $req = self::$_bdd->prepare($sql);
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
  //generale
  protected function requete($sql,$attribue=null){
    $this->getBdd();
    $req = self::$_bdd->prepare($sql);
    $req->execute($attribue);
    return $req;
    $req->closeCursor();
  }

  //principalement récupiration des users
  protected function getAll($elements,$table,$condition=""){
    $this->getBdd();
    $req = self::$_bdd->prepare("SELECT $elements FROM $table $condition");
    $req->execute();

    //on crée la variable data qui
    //va cobntenir les données
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    return $data;
    $req->closeCursor();


  }

  protected function createOne($table,$attribue,$valeur,$nbrParametre)
  {
    $this->getBdd();
    $req = self::$_bdd->prepare("INSERT INTO ".$table." (".$attribue.") VALUES (".$nbrParametre.")");
    $req->execute($valeur);

    $req->closeCursor();
  }

  

  protected function getOne($table, $obj, $id)
  {
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare("SELECT * FROM " .$table. " WHERE id = ?");
    $req->execute(array($id));
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }
  protected function getOneWithTwoAttribute($table, $obj, $id1 ,$id2)
  {
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare("SELECT * FROM " .$table. " WHERE id_user = ? AND id_article = ?");
    $req->execute(array($id1),array($id2));
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }

  












}
