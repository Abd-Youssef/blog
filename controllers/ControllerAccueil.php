<?php
require_once 'views/View.php';
require_once 'models/CategorieManager.php';

/**
 * 
 *
 */
class ControllerAccueil
{
  private $_articleManager;
  private $_view;
  private $_categorieManager ;
  private $_usereManager ;

  public function __construct()
  {
    if (!isset($_SESSION["connect"])){
      $_SESSION["connect"]=false;
    }
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);

    }
    elseif (isset($_GET['disconnect'])) {
      $this->disconnect();
      header("Location: Accueil" );
    }
    elseif (isset($_GET['tag']) ) {
      $this->tagedArticles("WHERE titre LIKE '%".$_GET['tag']."%'",);

    }
    elseif(isset($_GET['type'])) {
      $this->filtredArticles("WHERE categories.nom = '$_GET[type]'",);
    }
    
    else {
      $this->articles();
    }
    
  }

  private function articles(){
    $this->_view = new View('Accueil');

    $this->_articleManager = new ArticleManager();
    $articles = $this->_articleManager->getArticles();

    //ajourt des categories dans la nav bar
    $this->_categorieManager = new CategorieManager();
    $_SESSION["categories"] = $this->_categorieManager->getCategories();

    $this->_usereManager = new UserManager();
    $_SESSION["users"] = $this->_usereManager->getAllUsers();

    $this->_view->generate(array('articles' => $articles));

  }
  private function filtredArticles($req){
    $this->_view = new View('Accueil');

    $this->_articleManager = new ArticleManager();
    $articles = $this->_articleManager->getFiltredArticles($req);

    //ajourt des categories dans la nav bar
    $this->_categorieManager = new CategorieManager();
    $_SESSION["categories"] = $this->_categorieManager->getCategories();


    $this->_usereManager = new UserManager();
    $_SESSION["users"] = $this->_usereManager->getAllUsers();

    $this->_view->generate(array('articles' => $articles));

  }

  private function tagedArticles($req){
    $this->_view = new View('Accueil');

    $this->_articleManager = new ArticleManager();
    $articles = $this->_articleManager->getFiltredArticles($req);

    //ajourt des categories dans la nav bar
    $this->_categorieManager = new CategorieManager();
    $_SESSION["categories"] = $this->_categorieManager->getCategories();

    $this->_usereManager = new UserManager();
    $_SESSION["users"] = $this->_usereManager->getAllUsers();

    $this->_view->generateTab(array('articles' => $articles));

  }

  private function disconnect(){
    session_destroy();
  }
}














 ?>
