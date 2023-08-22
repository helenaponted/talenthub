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
        $query = "SELECT c.id, c.name_coder, r.id_requirement, r.name_requirement, cr.state, cr.date
        FROM requirement AS r
        LEFT JOIN coders_requirement AS cr ON r.id_requirement = cr.id_requirement 
        LEFT JOIN coders AS c ON c.id = cr.id_coder 
        ";
    
        $stm = $this->connection->get_connection()->prepare($query);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    

    public function show($id_coder, $id_requirement)
{
    $query = "SELECT c.id, c.name_coder, c.surname1, c.surname2,
                    r.id_requirement, r.name_requirement,
                    cr.id_coder, cr.id_requirement,  cr.date, cr.state
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
        SET date=:date, state=:state WHERE id_coder =:id_coder AND id_requirement=:id_requirement";
    $stm = $this->connection->get_connection()->prepare($query);
    $stm->execute([
        ':date' => $data['date'],
        ':state' => $data['state'],
        ':id_coder' => $id_coder,
        ':id_requirement' => $id_requirement,
    ]);
}
public function edit($id_coder)
{
    $id_coder = $_GET['id'];
    $query = "SELECT c.id, c.name_coder, c.surname1, c.surname2,
        r.id_requirement, r.name_requirement, cr.state, cr.date
    FROM coders c
    JOIN coders_requirement cr ON cr.id_coder = c.id
    JOIN requirement r ON cr.id_requirement = r.id_requirement
    WHERE c.id = :id_coder";

$stm = $this->connection->get_connection()->prepare($query);
$stm->execute([':id_coder'=> $id_coder]);
$result = $stm->fetch();


    $requirement = $this->get_requirement();

    return [
        'coder' => $result,
        'requirement' => $requirement,
    ];
}

public function get_requirement()
{
    $query = "SELECT r.id_requirement, r.name_requirement, cr.state, cr.date
    FROM requirement AS r
    LEFT JOIN coders_requirement AS cr ON cr.id_requirement = r.id_requirement
    ";

    $stm = $this->connection->get_connection()->prepare($query);
    $stm->execute();
    $requirement = $stm->fetchAll();

    return $requirement;
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
?>