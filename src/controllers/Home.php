<?php


namespace Skylab170\InstagramPhp\controllers;

require_once("src/models/User.php");
use Skylab170\InstagramPhp\lib\Controller;
use Skylab170\InstagramPhp\lib\UtilImages;
use Skylab170\InstagramPhp\Models\User;
use Skylab170\InstagramPhp\Models\POstImage;

class Home extends Controller{
    public function __construct(private User $user){
        parent::__construct();
    }

    public function index(){
        $this->render('home/index', ['user'=> $this->user]);
    }

    public function store(){
        $title=$this->post('title');
        $image=$this->file('image');

        if (!is_null($title) && !is_null($image)) {
            $fileName=UtilImages::storeImage($image);

            $post=new PostImage($title, $fileName);
            $this->user->publish($post);
        }else{
            header('location: /instagram/home');
        }
    }
}


?>