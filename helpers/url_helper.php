<?php


if(!function_exists('base_url')){
    function base_url(){
        $config = new config();
        if(!empty($config->item('base_url'))){
            return $config->item('base_url');
        }else{
            $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
            return $protocol.$_SERVER['SERVER_NAME'].'/';
        }
    }
}

if(!function_exists('asset')){
    function asset($file = ''){
        return base_url().'assets/'.$file;
    }
}
