<?php

namespace Skylab170\InstagramPhp\lib;

use Skylab170\InstagramPhp\lib\View;


class Controller{
    private View $view;

    public function __construct(){
        $this->view=new View();
    }


    function render(string $name, array $data=[]){
        $this->view->render($name, $data);
    }

    function post($param){
        if(!isset($_POST[$param])){
            error_log("ExistPOST: No existe el parametro $param" );
            return NULL;
        }
        return $_POST[$param];
    }


    protected function get(string $param){
        if (!isset($_GET[$param])) {
            return null;
        }
        return $_GET[$param];
    }

    protected function file(string $param){
        if (!isset($_FILES[$param])) {
            return null;
        }
        return $_FILES[$param];
    }



}


?>