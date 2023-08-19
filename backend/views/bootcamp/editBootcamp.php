<?php

use App\Controllers\BootcampController;
require "./../../vendor/autoload.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $newNameBootcamp = $_POST['name_bootcamp'];
    $newStart = $_POST['start'];
    $newEnd = $_POST['end'];
    $newRemote = $_POST["remote"];
    $data = [
        'name_bootcamp' =>  $newNameBootcamp,
        'start' =>  $newStart,
        'end' => $newEnd,
        'remote' => $newRemote,
        
    ];
    $edit = new BootcampController;
    $edit->edit($id, $data);
    header("Location: indexBootcamp.php");
    exit();
} else {
    $id = $_GET["id"];
    $bootcampController = new BootcampController();
    $bootcampData = $bootcampController->show($id);
    $newNameBootcamp = $bootcampData['name_bootcamp'];
    $start = $startData['start'];
    $end = $endData['end'];
    $remote = $remoteData['remote'];
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar bootcamp</title>
</head>
<body>
    <h1>Editar bootcamp</h1>
    <form action="editBootcamp.php" method="POST">
        <fieldset>
            <legend>Edición de Bootcamp</legend>
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="name">Nombre del Bootcamp</label>
            <input type="text" name="name_bootcamp"  value="<?= $newNameBootcamp ?>">
            <label for="start">Start</label>
            <input type="date" name="start" value="<?= $newStart ?>">
            <label for="end">End</label>
            <input type="date" name="end" value="<?= $newEnd ?>">
            <label for="remote">Remote</label>
            <input type="text" name="remote" value="<?= $newRemote ?>">
            
            <input type="submit" name="submit" value="Actualizar">
        </fieldset>
    </form>
    
</body>
</html>