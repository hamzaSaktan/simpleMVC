<?php


class Welcome extends Controller{

    private $modelUser;
    public function __construct()
    {
        Session::init();
        parent::__construct();
        $this->modelUser = $this->model->load('User');
    }

    public function user(){
        $usar = $this->modelUser->get();
        return $this->view->template('index',$usar);
    }

    public function users(){
        $usars = $this->modelUser->getAll();
        return $this->view->load('index',['users' => $usars]);
    }
}
