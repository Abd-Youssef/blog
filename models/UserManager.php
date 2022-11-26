<?php

/**
 *
 */
class UserManager extends Model
{
  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function getUsers(){
    return $this->getAllWithObj('SELECT * FROM user', 'User');
  }

  public function getUser($id){
      return $this->getOne('user', 'User', $id);
    }

  public function deleteUser($id){
      return $this->requete("DELETE FROM user WHERE id=$id");
    }


  //lezemni nzid fonction lil image 
  public function createUser(){
            // $img_name = $_FILES['image']['name'];
            // $tmp_name = $_FILES['image']['tmp_name'];
          
            //       $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            //       $img_ex_lc = strtolower($img_ex);


            //         $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            //         $img_upload_path = 'public/images/'.$new_img_name;
            //         move_uploaded_file($tmp_name, $img_upload_path);
            if (($this->uniqueElement($_POST['pseudo_utilisateur'],"pseudo_utilisateur")==true) && ($this->uniqueElement($_POST['email'],"email")==true)){
              return $this->createOne('user',"pseudo_utilisateur, email, password,blogueur",[$_POST['pseudo_utilisateur'], $_POST['email'],  $_POST['password'], 0],"?,?,?,?");

            }
            //lezemni nraja3 erreur mta3 pseudo walla email déja utilisé 

      
    
    }

  private function uniqueElement($element,$variable){
    $users=$this->getUsers();
    foreach ($users as $user) {
      if ($element == $user->$variable()){
        return false ;
      }
    }
    return true ;
  }

}
