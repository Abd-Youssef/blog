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
    $reqNoFilter = "SELECT articles.id ,titre ,date_de_creation,description,contenu,	
                    image,	code_categorie ,date_de_modification, code_blogueur ,categories.nom
            FROM articles  
            INNER JOIN categories 
            ON code_categorie = categories.id
            ";
    $req = (isset($_POST['name'])) ? $reqNoFilter."WHERE categories.nom LIKE '%".$_POST['name']."%'" : $reqNoFilter ;
    return $this->getAllWithObj($req, 'Article');
  }

  public function getArticle($id){
      return $this->getOne('articles', 'Article', $id);
    }

  public function deleteArticle($id){
      return $this->requete("DELETE FROM articles WHERE id=$id");
    }
  public function getFiltredArticles($req){
      $sql = "SELECT articles.id ,titre ,date_de_creation,description,contenu,	
                     image,	code_categorie ,date_de_modification, code_blogueur ,categories.nom   
              FROM articles
              LEFT JOIN categories
              ON code_categorie = categories.id
              ".$req;
      
              // WHERE titre LIKE '%".$_GET['des']."%'
      return $this->getAllWithObj($sql, 'Article');
    }
  

  public function createArticle(){
      return $this->createOne('articles',"titre,description, contenu,image, date_de_creation,code_categorie,code_blogueur",
      [$_POST['titre'],$_POST['description'], $_POST['contenu'],$this->haveImage(), time(), $_POST['categorie'], $_POST['blogueur']],
      "?,?,?,?,?,?,?");
    }
  public function updateArticle($id){
    
    $req =  " UPDATE articles
              SET titre = '$_POST[titre]',description='$_POST[description]',contenu ='$_POST[contenu]',date_de_modification = '".time().
              "' ,code_categorie = '$_POST[categorie]' ,code_blogueur = '$_POST[blogueur]', 
              image='". $this->haveImage()."'
              WHERE id = $id ";
      return $this->requete($req);
    }
    public function haveImage(){
      if (isset($_FILES["image"]) ){
            $img_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = 'public/images/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            return $new_img_name ;
      }
      else return "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzj-g2tCVry_m5tMn3kFB2JHrbu1J7AukXYtOa6rXFxmULELmLJg_Q3ukvA1WJCcB0kbs&usqp=CAU";
    }

}
