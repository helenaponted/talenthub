<?php

namespace App\Controllers;

use Database\PDO\DatabaseConnection;
use Exception;

class Coders_requirementController
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

    public function index()
    {
        $query = "SELECT  c.id, c.name_coder, r.id, r.name_requirement
        FROM coders AS c
        JOIN coders_requirement AS cr ON c.id = cr.id_coder
        JOIN requirement AS r ON cr.id_requirement = r.id";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
        
    }
    public function show($id_coder, $id_requirement)
    {
        $query = "SELECT c.id, c.name_coder, c.surname1, c.surname2, r.id, r.name_requirement, cr.date
            FROM coders c
            LEFT JOIN coders_requirement cr ON c.id = cr.id_coder
            JOIN requirement r ON cr.id_requirement = r.id
            WHERE c.id = :id_coder AND r.id = :id_requirement";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->execute([":id_coder" => $id_coder, ":id_requirement" => $id_requirement]);
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function update($id_coder, $id_requirement, $data)
    {
        $query = "UPDATE coders_requirement
        SET date=? WHERE id_coder =? AND id_requirement=?";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->execute([$data['date'], $id_coder, $id_requirement]);
    }
    public function delete($id_coder, $id_requirement)
    {
        $query = "DELETE FROM coders_requirement
        WHERE id_coder=? AND id_requirement=?";
        $stm = $this->connection->get_connection()->prepare($query);
        return $stm->execute([$id_coder, $id_requirement]);
    }
    public function searchCoders($id_requirement)
    {
        $query = "SELECT id_coder FROM requirement_log WHERE id_requirement=:id_requirement";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->execute([":id_requirement" => $id_requirement]);
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    
    }
}