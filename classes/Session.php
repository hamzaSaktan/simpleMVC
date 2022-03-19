<?php

class Session{

    static function set($key = '',$value = ''){
        if(empty($key) || empty($value)){
            return;
        }
        $key = strip_tags($key);
        $value = strip_tags($value);
        return $_SESSION[$key] = $value;
    }

    static function unset($key){
        unset($_SESSION[$key]);
    }

    static function get($key=''){
        $key = strip_tags($key);
        if(empty($key)){
            return $_SESSION;
        }else{
            return $_SESSION[$key];
        }
        return '';
    }

    static function init(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    static function delete(){
        $_SESSION = [];
        session_destroy();
    }
}

class Flash{

    static function init(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    static function get($key = ''){
        $key = strip_tags($key);
        if(isset($_SESSION[$key])){
            $message = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $message;
        }
        return '';
    }
}
