<?php

/**
 *
 */
class Categorie
{

  private $_id;
  private $_nom;

  public function __construct(array $categorie)
  {
    $this->hydrate($categorie);
  }

  //hydratation
  public function hydrate(array $categorie)
  {
    foreach ($categorie as $key => $value) {
      $method = 'set' . ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  //setters

  public function setId($id)
  {
    $id = (int) $id;
    if ($id > 0) {
      $this->_id = $id;
    }
  }

  public function setNom($nom)
  {
    if (is_string($nom)) {
      $this->_nom = $nom;
    }
  }



  //getters
  public function id()
  {
    return $this->_id;
  }

  public function nom()
  {
    return $this->_nom;
  }
}
