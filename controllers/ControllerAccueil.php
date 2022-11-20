<?php
require_once 'views/View.php';
/**
 *
 */
class ControllerAccueil
{
  private $_articleManager;
  private $_view;

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
    $this->_articleManager = new ArticleManager();
    $articles = $this->_articleManager->getArticles();
    $this->_view = new View('Accueil');
    $this->_view->generate(array('articles' => $articles));
  }
  private function disconnect(){
    session_destroy();
  }
}














 ?>
