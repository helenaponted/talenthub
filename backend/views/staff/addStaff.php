<?php
use App\Controllers\StaffController;
require_once __DIR__ . '/../../vendor/autoload.php';


 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'name_staff' => $_POST["name"],
        'surname1' => $_POST["surname1"],
        'surname2' => $_POST["surname2"],
        'email' => $_POST["email"],
        'id_rol' => $_POST["id_rol"],
        'id_bootcamp' => $_POST["id_bootcamp"],
        
    ];

    $staff = new StaffController;
    $staff->store($data);
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
    <h2>Staff</h2>
    <form action="./addStaff.php" method="POST">
        <fieldset>
            <legend>Staff</legend>
            <label for="name">Name</label>
            <input type="text" name="name" required>
            <label for="surname1">Surname</label>
            <input type="text" name="surname1" required>
            <label for="surname2">Surname</label>
            <input type="text" name="surname2" required>
            <label for="email">Email</label>
            <input type="text" name="email" required>
            <input type="hidden" name="id_rol" value=2>
            <input type="hidden" name="id_bootcamp" value=1>
            <input type="submit" name="submit" value="SUBMIT">
        </fieldset>
    </form>
    <a href="/talenthub/backend/views/staff/indexStaff.php" >Volver a la lista</a>
</body>

<?php


   




    




?>