<?php
use App\Controllers\StaffController;
require "./../../vendor/autoload.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $newNameStaff = $_POST['name_staff'];
    $newSurname1 = $_POST['surname1'];
    $newSurname2 = $_POST['surname2'];
    $newEmail = $_POST["email"];
    $newId_rol = $_POST["id_rol"];
    $newId_bootcamp = $_POST["id_bootcamp"];

    $data = [
        'name_staff' => $newNameStaff,
        'surname1' => $newSurname1,
        'surname2' => $newSurname2,
        'email' => $newEmail,
        'id_rol' => $newId_rol,
        'id_bootcamp' => $newId_bootcamp
    ];

    $edit = new StaffController;
    $edit->edit($id, $data);

    header("Location: indexStaff.php");
    exit();
} else {
    $id = $_GET["id"];
    $staffController = new StaffController();
    $staffData = $staffController->show($id);
    $newNameStaff = $staffData['name_staff'];
    $newSurname1 = $staffData['surname1'];
    $newSurname2 = $staffData['surname2'];
    $newEmail = $staffData['email'];
    $newId_rol = $staffData['id_rol'];
    $newId_bootcamp = $staffData['id_bootcamp'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar staff</title>
</head>
<body>
    <h1>Editar staff</h1>
    <form action="editStaff.php" method="POST">
        <fieldset>
            <legend>Edición de Staff</legend>
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="rol">Nombre</label>
            <input type="text" name="name_staff"  value="<?= $newNameStaff ?>">
            <label for="surname1">Apellido 1</label>
            <input type="text" name="surname1" value="<?= $newSurname1 ?>">
            <label for="surname2">Apellido 2</label>
            <input type="text" name="surname2" value="<?= $newSurname2 ?>">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?= $newEmail ?>">
            <label for="rol"></label>
            <input type="hidden" name="id_rol" value="<?= $newId_rol ?>">
            <label for="rol"></label>
            <input type="hidden" name="id_bootcamp" value="<?= $newId_bootcamp ?>">
            <input type="submit" name="submit" value="Actualizar">
            
        </fieldset>
    </form>
    <a href="./indexStaff.php">
        <button>
            Lista Staff
        </button>
    </a>
</body>
</html>


