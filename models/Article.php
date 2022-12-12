<?php
class Article
{

  private $_id;
  private $_titre;
  private $_contenu;
  private $_date_de_creation;
  private $_image;
  private $_description;
  private $_code_categorie ;
  private $_date_de_modification;
  private $_code_blogueur;

  public function __construct(array $date_de_creation){
    $this->hydrate($date_de_creation);
  }

  //hydratation
  public function hydrate(array $date_de_creation){
    foreach ($date_de_creation as $key => $value) {
      $method = 'set'.ucfirst($key);
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

  public function setTitre($titre)
  {
    if (is_string($titre)) {
      $this->_titre = $titre;
    }
  }

  public function setContenu($contenu)
  {
    if (is_string($contenu)) {
      $this->_contenu = $contenu;
    }
  }
  public function setDescription($description)
  {
    if (is_string($description)) {
      $this->_description = $description;
    }
  }

  public function setDate_de_creation($date_de_creation)
  {
      $this->_date_de_creation = $date_de_creation;

  }
  public function setImage($image)
  {
    if (is_string($image)) {
      $this->_image = $image;
    }
  }

  public function setDate_de_modification($date_de_modification)
  {
      $this->_date_de_modification = $date_de_modification;

  }
  public function setCode_categorie($code_categorie)
  {
      $this->_code_categorie = $code_categorie;

  }
  public function setCode_blogueur($code_blogueur)
  {
      $this->_code_blogueur = $code_blogueur;

  }
  //getters
  public function id()
  {
    return $this->_id;
  }

  public function titre()
  {
    return $this->_titre;
  }

  public function contenu()
  {
    return $this->_contenu;
  }
  public function description()
  {
    return $this->_description;
  }

  public function date_de_creation()
  {
    return $this->_date_de_creation;
  }
  public function image()
  {
    return $this->_image;
  }
  public function date_de_modification()
  {
    return $this->_date_de_modification;
  }
  public function code_categorie()
  {
    return $this->_code_categorie;
  }
  public function code_blogueur()
  {
    return $this->_code_blogueur;
  }


}
