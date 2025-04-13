<?php


class Hello{

    public function __construct()
    {
        echo 'Hello!';
    }

    public function test($a){
        echo "<pre>";
        print_r($a);
        echo "</pre>";
    }
}
