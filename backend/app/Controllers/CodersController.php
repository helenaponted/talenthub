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
        $results=$stm->execute([$data['name_coder'],$data['surname1'],$data['surname2'],$data['email'],$data['phone'],$data['city'],$data['id_rol'],$data['id_bootcamp'],$data['id_activities']]);
    }

    // PDO update con array, sin especificar todos los parametros posicionalmente
    // https://phpdelusions.net/pdo_examples/update

    public function update($data){
        $query= "UPDATE coders SET name_coder =:name_coder, surname1=:surname1, surname2=:surname2, email=:email, phone=:phone, city=:city WHERE id =:id";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm -> execute($data);

    }

  

    public function delete($id){
        $query="DELETE FROM coders WHERE id=?";
        $stm=$this->connection -> get_connection()->prepare($query);
        return $stm->execute($id);

    }
    }