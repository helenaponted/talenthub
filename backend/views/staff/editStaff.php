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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./editStaff.css">
    <title>Editar staff</title>
</head>
<body class="grid h-screen place-items-center fondo">
<div class="bg-white p-8 rounded-lg shadow-md w-96 justify-center">
    <h2 class="text-2xl font-semibold mb-4 text-secondary titulo">Editar staff</h2>
    <form action="editStaff.php" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="rol">Nombre</label>
            <input type="text" name="name_staff"  value="<?= $newNameStaff ?>" class="w-full border rounded-lg py-2 px-3 mb-2">
            <label for="surname1">Apellido 1</label>
            <input type="text" name="surname1" value="<?= $newSurname1 ?>"class="w-full border rounded-lg py-2 px-3 mb-2">
            <label for="surname2">Apellido 2</label>
            <input type="text" name="surname2" value="<?= $newSurname2 ?>"class="w-full border rounded-lg py-2 px-3 mb-2">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?= $newEmail ?>"class="w-full border rounded-lg py-2 px-3 mb-2">
            <label for="rol"></label>
            <input type="hidden" name="id_rol" value="<?= $newId_rol ?>">
            <label for="rol"></label>
            <input type="hidden" name="id_bootcamp" value="<?= $newId_bootcamp ?>">
            <input type="submit" name="submit" value="Actualizar" class="bg-secondary text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300 ease-in-out mt-2">
            
        </fieldset>
    </form>
    <a href="/talenthub/backend/views/staff/indexStaff.php" class="mt-2 subtitulo">Lista Staff</a>
</div>
</body>
</html>


