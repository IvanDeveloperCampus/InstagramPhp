<?php

namespace Skylab170\InstagramPhp\controllers;

require_once("src/models/User.php");
use Skylab170\InstagramPhp\lib\Controller;
use Skylab170\InstagramPhp\lib\UtilImages;
use Skylab170\InstagramPhp\Models\User;

class Signup extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function register(){
     /* PARA PROBAR DESDE THUNDER
    $data=json_decode(file_get_contents("php://input"), true);

        $username = $data['username'] ?? null;
        $password = $data['password'] ?? null;
*/
$username = $this->post('username');
$password = $this->post('password');
$profile = $this->file('profile');
      
        if (
            !is_null($username) &&
            !is_null($password) && !is_null($profile)
        ){
           
            $pictureName=UtilImages::storeImage($profile);
            $user=new User($username, $password);
            $user->setProfile($pictureName);
            $user->save();
            header('location: /instagram/login');

        }else{
            $this->render('errors/index');
        }
    }
}




?>