<?php

    require_once 'views/View.php';

    class ControllerSignIn {

            private $_userManager;
            private $_view;
            
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
                          $_SESSION["connect"]=true;
                          $this->RememberMe($Email,$Password);
                            
                           header("Location: Accueil" );
                        }
                        else {
                            header("Location: SignIn&Erreur" );
                        }
                      }
                }
                
      
            }
            private function RememberMe($Email,$Password){
                if(!empty($_POST["remember"]))   
                {  
                    setcookie ("member_login",$Email,time()+ (10 * 365 * 24 * 60 * 60));  
                    setcookie ("member_password",$Password,time()+ (10 * 365 * 24 * 60 * 60));
                }  
                else  
                {  
                    setcookie ("member_login","");     
                    setcookie ("member_password","");  
                      
                }
            }


            public function GetConnected(){
                return $this->_connected;
            }
          
          
          
          
          }
    
    
    
    