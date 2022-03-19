<?php

class Database extends PDO {
    public $config;

    public function __construct()
    {

        $this->config = new config();

        $host = $this->config->item('database.host');
        $user = $this->config->item('database.user');
        $password = $this->config->item('database.password');
        $dbname = $this->config->item('database.dbname');

        parent::__construct("mysql:host=".$host.";dbname=".$dbname,$user,$password);

        try
        {
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

}
