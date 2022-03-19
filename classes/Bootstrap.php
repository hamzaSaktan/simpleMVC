<?php

class Bootstrap{

    public $config;

    public function __construct(){

        $this->config = new config();
        $path = dirname(__DIR__).DIRECTORY_SEPARATOR;
        if(isset($_GET["url"])){
            $uri = $_GET["url"];
            $uri_arr = explode('/',rtrim($uri,'/'));

            if(isset($uri_arr[0])){
                $controller = strip_tags($uri_arr[0]);
            }

            if(!file_exists($path.'controllers'.DIRECTORY_SEPARATOR.$controller.'.php')){
                $controller = $this->config->item('default_controller');
            }

            if(isset($uri_arr[1])){
                $method = strip_tags($uri_arr[1]);
            }

            if(count($uri_arr) > 2){
                $parrams = array_slice($uri_arr,2);
            }

        }else{
            $controller = $this->config->item('default_controller');
        }

        $controller = ucfirst($controller);

        require $path.'controllers'.DIRECTORY_SEPARATOR.$controller.'.php';

        $Controller = new $controller;

        if(isset($parrams)){
            if(method_exists($controller,$method)){
                $Controller->{$method}($parrams);
            }else{
                echo 'Method '.$method.' Not exisits !';
            }

        }else{
            if(isset($method)){
                if(method_exists($controller,$method)){
                    $Controller->{$method}();
                }else{
                    echo 'Method '.$method.' Not exisits !';
                }
            }
        }

    }

}

