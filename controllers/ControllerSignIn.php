<?php

    require_once 'views/View.php';

    class ControllerSignIn {

            private $_userManager;
            private $_view;
            private $_connected =false;
            
            public function __construct()
            {
                $_SESSION["erreur"]=null ;
                $this->_view = new View('SignIn');
                if (isset($_GET['SignIn'])) {
                    $this->SignIn();
                }
                elseif (isset($_GET['Erreur'])) {
                    $_SESSION["erreur"]="Verify your Email or Password";
                    $this->_view->generateSignIn();
                }

                else {
                    
                    $this->_view->generateSignIn();
                 }
            }
          
            private function SignIn()
            {
                //$_SESSION["connect"]=false ;
                
                $this->_userManager = new UserManager;
                $_users = $this->_userManager->getUsers();
                foreach($_users as $key => $compte){
                    if (isset($_POST["email"]) && isset($_POST["password"]) ){
                        $Email = $_POST["email"];
                        $Password = $_POST["password"];
                        if (($compte["email"]==$Email) && ($compte["password"]==$Password)){
                          $_SESSION["user"]=$compte["pseudo_utilisateur"] ;
                          $_SESSION["email"]=$compte["email"];
                          $_SESSION["password"]=$compte["password"];
                          $this->_connected =true;
                          //$_SESSION["connect"]=true;
                          if(!empty($_POST["remember"]))   
                            {  
                                setcookie ("member_login",$Email,time()+ (10 * 365 * 24 * 60 * 60));  
                                setcookie ("member_password",$Password,time()+ (10 * 365 * 24 * 60 * 60));
                            }  
                           header("Location: Accueil" );
                        }
                        else {
                            header("Location: SignIn&Erreur" );
                          $erreur= "Wrong Email or Password";
                          break;
                        }
                      }
                }
                
      
            }



            public function GetConnected(){
                return $this->_connected;
            }
          
          
          
          
          }
    
    
    
    