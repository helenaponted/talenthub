<?php

namespace App\Controllers;

use Database\PDO\DatabaseConnection;
use Exception;

class RequirementController
{
    private $server;
    private $database;
    private $username;
    private $password;
    private $connection;

    public function __construct()
    {
        $this->server = "localhost";
        $this->database = "talenthub";
        $this->username = "root";
        $this->password = "";

        $this->connection = new DatabaseConnection($this->server, $this->database, $this->username, $this->password);
        $this->connection->connect();
    }
    public function store($data)
    {
        $query = "INSERT INTO requirement (name_requirement, type) VALUES (?, ?)";
        $stm = $this->connection->get_connection()->prepare($query);
        $result = $stm->execute([$data['name_requirement'], $data['type']]);
    }

    public function index()
    {
        $query = "SELECT * FROM requirement";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function show($id){
        $query = "SELECT * FROM requirement WHERE id=:id";
        $stm= $this->connection -> get_connection()->prepare($query);
        $stm -> execute([":id" => $id]);
        $result= $stm ->fetch(\PDO::FETCH_ASSOC);

        return $result;

        

    }

    public function update($id, $data){
        $query= "UPDATE requirement SET  name_requirement= ?, type=? WHERE id =?";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm -> execute([$data['name_requirement'], $data['type'], $id]);

    }

  

    public function delete($id){
        $query="DELETE FROM requirement WHERE id=?";
        $stm=$this->connection -> get_connection()->prepare($query);
        return $stm->execute($id);

    }
    }