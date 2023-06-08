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
    private array $comments;


    protected function __construct(private string $title){
        parent::__construct();
        $this->likes=[];
        $this->comments=[];
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

    public function getComments(){
        return $this->comments;
    }

    

    public function publish($user_id){


    }

    //SE USAN EN POSTIMAGE Y SE LLAMAN EN GETFEED para enviarlos al home
    
    public  function fetchLikes(){
        $items=[];//se iniciliza el array para almecenar los objetos likes
        try{
            $db=new Database();
            $query=$db->connect()->prepare("SELECT * FROM likes WHERE post_id=:post_id");//consulta de los likes segun el id del post
            $query->execute(['post_id'=>$this->id]);

            while($p=$query->fetch(PDO::FETCH_ASSOC)){
                $item =new Like($p['post_id'],$p['user_id'] );//se crea un nuevo like con el id del post actual y el id del user
                $item->setId($p['id']);//se establece como id del objeto like
                array_push($items, $item);//se agrega cada objeto like al array
            }
           $this->likes=$items;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public  function fetchComments(){
        $arrayComments=[];//se iniciliza el array para almecenar los objetos comments
        try{
            $db=new Database();
            $query=$db->connect()->prepare("SELECT comments.*, users.username FROM comments INNER JOIN users ON comments.user_id=users.user_id INNER JOIN posts ON comments.post_id=posts.post_id WHERE posts.post_id=:post_id;");//consulta de los comentarios segun el id del post
            $query->execute(['post_id'=>$this->id]);

            while($p=$query->fetch(PDO::FETCH_ASSOC)){
                $item =new Comment($p['post_id'],$p['user_id'], $p['comment']);//se crea un nuevo comentario con el id del post actual y el id del user
                $item->setId($p['id']);//se establece como id del objeto comentario
                $item->setUsernameComment($p['username']);
                array_push($arrayComments, $item);//se agrega cada objeto comentario al array
            }
           $this->comments=$arrayComments;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function traerUsuarioComentario(){
        try{
            $db=new Database();
            $query=$db->connect()->prepare("SELECT username FROM users INNER JOIN comments ON users.user_id=comments.user_id INNER JOIN posts ON posts.post_id=comments.post_id WHERE posts.post_id=:post_id");//consulta de los comentarios segun el id del post
            $query->execute(['post_id'=>$this->id]);
            $resultados = $query->fetchAll(PDO::FETCH_COLUMN);
            return $resultados;
        }catch(PDOException $e){
            echo $e;
        }
    }


    public function addLike(User $user){
        $like=new Like($this->id, $user->getId());///id del post y id del suser
        $like->existsLike();
        //array_push($this->likes, $like);
    }
    public function addComment(User $user, string $comment){
        $comment=new Comment($this->id, $user->getId(), $comment);///id del post y id del suser
        $comment->save();
        //$like->existsLike();
       // array_push($this->comments, $comment);
    }

    public function setUser(User $user){
        $this->user=$user;
    }

    public function getUser(){
        return $this->user;
    }


    
        
    
}


?>