<?php
use App\Controllers\CodersController;
require_once __DIR__ . '/../../vendor/autoload.php';

$codersController = new CodersController;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo 'HUBO UN POST';

    $id = $_POST["id"];
    $newNameCoder = $_POST['name_coder'];
    $newSurname1 = $_POST['surname1'];
    $newSurname2 = $_POST['surname2'];
    $newEmail = $_POST['email'];
    $newPhone = $_POST['phone'];
    $newCity = $_POST['city'];

    $data = [
        'id'=> $id,
        'name_coder' => $newNameCoder,
        'surname1' => $newSurname1,
        'surname2' => $newSurname2,
        'email' => $newEmail,
        'phone'=> $newPhone,
        'city'=> $newCity
    ];

    echo '<pre>'; print_r($data); echo '</pre>';

    foreach ($data as $value) {
        echo gettype($value), "\n";
    }

    $codersController->update($data);

    header("Location: getAllCoders.php");
    exit();
} else {
    $id = $_GET["id"];

    $coderData = $codersController->show($id);

    $newNameCoder = $coderData['name_coder'];
    $newSurname1 = $coderData['surname1'];
    $newSurname2 = $coderData['surname2'];
    $newEmail = $coderData['email'];
    $newPhone = $coderData['phone'];
    $newCity = $coderData['city'];
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Coder</title>
</head>
<body>
    <h1>Editar Coder</h1>
    <form action="./editCoder.php" method="POST">
        <fieldset>
            <legend>Modificar los datos de los coders</legend>
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="name_coder">Coder</label>
            <input type="text" name="name_coder" required value="<?= $newNameCoder ?>">
            <label for="surname">Apellidos</label>
            <input type="text" name="surname1"  value="<?= $newSurname1 ?>">
            <input type="text" name="surname2"  value="<?= $newSurname2 ?>">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="" value="<?= $newEmail ?>">
            <label for="phone">Telefono</label>
            <input type="text" name="phone" placeholder="" value="<?= $newPhone ?>">
            <label for="city">Ciudad</label>
            <input type="text" name="city" placeholder="" value="<?= $newCity ?>">
            <input type="submit" name="submit" value="ACTUALIZAR CODER">
        </fieldset>
    </form>
    <a href="./getAllCoders.php">
        <button>
            Ver coders
        </button>
    </a>
</body>
</html>