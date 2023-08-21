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
        $newDate = $_POST["new_date"];
        // Aquí llama al método en el controlador para actualizar la fecha
        // $coders_requeriment->updateFecha($id_coder, $id_requirement, $newDate);
        // Luego, podrías mostrar un mensaje de confirmación o redireccionar
    }
    ?>

    <h2>Editar Requerimientos Coder</h2>
    <table>
        <!-- Mostrar los detalles actuales del coder y el requerimiento aquí -->
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?= $row['coder_id'] ?></td>
                <td><?= $row['name_coder'] ?></td>
                <td><?= $row['surname1'] ?></td>
                <td><?= $row['surname2'] ?></td>
                <td><?= $row['requirement_id'] ?></td>
                <td><?= $row['name_requirement'] ?></td>
                <td><?= $row['date'] ?></td>
            </tr>
        <?php endforeach; ?>
        
    </table>

    <!-- Formulario para editar la fecha de entrega -->
    <form method="post">
        <label for="new_date">Nueva Fecha de Entrega:</label>
        <input type="date" id="new_date" name="new_date" required>
        <button type="submit">Actualizar Fecha</button>
    </form>
</body>
</html>
