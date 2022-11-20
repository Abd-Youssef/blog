<?php 
class User 
{
    private $_id;
    private $_pseudo_utilisateur;
    private $_email;
    private $_password;
    private $_blogueur;
    private $_image;


    public function __construct(array $user){
        $this->hydrate($user);
      }
    
      //hydratation
      public function hydrate(array $user){
        foreach ($user as $key => $value) {
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
    
      public function setPseudo_utilisateur($pseudo_utilisateur)
      {
        if (is_string($pseudo_utilisateur)) {
          $this->_pseudo_utilisateur = $pseudo_utilisateur;
        }
      }
    
      public function setEmail($email)
      {
        if (is_string($email)) {
          $this->_email = $email;
        }
      }
      public function setPassword($password)
      {
        if (is_string($password)) {
          $this->_password = $password;
        }
      }
    
      public function setImage($image)
      {
        if (is_string($image)) {
          $this->_image = $image;
        }
      }
      public function setBlogueur($blogueur)
      {
          $this->_blogueur = $blogueur;
        
      }

      //getters
      public function id()
      {
        return $this->_id;
      }
    
      public function pseudo_utilisateur()
      {
        return $this->_pseudo_utilisateur;
      }
    
      public function email()
      {
        return $this->_email;
      }
      public function password()
      {
        return $this->_password;
      }
    
      public function blogueur()
      {
        return $this->_blogueur;
      }
      public function image()
      {
        return $this->_image;
      }
    
    
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
     ?>