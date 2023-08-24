<?php 
use App\Controllers\CodersController;
require "./../../vendor/autoload.php";

$codersController = new CodersController;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedCoders = $_POST["selectedCoders"];

    $codersController = new CodersController();

    foreach ($selectedCoders as $id) {
        $id = intval($id);
        $newBootcampValue = 5;

        $coderInfo = $codersController->show($id); 

        $success = $codersController->updateBootcamp($id, $newBootcampValue);

        if ($success) {
            echo "Se ha añadido a {$coderInfo['name_coder']} {$coderInfo['surname1']} {$coderInfo['surname2']} al bootcamp Rural Camp." .  "<br>";
            echo '<a href="./indexruralcamp.php">Volver al bootcamp</a>';
        } else {
            echo "Hubo un problema al actualizar el coder con ID $id";
        }
    }
}