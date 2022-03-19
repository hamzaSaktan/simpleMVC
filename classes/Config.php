<?php

class config{
    public $config;

    public function __construct($file = 'conf')
    {
        $path = dirname(__DIR__).DIRECTORY_SEPARATOR;
        if(!empty($file) && file_exists($path.'conf'.DIRECTORY_SEPARATOR.$file.'.php')){
            $file = $path.'conf'.DIRECTORY_SEPARATOR.$file.'.php';
        }else{
            $file = $path.'conf'.DIRECTORY_SEPARATOR.'conf.php';
        }
        include $file;
        $this->config = $conf;
    }

    public function item($item){
        if(count(explode('.',rtrim($item,'.'))) > 1){
            $items = explode('.',rtrim($item,'.'));
            if(count($items) == 2){
                $item1 = $items[0];
                $item2 = $items[1];
                return isset($this->config[$item1][$item2]) ? $this->config[$item1][$item2] : '';
            }elseif(count($items) == 3){
                $item1 = $items[0];
                $item2 = $items[1];
                $item3 = $items[2];
                return isset($this->config[$item1][$item2][$item3]) ? $this->config[$item1][$item2][$item3] : '';
            }elseif(count($items) == 4){
                $item1 = $items[0];
                $item2 = $items[1];
                $item3 = $items[2];
                $item4 = $items[3];
                return isset($this->config[$item1][$item2][$item3][$item4]) ?
                    $this->config[$item1][$item2][$item3][$item4] : '';
            }
        }else{
            if(isset($this->config[$item])){
                return isset($this->config[$item]) ? $this->config[$item] : '';
            }
        }
    }
}
