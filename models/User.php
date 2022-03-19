<?php


class User extends Model{


    public function __construct()
    {
        parent::__construct();
    }

    public function get(){
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        return $query->fetch();
    }

    public function getAll(){
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
