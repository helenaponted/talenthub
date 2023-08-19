<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requerimientos Coder</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id coder</th>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>ID requerimiento</th>
                <th>Nombre requerimiento</th>
                <th>Fecha de entrega</th>
            </tr>
        </thead>
        <tbody>
            <?php
            use App\Controllers\Coders_requirementController;
            require "./../../vendor/autoload.php";

            $id_coder = isset($_GET["id_coder"]) ? $_GET["id_coder"] : null;
            $id_requirement = isset($_GET["id_requirement"]) ? $_GET["id_requirement"] : null;
            $coders_requeriment = new Coders_requirementController;
            $results = $coders_requeriment->show($id_coder, $id_requirement);

            foreach ($results as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name_coder'] . "</td>";
                echo "<td>" . $row['surname1'] . "</td>";
                echo "<td>" . $row['surname2'] . "</td>";
                echo "<td>" . $row['id'] ."</td>";
                echo "<td>" . $row['name_requirement'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
