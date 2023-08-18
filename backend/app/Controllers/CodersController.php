<?php
namespace App\Controllers;
use Database\PDO\DatabaseConnection;
use Exception;


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
        $query= "INSERT INTO coders (name_coder, surname1, surname2, email, phone, city, id_rol, id_bootcamp) VALUES (?, ?, ?, ?, ?, ?, ? ,?)";
        $stm=$this->connection->get_connection()->prepare($query);
        $results=$stm->execute([$data['name_coder'],$data['surname1'],$data['surname2'],$data['email'],$data['phone'],$data['city'],$data['id_rol'],$data['id_bootcamp']]);
    }

    public function getAll()
    {
        $query = "SELECT * FROM coders";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function show($id){
        $query = "SELECT * FROM coders WHERE id=:id";
        $stm= $this->connection -> get_connection()->prepare($query);
        $stm -> execute([":id" => $id]);
        $result= $stm ->fetch(\PDO::FETCH_ASSOC);

        return $result;

        

    }

    public function update($id, $data){
        $query= "UPDATE coders SET  name_coder= ?, surname1=? WHERE id =?";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm -> execute([$data['name_coder'], $data['surname1'], $id]);

    }

  

    public function delete($id){
        $query="DELETE FROM coders WHERE id=?";
        $stm=$this->connection -> get_connection()->prepare($query);
        return $stm->execute($id);

    }
    }