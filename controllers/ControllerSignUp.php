<?php

    require_once 'views/View.php';

    class ControllerSignUp {

            private $_userManager;
            private $_view;
            
            public function __construct()
            {
                $_SESSION["SignUpError"]="";
                if (isset($_GET['SignUp'])) {
                    $this->SignUp();
                    
                }
                // elseif (isset($_GET['Erreur'])) {
                //     $_SESSION["SignUpError"]="Verify your Email or Password";
                //     $this->_view->generateSignIn();
                // }

                else {
                    $this->_view = new View('SignUp');
                    $this->_view->generateSignIn();
                 }
            }
          
            private function SignUp()
            {
                $this->_userManager = new UserManager;
                if($this->_userManager->createUser()){
                    $this->_view = new View('SignIn');
                    $this->_view->generateSignIn();
                }
                else{
                    $this->_view = new View('SignUp');
                    $this->_view->generateSignIn();
                    echo $_SESSION["SignUpError"];
                }
                

                
      
            }

            private function Verify ($element){
                if (isset($element) AND empty($element) ){
                    echo "<span  class='erreur'>Required Field</span>";
                    return false;
                }
                return true ;
            }
          
          
          
          }
    
    
    
    