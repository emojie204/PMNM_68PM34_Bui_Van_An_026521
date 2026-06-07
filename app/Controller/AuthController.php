<?php
    class AuthController extends Controller{
        
        protected $user = [
            'admin'=>'123456',
            'anbui1'=>'123456'
        ];
        public function login(){


            if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                
                if(isset($this->user[$username]) && $this->user[$username] == $password){
                    $_SESSION['username'] = $username;    
                    header('Location: /HomeController/index');
                    exit();
                }else {
                    header('Location: /HomeController/login');
                    exit();
                }
            }
        }

        public function logout()
        {
            $_SESSION = [];
            if (ini_get('session.use_cookies')) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 36000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
            }
            session_destroy();
            header('Location: /HomeController/login');
            exit();
        }
    }
?>