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
        $query = "SELECT c.id, c.name_coder, r.id_requirement, r.name_requirement, cr.date
        FROM requirement AS r
        LEFT JOIN coders_requirement AS cr ON r.id_requirement = cr.id_requirement 
        LEFT JOIN coders AS c ON c.id = cr.id_coder 
        UNION ALL
        SELECT c.id, c.name_coder, NULL, NULL, NULL
        FROM coders AS c
        WHERE c.id NOT IN (
          SELECT cr.id_coder
          FROM coders_requirement AS cr
        ) AND c.id IS NOT NULL;
        ";
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    

    public function show($id_coder, $id_requirement)
{
    $query = "SELECT c.id, c.name_coder, c.surname1, c.surname2,
                    r.id_requirement, r.name_requirement,
                    cr.id_coder, cr.id_requirement,  cr.date
              FROM coders AS c
              LEFT JOIN coders_requirement AS cr ON c.id = cr.id_coder
              LEFT JOIN requirement AS r ON cr.id_requirement = r.id_requirement
              WHERE c.id = :id_coder OR r.id_requirement = :id_requirement";
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


//     public function delete($id_coders_requirement)
//     {
//         $query = "DELETE FROM coders_requirement
//         WHERE id = :id_coders_requirement;
//         ";
//         $stm = $this->connection->get_connection()->prepare($query);
//         $stm->bindParam(":id_coders_requirement", $id_coders_requirement);
//         $stm->execute();
//     }

//     public function update($id_coders_requirement, $name_coder, $id_requirement)
//     {
//         $query = "UPDATE coders_requirement
//         SET name_coder = :name_coder,
//         id_requirement = :id_requirement
//         WHERE id = :id_coders_requirement;
//         ";
//         $stm = $this->connection->get_connection()->prepare($query);
//         $stm->bindParam(":id_coders_requirement", $id_coders_requirement);
//         $stm->bindParam(":name_coder", $name_coder);
//         $stm->bindParam(":id_requirement", $id_requirement);
//         $stm->execute();
//     }

//     public function searchCoder($id_coder)
//     {
//         $query = "SELECT c.id, c.name_coder, r.id_requirement, r.name_requirement, cr.date
//         FROM requirement AS r
//         LEFT JOIN coders_requirement AS cr ON r.id_requirement = cr.id_requirement 
//         LEFT JOIN coders AS c ON c.id = cr.id_coder 
//         WHERE c.id = :id_coder;
//         ";
//         $stm = $this->connection->get_connection()->prepare($query);
//         $stm->bindParam(":id_coder", $id_coder);
//         $stm->execute();
//         return $stm->fetchAll(\PDO::FETCH_ASSOC);
//     }

//     public function create($id_coder, $id_requirement)
//     {
//         $query = "INSERT INTO coders_requirement (id_coder, id_requirement)
//         VALUES (:id_coder, :id_requirement);
//         ";
//         $stm = $this->connection->get_connection()->prepare($query);
//         $stm->bindParam(":id_coder", $id_coder);
//         $stm->bindParam(":id_requirement", $id_requirement);
//         $stm->execute();
//     }
// }