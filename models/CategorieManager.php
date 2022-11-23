<?php

/**
 *
 */
class CategorieManager extends Model
{
  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function getCategories(){
    return $this->getAll('*','categories', 'Categorie');
  }

  public function getCategorie($id){
      return $this->getOne('categories', 'Categorie', $id);
    }


  public function createCategorie()
    {   
        if (($this->uniqueElement($_POST['nom'],"nom")==true) ){
              return $this->createOne('categories',"nom",[$_POST['nom']],"?");

            }
            //lezemni nraja3 erreur mta3 nom existe déja  

      
    
    }

  private function uniqueElement($element,$variable){
    $users=$this->getCategories();
    foreach ($users as $user) {
      if ($element == $user[$variable]){
        return false ;
      }
    }
    return true ;
  }

}
