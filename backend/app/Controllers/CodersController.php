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


    public function store($data) {
        $query = "INSERT INTO coders (name_coder, surname1, surname2, email, phone, city, id_rol, id_bootcamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stm = $this->connection->get_connection()->prepare($query);
        $results = $stm->execute([$data['name_coder'], $data['surname1'], $data['surname2'], $data['email'], $data['phone'], $data['city'], $data['id_rol'], $data['id_bootcamp']]);
    
        if ($results) {
            $coderId = $this->connection->get_connection()->lastInsertId();
    
            $query = "INSERT INTO coders_requirement (id_coder, id_requirement, state, date)
                    SELECT ?, id_requirement, 0, 0
                    FROM requirement";
            $stm = $this->connection->get_connection()->prepare($query);
            $stm->execute([$coderId]);
        } 
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

    // PDO update con array, sin especificar todos los parametros posicionalmente
    // https://phpdelusions.net/pdo_examples/update

    public function update($data, $id){
        $query= "UPDATE coders SET name_coder =?, surname1=?, surname2=?, email=?, phone=?, city=?, id_bootcamp=?, id_rol=? WHERE id =?";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->execute([$data['name_coder'],$data['surname1'],$data['surname2'],$data['email'],$data['phone'],$data['city'],$data['id_bootcamp'],$data['id_rol'], $id]);

    }

    public function delete($id){
        $query="DELETE FROM coders WHERE id=?";
        $stm=$this->connection -> get_connection()->prepare($query);
        return $stm->execute($id);

    }

    public function getFemCodersNorte()
{
    $query = "SELECT * FROM coders WHERE id_bootcamp = 2 and id_rol = 4"; 
    $stm = $this->connection->get_connection()->prepare($query);
    $stm->execute();
    return $stm->fetchAll(\PDO::FETCH_ASSOC);
}
    }

    ?>