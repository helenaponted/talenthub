<?php
use App\Controllers\RequirementController;
require_once __DIR__ . '/../../vendor/autoload.php';

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'name_requirement' => $_POST["requirement"],
        'type' => $_POST["type"],
    

    ];

    $requirement = new RequirementController;
    $requirement->store($data);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talenthub</title>
</head>
<body>
<body>
    <h1>Insertar requerimiento</h1>
    <form action="./addRequirement.php" method="POST">
        <fieldset>
            <legend>Creación de nuevos requerimientos para coders - Factoría F5</legend>
            <label for="requirement">Requerimiento</label>
            <input type="text" name="requirement" required>
            <label for="type">Tipo de requerimiento</label>
            <select name="type">
                <option value="DOCUMENTACION">DOCUMENTACIÓN</option>
                <option value="ACTIVIDAD">ACTIVIDAD</option>
            </select>
            <input type="submit" name="submit" value="SUBMIT">
        </fieldset>
    </form>
    <a href="./indexRequirement.php">
    <button>
        Ver requisitos
    </button>
    </a>
</body>