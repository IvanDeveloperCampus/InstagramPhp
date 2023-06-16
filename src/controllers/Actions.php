<?php

namespace Skylab170\InstagramPhp\controllers;

use Skylab170\InstagramPhp\lib\Controller;
use Skylab170\InstagramPhp\models\POstImage;
use Skylab170\InstagramPhp\Models\User;

class Actions extends Controller{
    public function __construct(private User $user){
        parent::__construct();
    }

    public function like(){
        //recoge el id del post que se envia desde la vista
        $post_id=$this->post('post_id');
        $origin=$this->post('origin');

        if (!is_null($post_id) && !is_null($origin)) {
            $post=POstImage::get($post_id);//se trae el post segun el id especifico
            $post->addLike($this->user);
            header('location: /SkylAb-170/instagramPhp/' . $origin);
            
        }
    }

    public function comment(){
        //recoge el id del post que se envia desde la vista y el comentario
        $post_id=$this->post('post_id');
        $origin=$this->post('origin');
        $comment=$this->post('comment');

        if (!is_null($post_id) && !is_null($origin) && !is_null($comment)) {
            $post=POstImage::get($post_id);//se trae el post segun el id especifico
            $post->addComment($this->user, $comment);
            header('location: /instagramPhp/' . $origin);        
        }
    }

    //followed_id= es al que van a seguir
    //this->user=se le asigna en el router o sea es el que realiza la accion
    public function follow(){
        $followed_id=$this->post('followed_id');
        $origin=$this->post('origin');
        if (!is_null($followed_id)) {
            $user=User::getById($followed_id);//TRAEMOS AL USUARIO QUE VAN A SEGUIR
            $user->addSeguidor($this->user);//Y LE MANDAMOS EL SEGUIDOR EL SEGUIDOR
            header('location: /instagramPhp/' . $origin);
        }
    }


}