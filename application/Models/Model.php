<?php
namespace Application\Models;

class Model{

    public $db;

    protected $config;

    public function __construct(){
        $this->config = include(__DIR__."/../../config/local-db.php");
        $pdo = new \PDO("mysql:host=".$this->config['host'].";dbname=".$this->config['db_name'], $this->config['db_user'], $this->config['db_pass']);
        $this->db = new \FluentPDO($pdo);
    }
}