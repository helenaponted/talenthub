<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requerimientos</title>
</head>
<body>
    <h1>Listado de requerimientos</h1>
    <table>
        <thead>
            <tr>
                <th>ID Coder</th>
                <th>Nombre coder</th>
                <th>Id requerimiento</th>
                <th>Nombre requerimiento</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            use App\Controllers\Coders_requirementController;
            require "./../../vendor/autoload.php";

            $coders_requirementController = new Coders_requirementController;
            $result = $coders_requirementController->index();
            
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name_coder'] . "</td>";
                echo "<td>" . $row['id_requirement'] . "</td>";
                echo "<td>" . $row['name_requirement'] . "</td>";
                echo "<td>" . $row['state'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>
            
                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>