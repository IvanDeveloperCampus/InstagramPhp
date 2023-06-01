<?php

namespace Skylab170\InstagramPhp\lib;

class View{

    public $data;
    //nos va a permite una nueva vista
    function render(string $name, array $data=[]){
        $this->data=$data;
        require 'src/views/' . $name  . '.php';
    }

}



?>