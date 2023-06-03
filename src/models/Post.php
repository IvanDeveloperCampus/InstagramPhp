<?php

namespace Skylab170\InstagramPhp\models;


use Skylab170\InstagramPhp\lib\Model;
use Skylab170\InstagramPhp\lib\Database;
use PDOException;
use PDO;


class Post extends Model{

    private int $id;
    private array $likes;
    private User $user;


    protected function __construct(private string $title){
        parent::__construct();
        $this->likes=[];
    }

    public function setId(string $id){
        $this->id=$id;
    }
    public function getId():string{
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getLikes(){
        return count($this->likes);
    }

    public function publish($user_id){


    }

    protected function fetchLikes($post_id){
        $items=[];//se iniciliza el array para almecenar los objetos likes
        try{
            $db=new Database();
            $query=$db->connect()->prepare("SELECT * FROM likes WHERE post_id=:post_id");//consulta de los likes segun el id del post
            $query->execute(['post_id'=>$post_id]);

            while($p=$query->fetch(PDO::FETCH_ASSOC)){
                $item =new Like($p['post_id'],$p['user_id'] );//se crea un nuevo like con el id del post actual y el id del user
                $item->setId($p['id']);//se establece como id del objeto like
                array_push($items, $item);//se agrega cada objeto like al array
            }
            return $items; //devuelve todos los me gustas
        }catch(PDOException $e){
            echo $e;
        }
    }

    protected function addLike(User $user){
        $like=new Like($this->id, $user->getId());///id del post y id del suser
        $like->save();
        array_push($this->likes, $like);
    }


    
        
    
}


?>