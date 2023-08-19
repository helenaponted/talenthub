<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talenthub</title>
</head>
<body>
    <h1>Listado de Bootcamps</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre del Bootcamp</th>
                <th>Empieza</th>
                <th>Acaba</th>
                <th>¿Es remoto?</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            use App\Controllers\BootcampController;
            require "./../../vendor/autoload.php";

            $bootcampList = new BootcampController;
            $result = $bootcampList->index();
            foreach ($result as $row) {
                echo "<tr>"; 
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name_bootcamp"] . "</td>";
                echo "<td>" . $row["start"] . "</td>";
                echo "<td>" . $row["end"] . "</td>";
                echo "<td>" . $row["remote"] . "</td>";
                echo "<td>
                    <form action='editBootcamp.php' method='GET'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <button type='submit'>Edit</button>
                    </form>
                </td>";
                echo "<td>
                    <form action='deleteBootcamp.php' method='GET'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <button type='submit'>Delete</button>
                    </form>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
