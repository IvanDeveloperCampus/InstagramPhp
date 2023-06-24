<?php

namespace Skylab170\InstagramPhp\controllers;

require_once("src/models/User.php");
require_once("src/lib/UtilImages.php");
use Skylab170\InstagramPhp\lib\Controller;
use Skylab170\InstagramPhp\lib\UtilImages;
use Skylab170\InstagramPhp\Models\User;

class Signup extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function register(){
 
        $username = $this->post('username');
        $password = $this->post('password');
        $profile = $this->file('profile');

        
        if (
            !is_null($username) &&
            !is_null($password) && !is_null($profile)
        ){
           
            
            $user=new User($username, $password);
            $rta=$user->exits($username);
            if ($rta) {
                $this->render('signup/index', ['data'=>"Ingrese otro nombre de usuario por favor"]);
            }else{
                $pictureName=UtilImages::storeImage($profile);             
                $user->setProfile($pictureName);
                $user->save();
                $this->render('login/index', ['data'=>"Usuario creado correctamente, por favor inicie sesion"]);
            }
           


        }else{
            $this->render('errors/index');
        }
    }
}




?>