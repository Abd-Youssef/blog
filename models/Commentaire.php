<?php

/**
 *
 */
class Commentaire
{

  private $_id_article;
  private $_id_user;
  private $_contenu;
  private $_date_de_creation;
  private $_validation;

  public function __construct(array $commentaire)
  {
    $this->hydrate($commentaire);
  }

  //hydratation
  public function hydrate(array $commentaire)
  {
    foreach ($commentaire as $key => $value) {
      $method = 'set' . ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  //setters

  public function setId_article($id_article)
  {
    $id = (int) $id_article;
    if ($id > 0) {
      $this->_id_article = $id;
    }
  }
  public function setId_user($id_user)
  {
    $id = (int) $id_user;
    if ($id > 0) {
      $this->_id_user = $id;
    }
  }

  public function setContenu($contenu)
  {
    if (is_string($contenu)) {
      $this->_contenu = $contenu;
    }
  }
  public function setDate_de_creation($date_de_creation)
  {
      $this->_date_de_creation = $date_de_creation;

  }
  public function setValidation($validation)
  {
    
      $this->_validation = $validation;
    
  }



  //getters
  public function id_article()
  {
    return $this->_id_article;
  }

  public function id_user()
  {
    return $this->_id_user;
  }
  public function contenu()
  {
    return $this->_contenu;
  }
  public function date_de_creation()
  {
    return $this->_date_de_creation;
  }

  public function validation()
  {
    return $this->_validation;
  }
}
