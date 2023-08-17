

 <?php
use App\Controllers\RolController;
require_once __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $newNameRol = $_POST['name_rol'];
    $newTypeRol = $_POST['type'];

    $data = [
        'name_rol' => $newNameRol,
        'type' => $newTypeRol,
    ];

    $update = new RolController;
    $update->update($id, $data);

    header("Location: indexRol.php");
    exit();
} else {
    $id = $_GET["id"];
    $rolController = new RolController();
    $rolData = $rolController->show($id);
    $newNameRol = $rolData['name_rol'];
    $newTypeRol = $rolData['type'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar rol</title>
</head>
<body>
    <h1>Editar rol</h1>
    <form action="./editRol.php" method="POST">
        <fieldset>
            <legend>Edición de roles en TalentHub de Factoría F5</legend>
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="rol">Rol</label>
            <input type="text" name="name_rol" required value="<?= $newNameRol ?>">
            <label for="type">Tipo de rol</label>
            <input type="text" name="type" value="<?= $newTypeRol ?>">
            <input type="submit" name="submit" value="ACTUALIZAR ROL">
        </fieldset>
    </form>
    <a href="./indexRol.php">
        <button>
            Ver roles
        </button>
    </a>
</body>
</html>
