<?php
require_once 'views/View.php';
require_once 'models/CategorieManager.php';


/**
 * 
 *
 */
class ControllerTab
{
  private $_articleManager;
  private $_usereManager;
  private $_view;
  private $_categorieManager;

  public function __construct()
  {
    if (isset($_GET['users'])) {
      if (isset($_GET['delete'])) {
        $this->supprimerUser($_GET['delete']);
      }
      if (isset($_GET['edit'])) {
        //$this->editUser($_GET['edit']);
      }
      $this->afficheTabUser();
    } elseif (isset($_GET['articles'])) {
      if (isset($_GET['delete'])) {
        $this->supprimerArticle($_GET['delete']);
      }
      if (isset($_GET['edit'])) {
        //$this->editArticle($_GET['edit']);
      }
      $this->afficheTabArticles();
    } elseif (isset($_GET['statistique'])) {
      echo "mazel el code ";
    }
  }
private function afficheTabArticles()
  {
    $this->_view = new View('TabArticles');

    $this->_articleManager = new ArticleManager();
    $articles = $this->_articleManager->getArticles();

    //ajourt des categories dans la nav bar
    $this->_categorieManager = new CategorieManager();
    $_SESSION["categories"] = $this->_categorieManager->getCategories();

    $this->_view->generate(array('articles' => $articles));
  }
private function afficheTabUser()
  {
    $this->_view = new View('TabUser');

    $this->_usereManager = new UserManager();
    $users = $this->_usereManager->getUsers();

    //ajourt des categories dans la nav bar
    $this->_categorieManager = new CategorieManager();
    $_SESSION["categories"] = $this->_categorieManager->getCategories();

    $this->_view->generate(array('users' => $users));
  }
private function supprimerUser($id)
  {
    $this->_view = new View('TabUser');

    $this->_usereManager = new UserManager();
    $users = $this->_usereManager->deleteUser($id);
    $users = $this->_usereManager->getUsers();

    //ajourt des categories dans la nav bar
    $this->_categorieManager = new CategorieManager();
    $_SESSION["categories"] = $this->_categorieManager->getCategories();

    $this->_view->generate(array('users' => $users));
  }
private function supprimerArticle($id)
  {
    $this->_view = new View('TabArticles');

    $this->_articleManager = new ArticleManager();
    $this->_articleManager->deleteArticle($id);
    $articles = $this->_articleManager->getArticles();

    //ajourt des categories dans la nav bar
    $this->_categorieManager = new CategorieManager();
    $_SESSION["categories"] = $this->_categorieManager->getCategories();

    $this->_view->generate(array('articles' => $articles));
  }
}
