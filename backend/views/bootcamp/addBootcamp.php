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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <title>Talenthub</title>
    <link rel="stylesheet" href="./bootcamp.css">
</head>

<body class="grid h-screen place-items-center fondo">
    <div class="bg-white p-8 rounded-lg shadow-md w-96 justify-center">
    <h1 class="text-2xl font-semibold mb-4 text-secondary text-center">Añadir Bootcamp</h1>
    <form action="./addBootcamp.php" method="POST">
        <fieldset>
            <label class="block mb-2" for="name">Nombre</label>
            <input type="text" class="w-full border rounded-lg py-2 px-3 mb-2" name="name_bootcamp" required >
            <label class="block mb-2" for="start">Empieza</label>
            <input type="date" class="w-full border rounded-lg py-2 px-3 mb-2" name="start" required>
            <label class="block mb-2" for="end">Acaba</label>
            <input type="date" class="w-full border rounded-lg py-2 px-3 mb-2" name="end" required>
            <label class="block mb-2" for="remote">¿Es remoto?</label>
            <input type="text" class="w-full border rounded-lg py-2 px-3 mb-2" name="remote" value=0>
            <div class="flex justify-center">
                    <button type="submit" name="submit" class="bg-secondary text-white py-2 px-4 mt-2 rounded-lg hover:bg-red-600 transition duration-300 ease-in-out">AÑADIR</button>
                </div>
        </fieldset>
    </form>
    <a class="subtitulo mt-2" href="./indexBootcamp.php">

        Volver a la lista
  
    </a>
    </div>
</body>