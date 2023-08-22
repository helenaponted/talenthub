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
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talenthub</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./addCoder.css">
</head>

<body class="bg-primary flex">

       <main class="ml-56 flex-grow bg-primary p-8 rounded-lg -md flex items-center justify-center">
        <div class="w-96 bg-white p-8 rounded-lg">
            <h2 class="text-2xl font-semibold mb-4 text-secondary">¡Únete a Factoría F5!</h2>
            <form action="./addCoder.php" method="POST" class="space-y-4">
                <label for="name" class="block">Name</label>
                <input type="text" name="name" required class="w-full border rounded-lg py-2 px-3">

                <label for="surname1" class="block">Surname</label>
                <input type="text" name="surname1" required class="w-full border rounded-lg py-2 px-3">

                <label for="surname2" class="block">Surname</label>
                <input type="text" name="surname2" required class="w-full border rounded-lg py-2 px-3">

                <label for="email" class="block">Email</label>
                <input type="email" name="email" required class="w-full border rounded-lg py-2 px-3">

                <label for="phone" class="block">Phone</label>
                <input type="tel" name="phone" required class="w-full border rounded-lg py-2 px-3">

                <label for="city" class="block">City</label>
                <input type="text" name="city" required class="w-full border rounded-lg py-2 px-3">

                <input type="hidden" name="id_rol" value="3">
                <input type="hidden" name="id_bootcamp" value="1">

                <div class="flex justify-center">
                    <button type="submit" name="submit" class="bg-secondary text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300 ease-in-out">
                        SUBMIT
                    </button>
                </div>
            </form>
        </div>
    </main>

</body>