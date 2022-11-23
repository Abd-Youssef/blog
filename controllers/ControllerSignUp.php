<?php

    require_once 'views/View.php';

    class ControllerSignUp {

            private $_userManager;
            private $_view;
            
            public function __construct()
            {
                
                $_SESSION["erreur"]=null ;
                $this->_view = new View('SignUp');
                if (isset($_GET['SignUp'])) {
                    $this->SignUp();
                    header("location : SignIn");
                }
                // elseif (isset($_GET['Erreur'])) {
                //     $_SESSION["erreur"]="Verify your Email or Password";
                //     $this->_view->generateSignIn();
                // }

                else {
                    
                    $this->_view->generateSignIn();
                 }
            }
          
            private function SignUp()
            {
                $this->_userManager = new UserManager;
                
                
                $this->_userManager->createUser();
                $this->_view = new View('SignIn');
                $this->_view->generateSignIn();
                
      
            }

            private function Verify ($element){
                if (isset($element) AND empty($element) ){
                    echo "<span  class='erreur'>Required Field</span>";
                    return false;
                }
                return true ;
            }
          
          
          
          }
    
    
    
    