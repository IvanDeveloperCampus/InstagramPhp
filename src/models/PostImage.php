<?php

namespace Skylab170\InstagramPhp\models;

use Skylab170\InstagramPhp\models\Post;

class POstImage extends Post{

    public function __construct(private string $title, private string $image){
        parent::__construct($title);
    }

    public function getImage(){
        return $this->image;
    }

    

}

?>