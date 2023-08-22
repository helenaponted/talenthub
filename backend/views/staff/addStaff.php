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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./addStaff.css">
    <title>Talenthub</title>
</head>

<body class="grid h-screen place-items-center fondo">

<div class="bg-white p-8 rounded-lg shadow-md w-96 justify-center">
    <h2 class="text-2xl font-semibold mb-4 text-secondary titulo">Nuestro Staff</h2>
    <form action="./addStaff.php" method="POST">
        <fieldset>
            
            <label class="block mb-2" for="name">Nombre</label>
            <input type="text" name="name" required class="w-full border rounded-lg py-2 px-3 mb-2">
            <label class="block mb-2" for="surname1">Apellido 1</label>
            <input type="text" name="surname1" required class="w-full border rounded-lg py-2 px-3 mb-2">
            <label class="block mb-2" for="surname2">Apellido 2</label>
            <input type="text" name="surname2" required class="w-full border rounded-lg py-2 px-3 mb-2">
            <label class="block mb-2" for="email">Email</label>
            <input type="text" name="email" required class="w-full border rounded-lg py-2 px-3 mb-2">
            <input type="hidden" name="id_rol" value=2>
            <input type="hidden" name="id_bootcamp" value=1>
            <div class="flex justify-center">
                    <button type="submit" name="submit" class="bg-secondary text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300 ease-in-out mt-2">SUBMIT</button>
                </div>
        </fieldset>
    </form>
    <a href="/talenthub/backend/views/staff/indexStaff.php" class="mt-2 subtitulo" >Volver a la lista</a>
</div>
</body>

<?php


   




    




?>