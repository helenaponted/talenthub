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
        'id_bootcamp' => $_POST["id_bootcamp"],
    ];

    $coder = new CodersController;
    $coder->store($data);
    header("Location:./../../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./../../../../styles.css">
    <style>
       
    </style>
    <title>Tu Proyecto - Landing Page</title>
</head>

<body class="font-sans flex justify-center items-center h-screen index">

     <div class="w-1/2 p-8">
        <h1>Únete a FactoríaF5</h1>
        
        <div class="flex w-auto mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="w-full bg-white p-8 flex flex-col justify-center items-center">
                <form action="./addCoder.php" method="POST" class="space-y-4 w-full">
                    <label for="name" class="block text-sm text-gray-600 mb-2">Nombre</label>
                    <input type="text" name="name" required class="w-full border rounded-lg py-2 px-3">

                    <label for="surname1" class="block text-sm text-gray-600 mb-2">Apellido 1</label>
                    <input type="text" name="surname1" required class="w-full border rounded-lg py-2 px-3">

                    <label for="surname2" class="block text-sm text-gray-600 mb-2">Apellido 2</label>
                    <input type="text" name="surname2" required class="w-full border rounded-lg py-2 px-3">

                    <label for="email" class="block text-sm text-gray-600 mb-2">Correo Electrónico</label>
                    <input type="email" name="email" required class="w-full border rounded-lg py-2 px-3">

                    <label for="phone" class="block text-sm text-gray-600 mb-2">Teléfono</label>
                    <input type="tel" name="phone" required class="w-full border rounded-lg py-2 px-3">

                    <label for="city" class="block text-sm text-gray-600 mb-2">Ciudad</label>
                    <input type="text" name="city" required class="w-full border rounded-lg py-2 px-3">

                    <input type="hidden" name="id_rol" value="3">
                    <input type="hidden" name="id_bootcamp" value="1">

                    <div class="flex justify-center">
                        <button type="submit" name="submit" class="form-button">
                            ENVIAR FORMULARIO
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
