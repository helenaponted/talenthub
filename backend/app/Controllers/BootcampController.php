<?php
namespace App\Controllers;
use Database\PDO\DatabaseConnection;
use Exception;

class BootcampController {
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
        $query= "INSERT INTO bootcamp (name_bootcamp, start, end, remote) VALUES (?, ?, ?, ?)";
        $stm=$this->connection->get_connection()->prepare($query);
        $stm->execute([$data['name_bootcamp'],$data['start'],$data['end'],$data['remote']]);
    }

 
    public function index(){
        $query = "SELECT * FROM bootcamp";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function show($id){
        $query = "SELECT * FROM bootcamp WHERE id=:id";
        $stm= $this->connection -> get_connection()->prepare($query);
        $stm -> execute([":id" => $id]);
        $result= $stm ->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }
    
    public function edit($id, $data) {
        $query = "UPDATE bootcamp SET name_bootcamp=?,start=?,end=?,remote=? WHERE id=?";
        $stm = $this->connection->get_connection()->prepare($query);
        return $stm->execute([
            $data['name_bootcamp'],
            $data['start'],
            $data['end'],
            $data['remote'],
            $id
        ]);
        
    }

    public function delete($id) {
        $query = "DELETE FROM bootcamp WHERE id = :id";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->bindParam(':id', $id, \PDO::PARAM_INT);
        return $stm->execute($id);
    }
   
}





?>