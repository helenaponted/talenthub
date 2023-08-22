<?php
namespace App\Controllers;
use Database\PDO\DatabaseConnection;
use Exception;

class StaffController {
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
        $query= "INSERT INTO staff (name_staff,surname1,surname2,email,id_rol,id_bootcamp) VALUES (?, ?, ?, ?, ?, ?)";
        $stm=$this->connection->get_connection()->prepare($query);
        $results=$stm->execute([$data['name_staff'],$data['surname1'],$data['surname2'],$data['email'],$data['id_rol'],$data['id_bootcamp']]);
    }
   
    public function index() {
        $query = "SELECT * FROM staff";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
        
    }
    public function show($id){
        $query = "SELECT * FROM staff WHERE id=:id";
        $stm= $this->connection -> get_connection()->prepare($query);
        $stm -> execute([":id" => $id]);
        $result= $stm ->fetch(\PDO::FETCH_ASSOC);

        return $result;



    }

    public function edit($id, $data) {
        $query = "UPDATE staff SET name_staff=?,surname1=?,surname2=?,email=?,id_rol=?,id_bootcamp=? WHERE id=?";
        $stm = $this->connection->get_connection()->prepare($query);
        return $stm->execute([
            $data['name_staff'],
            $data['surname1'],
            $data['surname2'],
            $data['email'],
            $data['id_rol'],
            $data['id_bootcamp'],
            $id
        ]);
        
    }

    public function delete($id) {
        $query = "DELETE FROM staff WHERE id=?";
        $stm = $this->connection->get_connection()->prepare($query);
        return $stm->execute($id);
        
    }

}