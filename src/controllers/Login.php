<?php

namespace Skylab170\InstagramPhp\controllers;
require_once("src/models/User.php");
use Skylab170\InstagramPhp\lib\Controller;
use Skylab170\InstagramPhp\Models\User;

class Login extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function auth(){

        
        $username=$this->post('username');
        $password=$this->post('password');
        
        if (!empty($username)&& !empty($password)) {
            if (User::exits($username)) {
                $user=User::get($username);
                if ($user->comparePasswords($password)) {  //
                    $_SESSION['user']=serialize($user);
                    echo "user logged in";
                    header('location: /InstagramPhp/home');
                }else{
                    echo "Password Inconrrecto";
                    
                }
            }

            /***$_SESSION['user'] = serialize($user) se utiliza para 
             * almacenar un objeto en la sesión después de convertirlo 
             * en una cadena de caracteres, lo que permite recuperar y 
             * utilizar ese objeto en sesiones futuras. */
        
        }else{
            header('location: /InstagramPhp/login');
        }

    }

    
}




?>