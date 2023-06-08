<?php


namespace Skylab170\InstagramPhp\models;


use Skylab170\InstagramPhp\lib\Model;
use Skylab170\InstagramPhp\lib\Database;
use PDOException;
use PDO;

class Follower extends model{

    private int $id;

    public function __construct(public int $follower_id, public int $followed_id){
        parent::__construct();
    }

    public function save(){
        
       try {
        $query=$this->prepare('INSERT INTO followers (follower_id, followed_id) VALUES (:follower_id, :followed_id)');
        $query->execute([
            'follower_id'=>$this->follower_id,
            'followed_id'=>$this->followed_id
        ]);
        return true;
    } catch (PDOException $th) {
        return false;
       }
    }

    public function existFollow(){
        try {
            $query=$this->prepare('SELECT COUNT(*) FROM followers WHERE follower_id=:follower_id AND followed_id=:followed_id');
            $query->execute([
                'follower_id'=>$this->follower_id,
                'followed_id'=>$this->followed_id
            ]);

            if ($query->fetchColumn()<1) {
                $this->save();
            }else{
                $deleteQuery = $this->prepare('DELETE FROM followers WHERE follower_id=:follower_id AND followed_id=:followed_id');
                $deleteQuery->execute([
                    'follower_id'=>$this->follower_id,
                'followed_id'=>$this->followed_id
                ]);
            }
            
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public static function getFollowed($user_id){
        try {
            $db=new Database();
            $query=$db->connect()->prepare('SELECT username FROM followers INNER JOIN users ON followers.follower_id=users.user_id WHERE followers.followed_id=:user_id');
           $query->execute(['user_id'=>$user_id]);
           $resultados=$query->fetchAll(PDO::FETCH_COLUMN);
           return $resultados;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    public static function getFollowers($user_id){
        try {
            $db=new Database();
            $query=$db->connect()->prepare('SELECT username FROM followers INNER JOIN users ON followers.follower_id=users.user_id WHERE followers.follower_id=:user_id');
           $query->execute(['user_id'=>$user_id]);
           $resultados=$query->fetchAll(PDO::FETCH_COLUMN);
           return $resultados;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function setId($value)
    {
        $this->id = $value;
    }


    public function getId()
    {
        return $this->id;
    }


}

?>