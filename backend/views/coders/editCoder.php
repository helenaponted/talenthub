<?php
use App\Controllers\CodersController;
require_once __DIR__ . '/../../vendor/autoload.php';

$codersController = new CodersController;

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $id = $_POST["id"];
    $newNameCoder = $_POST['name_coder'];
    $newSurname1 = $_POST['surname1'];
    $newSurname2 = $_POST['surname2'];
    $newEmail = $_POST['email'];
    $newPhone = $_POST['phone'];
    $newCity = $_POST['city'];
    $newBootcamp = $_POST["id_bootcamp"];
    $newRol = $_POST['id_rol'];

    $data = [
        'id'=> $id,
        'name_coder' => $newNameCoder,
        'surname1' => $newSurname1,
        'surname2' => $newSurname2,
        'email' => $newEmail,
        'phone'=> $newPhone,
        'city'=> $newCity, 
        'id_bootcamp'=>$newBootcamp,
        'id_rol' => $newRol,
        
        
    ];

    echo '<pre>'; print_r($data); echo '</pre>';

    foreach ($data as $value) {
        echo gettype($value), "\n";
    }

    $codersController->update($data, $id);

    header("Location: getAllCoders.php");
    exit();
} else {
    $id = $_GET["id"];

// Si no hay ID, redirect a list coders

// header("Location: getAllCoders.php");
// exit();

    $coderData = $codersController->show($id);

    $newNameCoder = $coderData['name_coder'];
    $newSurname1 = $coderData['surname1'];
    $newSurname2 = $coderData['surname2'];
    $newEmail = $coderData['email'];
    $newPhone = $coderData['phone'];
    $newCity = $coderData['city'];
    $newBootcamp = $coderData['id_bootcamp'];
    $newRol = $coderData['id_rol'];
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="editCoder.css">
    <title>Editar Coder</title>
</head>
<body class="grid h-screen place-items-center fondo"> 
<div class="bg-white p-8 rounded-lg shadow-md w-96 justify-center">
    <h1 class="text-2xl font-semibold mb-4 text-secondary">Editar Coder</h1>
    <form action="./editCoder.php" method="POST">
        <fieldset>
            <legend> Modificar los datos de los coders </legend>
            </br>
            <input class="w-full border rounded-lg py-2 px-3 mb-2" type="hidden" name="id" value="<?= $id ?>">
            <label class="block mb-2" for="name" for="name_coder">Coder</label>
            <input class="w-full border rounded-lg py-2 px-3 mb-2" type="text" name="name_coder" required value="<?= $newNameCoder ?>">
            <label class="block mb-2" for="surname">Apellidos</label>
            <input class="w-full border rounded-lg py-2 px-3 mb-2" type="text" name="surname1"  value="<?= $newSurname1 ?>">
            <input class="w-full border rounded-lg py-2 px-3 mb-2" type="text" name="surname2"  value="<?= $newSurname2 ?>">
            <label class="block mb-2" for="email">Email</label>
            <input class="w-full border rounded-lg py-2 px-3 mb-2" type="text" name="email" placeholder="" value="<?= $newEmail ?>">
            <label class="block mb-2" for="phone">Telefono</label>
            <input class="w-full border rounded-lg py-2 px-3 mb-2" type="text" name="phone" placeholder="" value="<?= $newPhone ?>">
            <label class="block mb-2" for="city">Ciudad</label>
            <input class="w-full border rounded-lg py-2 px-3 mb-2" type="text" name="city" placeholder="" value="<?= $newCity ?>">
            <select name="id_bootcamp">
            <option value="">-- ASIGNAR BOOTCAMP --</option>
                <option value=2>FEMCODERS NORTE</option>
                <option value=3>DIGITAL ACADEMY</option>
                <option value=4>UNIQUE</option>
                <option value=5>RURAL CAMP</option>                
            </select>
            <select name="id_rol">
            <option value="">-- ASIGNAR ESTADO --</option>
                <option value=3>ASPIRANTE</option>
                <option value=4>CODER</option>
                <option value=5>EN RESERVA</option>
                <option value=6>EXCODER</option>
                <option value=7>EXCLUIDO</option>

            </select>
            <input class="bg-secondary text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300 ease-in-out" type="submit" name="submit" value="ACTUALIZAR CODER">
        </fieldset>
</div>
    </form>
    <a href="./getAllCoders.php">
        <button class="bg-secondary text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300 ease-in-out">
            Ver coders
        </button>
    </a>
</body>
</html>