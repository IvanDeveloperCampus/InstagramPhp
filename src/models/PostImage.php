<?php

namespace Skylab170\InstagramPhp\models;

use Skylab170\InstagramPhp\models\Post;
use Skylab170\InstagramPhp\lib\Database;
use PDO;
use PDOException;

class POstImage extends Post{

    public function __construct(private string $title, private string $image){
        parent::__construct($title);
    }

    public function getImage(){
        return $this->image;
    }


    public static function getFeed(){
        $items=[];
        try {
            $db=new Database();
            $query=$db->connect()->query('SELECT * FROM posts ORDER BY post_id DESC');
            
            while ($p=$query->fetch(PDO::FETCH_ASSOC)) {
                $item=new POstImage($p['title'], $p['media']);//se crea un nuevo objeto imagen
                $item->setId($p['post_id']);//se le asigna el id del post
                $item->fetchLikes();//para traer los likes de cada post
                $item->fetchComments();//traer comentarios
                $user=User::getById($p['user_id']);//se trae el usuario del post
                $item->setUser($user);//se el asigna al post
                array_push($items, $item);
            }
            
            return $items;

        } catch (PDOException $th) {
            echo $th;
        }
    }

    //traer posts por id
    public static function get($post_id){
        try {
            $db=new Database();
            $query=$db->connect()->prepare('SELECT * FROM posts WHERE post_id=:post_id');
            $query->execute(['post_id'=>$post_id]);
            $data=$query->fetch(PDO::FETCH_ASSOC);

            $post=new POstImage($data['title'], $data['media']);
            $post->setId($data['post_id']);
            error_log($post->getTitle());
            return $post;

        } catch (PDOException $th) {
            return NULL;
        }
    }

    //para traer todos los posts de un usuario especifico para el perfil
    public static function getAll($user_id){
        $items=[];
        try {
            $db=new Database();
            $query=$db->connect()->prepare('SELECT * FROM posts WHERE user_id=:user_id ORDER BY post_id DESC');
            $query->execute([
                'user_id'=>$user_id
            ]);
            while ($p=$query->fetch(PDO::FETCH_ASSOC)) {
                $item=new POstImage($p['title'], $p['media']);//se crea un nuevo objeto imagen
                $item->setId($p['post_id']);//se le asigna el id del post
                $item->fetchLikes();//para traer los likes de cada post
                $item->fetchComments();//traer comentarios
                $user=User::getById($p['user_id']);//se trae el usuario del post
                $item->setUser($user);//se el asigna al post
                array_push($items, $item);
            }
            
            return $items;

        } catch (PDOException $th) {
            echo $th;
        }
    }

    //TRAIGO SOLO LOS POSTS A LOS QUE SIGUE ESE USUARIO Y LA LLAMO EN USER EL CUAL LE ASIGNA EL ID 
    public static function getPostFollowers($user_id){
        $items=[];
        try {
            $db=new Database();
            $query=$db->connect()->prepare('SELECT p.* FROM users u JOIN followers f ON u.user_id = f.follower_id JOIN posts p ON u.user_id = p.user_id WHERE f.followed_id = :user_id;');
            $query->execute([
                'user_id'=>$user_id
            ]);
            while ($p=$query->fetch(PDO::FETCH_ASSOC)) {
                $item=new POstImage($p['title'], $p['media']);//se crea un nuevo objeto imagen
                $item->setId($p['post_id']);//se le asigna el id del post
                $item->fetchLikes();//para traer los likes de cada post
                $item->fetchComments();//traer comentarios
                $user=User::getById($p['user_id']);//se trae el usuario del post
                $item->setUser($user);//se el asigna al post
                array_push($items, $item);
            }
            
            return $items;

        } catch (PDOException $th) {
            echo $th;
        }
    }

    



    

}

?>