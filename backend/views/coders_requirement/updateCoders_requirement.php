
<?php

use App\Controllers\Coders_requirementController;
require_once __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id_coder = $_POST["id"];
    $id_requirement = $_POST["id_requirement"]; 

    $newState = $_POST['state'];
    $newDate = $_POST['date'];

    $data = [
        'state' => $newState,
        'date' => $newDate,
    ];

    $update = new Coders_requirementController();
    $update->update($id_coder, $id_requirement, $data);
    header('Location: showCoders_requirement.php?id_coder=' . $id_coder);
    exit();
}
?>