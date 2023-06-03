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