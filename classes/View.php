<?php

class View{

    public function template($file='', $data=[]){
        $SEP = DIRECTORY_SEPARATOR;
        $path = dirname(__DIR__).$SEP;
        $data = [
            'title' => 'Ma page',
        ];
        extract($data);
        require $path.'views'.$SEP.'template'.$SEP.'head.php';
        require $path.'views'.$SEP.'template'.$SEP.'header.php';
        require $path.'views'.$SEP.$file.'.php';
        require $path.'views'.$SEP.'template'.$SEP.'footer.php';
    }

    public function load($file='',$data=[]){
        $SEP = DIRECTORY_SEPARATOR;
        $path = dirname(__DIR__).$SEP;
        if(file_exists($path.'views'.$SEP.$file.'.php')){
            extract($data);
            require $path.'views'.$SEP.$file.'.php';
        }
    }

}
