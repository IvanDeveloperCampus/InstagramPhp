<?php

namespace Skylab170\InstagramPhp\models;


use Skylab170\InstagramPhp\lib\Model;
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

    protected function fetchLikes($post_id){
        $items=[];
        try{
            $query=$this->db->prepare("SELECT * FROM likes WHERE post_id=:post_id");
            $query->execute(['post_id'=>$post_id]);

            while($p=$query->fetch(PDO::FETCH_ASSOC)){
                $item =new Like($p['post_id']);
                $item->setId($p['id']);
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){

        }
    }


    
        
    
}


?>