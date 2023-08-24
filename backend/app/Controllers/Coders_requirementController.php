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
        SET state=?, date=? WHERE id_coder =? AND id_requirement=?";
    $stm = $this->connection->get_connection()->prepare($query);
    $stm->execute([
        $data['state'], 
        $data['date'],
        $id_coder,
        $id_requirement,
    ]);
    
    
}



}


?>