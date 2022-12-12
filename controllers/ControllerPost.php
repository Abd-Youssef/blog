<?php
require_once 'views/View.php';

class ControllerPost

{
  private $_articleManager;
  private $_view;

  public function __construct()
  {
    if (isset($url) && count($url) < 1) {
      throw new \Exception("Page Introuvable");
    }
    elseif (isset($_GET['create'])) {
      $this->create();
    }
    elseif (isset($_GET['edit'])) {

      $this->edit($_GET['edit']);
    }
    elseif (isset($_GET['status']))  {
      if ($_GET['status'] == "new") {
        $this->store();
      } else if ($_GET['status'] != "new") {
        
        $this->update($_GET['status']);
      } 
    }
    else {
      $this->article();
    }
  }

  //fonction pour afficher un article
  private function article()
  {
    if (isset($_GET['id'])) {
      $this->_articleManager = new ArticleManager;
      $article = $this->_articleManager->getArticle($_GET['id']);
      $this->_view = new View('SinglePost');
      $this->_view->generatePost(array('article' => $article));
    }

  }

  //fonction pour afficher le
  //formulaire de création d'un article
  private function create()
  {
      $this->_view = new View('CreatePost');
      $this->_view->generateForm();
    

  }
  private function edit($id)
  {
      $this->_articleManager = new ArticleManager;
      $article = $this->_articleManager->getArticle($id);
      $this->_view = new View('CreatePost');
      $this->_view->generateEditForm($article);
    

  }


  //fonction pour insérer un aticle
    //en bdd
      private function store()
      {
        $this->_articleManager = new ArticleManager;
        $article = $this->_articleManager->createArticle();
        $articles = $this->_articleManager->getArticles();
        $this->_view = new View('Accueil');
        $this->_view->generate(array('articles' => $articles));
      }
    //fonction pour mise a jour un aticle
    //en bdd
      private function update($id)
      {
        $this->_articleManager = new ArticleManager;
        $article = $this->_articleManager->updateArticle($id);
        $articles = $this->_articleManager->getArticles();
        $this->_view = new View('Accueil');
        $this->_view->generate(array('articles' => $articles));
      }




}

 ?>
