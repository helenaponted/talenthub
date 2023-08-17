<?php

namespace App\Controllers;

use Database\PDO\DatabaseConnection;
use Exception;

class RolController
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
        $query = "INSERT INTO rol (name_rol, type) VALUES (?, ?)";
        $stm = $this->connection->get_connection()->prepare($query);
        $result = $stm->execute([$data['name_rol'], $data['type']]);
    }

    public function index()
    {
        $query = "SELECT * FROM rol";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function show($id){
        $query = "SELECT * FROM rol WHERE id=:id";
        $stm= $this->connection -> get_connection()->prepare($query);
        $stm -> execute([":id" => $id]);
        $result= $stm ->fetch(\PDO::FETCH_ASSOC);

        return $result;

        

    }

    public function update($id, $data){
        $query= "UPDATE rol SET  name_rol= ?, type=? WHERE id =?";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm -> execute([$data['name_rol'], $data['type'], $id]);

    }

  

    public function delete($id){
        $query="DELETE FROM rol WHERE id=?";
        $stm=$this->connection -> get_connection()->prepare($query);
        return $stm->execute($id);

    }
    }