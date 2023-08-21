<?php
// use App\Controllers\Coders_requirementController;
// require_once __DIR__ . '/../../vendor/autoload.php';

// $coders_requirementController = new Coders_requirementController;

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     echo 'Cambio realizado con éxito';

//     $IdNewRequirement = $_POST["id_requirement"];
//     $newNameRequirement = $_POST['name_requirement'];
//     $date = $_POST['date'];

//     $data = [
//         'id_requeriment'=> $IdNewRequirement,
//         'name_requirement' => $newNameRequirement,
//         'date' => $date
//     ];

//     echo '<pre>'; print_r($data); echo '</pre>';

//     foreach ($data as $value) {
//         echo gettype($value), "\n";
//     }

//     $coders_requirementController->update($data);

//     header("Location: showCoders_requirement.php");
//     exit();
// } else {
//     $id = $_GET["id_requirement"];

//     $coders_requirementModification = $coders_requirementController->show($id_coder, $id_requirement);

//     $IdNewRequirement = $coders_requirementModification['id_requirement'];
//     $newNameRequirement = $coders_requirementModification['name_requirement'];

// }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Requerimientos Coder</title>
</head>
<body>
    <?php
    use App\Controllers\Coders_requirementController;
    require "./../../vendor/autoload.php";

    $id_coder = isset($_GET["id_coder"]) ? $_GET["id_coder"] : null;
    $id_requirement = isset($_GET["id_requirement"]) ? $_GET["id_requirement"] : null;
    $coders_requeriment = new Coders_requirementController;
    $results = $coders_requeriment->show($id_coder, $id_requirement);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $IdNewRequirement = $_POST["id_requirement"];
        $newNameRequirement = $_POST['name_requirement'];
        $date = $_POST['date'];
    }
    ?>

    <h2>Editar Requerimientos Coder</h2>
    <table>
        <?php foreach ($results as $row): ?>
            echo "<tr>
                <td><?= $row['requirement_id'] ?></td>
                <td><?= $row['name_requirement'] ?></td>
                <td><?= $row['date'] ?></td>
            </tr>"
        <?php endforeach; ?>
        
    </table>

    <!-- Formulario para editar la fecha de entrega -->
    <form action=".editCoders_requirement.php" method="post">
    <label for="dog-names">Estado del Requerimiento:</label>
        <select name="dog-names" id="dog-names scope="col">
        <option value="delivered">Entregado</option>
        <option value="undelivered">No entregado</option>
        </select>
    <label for="new_date">Fecha de entrega:</label>
    <input type="date" id="new_date" name="new_date" required>
        <br>
        <button type="submit">Actualizar Fecha</button>
    </form>
</body>
</html>
