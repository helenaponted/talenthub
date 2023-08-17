<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talenthub</title>
</head>
<body>
    <h1>Listado de Bootcamps</h1>
    <form action="./indexBootcamp.php" method="POST">
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre del Bootcamp</th>
                <th>Empieza</th>
                <th>Acaba</th>
                <th>¿Es remoto?</th>
                
            </tr>
        </thead>
        <tbody>
            
    <?php
            use App\Controllers\BootcampController;
            require "./../../vendor/autoload.php";

            $rolList = new BootcampController;
            $result = $rolList ->index();
            foreach ($result as $row){
                echo "<tr>"; 
                echo "<td>" .$row["id"] . "</td>";
                echo "<td>" .$row["name_bootcamp"] . "</td>";
                echo "<td>" .$row["start"] . "</td>";
                echo "<td>" .$row["end"] . "</td>";
                echo "<td>" .$row["remote"] . "</td>";
                
                echo "</tr>";
            }
   ?>
        </tbody>
    </table>
    </form>

</body>
