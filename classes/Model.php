<?php

class Model{

    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function load($file){
        $path = dirname(__DIR__).DIRECTORY_SEPARATOR;
        if(file_exists($path.'models'.DIRECTORY_SEPARATOR.$file.'.php')){
            require $path.'models'.DIRECTORY_SEPARATOR.$file.'.php';
            return new $file;
        }
    }
}
