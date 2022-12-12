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
                elseif (isset($_GET['edit'])) {
                    $this->editUser($_GET['edit']);
                    // header("Location:  Tab&users" );
                   
                }
                elseif (isset($_GET['status']))  {
                    if ($_GET['status'] == "new") {
                      $this->SignUp();
                    } else if ($_GET['status'] != "new") {
                      
                      $this->updateUser($_GET['status']);
                    } 
                  }

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
            private function editUser($id)
            {
                $this->_userManager = new UserManager;
                $user = $this->_userManager->getUser($id);
                $this->_view = new View('SignUp');
                $this->_view->generateEditUser($user);
                

            }
            private function updateUser($id)
            {
                $this->_userManager = new UserManager;
                $user = $this->_userManager->updateUser($id);
                header("Location:  Tab&users" );
            }

            private function Verify ($element){
                if (isset($element) AND empty($element) ){
                    echo "<span  class='erreur'>Required Field</span>";
                    return false;
                }
                return true ;
            }
          
          
          
          }
    
    
    
    