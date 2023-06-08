<?php

namespace Skylab170\InstagramPhp\models;

use Skylab170\InstagramPhp\lib\Model;
use PDO;
use PDOException;

class Comment extends Model{


    private int $id;
    public string $usernameComment;
    

    public function __construct(private int $post_id, private int $user_id, public string  $comment)
    {
        parent::__construct();
    }

    public function save()
    {

        try {

            $query = $this->prepare('INSERT INTO comments (comment, post_id, user_id) VALUES(:comment, :post_id, :user_id)');
            $query->execute([
                'post_id' => $this->post_id,
                'user_id' => $this->user_id,
                'comment'=>$this->comment
            ]);

            return true;
        } catch (PDOException $th) {

            echo $th->getMessage();
        }
    }

    public function setUsernameComment($value){
        $this->usernameComment=$value;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function setUserId($value)
    {
        $this->user_id = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPostId()
    {
        return $this->post_id;
    }

}