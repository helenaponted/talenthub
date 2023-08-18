<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CODERS</title>
</head>
<body>
    <h1>Listado de Coders</h1>
    <a href="./addCoder.php">
        <button>Crear nuevo coder</button>
    </a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del coder</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Telefono</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 

            use App\Controllers\CodersController;
            require "./../../vendor/autoload.php";

            $codersController = new CodersController;
            $result = $codersController -> getAll();

            foreach ($result as $row){
                echo "<tr>";
                echo "<td>" .$row["id"] . "</td>";
                echo "<td>" .$row["name_coder"] . "</td>";
                echo "<td>" .$row["surname1"] . "</td>";
                echo "<td>" .$row["surname2"] . "</td>";
                echo "<td>" .$row["email"] . "</td>";
                echo "<td>" .$row["phone"] . "</td>";
                echo "<td>
                <div>
                    <a href='editCoder.php?id=" . $row["id"] . "'>
                    <button>EDITAR</button>
                    </a>
                    
                    <a href='deleteCoder.php?id=" . $row["id"] . "'>
                    <button>BORRAR</button>
                    </a>
                </div>
                </td>";

        echo "<td>";
    
        
            }

            ?>
        </tbody>
    </table>
</body>
</html>