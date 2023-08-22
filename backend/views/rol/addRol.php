<?php
use App\Controllers\RolController;
require_once __DIR__ . '/../../vendor/autoload.php';

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'name_rol' => $_POST["rol"],
        'type' => $_POST["type"],
    

    ];

    $rol = new RolController;
    $rol->store($data);
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
    <h1>Insertar rol</h1>
    <form action="./addRol.php" method="POST">
        <fieldset>
            <legend>Creación de nuevos roles en TalentHub de Factoría F5</legend>
            <label for="rol">Rol</label>
            <input type="text" name="rol" required>
            <label for="type">Tipo de rol</label>
            <select name="type">
                <option value="STAFF">STAFF</option>
                <option value="CODER">CODER</option>
            </select>
            <input type="submit" name="submit" value="SUBMIT">
        </fieldset>
    </form>
    <a href="./indexRol.php">
    <button>
        Ver roles
    </button>
    </a>
</body>