<?php
use App\Controllers\BootcampController;
require_once __DIR__ . './../../vendor/autoload.php';

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'name_bootcamp' => $_POST["name_bootcamp"],
        'start' => $_POST["start"],
        'end' => $_POST["end"],
        'remote' => $_POST["remote"],
    ];

    $bootcamp = new BootcampController;
    $bootcamp->store($data);
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
    <h1>Añadir Bootcamp</h1>
    <form action="./addBootcamp.php" method="POST">
        <fieldset>
            <legend>Bootcamp</legend>
            <label for="name">Bootcamp Name</label>
            <input type="text" name="name_bootcamp" required>
            <label for="start">Start</label>
            <input type="date" name="start" required>
            <label for="end">End</label>
            <input type="date" name="end" required>
            <label for="remote">Remote</label>
            <input type="text" name="remote" value=0>
            <input type="submit" name="submit" value="SUBMIT">
        </fieldset>
    </form>
    <a href="./indexBootcamp.php">
    <button>
        Ver Bootcamps
    </button>
    </a>
</body>