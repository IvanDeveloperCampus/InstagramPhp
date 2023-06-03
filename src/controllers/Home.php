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
        //recoje los datos de titulo y post que vienen de la vista
        $title=$this->post('title');
        $image=$this->file('image');

        
        if (!is_null($title) && !is_null($image)) {
            $fileName=UtilImages::storeImage($image);
            $post=new PostImage($title, $fileName);//creamos un nuevo post de tipo Imagen
            $this->user->publish($post);//y con el usuario actual llamamos a publicar con la informacion del post
            header('location: /instagramPhp/home');
        }else{
            header('location: /instagramPhp/home');
        }
    }
}


?>