<?php
namespace App\Controllers;
use Database\PDO\DatabaseConnection;

class CodersController {
    private $server;
    private $database;
    private $username;
    private $password;
    private $connection;

    public function __construct() {
        $this -> server= "localhost";
        $this -> database= "talenthub";
        $this -> username= "root";
        $this -> password= "";

        $this->connection= new DatabaseConnection($this->server,$this->database,$this->username,$this->password);
        $this->connection->connect();

    }
    public function store($data){
        $query= "INSERT INTO coders (name_coder, surname1, surname2, email, phone, city, id_rol, id_bootcamp, id_activities) VALUES (?, ?, ?, ?, ?, ?, ? ,? ,?)";
        $stm=$this->connection->get_connection()->prepare($query);
        $results=$stm->execute([$data['name_coder'],$data['surname1'],$data['surname2'],$data['email'],$data['phone'],$data['city'],$data['id_rol'],$data['id_bootcamp'],$data['id_activities']]);
    }

}





?>