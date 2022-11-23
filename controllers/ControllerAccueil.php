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

    $this->_view->generate(array('articles' => $articles));

  }
  private function disconnect(){
    session_destroy();
  }
}














 ?>
