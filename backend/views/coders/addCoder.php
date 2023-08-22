<?php
use App\Controllers\CodersController;
require_once __DIR__ . '/../../vendor/autoload.php';

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'name_coder' => $_POST["name"],
        'surname1' => $_POST["surname1"],
        'surname2' => $_POST["surname2"],
        'email' => $_POST["email"],
        'phone' => $_POST["phone"],
        'city' => $_POST["city"],
        'id_rol' => $_POST["id_rol"],
        'id_bootcamp' => $_POST["id_bootcamp"]

    ];

    $coder = new CodersController;
    $coder->store($data);
    header("Location: getAllCoders.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet"> -->
    <title>Talenthub</title>
</head>
<body>
<body>
    <h1>Coder</h1>
    <form action="./addCoder.php" method="POST">
        <fieldset>
            <legend>Coders</legend>
            <label for="name">Name</label>
            <input type="text" name="name" required>
            <label for="surname1">Surname</label>
            <input type="text" name="surname1" required>
            <label for="surname2">Surname</label>
            <input type="text" name="surname2" required>
            <label for="email">Email</label>
            <input type="text" name="email" required>
            <label for="phone">Phone</label>
            <input type="text" name="phone" required>
            <label for="city">City</label>
            <input type="text" name="city" required>
            <input type="hidden" name="id_rol" value=3>
            <input type="hidden" name="id_bootcamp" value=1>
            <input type="submit" name="submit" value="SUBMIT">
        </fieldset>
    </form>
</body>