<?php


namespace Skylab170\InstagramPhp\controllers;

use Skylab170\InstagramPhp\lib\Controller;
use Skylab170\InstagramPhp\models\User;

class Profile extends Controller{

    public function __construct()
    {
        parent::__construct(); 
    }

    public function getUserProfile(User $user){
        $user->fetchPosts();
        $this->render('profile/index', ['user'=>$user]);
    }

    public function getUsernameProfile(string $username){
        $user=User::get($username);
        $this->getUserProfile($user);
    }
}

?>