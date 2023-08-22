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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <title>Editar bootcamp</title>
    <link rel="stylesheet" href="./bootcamp.css">
</head>
<body class="grid h-screen place-items-center fondo">
<div class="bg-white p-8 rounded-lg shadow-md w-96 justify-center">
    <h1 class="text-2xl font-semibold mb-4 text-secondary text-center">Editar bootcamp</h1>
    <form action="editBootcamp.php" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?= $id ?>">
            <label class="block mb-2" for="name">Nombre</label>
            <input type="text" class="w-full border rounded-lg py-2 px-3 mb-2" name="name_bootcamp"  value="<?= $newNameBootcamp ?>">
            <label class="block mb-2" for="start">Empieza</label>
            <input type="date" class="w-full border rounded-lg py-2 px-3 mb-2" name="start" value="<?= $newStart ?>">
            <label class="block mb-2" for="end">Acaba</label>
            <input type="date" class="w-full border rounded-lg py-2 px-3 mb-2" name="end" value="<?= $newEnd ?>">
            <label class="block mb-2" for="remote">¿Es remoto?</label>
            <input type="text" class="w-full border rounded-lg py-2 px-3 mb-2" name="remote" value="<?= $newRemote ?>">
            <div class="flex justify-center">
             <input type="submit" class="bg-secondary text-white py-2 px-4 mt-2 rounded-lg hover:bg-red-600 transition duration-300 ease-in-out" name="submit" value="Actualizar">
            </div>
        </fieldset>
    </form>
    <a class="subtitulo mt-2" href="./indexBootcamp.php"> 
        Volver a la lista
    </a>
</div>
    
</body>
</html>