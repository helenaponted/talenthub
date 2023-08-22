<?php
use App\Controllers\RequirementController;
require_once __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_requirement"];
    $newNameRequirement = $_POST['name_requirement'];
    $newTypeRequirement = $_POST['type'];

    $data = [
        'name_requirement' => $newNameRequirement,
        'type' => $newTypeRequirement,
    ];

    $update = new RequirementController;
    $update->update($id, $data);

    header("Location: indexRequirement.php");
    exit();
} else {
    $id = $_GET["id"];
    $requirementController = new RequirementController();
    $requirementData = $requirementController->show($id);
    $newNameRequirement = $requirementData['name_requirement'];
    $newTypeRequirement = $requirementData['type'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar requisito</title>
</head>
<body>
    <h1>Editar requisito</h1>
    <form action="./editRequirement.php" method="POST">
        <fieldset>
            <legend>Edición de requisitos en TalentHub - Factoría F5</legend>
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="requirement">Requisito</label>
            <input type="text" name="name_requirement" required value="<?= $newNameRequirement ?>">
            <label for="type">Tipo de requisito</label>
            <select name="type">
                <option value="DOCUMENTACION">DOCUMENTACIÓN</option>
                <option value="ACTIVIDAD">ACTIVIDAD</option>
            </select>
            <input type="submit" name="submit" value="ACTUALIZAR REQUISITO">
        </fieldset>
    </form>
    <a href="./indexRequirement.php">
        <button>
            Ver requisitos
        </button>
    </a>
</body>
</html>
