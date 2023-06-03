<?php


namespace Skylab170\InstagramPhp\models;

use Skylab170\InstagramPhp\lib\Model;


class Like extends Model{
    
    private int $id;

    public function __construct(private int $post_id){
        parent::__construct();
    }

    public function save(){

    }

    public function setId($value){
        $this->id=$value;
    }

    public function getId(){
        return $this->id;
    }

    public function getPostId(){
        return $this->post_id;
    }

}

?>